<?php

/**
 * Драйвер аутентификации через API ютрека
 */
class YouTrackAuth extends Laravel\Auth\Drivers\Driver {
	
	/**
	 * Получение пользователя по его ID
	 */
	public function retrieve($id) {
		
		$obj_serialized = Session::get('yt_object_'.$id);
		if ($obj_serialized) {
			
			$user = unserialize($obj_serialized);
			return $user;
		}
	}
	
	/**
	 * Попытка авторизации
	 */
	public function attempt($arguments = array()) {

		try {
			$youtrack = new \YouTrack\Connection(
					Config::get('youtrack.url'), 
					$arguments['username'], 
					$arguments['password']
			);
		}
		catch(Exception $e) {
			
			$youtrack = null;
		}

		//если не удалось авторизоваться
		if (!$youtrack) {
			return false;
		}
		
		//сериализуем наш объект в сессию, и в дальнейшем рабоаем с ним
		$user_key = md5($arguments['username']);
		$user = (object)array(
			
			'youtrack' => $youtrack,
			'username' => $arguments['username'],
			'id' => $user_key,
		);
		Session::put('yt_object_'.$user_key, serialize($user));
		
		return $this->login($user_key, true);
	}
}
