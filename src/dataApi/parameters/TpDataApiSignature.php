<?php
TpUtils::requirePaths(array(
	array('exceptions', 'TpMissingParameterException.php'),
	array('exceptions', 'TpInvalidSignatureException.php'),
	array('dataApi', 'processors', 'TpDataApiDigester.php')
));

class TpDataApiSignature {

	/**
	 * TpDataApiSignature constructor.
	 */
	protected function __construct() {
		// Hidden.
	}

	/**
	 * Signature is always computed from a hash. If there is a 'signature' key
	 * already present, it is removed. Password can be provided either as a hash
	 * key 'password', or as a method argument $password.
	 *
	 * @param array $data
	 * @param string $password
	 * @return string
	 * @throws TpMissingParameterException
	 */
	public static function compute(array $data, $password = null) {
		unset($data['signature']);

		if(!is_null($password)) {
			$data['password'] = $password;
		}

		if(!array_key_exists('password', $data)) {
			throw new TpMissingParameterException('password');
		}

		if(is_null($data['password']) || $data['password'] === '') {
			throw new TpMissingParameterException('password');
		}

		$processed = TpDataApiDigester::process($data);
		return $processed;
	}

	/**
	 * Validates given $data hash. The signature can be provided either as its
	 * key 'signature', or as a method argument $signature. If the computed
	 * signature differs from the provided one, TpInvalidSignatureException is
	 * thrown.
	 *
	 * @param array $data
	 * @param string $password
	 * @param string|null $signature
	 * @throws TpInvalidSignatureException
	 * @throws TpMissingParameterException
	 */
	public static function validate(array $data, $password, $signature = null) {
		if(is_null($signature)) {
			$dataSignatureKeyExists = array_key_exists('signature', $data);
			if(!$dataSignatureKeyExists || $dataSignatureKeyExists === '') {
				throw new TpMissingParameterException('signature');
			}

			$signature = $data['signature'];
		}

		$computed = static::compute($data, $password);
		if($computed != $signature) {
			throw new TpInvalidSignatureException;
		}
	}

}
