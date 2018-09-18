<?php
namespace App\Http\Controllers\Api\Returns;


class SendReturn extends \Controller {
	public function send($url, $data) {
		
		unset($data['fee_cp']);

		$ch = curl_init();
		curl_setopt($ch, CURLOPT_URL, $url);
		curl_setopt($ch, CURLOPT_POST, true);
		curl_setopt($ch, CURLOPT_POSTFIELDS, $data);
		curl_exec($ch);
		curl_close($ch);
			
	}
}