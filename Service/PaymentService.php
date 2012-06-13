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
 * Encapsulates web service calls regarding PagSeguro payment requests
 */
class PagSeguro_Service_PaymentService {
	
	const serviceName = 'paymentService';
	
	private static function buildCheckoutRequestUrl(PagSeguro_Service_ConnectionData $connectionData) {
		return $connectionData->getServiceUrl().'/?'.$connectionData->getCredentialsUrlQuery();
	}
	
	private static function buildCheckoutUrl(PagSeguro_Service_ConnectionData $connectionData, $code) {
		return $connectionData->getResource('checkoutUrl')."?code=$code";
	}
	
	// createCheckoutRequest is the actual implementation of the Register method
	// This separation serves as test hook to validate the Uri
	// against the code returned by the service
	public static function createCheckoutRequest(PagSeguro_Domain_Credentials $credentials, PagSeguro_Domain_PaymentRequest $paymentRequest) {
		
		PagSeguro_Log_Log::info("PagSeguro_Domain_PaymentService.Register(".$paymentRequest->toString().") - begin");
		
		$connectionData = new PagSeguro_Service_ConnectionData($credentials, self::serviceName);
		
		try {
			
			$connection = new PagSeguro_Utils_HttpConnection();
			$connection->post(
				self::buildCheckoutRequestUrl($connectionData),
				PagSeguro_Parser_PaymentParser::getData($paymentRequest),
				$connectionData->getServiceTimeout(),
				$connectionData->getCharset()
			);
			
			$httpStatus = new PagSeguro_Domain_HttpStatus($connection->getStatus());
			
			switch ($httpStatus->getType()) {
				
				case 'OK':
					$PaymentParserData = PagSeguro_Parser_PaymentParser::readSuccessXml($connection->getResponse());
					$paymentUrl = self::buildCheckoutUrl($connectionData, $PaymentParserData->getCode());
					PagSeguro_Log_Log::info("PagSeguro_Service_PaymentService.Register(".$paymentRequest->toString().") - end {1}".$PaymentParserData->getCode());
					break;
				
				case 'BAD_REQUEST':
					$errors = PagSeguro_Parser_PaymentParser::readErrors($connection->getResponse());
					$e = new PagSeguro_Exception_ServiceException($httpStatus, $errors);
					PagSeguro_Log_Log::error("PagSeguro_Service_PaymentService.Register(".$paymentRequest->toString().") - error ".$e->getOneLineMessage());
					throw $e;
					break;
				
				default:
					$e = new PagSeguro_Exception_ServiceException($httpStatus);
					PagSeguro_Log_Log::error("PagSeguro_Service_PaymentService.Register(".$paymentRequest->toString().") - error ".$e->getOneLineMessage());
					throw $e;
					break;
					
			}
			
			return ( isset($paymentUrl)? $paymentUrl : false );
			
		} catch (PagSeguro_Exception_ServiceException $e) {
			throw $e;
		} catch (Exception $e) {
			PagSeguro_Log_Log::error("Exception: ".$e->getMessage());
			throw $e;
		}
		
	}

}
	
?>