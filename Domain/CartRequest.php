<?php if (!defined('PAGSEGURO_LIBRARY')) { die('No direct script access allowed'); }
/*
************************************************************************
Copyright [2011] [PagSeguro Internet Ltda.]

Licensed under the Apache License, Version 2.0 (the "License");
you may not use this file except in compliance with the License.
You may obtain a copy of the License at

http://www.apache.org/licenses/LICENSE-2.0

Unless required by applicable law or agreed to in writing, software
distributed under the License is distributed on an "AS IS" BASIS,
WITHOUT WARRANTIES OR CONDITIONS OF ANY KIND, either express or implied.
See the License for the specific language governing permissions and
limitations under the License.
************************************************************************
*/

/**
 * Represents a Cart request
 */
class PagSeguro_Domain_CartRequest extends Zend_Controller_Plugin_Abstract {
    
    /**
     * Cart type
     */
    private	$type;
    
    /**
     * Cart id
     */
    private $id;
    
    /**
     * Cart description
     */
    
    private $description;
    
    /**
     * Cart quantity
     */
 	private $quantity;
 	
 	/**
     * Cart amount
     */
 	private $amount;
 	
 	/**
     * Cart weight
     */
 	private $weight;
 	
 	/**
     * Cart shippingCost
     */
 	private $shippingCost;  
    
    /**
     * Cart currency
     */
    private	$currency;
    
    /**
     * Cart email
     */
    private	$email;
	/**
	 * @return the $type
	 */
	public function getType() {
		return $this->type;
	}

	/**
	 * @param field_type $type
	 */
	public function setType($type) {
		$this->type = $type;
	}

	/**
	 * @return the $id
	 */
	public function getId() {
		return $this->id;
	}

	/**
	 * @param field_type $id
	 */
	public function setId($id) {
		$this->id = $id;
	}

	/**
	 * @return the $description
	 */
	public function getDescription() {
		return $this->description;
	}

	/**
	 * @param field_type $description
	 */
	public function setDescription($description) {
		$this->description = $description;
	}

	/**
	 * @return the $quantity
	 */
	public function getQuantity() {
		return $this->quantity;
	}

	/**
	 * @param field_type $quantity
	 */
	public function setQuantity($quantity) {
		$this->quantity = $quantity;
	}

	/**
	 * @return the $amount
	 */
	public function getAmount() {
		return $this->amount;
	}

	/**
	 * @param field_type $amount
	 */
	public function setAmount($amount) {
		$this->amount = $amount;
	}

	/**
	 * @return the $weight
	 */
	public function getWeight() {
		return $this->weight;
	}

	/**
	 * @param field_type $weight
	 */
	public function setWeight($weight) {
		$this->weight = $weight;
	}

	/**
	 * @return the $shippingCost
	 */
	public function getShippingCost() {
		return $this->shippingCost;
	}

	/**
	 * @param field_type $shippingCost
	 */
	public function setShippingCost($shippingCost) {
		$this->shippingCost = $shippingCost;
	}

	/**
	 * @return the $currency
	 */
	public function getCurrency() {
		return $this->currency;
	}

	/**
	 * @param field_type $currency
	 */
	public function setCurrency($currency) {
		$this->currency = $currency;
	}

	/**
	 * @return the $email
	 */
	public function getEmail() {
		return $this->email;
	}

	/**
	 * @param field_type $email
	 */
	public function setEmail($email) {
		$this->email = $email;
	}


	/**
	 * Adds a new product/item in this Cart request
	 * 
	 * @param String $id
	 * @param String $description
	 * @param String $quantity
	 * @param String $amount
	 * @param String $weight
	 * @param String $shippingCost
	 */
    public function addItem($id, $description = null, $quantity = null, $amount = null, $weight = null, $shippingCost = null) {   	
        $this->setId($id);
        $this->setDescription($description);
        $this->setQuantity($quantity);
        $this->setAmount($amount);
        $this->setWeight($weight);
        $this->setShippingCost($shippingCost);        
    }
    
	/**
     * Calls the PagSeguro web service and register this request for Cart
     * 
     * @param Credentials $credentials
     * @return The URL to where the user needs to be redirected to in order to complete the Cart process
     */
    public function register(PagSeguro_Domain_Credentials $credentials) {
    	
    	$AttributesMap = $credentials->getAttributesMap();
    	self::setEmail($AttributesMap['email']);
    	
		return PagSeguro_Service_CartService::createCheckoutRequest($credentials, $this);		
    }
	
	/**
    * @return a string that represents the current object
    */
	public function toString(){
		return "PagSeguro_Domain_CartRequest(Id=".$this->id.", email=".$this->email.")";
	}
	
	
	public function getAttributesMap(){
		return Array(
			'tipo' => $this->type,
		    'item_id' => $this->id,
		    'item_descr' => $this->description,
		    'item_quant' => $this->quantity,
		    'item_valor' => $this->amount,
		    'peso' => $this->weight,
		    'frete' => $this->shippingCost,
		    'moeda' => $this->currency,
		    'email_cobranca' => $this->email
		);
	} 
	
	public function getUrlQuery(){
		return http_build_query($this->getAttributesMap(), '', '&');
	}

    	
    	
}
?>