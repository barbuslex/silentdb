<?php

class Application extends Eloquent {
	
	public function publisher() {
		return $this->belongsTo('Publisher');
	}

	public function versions() {
		return $this->hasMany('Version');
	}

}