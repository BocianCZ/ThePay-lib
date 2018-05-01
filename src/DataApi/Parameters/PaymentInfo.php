<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use Tp\DataApi\DataApiObject;
use Tp\DataApi\ValueFormatter;

class PaymentInfo extends DataApiObject
{

	/**
	 * @var bool|null
	 */
	protected $isOffline;

	/**
	 * @var string|null
	 */
	protected $paymentPageUrl;

	/**
	 * Only applicable for unpaid payments.
	 *
	 * @var string|null
	 */
	protected $paymentInfoUrl;

	/**
	 * Only applicable for unpaid payments.
	 *
	 * @var string|null
	 */
	protected $methodChangeUrl;

	/**
	 * @var float|null
	 */
	protected $value;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $accountNumberPrefix;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $accountNumber;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $bankCode;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $vs;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $ss;

	/**
	 * Only applicable for offline payments.
	 *
	 * @var string|null
	 */
	protected $ebankingUrl;

	/**
	 * Only for SuperCash.
	 *
	 * @var string|null
	 */
	protected $scCode;

	/**
	 * Only for SuperCash.
	 *
	 * @var string|null
	 */
	protected $scBarcodeUrl;

	public function getIsOffline()
	{
		return $this->isOffline;
	}

	public function setIsOffline(bool $isOffline = NULL)
	{
		$this->isOffline = $isOffline;
	}

	public function getPaymentPageUrl()
	{
		return $this->paymentPageUrl;
	}

	public function setPaymentPageUrl(string $paymentPageUrl = NULL)
	{
		$this->paymentPageUrl = $paymentPageUrl;
	}

	public function getPaymentInfoUrl()
	{
		return $this->paymentInfoUrl;
	}

	public function setPaymentInfoUrl(string $paymentInfoUrl = NULL)
	{
		$this->paymentInfoUrl = $paymentInfoUrl;
	}

	public function getMethodChangeUrl()
	{
		return $this->methodChangeUrl;
	}

	public function setMethodChangeUrl(string $methodChangeUrl = NULL)
	{
		$this->methodChangeUrl = $methodChangeUrl;
	}

	public function getValue()
	{
		return $this->value;
	}

	public function setValue(float $value = null)
	{
		$this->value = $value;
	}

	public function getAccountNumberPrefix()
	{
		return $this->accountNumberPrefix;
	}

	public function setAccountNumberPrefix(string $accountNumberPrefix = NULL)
	{
		$this->accountNumberPrefix = $accountNumberPrefix;
	}

	public function getAccountNumber()
	{
		return $this->accountNumber;
	}

	public function setAccountNumber(string $accountNumber = NULL)
	{
		$this->accountNumber = $accountNumber;
	}

	public function getBankCode()
	{
		return $this->bankCode;
	}

	public function setBankCode(string $bankCode = NULL)
	{
		$this->bankCode = $bankCode;
	}

	public function getVs()
	{
		return $this->vs;
	}

	public function setVs(string $vs = NULL)
	{
		$this->vs = $vs;
	}

	public function getSs()
	{
		return $this->ss;
	}

	public function setSs(string $ss = NULL)
	{
		$this->ss = $ss;
	}

	public function getEbankingUrl()
	{
		return $this->ebankingUrl;
	}

	public function setEbankingUrl(string $ebankingUrl = NULL)
	{
		$this->ebankingUrl = $ebankingUrl;
	}

	public function getScCode()
	{
		return $this->scCode;
	}

	public function setScCode(string $scCode = NULL)
	{
		$this->scCode = $scCode;
	}

	public function getScBarcodeUrl()
	{
		return $this->scBarcodeUrl;
	}

	public function setScBarcodeUrl(string $scBarcodeUrl = NULL)
	{
		$this->scBarcodeUrl = $scBarcodeUrl;
	}
}
