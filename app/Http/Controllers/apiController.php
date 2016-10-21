<?php namespace App\Http\Controllers;

class apiController extends Controller {
	
	protected $row = [];
	
	public function __construct() {
		$storage = 'App\viable' . config('database.storage');
		$this->storage = new $storage;
	}

	public function index () {
		$response = [];
		if ( isset($_GET['code']) === true ) {
			if ( $this->exists($_GET['code']) === true ) {
				 $response = $this->row;
			} else {
				 $response = ['error' => 'invalid code'];
			}
		}
		return $this->output($response);
	}

	protected function exists ( $code = NULL ) {
		if ( is_null ($code) === false ) {
			$this->row = (array) $this->storage->one($code);
		}
		return empty ( $this->row ) ? false : true ;	
	}
	
	protected function output ( $response = []) {
		return response ( json_encode ( array_merge ( $response, ['storage' => config('database.storage')])), 200 )->header('Content-Type', 'text/javascript');
	}

}
