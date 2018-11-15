<?php

class ScheduleModel
{
	public $table = 'Schedule';
	public $schedules;

	private $data = 
	'{
		"Schedule" : [{
			"sched_id" : 1,
			"employee_id" : 1,
			"date" : "2018-01-11",
			"sched_type" : "Workday"
		}, {
			"sched_id" : 2,
			"employee_id" : 2,
			"date" : "2018-02-12",
			"sched_type" : "Sick Day"
		}, {
			"sched_id" : 3,
			"employee_id" : 3,
			"date" : "2018-03-13",
			"sched_type" : "Holiday"
		}]
	}';

	function __construct()
	{
		$this->schedules = json_decode($this->data)->Schedule;
	}
}

?>