<?php
declare(strict_types=1);

namespace Tp\DataApi\Responses;

use Tp\DataApi\Parameters\PaymentInfo;

class GetPaymentInstructionsResponse extends Response
{
	/**
	 * @var PaymentInfo|null
	 */
	protected $paymentInfo;

	public static function createFromResponse(
		array $response
	) : self {
		/** @var GetPaymentInstructionsResponse $instance */
		$instance = parent::createFromResponse($response);

		$paymentInfo = new PaymentInfo($response['paymentInfo']);
		$instance->setPaymentInfo($paymentInfo);

		return $instance;
	}

	public function getPaymentInfo()
	{
		return $this->paymentInfo;
	}

	public function setPaymentInfo(PaymentInfo $paymentInfo = NULL)
	{
		$this->paymentInfo = $paymentInfo;
	}
}
