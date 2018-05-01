<?php
declare(strict_types=1);

namespace Tp\DataApi\Requests;

class GetPaymentStateRequest extends Request
{
	/**
	 * @var int|null
	 */
	protected $paymentId;

	public function getPaymentId()
	{
		return $this->paymentId;
	}

	public function setPaymentId(int $paymentId = NULL)
	{
		$this->paymentId = $paymentId;
	}
}
