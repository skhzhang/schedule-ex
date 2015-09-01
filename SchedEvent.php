<?php

class SchedEvent {

	private $weekday;
	private $starttime;
	private $endtime;
	private $title;
	private $location;

	public function __construct($weekday, TimeHoursMins $starttime, TimeHoursMins $endtime, $title, $location) {
		$this->setWeekday($weekday);
		$this->setStartTime($starttime);
		$this->setEndTime($endtime);
		$this->setTitle($title);
		$this->setLocation($location);
	}

	// GET
	public function getTimeslot24h() { // return in 24h clock
		return $this->starttime . ' to ' . $this->endtime;
	}

	// return in 12h clock
	// if true, $addPeriod adds the corresponding 'AM' or 'PM' to the end of each time
	public function getTimeslot12h($addPeriod) {
		return $this->starttime->getTime12h($addPeriod) . ' to ' . $this->endtime->getTime12h($addPeriod);
	}

	public function getWeekday() {
		return $this->weekday;
	}

	public function getStartTime() {
		return $this->starttime;
	}

	public function getEndTime() {
		return $this->endtime;
	}

	public function getTitle() {
		return $this->title;
	}

	public function getLocation() {
		return $this->location;
	}

	// SET
	public function setWeekday($newDay) {
		$this->weekday = (string)$newDay;
	}

	public function setStartTime(TimeHoursMins $newStartTime) {
		$this->starttime = clone $newStartTime;
	}

	public function setEndTime(TimeHoursMins $newEndTime) {
		$this->endtime = clone $newEndTime;
	}

	public function setTitle($newTitle) {
		$this->title = (string)$newTitle;
	}

	public function setLocation($newLocation) {
		$this->location = (string)$newLocation;
	}

	// Compares the start times of two 'SchedEvent's and returns the minutes between the two.
	// If the start times are the same, 
	// compare the end time difference and return the minutes between the two.
	// If the end times are the same,
	// compare the alphanumeric values of the event titles and return the difference.

	// For use with usort(), to sort arrays of SchedEvent
	public static function getEventTimeDifference(SchedEvent $a, SchedEvent $b) {

		$difference = $b->starttime->getTimeDifference($a->starttime); // start time difference 

		if ($difference == 0) {
			$endDifference = $b->endtime->getTimeDifference($a->endtime); // end time difference 
			$difference += $endDifference;
		}
		if ($difference == 0) {
			$ordDifference = strnatcmp($a->title, $b->title); // alphanumeric difference
			$difference += $ordDifference;
		}

		return $difference;
	}

}

?>
