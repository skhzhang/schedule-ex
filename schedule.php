<!DOCTYPE html>
<html>
	<head>
		<meta charset="UTF-8">
		<title>Simon's Fall 2015 Course Schedule</title>
  		<meta name="author" content="Simon Zhang">
  		<meta name="description" content="Simon's Fall 2015 Course Schedule">
		<meta name="viewport" content="width=device-width, initial-scale=1">

  		<link rel="stylesheet" href="custom.css">
	</head>
	<body>

		<?php

			include "TimeHoursMins.php"; // TimeHoursMins class
			include "SchedEvent.php"; // SchedEvent class
			
			// takes an array of SchedEvent's, and adds a SchedEvent to it barring no conflicts with SchedEvent's in the array
			function addEvent(array $events, SchedEvent $event){

				try {

					// check for event conflicts
					// conflict if:
					//		- start time comes before the end time of another
					//		- end time comes after the start time of another
					foreach($events as $item) {

						// compare start time of $event with the start/end times of $item's currently in the array
						$startTimeCompStart = $event->getStartTime()->getTimeDifference($item->getStartTime());
						$startTimeCompEnd = $event->getStartTime()->getTimeDifference($item->getEndTime());

						// compare end time of $event with the start/end times of $item's currently in the array
						$endTimeCompStart = $event->getEndTime()->getTimeDifference($item->getStartTime());
						$endTimeCompEnd = $event->getEndTime()->getTimeDifference($item->getEndTime());

						if ($startTimeCompStart <= 0 && $startTimeCompEnd > 0) { // start time of $event is between start/end times of $item
							throw new Exception('Event time conflict - ' . $event->getTitle() . ' (' . $event->getTimeslot12h(true) . ') conflicts with ' . $item->getTitle() . ' (' . $item->getTimeslot12h(true) . ').');
						}
						else if ($endTimeCompStart < 0 && $endTimeCompEnd >= 0) { // end time of $event is between start/end times of $item
							throw new Exception('Event time conflict - ' . $event->getTitle() . ' (' . $event->getTimeslot12h(true) . ') conflicts with ' . $item->getTitle() . ' (' . $item->getTimeslot12h(true) . ').');
						}


					}

					array_push($events, $event);
					usort($events, array("SchedEvent", "getEventTimeDifference"));

				}
				catch (Exception $e){
    				echo '<span class="exception">Caught exception: ',  $e->getMessage(), "<br></span>";
				}

				return $events;
			} 
			
			try {

				$events = array();
				$events = array_values($events);

				// create array in $events; one for each day of the week
				for ($i = 0; $i < 5; $i++) {
					$events[$i] = array();
				}

				// add events to the array
				$events[0] = addEvent($events[0], new SchedEvent('Monday', new TimeHoursMins(11, 30), new TimeHoursMins(12, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
				$events[0] = addEvent($events[0], new SchedEvent('Monday', new TimeHoursMins(13, 00), new TimeHoursMins(14, 30), 'CISC 340 Lecture', 'Ellis Hall 333', 'course2'));
				$events[0] = addEvent($events[0], new SchedEvent('Monday', new TimeHoursMins(16, 30), new TimeHoursMins(17, 30), 'CISC 365 Lecture', 'Walter Light Hall 205', 'course3'));
				$events[0] = addEvent($events[0], new SchedEvent('Monday', new TimeHoursMins(18, 30), new TimeHoursMins(21, 30), 'ECON 111 Lecture', 'BioSci AUD', 'course4'));

				$events[1] = addEvent($events[1], new SchedEvent('Tuesday', new TimeHoursMins(13, 30), new TimeHoursMins(14, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
				$events[1] = addEvent($events[1], new SchedEvent('Tuesday', new TimeHoursMins(15, 30), new TimeHoursMins(16, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));

				$events[2] = addEvent($events[2], new SchedEvent('Wednesday', new TimeHoursMins(8, 30), new TimeHoursMins(9, 30), 'CISC 365 Lecture', 'Humphrey Hall AUD', 'course3'));
				$events[2] = addEvent($events[2], new SchedEvent('Wednesday', new TimeHoursMins(11, 30), new TimeHoursMins(13, 00), 'CISC 340 Lecture', 'Ellis Hall 333', 'course2'));
				$events[2] = addEvent($events[2], new SchedEvent('Wednesday', new TimeHoursMins(14, 30), new TimeHoursMins(16, 30), 'CISC 340 Lab', 'Goodwin Hall 248', 'course2'));

				$events[3] = addEvent($events[3], new SchedEvent('Thursday', new TimeHoursMins(8, 30), new TimeHoursMins(10, 30), 'CISC 326 Tutorial', 'Miller Hall 201', 'course1'));
				$events[3] = addEvent($events[3], new SchedEvent('Thursday', new TimeHoursMins(10, 30), new TimeHoursMins(11, 30), 'CISC 365 Lecture', 'Humphrey Hall AUD', 'course3'));
				$events[3] = addEvent($events[3], new SchedEvent('Thursday', new TimeHoursMins(12, 30), new TimeHoursMins(13, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
				$events[3] = addEvent($events[3], new SchedEvent('Thursday', new TimeHoursMins(14, 30), new TimeHoursMins(15, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));
				$events[3] = addEvent($events[3], new SchedEvent('Thursday', new TimeHoursMins(18, 30), new TimeHoursMins(20, 30), 'CISC 320 Tutorial', 'Ellis Hall 321', 'course5'));

				$events[4] = addEvent($events[4], new SchedEvent('Friday', new TimeHoursMins(9, 30), new TimeHoursMins(11, 30), 'CISC 365 Lab', 'Jeffrey Hall 155', 'course3'));
				$events[4] = addEvent($events[4], new SchedEvent('Friday', new TimeHoursMins(16, 30), new TimeHoursMins(17, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));

				/*
				foreach ($events as $item) {
				    echo $item->getTitle() . ": " . $item->getTimeslot12h(true) . " at " . $item->getLocation() ."<br>";
				}
				*/
			
			}
			catch (Exception $e) {
    			echo '<span class="exception">Caught exception: ',  $e->getMessage(), "<br></span>";
			}
			

		?>

		<div class="container">
			<div class="container-head">Simon's Fall 2015 Course Schedule</div>
			<div class="container-body">
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

					<?php

					// create schedule for each day
					for ($currentDay = 0; $currentDay < 5; $currentDay++) {

						$events[$currentDay] = array_values($events[$currentDay]);

						$currentEvent = 0;
						$currentDayName = $events[$currentDay][0]->getWeekday();

				 		echo '<div class="day"> <!-- ' . $currentDayName . '-->' ;	?>

							<table>
								<thead>
									<tr class="day-name">
										<?php 	echo ' <th> ' . $currentDayName . ' </th>' ; 	?>
									</tr>
								</thead>
								<tbody>

									<?php 

									// create table row/cell for each half hour of the day
									for ($hour = 8.0; $hour <= 21.50; $hour += 0.5) {

										// if there's an event at this time, create a custom table row/cell
										if (isset($events[$currentDay][$currentEvent]) && $events[$currentDay][$currentEvent]->getStartTime()->getHour() == $hour) {

											$eventLengthHours = $events[$currentDay][$currentEvent]->getEventLength('halfhours');

											echo "<tr class='event'>";
												echo "<td class='" . $events[$currentDay][$currentEvent]->getCategory() .  "' rowspan=\"" . $eventLengthHours . "\">";
													echo "<span class='event-time'>" . $events[$currentDay][$currentEvent]->getStartTime()->getTime12h(false) . " to <br class='event-time-space'>" . $events[$currentDay][$currentEvent]->getEndTime()->getTime12h(false) . "<br/></span>";
													echo "<div class='event-info truncate' title='" . $events[$currentDay][$currentEvent]->getTitle() . " - " . $events[$currentDay][$currentEvent]->getLocation() ."'>";
														
														echo $events[$currentDay][$currentEvent]->getTitle();
														echo "<br/>";
														echo $events[$currentDay][$currentEvent]->getLocation();

													echo "</div>";
												echo "</td>";
											echo "</tr>";

											$currentEvent++;

											// add table rows without the table cells
											for ($i = 0; $i < $eventLengthHours * 0.5; $i += 0.5) {
												
												echo "<tr></tr><!-- Hour " . ($hour+$i) . "-->\n";

											}

											$hour += $eventLengthHours * 0.5;
											$hour -= 0.5;
										}
										// no event, create empty table row/cell
										else {
											
											echo "<tr>";
											echo "<td></td>";
											echo "</tr><!-- Hour " . $hour . "-->\n";

										}
									}

									?>
									
								</tbody>
							</table>
						</div>
					<?php 	}	?>
					</div>
			</div> <!-- end container-body -->
		</div> <!-- end container -->
	</body>
</html>