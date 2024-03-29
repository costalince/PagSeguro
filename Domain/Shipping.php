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
* Shipping information
*/
class PagSeguro_Domain_Shipping {

	/**  
	 * Shipping address
	 * @see PagSeguroAddress
	 */
    private $address;
    
    /**
    * Shipping type. See the PagSeguro_Domain_ShippingType class for a list of known shipping types.
    * @see PagSeguro_Domain_ShippingType
    */
    private $type;
    
    /**
    * shipping cost.
    */
    private $cost;
    
	/**
	 * Initializes a new instance of the Shipping 
	 * @param array $data
	 */
	public function __constuct(Array $data = null) {
		if ($data) {
			if (isset($data['address']) && $data['address'] instanceof PagSeguro_Domain_Address) {
				$this->address = $data['address'];
			}
			if (isset($data['type']) && $data['type'] instanceof PagSeguro_Domain_ShippingType) {
				$this->type = $data['type'];
			}
			if (isset($data['cost'])) {
				$this->cost = $data['cost'];
			}
		}
	}
	
	/**
	 * Sets the shipping address
	 * @see PagSeguro_Domain_Address
	 * @param PagSeguro_Domain_Address $address
	 */
    public function setAddress(PagSeguro_Domain_Address $address) {
        $this->address = $address;
    }
	
    /**
     * @return the shipping Address
     * @see PagSeguro_Domain_Address
     */
    public function getAddress() {
        return $this->address;
    }

    /**
     * Sets the shipping type
     * @param PagSeguro_Domain_ShippingType $type
     * @see PagSeguro_Domain_ShippingType
     */
    public function setType(PagSeguro_Domain_ShippingType $type) {
        $this->type = $type;
    }

    /**
     * @return the shipping type
     * @see PagSeguro_Domain_ShippingType
     */
    public function getType() {
        return $this->type;
    }
	
    public function setCost($cost) {
        $this->cost = $cost;
    }

    /**
     * @return the shipping cost
     */
    public function getCost() {
        return $this->cost;
    }
	
}	

?>