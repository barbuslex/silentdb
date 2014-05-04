<?php

class Deployment extends Eloquent {

	public function version() {
		return $this->belongsTo('Version');
	}

	public function user() {
		return $this->belongsTo('User');
	}

}