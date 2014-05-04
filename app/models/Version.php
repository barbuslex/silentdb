<?php

class Version extends Eloquent {

	public function deployments() {
		return $this->hasMany('Deployment');
	}

	public function application() {
		return $this->belongsTo('Application');
	}

	public function app() {
		return $this->belongsTo('Application');
	}

}