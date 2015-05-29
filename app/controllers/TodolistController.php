<?php

use Illuminate\Support\Facades\Input;

use Illuminate\Routing\Controller;

class TodolistController extends Controller {

	/*
	|--------------------------------------------------------------------------
	| Default Todo Controller
	|--------------------------------------------------------------------------
	|
	*/

	public function showTodo()
	{
		$archieve = Input::get('archieve', 0);
		
		$allTodos = Todo::where('status', '=', $archieve)->orderby('created_at', 'desc')->get()->all();

		return View::make('todo.index', array('allTodos' => $allTodos, 'archieve' => $archieve));
	}

	public function addTodo()
	{
		$task = Input::get('todo', 'Nothing');

		$todo = new Todo;
		$todo->todo = $task;
		$todo->status = 0;
		$todo->save();

		return Redirect::action('TodolistController@showTodo');
	}

	public function updateTodo()
	{
		$todoId = Input::get('todo_id', 0);
		
		$delete = Input::get('delete', 0);
		
		if($delete == 1) {
			return $this->deleteTodo($todoId);
		}

		if (0 != $todoId) {

			$todo = Todo::find($todoId);

			$todo->status = 1;

			$todo->save();
		}

		return Redirect::action('TodolistController@showTodo');
	}
	
	public function deleteTodo($todoId)
	{
		if (0 != $todoId) {
			$todo = Todo::find($todoId);
			$todo->delete();
		}

		return Redirect::action('TodolistController@showTodo');
	}

}
