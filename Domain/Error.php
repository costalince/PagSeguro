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
 * Represents a PagSeguro web service error
 * @see PagSeguro_Exception_ServiceException
 */
class PagSeguro_Domain_Error {
	
	/**
	 * Error code
	 */
    private $code;

    /**
     * Error description
     */
    private $message;

    /**
     * Initializes a new instance of the PagSeguro_Domain_Error class
     * 
     * @param String $code
     * @param String $message
     */
	public function __construct($code, $message){
		$this->code = $code;
		$this->message = $message;
	}
	
	/**
	 * @return the code
	 */
    public function getCode() {
        return $this->code;
    }

    /**
     * Sets the code
     * @param String $code
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * @return the error description
     */
    public function getMessage() {
        return $this->message;
    }

    /**
     * Sets the error description
     * @param String $message
     */
    public function setMessage($message) {
        $this->message = $message;
    }

}
	
?>