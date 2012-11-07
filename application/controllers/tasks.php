<?php
/**
 * Контроллер для отдачи информации по аяксу
 */
class Tasks_Controller extends Base_Controller {

	public $restful = true;
	
	/**
	 * Список тикетов
	 */
	public function get_all() {

		$yt_client = Auth::user()->youtrack;
		$result = array();
		
		$issues = $yt_client->get_issues('zfm',Config::get('youtrack.query'),0,1000);
		foreach($issues as $issue) {
			$result[] = $issue->get_attributes();
		}
		
		return json_encode($result);
	}
}
