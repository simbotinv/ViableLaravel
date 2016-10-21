<?php namespace App;

class viablemysql implements Viable { 
	public function one ( $code ) {
		return \DB::table('trackers')->where('code',  $code )->first();
	}
}