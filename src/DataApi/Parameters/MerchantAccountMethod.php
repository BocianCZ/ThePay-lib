<?php
declare(strict_types=1);

namespace Tp\DataApi\Parameters;

use Tp\DataApi\DataApiObject;

class MerchantAccountMethod extends DataApiObject
{
	/**
	 * @var int|null
	 */
	protected $id;

	/**
	 * @var string|null
	 */
	protected $name;

	/**
	 * @var bool|null
	 */
	protected $active;

	public function getId()
	{
		return $this->id;
	}

	public function setId(int $id = NULL)
	{
		$this->id = $id;
	}

	public function getName()
	{
		return $this->name;
	}

	public function setName(string $name = NULL)
	{
		$this->name = $name;
	}

	public function getActive()
	{
		return $this->active;
	}

	public function setActive(bool $active = NULL)
	{
		$this->active = $active;
	}

}
