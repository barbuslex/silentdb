<?php

class AdminPageController extends AdminController {
	
	public function getIndex() {
		$this->layout->content = View::make('admin.index');
	}

}