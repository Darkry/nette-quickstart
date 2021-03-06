<?php

/**
 * Presenter pro úvodní stránku. Obsahuje seznam úkolů, které jsou uživateli přiřazeny.
 */
class HomepagePresenter extends SecuredPresenter
{

	public function createComponentIncompleteTasks()
	{
		$taskList = new TaskList($this->model->getTasks()
			->where(array('done' => false))->order('created ASC'));
		$taskList->setModel($this->model);
		$taskList->setDisplayTaskList(TRUE);
		return $taskList;
	}


	public function createComponentUserTasks()
	{
		$taskList = new TaskList($this->model->getTasks()->where(array(
			'done' => false, 'user_id' => $this->getUser()->getId()
		)));
		$taskList->setModel($this->model);
		$taskList->setDisplayTaskList(TRUE);
		$taskList->setDisplayUser(FALSE);
		return $taskList;
	}

}
