<?php

/**
 * Драйвер аутентификации через API ютрека
 */
class YouTrackAuth extends Laravel\Auth\Drivers\Driver {
	
	/**
	 * Получение пользователя по его ID
	 */
	public function retrieve($id) {
		
		if ($id) {

			$user = array(

				'id'       => 1,
				'username' => 'admin',
				'password' => 'admin',
			);

			return (object)$user;
		}
	}
	
	/**
	 * Попытка авторизации
	 */
	public function attempt($arguments = array()) {

		//$youtrack = new \YouTrack\Connection('http://yt.maksimal.net', $arguments['username'], $arguments['password']);
		//var_dump($youtrack);die;

		$user = array(

			'id'       => 1,
			'username' => 'admin',
			'password' => 'admin',
		);
		
		if ($user['username']==$arguments['username'] && $user['password']==$arguments['password']) {
			
			return $this->login(1, true);
		}
		
		return false;
	}
}
