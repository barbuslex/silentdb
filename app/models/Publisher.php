<?php

class Publisher extends Eloquent {
	
	public function apps() {
		return $this->hasMany('Application');
	}

	public function applications() {
		return $this->hasMany('Application');
	}

}