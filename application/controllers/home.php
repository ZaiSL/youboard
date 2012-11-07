<?php

/**
 * Контроллер для базовых вещей
 */
class Home_Controller extends Base_Controller {

	/**
	 * Главная страница сайта
	 */
	public function action_index() {
		
		return View::make('home.index');
	}
	
	/**
	 * Показ формы авторизации
	 */
	public function action_login() {
		
		return View::make('home.login');
	}
}
