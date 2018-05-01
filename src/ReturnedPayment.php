<?php
declare(strict_types=1);

namespace Tp;

/**
 * Class to handle returned payment callback from ThePay gate.
 */
class ReturnedPayment extends Payment
{
	/**
	 * @var int|null merchantId from request
	 */
	protected $requestMerchantId = NULL;
	/**
	 * @var int|null accountId from request
	 */
	protected $requestAccountId = NULL;

	/**
	 * @var int Payment status. One of enum values specified in the ThePay API documentation.
	 */
	protected $status;

	/**
	 * @var int Unique payment ID in the ThePay system.
	 */
	protected $paymentId;

	/**
	 * Threat rating of the IP address that sent the payment.
	 */
	protected $ipRating;

	/**
	 * @var string For offline payments, variable symbol (or equivalent) that identifies the payment.
	 */
	protected $variableSymbol;

	/**
	 * @var string Signature specified in arguments by ThePay gate.
	 */
	protected $signature;

	/**
	 * @var bool if payment method is offline or online
	 */
	protected $isOffline;

	/**
	 * @var bool if payment needs additional confirmation about it's state - for online methods with additional
	 *      confirmation
	 */
	protected $needConfirm;

	/**
	 * @var bool if actual action is confirmation about payment state - for online methods with additional
	 *      confirmation
	 */
	protected $isConfirm;

	/**
	 * @var string|null specific symbol from bank transaction. Used only for permanent payments.
	 */
	protected $specificSymbol = NULL;

	/**
	 * Number of customer's account in full format including bank code.
	 * Is set only if merchant has turned on this functionality and account number is available for used payment method.
	 *
	 * @var string|null
	 */
	protected $customerAccountNumber = NULL;

	/**
	 * Name of customer's account. Usually name and surname of customer, but it could be arbitrary name
	 * which he set for his account in internet banking of his bank.
	 * Is filled only for some payment methods.
	 *
	 * @var string|null
	 */
	protected $customerAccountName = NULL;

	/**
	 * Correctly paid.
	 */
	const STATUS_OK = 2;
	/**
	 * Canceled by customer.
	 */
	const STATUS_CANCELED = 3;
	/**
	 * Some error occurred during payment process.
	 * Probably not payed.
	 */
	const STATUS_ERROR = 4;

	/**
	 * Payment was underpaid
	 */
	const STATUS_UNDERPAID = 6;

	/**
	 * Payment was paid, but waiting for confirmation from payment system.
	 */
	const STATUS_WAITING = 7;

	/**
	 * Payment amount is blocked on customer's account. Money is charged after sending paymentDeposit request through
	 * API. Used only for card payments.
	 */
	const STATUS_CARD_DEPOSIT = 9;

	protected static $BOOL_ARGS = [
		'isOffline', 'needConfirm', 'isConfirm',
		'deposit', 'isRecurring',
	];

	protected static $INT_ARGS = [
		'requestMerchantId', 'requestAccountId', 'status',
		'paymentId', 'methodId',
	];

	protected static $FLOAT_ARGS = [
		'value',
	];

	/**
	 * @var array required arguments of incoming request.
	 */
	protected static $REQUIRED_ARGS = [
		'value', 'currency', 'methodId', 'description', 'merchantData',
		'status', 'paymentId', 'ipRating', 'isOffline', 'needConfirm',
	];

	/**
	 * @var array optional arguments of incoming request.
	 */
	protected static $OPTIONAL_ARGS = [
		'isConfirm', 'variableSymbol', 'specificSymbol',
		'deposit', 'isRecurring', 'customerAccountNumber',
		'customerAccountName',
	];
	/**
	 * @var array default values for optional args
	 */
	protected static $OPTIONAL_ARGS_DEFAULT = [
		'isConfirm'             => NULL, 'variableSymbol' => NULL, 'specificSymbol' => NULL,
		'deposit'               => NULL, 'isRecurring' => NULL,
		'customerAccountNumber' => NULL, 'customerAccountName' => NULL,
	];

	/**
	 * @param MerchantConfig $config
	 * @param array          $args array Optional arguments parameter, that can specify the
	 *                             arguments of the returned payment. If not specified, it is taken
	 *                             from the $_REQUEST superglobal array.
	 *
	 * @throws MissingParameterException
	 */
	function __construct(MerchantConfig $config, array $args = NULL)
	{
		parent::__construct($config);

		if (is_null($args)) {
			$args = &$_REQUEST;
		}

		if ( !empty($args['merchantId'])) {
			$this->requestMerchantId = intval($args['merchantId']);
		}
		if ( !empty($args['accountId'])) {
			$this->requestAccountId = intval($args['accountId']);
		}

		foreach (self::$REQUIRED_ARGS as $arg) {
			if ( !isset($args[$arg])) {
				throw new MissingParameterException($arg);
			}

			$this->{$arg} = $args[$arg];
		}

		foreach (self::$OPTIONAL_ARGS_DEFAULT as $arg => $defaultValue) {
			if ( !isset($args[$arg])) {
				$this->{$arg} = $defaultValue;
			}
			else {
				$this->{$arg} = $args[$arg];
			}
		}

		foreach (self::$BOOL_ARGS as $key) {
			if ( !is_null($this->{$key})) {
				$this->{$key} = $this->{$key} === '1';
			}
		}

		foreach (self::$INT_ARGS as $key) {
			if ( !is_null($this->{$key})) {
				$this->{$key} = intval($this->{$key});
			}
		}

		foreach (self::$FLOAT_ARGS as $key) {
			if ( !is_null($this->{$key})) {
				$this->{$key} = doubleval($this->{$key});
			}
		}

		$this->signature = $args['signature'];
	}

    /**
     * Use this call to verify signature of the payment.
     * this method is called automatically.
     *
     * @param string|null $signature
     * @return true if signature is valid, otherwise throws
     *   a Tp\TpInvalidSignatureException.
     * @throws InvalidSignatureException , when signature is invalid.
     */
	function verifySignature(string $signature = NULL) : bool
	{
		// check merchantId and accountId from request
		if (
			$this->getRequestMerchantId() !== $this->getMerchantConfig()->merchantId
			|| $this->getRequestAccountId() !== $this->getMerchantConfig()->accountId
		) {
			throw new InvalidSignatureException;
		}

		if ($signature === NULL) {
			$signature = $this->signature;
		}
		// Compute the signature for arguments specified, and compare
		// it to the specified signature.

		$out = [];
		$out[] = 'merchantId=' . $this->getRequestMerchantId();
		$out[] = 'accountId=' . $this->getRequestAccountId();
		foreach (array_merge(self::$REQUIRED_ARGS, self::$OPTIONAL_ARGS) as $property) {
			if ( !is_null($this->{$property})) {
				$value = $this->{$property};

				if (in_array($property, self::$FLOAT_ARGS, TRUE)) {
					$value = number_format($value, 2, '.', '');
				}
				else if (in_array($property, self::$BOOL_ARGS, TRUE)) {
					$value = $value ? '1' : '0';
				}

				$out[] = "{$property}={$value}";
			}
		}
		$out[] = 'password=' . $this->getMerchantConfig()->password;

		$sig = $this->hashFunction(implode('&', $out));

		if ($sig === $signature) {
			return TRUE;
		}
		else {
			throw new InvalidSignatureException;
		}
	}

	public function getRequestMerchantId()
	{
		return $this->requestMerchantId;
	}

	public function getRequestAccountId()
	{
		return $this->requestAccountId;
	}

	/**
	 * Overridden to provide default value if no currency is specified in
	 * the callback, so that merchant application can count with different
	 * currencies right now, even when ThePay does not support multiple
	 * currencies so far.
	 *
	 * @return string
	 */
	function getCurrency() : string
	{
		if (is_null($this->currency)) {
			return 'CZK';
		}
		else {
			return $this->currency;
		}
	}

	/**
	 * Overwrites getSignature() method from Tp\TpPayment to return the valid
	 * signature specified by ThePay gate, not the signature computed
	 * by the class for sending the payment (mainly because sent payment
	 * does not contain all fields that are used to generate returned
	 * payment signature).
	 *
	 * @return string
	 */
	function getSignature() : string
	{
		return $this->signature;
	}

	/**
	 * Gets status of the payment.
	 *
	 * @return int one of STATUS_* constants.
	 */
	function getStatus() : int
	{
		return $this->status;
	}

	/**
	 * @return int Gets unique ID of the payment in the ThePay system.
	 */
	function getPaymentId() : int
	{
		return $this->paymentId;
	}

	/**
	 * Returns the IP rating of the IP that sent the payment.
	 */
	function getIpRating() : int
	{
		return $this->ipRating;
	}

	/**
	 * @return string Returns the variable symbol, if valid, for offline payment method.
	 */
	function getVariableSymbol()
	{
		return $this->variableSymbol;
	}

	/**
	 * @return bool true if payment method is offline
	 */
	function isOffline() : bool
	{
		return $this->getIsOffline();
	}

	/**
	 * @return bool if payment needs additional confirmation about it's state - for online methods with additional
	 *                 confirmation
	 */
	public function getNeedConfirm() : bool
	{
		return $this->needConfirm;
	}

	/**
	 * @return bool if actual action is confirmation about payment state - for online methods with additional
	 *                 confirmation
	 */
	public function getIsConfirm()
	{
		return $this->isConfirm;
	}

	/**
	 * @return string specific symbol from bank transaction. Used only for permanent payments.
	 */
	public function getSpecificSymbol()
	{
		return $this->specificSymbol;
	}

	/**
	 * @return bool if payment method is offline or online
	 */
	public function getIsOffline() : bool
	{
		return $this->isOffline;
	}

	/**
	 * @return string Number of customer's account in full format including bank code.
	 */
	public function getCustomerAccountNumber()
	{
		return $this->customerAccountNumber;
	}

	/**
	 * @return string Name of customer's account.
	 */
	public function getCustomerAccountName()
	{
		return $this->customerAccountName;
	}
}
