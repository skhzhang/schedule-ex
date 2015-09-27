<?php

class Schedule {

	public $events;
	public $conflictExceptions;

	// use class constants for the addEvent function -- kind of like an enum!
	const MONDAY = 0;
	const TUESDAY = 1;
	const WEDNESDAY = 2;
	const THURSDAY = 3;
	const FRIDAY = 4;

	public function __construct() {
		for ($i = 0; $i < 5; $i++) {
			$this->events[$i] = array();
		}
		$this->conflictExceptions = array();
	}

	public function addEvent($weekday, SchedEvent $event) {

		// ensure the weekday given is an integer in valid range
		if (!is_int($weekday)) {
			throw new Exception('Expected integer value for weekday offset.');
		}
		if ($weekday < 0 || $weekday > 4) {
			throw new Exception('Invalid integer value for weekday offset.');
		}

		// check for event conflicts
		// conflict if:
		//		- start time comes before the end time of another
		//		- end time comes after the start time of another
		foreach ($this->events[$weekday] as $item) {

			try {

				// compare start time of $event with the start/end times of $item's currently in the array

				$startTimeCompStart = $event->getStartTime()->getTimeDifference($item->getStartTime());
				$startTimeCompEnd   = $event->getStartTime()->getTimeDifference($item->getEndTime());

				if ($startTimeCompStart <= 0 && $startTimeCompEnd > 0) { // start time of $event is between start/end times of $item
					throw new Exception('Event time conflict - ' . $event->getTitle() . ' (' . $event->getTimeslot12h(true) . ') conflicts with ' . $item->getTitle() . ' (' . $item->getTimeslot12h(true) . ').');
				}

				// compare end time of $event with the start/end times of $item's currently in the array

				$endTimeCompStart = $event->getEndTime()->getTimeDifference($item->getStartTime());
				$endTimeCompEnd   = $event->getEndTime()->getTimeDifference($item->getEndTime());

				if ($endTimeCompStart < 0 && $endTimeCompEnd >= 0) { // end time of $event is between start/end times of $item
					throw new Exception('Event time conflict - ' . $event->getTitle() . ' (' . $event->getTimeslot12h(true) . ') conflicts with ' . $item->getTitle() . ' (' . $item->getTimeslot12h(true) . ').');
				}

			} catch (Exception $e) {
				array_push($this->conflictExceptions, $e);
			}

		}

		array_push($this->events[$weekday], $event);
		usort($this->events[$weekday], array("SchedEvent", "getEventTimeDifference"));
		$this->events[$weekday] = array_values($this->events[$weekday]);

	}

	public function getConflictList() {
		if (count($this->conflictExceptions) == 1) { // output the single exception
			echo '<div class="exception">' . $this->conflictExceptions[0]->getMessage() . '</div>';
		} else if (count($this->conflictExceptions) > 1) { // output the exception list
			echo '<div class="exception">';
			echo '<ul>';
			foreach ($this->conflictExceptions as $e) {
				echo '<li>' . $e->getMessage() . '</li>';
			}
			echo '</ul>';
			echo '</div>';
		}
	}

	public function __toString() {

		$returnValue = "";

		// start with table opening markup and time column output
		$returnValue .= <<<EOT

			<div class="week">
					<div class="times"> <!-- Times -->
						<table>
							<thead>
								<tr>
									<th>---</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<th rowspan="2">8:00 to&nbsp;9:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 9 - 10 -->
									<th rowspan="2">9:00 to&nbsp;10:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 10 - 11 -->
									<th rowspan="2">10:00 to&nbsp;11:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 11 - 12 -->
									<th rowspan="2">11:00 to&nbsp;12:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 12 - 1 -->
									<th rowspan="2">12:00 to&nbsp;1:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 1 - 2 -->
									<th rowspan="2">1:00 to&nbsp;2:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 2 - 3 -->
									<th rowspan="2">2:00 to&nbsp;3:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 3 - 4 -->
									<th rowspan="2">3:00 to&nbsp;4:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 4 - 5 -->
									<th rowspan="2">4:00 to&nbsp;5:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 5 - 6 -->
									<th rowspan="2">5:00 to&nbsp;6:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 6 - 7 -->
									<th rowspan="2">6:00 to&nbsp;7:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 7 - 8 -->
									<th rowspan="2">7:00 to&nbsp;8:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 8 - 9 -->
									<th rowspan="2">8:00 to&nbsp;9:00</th>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 9 - 10 -->
									<th rowspan="2">9:00 to&nbsp;10:00</th>
								</tr>
								<tr>
								</tr>
							</tbody>
						</table>
					</div>

EOT;

		// create schedule for each day
		for ($currentDay = 0; $currentDay < 5; $currentDay++) {

			$currentEvent   = 0;
			$currentDayName = $this->events[$currentDay][0]->getWeekday();

			// open column table
			$returnValue .= <<<EOT

			<div class="day"> <!-- ' . $currentDayName . '-->

				<table>
					<thead>
						<tr class="day-name">
							<th>$currentDayName</th>
						</tr>
					</thead>
					<tbody>

EOT;

			// create table row/cell for each half hour of the day
			for ($hour = 8.0; $hour <= 21.50; $hour += 0.5) {

				// if there's an event at this time, create a custom table row/cell
				if (isset($this->events[$currentDay][$currentEvent]) && $this->events[$currentDay][$currentEvent]->getStartTime()->getHour() == $hour) {

					$eventLengthHours = $this->events[$currentDay][$currentEvent]->getEventLength('halfhours');

					$returnValue .= '<tr class="event">';
						$returnValue .= "<td class='" . $this->events[$currentDay][$currentEvent]->getCategory() .  "' rowspan=\"" . $eventLengthHours . "\">";
							$returnValue .= "<span class='event-time'>" . $this->events[$currentDay][$currentEvent]->getStartTime()->getTime12h(false) . " to <br class='event-time-space'>" . $this->events[$currentDay][$currentEvent]->getEndTime()->getTime12h(false) . "<br/></span>";
							$returnValue .= "<div class='event-info truncate' title='" . $this->events[$currentDay][$currentEvent]->getTitle() . " - " . $this->events[$currentDay][$currentEvent]->getLocation() ."'>";

								$returnValue .= $this->events[$currentDay][$currentEvent]->getTitle();
								$returnValue .= "<br/>";
								$returnValue .= $this->events[$currentDay][$currentEvent]->getLocation();

							$returnValue .= "</div>";
						$returnValue .= "</td>";
					$returnValue .= "</tr>";

					$currentEvent++;

					// add table rows without the table cells
					for ($i = 0; $i < $eventLengthHours * 0.5; $i += 0.5) {

						$returnValue .= "<tr></tr><!-- Hour " . ($hour+$i) . "-->" . PHP_EOL;

					}

					$hour += $eventLengthHours * 0.5;
					$hour -= 0.5;
				}
				// no event, create empty table row/cell
				else {

					$returnValue .= "<tr>";
					$returnValue .= "<td></td>";
					$returnValue .= "</tr><!-- Hour " . $hour . "-->" . PHP_EOL;

				}
			}

			// close column table
			$returnValue .= <<<EOT

								</tbody>
							</table>
						</div>

EOT;


		}

		// add table closing markup
		$returnValue .= '</div>';

		return $returnValue;

	}

}