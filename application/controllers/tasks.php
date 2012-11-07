<?php
/**
 * Контроллер для отдачи информации по аяксу
 */
class Tasks_Controller extends Base_Controller {

	public $restful = true;
	
	/**
	 * Список тикетов
	 */
	public function get_all_issues() {

		$yt_client = Auth::user()->youtrack;
		$result = array();
		
		$issues = $yt_client->get_issues('zfm',Config::get('youtrack.query'),0,1000);
		foreach($issues as $issue) {
			$result[] = $issue->get_attributes();
		}
		
		return json_encode($result);
	}
	
	/**
	 * Список пользователей ютрека
	 */
	public function get_all_users() {
		
		$users = require_once(path('app').'config/youtrack_users.php');
		
		return json_encode($users);
	}
}
