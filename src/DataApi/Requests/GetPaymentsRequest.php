<?php
declare(strict_types=1);

namespace Tp\DataApi\Requests;

use Tp\DataApi\Parameters\GetPaymentsSearchParams;
use Tp\DataApi\Parameters\Ordering;
use Tp\DataApi\Parameters\PaginationRequest;
use Tp\DataApi\ValueFormatter;

class GetPaymentsRequest extends Request
{
	protected static $dateTimePaths = [
		['searchParams', 'createdOnFrom'],
		['searchParams', 'createdOnTo'],
		['searchParams', 'finishedOnFrom'],
		['searchParams', 'finishedOnTo'],
	];

	/**
	 * @var GetPaymentsSearchParams|null
	 */
	protected $searchParams;

	/**
	 * @var PaginationRequest|null
	 */
	protected $pagination;

	/**
	 * @var Ordering|null
	 */
	protected $ordering;

	public function getSearchParams()
	{
		return $this->searchParams;
	}

	public function setSearchParams(GetPaymentsSearchParams $searchParams = NULL)
	{
		$this->searchParams = $searchParams;
	}

	public function getPagination()
	{
		return $this->pagination;
	}

	public function setPagination(PaginationRequest $pagination = NULL)
	{
		$this->pagination = $pagination;
	}

	public function getOrdering()
	{
		return $this->ordering;
	}

	public function setOrdering(Ordering $ordering = NULL)
	{
		$this->ordering = $ordering;
	}
}
