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
 * Represents a summary of a PagSeguro transaction, typically returned by search services.
 */	
class PagSeguro_Domain_TransactionSummary {
	
	/**
	 * Transaction date
	 */
    private $date;
	
    /**
     * Last event date
     * Date the last notification about this transaction was sent
     */
    private $lastEventDate;	
    
    /**
     * Transaction code
     */
    private $code;

    /**
     *  Reference code
     *  You can use the reference code to store an identifier so you can
     *  associate the PagSeguro transaction to a transaction in your system.
     */
    private $reference;
    
    /**
     * Groos amount of the transaction
     */
    private $grossAmount;
    
    /**
     * Transaction type
     * @see PagSeguro_Domain_TransactionType
     */
    private $type;
	
    /**
     * Transaction status
     * @see PagSeguro_Domain_TransactionStatus
     */
	private $status;

	/**
	 * Net amount
	 */
    private $netAmount;

    /**
     * Discount amount
     */
    private $discountAmount;

    /**
     * Fee amount
     */
    private $feeAmount;

    /**
     * Extra amount
     */
    private $extraAmount;
    
    /**
     * Payment method
     * @see PagSeguro_Domain_PaymentMethod
     */
    private $paymentMethod;	

    /**
     * @return the transaction date
     */
    public function getDate() {
        return $this->date;
    }

    /**
     * Sets the transaction date
     * @param String $date
     */
    public function setDate($date) {
        $this->date = $date;
    }

    /**
     * @return the transaction code
     */
    public function getCode() {
        return $this->code;
    }

    /**
     * Sets transaction code
     * @param String $code
     */
    public function setCode($code) {
        $this->code = $code;
    }

    /**
     * You can use the reference code to store an identifier so you can 
     *  associate the PagSeguro transaction to a transaction in your system.
     *  
     * @return the reference code
     */
    public function getReference() {
        return $this->reference;
    }

    /**
     * Sets the reference code
     *
     * @param reference
     */
    public function setReference($reference) {
        $this->reference = $reference;
    }

    /**
     * @return the transaction gross amount
     */
    public function getGrossAmount() {
        return $this->grossAmount;
    }

    /**
     * Sets the gorss amount
     * @param float $grossAmount
     */
    public function setGrossAmount($grossAmount) {
        $this->grossAmount = $grossAmount;
    }

    /**
     * @return the transaction type
     * @see PagSeguro_Domain_TransactionType
     */
    public function getType() {
        return $this->type;
    }

    /**
     * Sets the transaction sype
     * @param PagSeguroTransactionType $type
     */
    public function setType(PagSeguro_Domain_TransactionType $type) {
        $this->type = $type;
    }	
	
    /**
     * Date the last notification about this transaction was sent
     * @return the last event date
     */
    public function getLastEventDate() {
        return $this->lastEventDate;
    }

    /**
     * Sets the last event date
     * @param String $lastEventDate
     */
    public function setLastEventDate($lastEventDate) {
        $this->lastEventDate = $lastEventDate;
    }	
	
    /**
     * @return the transaction status
     * @see PagSeguro_Domain_TransactionStatus
     */
	public function getStatus() {
        return $this->status;
    }

    /**
     * Sets the transaction status
     * @param PagSeguro_Domain_TransactionStatus $status
     */
    public function setStatus(PagSeguro_Domain_TransactionStatus $status) {
        $this->status = $status;
    }

    /**
     * @return the net amount
     */
    public function getNetAmount() {
        return $this->netAmount;
    }

    /**
     * Sets the net amount
     * @param float $netAmount
     */
    public function setNetAmount($netAmount) {
        $this->netAmount = $netAmount;
    }

    /**
     * @return the discount amount
     */
    public function getDiscountAmount() {
        return $this->discountAmount;
    }

    /**
     * Sets the discount amount
     * @param float $discountAmount
     */
    public function setDiscountAmount($discountAmount) {
        $this->discountAmount = $discountAmount;
    }

    /**
     * @return the fee amount
     */
    public function getFeeAmount() {
        return $this->feeAmount;
    }

    /**
     * Sets the fee amount
     * @param float $feeAmount
     */
    public function setFeeAmount($feeAmount) {
        $this->feeAmount = $feeAmount;
    }

    /**
     * @return the extra amount
     */
    public function getExtraAmount() {
        return $this->extraAmount;
    }

    /**
     * Sets the extra amount
     * @param float $extraAmount
     */
    public function setExtraAmount($extraAmount) {
        $this->extraAmount = $extraAmount;
    }

    /**
     * Sets the payment method
     * @param PagSeguro_Domain_PaymentMethod $paymentMethod
     */
    public function setPaymentMethod(PagSeguro_Domain_PaymentMethod $paymentMethod) {
        $this->paymentMethod = $paymentMethod;
    }

    /**
     * @return the payment method
     * @see PagSeguro_Domain_PaymentMethod
     */
    public function getPaymentMethod() {
        return $this->paymentMethod;
    }	
	
}

?>