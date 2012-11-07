<?php
/**
 * Контроллер для отдачи информации по аяксу
 */
class Tasks_Controller extends Base_Controller {

	public $restful = true;
	
	/**
	 * Список тикетов для проекта по заданному поисковому запросу
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
	 * Список пользователей ютрека для нашего проекта
	 */
	public function get_all_users() {
		
		$yt_client = Auth::user()->youtrack;
		
		$projects = $yt_client->get_accessible_projects();
		foreach($projects as $project) {
			
			if ($project->shortName == Config::get('youtrack.project')) {
				return json_encode($project->get_users());
			}
		}

		return json_encode(array());
	}
	
	/**
	 * Тестовый метод, в нем можно делать все что угодно
	 */
	public function get_test() {
		
		echo 123;
	}
}
