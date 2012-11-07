<?php

/**
 * Контроллер для базовых вещей
 */
class Home_Controller extends Base_Controller {

	/**
	 * Главная страница сайта
	 */
	public function action_index() {
		
		//тестово грузим проекты, к которым он имеет доступ
		$yt_client = Auth::user()->youtrack;
		$projects  = $yt_client->get_accessible_projects();
		
		return View::make('home.index')->with(array(
			
			'username' => Auth::user()->username,
			'projects' => $projects
		));
	}
	
	/**
	 * Показ формы авторизации
	 */
	public function action_login() {
		
		return View::make('home.login');
	}
}
