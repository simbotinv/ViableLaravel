<?php namespace App;

class viablecsv implements Viable { 
	public function one ( $code ) {
		/** read csv function here ... */
		$csv = [
			  'A1' => ['code' => 'A1', 'firstname' => 'Vasile', 'shipping_date' => "2016-10-23 14:44:43"]
			, 'V1' => ['code' => 'V1','fistname' => 'Ionut', 'shipping_date' => "2016-10-23 14:44:43"]
		];
		
		if ( isset($csv[$code]) === true ) {
			return $csv[$code];
		}
		return [];
	}
}