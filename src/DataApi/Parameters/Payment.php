<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use DateTimeImmutable;
use Tp\DataApi\DataApiObject;
use Tp\DataApi\ValueFormatter;

class Payment extends DataApiObject
{

	/**
	 * @var int|null
	 */
	public $id;

	/**
	 * @var int|null
	 */
	public $account;

	/**
	 * @var int|null
	 */
	public $state;

	/**
	 * @var DateTimeImmutable|null
	 */
	public $createdOn;

	/**
	 * @var DateTimeImmutable|null
	 */
	public $finishedOn;

	/**
	 * @var DateTimeImmutable|null
	 */
	public $canceledOn;

	/**
	 * @var int|null
	 */
	public $payOff;

	/**
	 * @var int|null
	 */
	public $payOffCancel;

	/**
	 * @var float|null
	 */
	public $value;

	/**
	 * @var float|null
	 */
	public $receivedValue;

	/**
	 * @var int|null
	 */
	public $currency;

	/**
	 * @var float|null
	 */
	public $fee;

	/**
	 * @var string|null
	 */
	public $description;

	/**
	 * @var string|null
	 */
	public $merchantData;

	/**
	 * @var int|null
	 */
	public $paymentMethod;

	/**
	 * @var string|null
	 */
	public $specificSymbol;

	/**
	 * @var string|null
	 */
	public $merchantSpecificSymbol;

	/**
	 * @var string|null
	 */
	public $accountNumber;

	/**
	 * @var string|null
	 */
	public $accountOwnerName;

	/**
	 * @var string|null
	 */
	public $returnUrl;

	/**
	 * @var int|null
	 */
	public $permanentPayment;

	/**
	 * @var bool|null
	 */
	public $deposit;

	/**
	 * @var bool|null
	 */
	public $recurring;

	/**
	 * @var string|null
	 */
	public $ip;

	/**
	 * @var string|null
	 */
	public $customerEmail;

	/**
	 * @var string|null
	 */
	protected $fik;

	/**
	 * @var string|null
	 */
	protected $bkp;

	/**
	 * @var string|null
	 */
	protected $pkp;

	/**
	 * @var string|null
	 */
	protected $receiptUrl;

	/**
	 * @var bool|null
	 */
	protected $firstSuccess;

	/**
	 * @return int|null
	 */
	public function getId()
	{
		return $this->id;
	}

	public function setId(int $id = NULL)
	{
		$this->id = $id;
	}

	public function getAccount()
	{
		return $this->account;
	}

	public function setAccount(int $account = NULL)
	{
		$this->account = $account;
	}

	public function getState()
	{
		return $this->state;
	}

	public function setState(int $state = NULL)
	{
		$this->state = $state;
	}

	public function getCreatedOn()
	{
		return $this->createdOn;
	}

	public function setCreatedOn(DateTimeImmutable $createdOn = NULL)
	{
		$this->createdOn = $createdOn;
	}

	public function getFinishedOn()
	{
		return $this->finishedOn;
	}

	public function setFinishedOn(DateTimeImmutable $finishedOn = NULL)
	{
		$this->finishedOn = $finishedOn;
	}

	public function getCanceledOn()
	{
		return $this->canceledOn;
	}

	public function setCanceledOn(DateTimeImmutable $canceledOn = NULL)
	{
		$this->canceledOn = $canceledOn;
	}

	public function getPayOff()
	{
		return $this->payOff;
	}

	public function setPayOff(int $payOff = NULL)
	{
		$this->payOff = $payOff;
	}

	public function getPayOffCancel()
	{
		return $this->payOffCancel;
	}

	public function setPayOffCancel(int $payOffCancel = NULL)
	{
		$this->payOffCancel = $payOffCancel;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setValue(float $value = NULL)
	{
		$this->value = $value;
	}

	public function getReceivedValue()
	{
		return $this->receivedValue;
	}

	public function setReceivedValue(float $receivedValue = NULL)
	{
		$this->receivedValue = $receivedValue;
	}

	public function getCurrency()
	{
		return $this->currency;
	}

	public function setCurrency(int $currency = null)
	{
		$this->currency = $currency;
	}

	public function getFee()
	{
		return $this->fee;
	}

	public function setFee(float $fee = null)
	{
		$this->fee = $fee;
	}

	public function getDescription()
	{
		return $this->description;
	}

	public function setDescription(string $description = NULL)
	{
		$this->description = $description;
	}

	public function getMerchantData()
	{
		return $this->merchantData;
	}

	public function setMerchantData(string $merchantData = NULL)
	{
		$this->merchantData = $merchantData;
	}

	public function getPaymentMethod()
	{
		return $this->paymentMethod;
	}

	public function setPaymentMethod(int $paymentMethod = null)
	{
		$this->paymentMethod = $paymentMethod;
	}

	public function getSpecificSymbol()
	{
		return $this->specificSymbol;
	}

	public function setSpecificSymbol(string $specificSymbol = NULL)
	{
		$this->specificSymbol = $specificSymbol;
	}

	public function getMerchantSpecificSymbol()
	{
		return $this->merchantSpecificSymbol;
	}

	public function setMerchantSpecificSymbol(string $merchantSpecificSymbol = NULL)
	{
		$this->merchantSpecificSymbol = $merchantSpecificSymbol;
	}

	public function getAccountNumber()
	{
		return $this->accountNumber;
	}

	public function setAccountNumber(string $accountNumber = NULL)
	{
		$this->accountNumber = $accountNumber;
	}

	public function getAccountOwnerName()
	{
		return $this->accountOwnerName;
	}

	public function setAccountOwnerName(string $accountOwnerName = NULL)
	{
		$this->accountOwnerName = $accountOwnerName;
	}

	public function getReturnUrl()
	{
		return $this->returnUrl;
	}

	public function setReturnUrl(string $returnUrl = NULL)
	{
		$this->returnUrl = $returnUrl;
	}

	public function getPermanentPayment()
	{
		return $this->permanentPayment;
	}

	public function setPermanentPayment(int $permanentPayment = NULL)
	{
		$this->permanentPayment = $permanentPayment;
	}

	public function getDeposit()
	{
		return $this->deposit;
	}

	public function setDeposit(bool $deposit = NULL)
	{
		$this->deposit = $deposit;
	}

	public function getRecurring()
	{
		return $this->recurring;
	}

	public function setRecurring(bool $recurring = NULL)
	{
		$this->recurring = $recurring;
	}

	public function getIp()
	{
		return $this->ip;
	}

	public function setIp(string $ip = NULL)
	{
		$this->ip = $ip;
	}

	public function getCustomerEmail()
	{
		return $this->customerEmail;
	}

	public function setCustomerEmail(string $customerEmail = NULL)
	{
		$this->customerEmail = $customerEmail;
	}

	public function getFik()
	{
		return $this->fik;
	}

	public function setFik(string $fik = NULL)
	{
		$this->fik = $fik;
	}

	public function getBkp()
	{
		return $this->bkp;
	}

	public function setBkp(string $bkp = NULL)
	{
		$this->bkp = $bkp;
	}

	public function getPkp()
	{
		return $this->pkp;
	}

	public function setPkp(string $pkp = NULL)
	{
		$this->pkp = $pkp;
	}

	public function getReceiptUrl()
	{
		return $this->receiptUrl;
	}

	public function setReceiptUrl(string $receiptUrl = NULL)
	{
		$this->receiptUrl = $receiptUrl;
	}

	public function getFirstSuccess()
	{
		return $this->firstSuccess;
	}

	public function setFirstSuccess(bool $firstSuccess = NULL)
	{
		$this->firstSuccess = $firstSuccess;
	}
}
