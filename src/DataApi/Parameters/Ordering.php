<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use Tp\DataApi\DataApiObject;

class Ordering extends DataApiObject
{
	/**
	 * @var string|null
	 */
	protected $orderBy;

	/**
	 * @var string|null
	 */
	protected $orderHow;

	public function getOrderBy()
	{
		return $this->orderBy;
	}

	public function setOrderBy(string $orderBy = NULL)
	{
		$this->orderBy = $orderBy;
	}

	public function getOrderHow()
	{
		return $this->orderHow;
	}

	public function setOrderHow(string $orderHow = NULL)
	{
		$this->orderHow = $orderHow;
	}

}
