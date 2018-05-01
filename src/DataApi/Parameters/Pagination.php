<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use Tp\DataApi\DataApiObject;

abstract class Pagination extends DataApiObject
{

	/**
	 * @var int|null
	 */
	protected $page;

	/**
	 * @var int|null
	 */
	protected $itemsOnPage;

	public function getPage()
	{
		return $this->page;
	}

	public function setPage(int $page = NULL)
	{
		$this->page = $page;
	}

	public function getItemsOnPage()
	{
		return $this->itemsOnPage;
	}

	public function setItemsOnPage(int $itemsOnPage = NULL)
	{
		$this->itemsOnPage = $itemsOnPage;
	}

}
