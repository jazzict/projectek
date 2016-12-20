<?php

class TodoController extends Controller
{
	public function index()
	{
		$this->View->render('todo/index', array(
            'activities' => TodoModel::getAllActivities()
        ));
	}
}










