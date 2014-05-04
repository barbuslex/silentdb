<?php

class AdminController extends BaseController {
	
	public $layout = 'layouts.admin';

	public function __construct() {
		$this->beforeFilter('admin');
	}

}