<?php

class TimeHoursMins {

	private $hours;
	private $minutes;

	public function __construct($hours, $minutes) {

		$this->setHours($hours);
		$this->setMinutes($minutes);
	}

	public function __toString() {
		return $this->getTime24h();
	}

	public function __clone() {
		$this->setHours($this->hours);
		$this->setMinutes($this->minutes);
	}

	// GET
	public function getTime24h() { // return in 24h clock
		return $this->hours . ':' . sprintf("%02d", $this->minutes);
	}

	public function getTime12h($addPeriod) { // return in 12h clock
		$period = '';

		if ($addPeriod) {
			$period = ' AM';
			if ($this->hours > 11) {
				$period = ' PM';
			}
		}

		return ($this->hours-1)%12+1 . ':' . sprintf("%02d", $this->minutes) . $period;
	}

	// SET

	// $newHours must be an int between 0-23
	public function setHours($newHours) {

		if (!is_int($newHours)) {
			throw new Exception('Hours must be an integer.');
		}
		else if ($newHours < 0 || $newHours > 23) {
			throw new Exception('Hours must be between 0-23.');
		}

		$this->hours = $newHours;
	}

	// $newMinutes must be an int between 0-59
	public function setMinutes($newMinutes) {

		if (!is_int($newMinutes)) {
			throw new Exception('Minutes must be an integer.');
		}
		else if ($newMinutes < 0 || $newMinutes > 59) {
			throw new Exception('Minutes must be between 0-59.');
		}

		$this->minutes = $newMinutes;
	}

}

?>
