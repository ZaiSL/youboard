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
		
		$top_tasks = array();
		$common_tasks = array();
		
		$issues = $yt_client->get_issues('zfm',Config::get('youtrack.query'),0,1000);
		foreach($issues as $issue) {
			
			$attributes = $issue->get_attributes();
			$links = $issue->get_issue_links();
			$issue_links = isset($links[0]) ? $links[0] : array();
			
			//если нет связей, значит задача висящая просто вверху
			if (!isset($issue_links->source)) {
				
				$top_tasks[] = $attributes;
			}
			else {
				
				if (!isset($common_tasks[$issue_links->source])) {
					
					$common_tasks[$issue_links->source]['tasks'] = array();
					$common_tasks[$issue_links->source]['title'] = '';
				}
				$common_tasks[$issue_links->source]['tasks'][] = $attributes;
			}
		}
		$result = array('top' => array('title' => 'TOP', 'tasks' => $top_tasks)) + $common_tasks;

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
