<?php

/**
 * Wrapper for omnipay responses, which allow us to customise functionality
 *
 * @package payment
 */
class GatewayResponse{

	private $response, $payment;

	public function __construct(Payment $payment, Omnipay\Common\Message\AbstractResponse $response = null){
		$this->response = $response;
		$this->payment = $payment;
	}

	/**
	 * Check if the response indicates a successful gateway action
	 * @return boolean
	 */
	public function isSuccessful(){
		return $this->response && $this->response->isSuccessful();
	}

	/**
	 * Check if a redirect is required
	 * @return boolean
	 */
	public function isRedirect(){
		return $this->response && $this->response->isRedirect();
	}

	/**
	 * Get the omnipay response object
	 * @return AbstractResponse omnipay response
	 */
	public function oResponse(){
		return $this->response;
	}

	/**
	 * Get the appropriate redirect url
	 */
	public function redirectURL(){
		$url = null;
		if ($this->isSuccessful()) {
			$url = $this->payment->getReturnUrl();
		} elseif ($this->isRedirect()) {
			$url = $this->response->getRedirectUrl();
		} else {
			//TODO: should this instead be the current url?
			$url = $this->payment->getCancelUrl();
		}
		return $url;
	}

	/**
	 * Do a redirect, using the current controller
	 */
	public function redirect(){
		Controller::curr()->redirect($this->redirectURL());
	}

}


