<?php
declare(strict_types=1);

namespace Tp\DataApi\Requests;

class GetPaymentMethodsRequest extends Request
{
	/**
	 * @var bool|null
	 */
	protected $onlyActive;

	/**
	 * @return bool|null
	 */
	public function getOnlyActive()
	{
		return $this->onlyActive;
	}

	public function setOnlyActive(bool $onlyActive = NULL)
	{
		$this->onlyActive = $onlyActive;
	}

	protected function configArray() : array
	{
		$configArray = parent::configArray();
		$configArray['accountId'] = $this->_config->accountId;

		return $configArray;
	}
}
