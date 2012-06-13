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
class PagSeguro_Service_CartService {
	
	const serviceName = 'cartService';
	
	private static function buildCheckoutRequestUrl(PagSeguro_Service_ConnectionData $connectionData, PagSeguro_Domain_CartRequest $cartRequest) {
		return $connectionData->getResource('checkoutUrl').'?'.$cartRequest->getUrlQuery();
	}	
	
	// createCheckoutRequest is the actual implementation of the Register method
	// This separation serves as test hook to validate the Uri
	// against the code returned by the service
	public static function createCheckoutRequest(PagSeguro_Domain_Credentials $credentials, PagSeguro_Domain_CartRequest $cartRequest) {
		
				
		PagSeguro_Log_Log::info("PagSeguro_Domain_CartService.Register(".$cartRequest->toString().") - begin");
		
		$connectionData = new PagSeguro_Service_ConnectionData($credentials, self::serviceName);
		
		try {
					
			
			$paymentUrl = self::buildCheckoutRequestUrl($connectionData,$cartRequest);
			PagSeguro_Log_Log::info("PagSeguro_Service_CartService.Register(".$cartRequest->toString().") - end {1}");				

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