<?php

class Todo extends Eloquent {

	protected $table = 'todos';

	/**
	 * The attributes excluded from the model's JSON form.
	 *
	 * @var array
	 */
	protected $hidden = array();

}
