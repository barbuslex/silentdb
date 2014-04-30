<?php

class Group extends Eloquent {

	/**
	 * Group -> Users
	 */
	public function users() {
		return $this->hasMany('User');
	}
	
}