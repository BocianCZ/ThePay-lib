<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use DateTimeImmutable;
use DateTimeInterface;
use Tp\DataApi\DataApiObject;
use Tp\DataApi\ValueFormatter;

class GetPaymentsSearchParams extends DataApiObject
{

	/**
	 * @var int[]
	 */
	protected $accountId = [];

	/**
	 * @var int[]
	 */
	protected $state = [];

	/**
	 * @var int[]
	 */
	protected $currency = [];

	/**
	 * @var float|null
	 */
	protected $valueFrom;

	/**
	 * @var float|null
	 */
	protected $valueTo;

	/**
	 * @var DateTimeImmutable|null
	 */
	protected $createdOnFrom;

	/**
	 * @var DateTimeImmutable|null
	 */
	protected $createdOnTo;

	/**
	 * @var DateTimeImmutable|null
	 */
	protected $finishedOnFrom;

	/**
	 * @var DateTimeImmutable|null
	 */
	protected $finishedOnTo;

	/**
	 * @var int[]
	 */
	protected $accounting = [];

	/**
	 * @var string|null
	 */
	protected $description;

	/**
	 * @var string|null
	 */
	protected $merchantData;

	/**
	 * @var int[]
	 */
	protected $method = [];

	/**
	 * @var string|null
	 */
	protected $specificSymbol;

	/**
	 * @return int[]
	 */
	public function getAccountId() : array
	{
		return $this->accountId;
	}

	/**
	 * @param int[] $accountId
	 */
	public function setAccountId(array $accountId = [])
	{
		$this->accountId = ValueFormatter::formatList(
			'int', $accountId
		);
	}

	/**
	 * @return int[]
	 */
	public function getState() : array
	{
		return $this->state;
	}

	/**
	 * @param int[] $state
	 */
	public function setState(array $state = [])
	{
		$this->state = ValueFormatter::formatList(
			'int', $state
		);
	}

	/**
	 * @return int[]
	 */
	public function getCurrency() : array
	{
		return $this->currency;
	}

	/**
	 * @param int[] $currency
	 */
	public function setCurrency(array $currency = [])
	{
		$this->currency = ValueFormatter::formatList(
			'int', $currency
		);
	}

	public function getValueFrom()
	{
		return $this->valueFrom;
	}

	public function setValueFrom(float $valueFrom = NULL)
	{
		$this->valueFrom = $valueFrom;
	}

	public function getValueTo()
	{
		return $this->valueTo;
	}

	public function setValueTo(float $valueTo = NULL)
	{
		$this->valueTo = $valueTo;
	}

	public function getCreatedOnFrom()
	{
		return $this->createdOnFrom;
	}

	public function setCreatedOnFrom(DateTimeImmutable $createdOnFrom = NULL)
	{
		$this->createdOnFrom = $createdOnFrom;
	}

	public function getCreatedOnTo()
	{
		return $this->createdOnTo;
	}

	public function setCreatedOnTo(DateTimeImmutable $createdOnTo = NULL)
	{
		$this->createdOnTo = $createdOnTo;
	}

	public function getFinishedOnFrom()
	{
		return $this->finishedOnFrom;
	}

	public function setFinishedOnFrom(DateTimeImmutable $finishedOnFrom = NULL)
	{
		$this->finishedOnFrom = $finishedOnFrom;
	}

	public function getFinishedOnTo()
	{
		return $this->finishedOnTo;
	}

	public function setFinishedOnTo(\DateTimeImmutable $finishedOnTo = NULL)
	{
		$this->finishedOnTo = $finishedOnTo;
	}

	/**
	 * @return int[]
	 */
	public function getAccounting() : array
	{
		return $this->accounting;
	}

	/**
	 * @param int[] $accounting
	 */
	public function setAccounting(array $accounting = [])
	{
		$this->accounting = ValueFormatter::formatList(
			'int', $accounting
		);
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

	/**
	 * @return int[]
	 */
	public function getMethod() : array
	{
		return $this->method;
	}

	/**
	 * @param int[] $method
	 */
	public function setMethod(array $method = [])
	{
		$this->method = ValueFormatter::formatList(
			'int', $method
		);
	}

	public function getSpecificSymbol()
	{
		return $this->specificSymbol;
	}

	public function setSpecificSymbol(string $specificSymbol = NULL)
	{
		$this->specificSymbol = $specificSymbol;
	}

}
