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
			
			// Examples of using TimeHoursMins and SchedEvent 
			/*
			try {

				$event1 = new SchedEvent('Monday', new TimeHoursMins(8, 30), new TimeHoursMins(9, 30), 'Underwater Basket Weaving', 'Lake Ontario');

				echo $event1->getTimeslot24h() . "<br>";
				echo $event1->getTimeslot12h(true) . "<br>";
				echo $event1->getTitle() . "<br>";
				echo $event1->getLocation() . "<br>";
				echo "<br>";

				$event1->setStartTime(new TimeHoursMins(22, 15));
				$event1->setEndTime(new TimeHoursMins(23, 30));
				$event1->setTitle('Swimming');
				$event1->setLocation('ARC');

				echo $event1->getTimeslot24h() . "<br>";
				echo $event1->getTimeslot12h(false) . "<br>";
				echo $event1->getTitle() . "<br>";
				echo $event1->getLocation() . "<br>";
			
			}
			catch (Exception $e) {
    			echo '<span class="exception">Caught exception: ',  $e->getMessage(), "<br></span>";
			}
			*/

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
					<div class="day"> <!-- Monday -->
						<table>
							<thead>
								<tr class="day-name">
									<th>Monday</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 10 - 11 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 11 - 12 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course1" rowspan="2">
										<span class="event-time">11:30 to <br class="event-time-space">12:30<br/></span>
										<div class="event-info truncate" title="CISC 326 Lecture - Biosci 1102">
											CISC 326 Lecture
											<br>
											Biosci 1102
										</div>
									</td>
								</tr>
								<tr> <!-- 12 - 1 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr class="event"> <!-- 1 - 2 -->
									<td class="course2" rowspan="3">
										<span class="event-time">1:00 to <br class="event-time-space">2:30</span>
										<div class="event-info">
											CISC 340&nbsp;Lecture
											<br>
											Ellis Hall 333
										</div>
									</td>
								</tr>
								<tr>
								</tr>
								<tr> <!-- 2 - 3 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 3 - 4 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 4 - 5 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course3" rowspan="2">
										<span class="event-time">4:30 to <br class="event-time-space">5:30</span>
										<div class="event-info truncate" title="CISC 365 Lecture - Walter Light Hall 205">
											CISC 365 Lecture
											<br>
											Walter&nbsp;Light&nbsp;Hall 205
										</div>
									</td>
								</tr>
								<tr> <!-- 5 - 6 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 6 - 7 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course4" rowspan="6">
										<span class="event-time">6:30 to <br class="event-time-space">9:30</span>
										<div class="event-info">
											ECON 111 Lecture
											<br>
											Biosci Auditorium
										</div>
									</td>
								</tr>
								<tr> <!-- 7 - 8 -->
								</tr>
								<tr>
								</tr>
								<tr> <!-- 8 - 9 -->
								</tr>
								<tr>
								</tr>
								<tr> <!-- 9 - 10 -->
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="day"> <!-- Tuesday -->
						<table>
							<thead>
								<tr class="day-name">
									<th>Tuesday</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 10 - 11 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 11 - 12 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 12 - 1 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 1 - 2 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course1" rowspan="2">
										<span class="event-time">1:30 to <br class="event-time-space">2:30</span>
										<div class="event-info">
											CISC&nbsp;326&nbsp;Lecture
											<br>
											Biosci 1102
										</div>
									</td>
								</tr>
								<tr> <!-- 2 - 3 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 3 - 4 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course5" rowspan="2">
										<span class="event-time">3:30 to <br class="event-time-space">4:30</span>
										<div class="event-info">
											CISC 320 Lecture
											<br>
											Jeffrey Hall 128
										</div>
									</td>
								</tr>
								<tr> <!-- 4 - 5 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 5 - 6 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 6 - 7 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 7 - 8 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="day"> <!-- Wednesday -->
						<table>
							<thead>
								<tr class="day-name">
									<th>Wednesday</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course3 truncate" rowspan="2">
										<span class="event-time">8:30 to <br class="event-time-space">9:30</span>
										<div class="event-info truncate" title="CISC 365 Lecture - Humphrey Hall Auditorium">
											CISC 365 Lecture
											<br>
											Humphrey Hall Auditorium
										</div>
									</td>
								</tr>
								<tr> <!-- 9 - 10 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 10 - 11 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 11 - 12 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course2" rowspan="3">
										<span class="event-time">11:30 to <br class="event-time-space">1:00</span>
										<div class="event-info">
											CISC 340&nbsp;Lecture
											<br>
											Ellis Hall 333
										</div>
									</td>
								</tr>
								<tr> <!-- 12 - 1 -->
								</tr>
								<tr>
								</tr>
								<tr> <!-- 1 - 2 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 2 - 3 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course2" rowspan="4">
										<span class="event-time">2:30 to <br class="event-time-space">4:30</span>
										<div class="event-info">
											CISC 340 Lab
											<br>
											Goodwin Hall 248
										</div>
									</td>
								</tr>
								<tr> <!-- 3 - 4 -->
								</tr>
								<tr>
								</tr>
								<tr> <!-- 4 - 5 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 5 - 6 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 6 - 7 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 7 - 8 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="day"> <!-- Thursday -->
						<table>
							<thead>
								<tr class="day-name">
									<th>Thursday</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 10 - 11 -->
									<td></td>
								</tr>
								<tr class="event" >
									<td class="course3" rowspan="2">
										<div class="event-time">10:30 to <br class="event-time-space">11:30</div>
										<div class="event-info truncate" title="CISC 365 Lecture - Humphrey Hall Auditorium">
											CISC&nbsp;365&nbsp;Lecture
											<br>
											Humphrey Hall Auditorium
										</div>
									</td>
								</tr>
								<tr> <!-- 11 - 12 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 12 - 1 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course1" rowspan="2" style=";">
										<span class="event-time">12:30 to <br class="event-time-space">1:30</span>
										<div class="event-info truncate" title="CISC 326 Lecture - Biosci 1102">
											CISC 326 Lecture
											<br>
											Biosci 1102
										</div>
									</td>
								</tr>
								<tr> <!-- 1 - 2 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 2 - 3 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course5" rowspan="2">
										<span class="event-time">2:30 to <br class="event-time-space">3:30</span>
										<div class="event-info truncate" title="CISC 320 Lecture - Jeffrey Hall 128">
											CISC 320 Lecture
											<br>
											Jeffrey Hall&nbsp;128
										</div>
									</td>
								</tr>
								<tr> <!-- 3 - 4 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 4 - 5 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 5 - 6 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 6 - 7 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course5" rowspan="4">
										<span class="event-time">6:30 to <br class="event-time-space">8:30</span>
										<div class="event-info">
											CISC 320 Tutorial
											<br>
											Ellis Hall 321
										</div>
									</td>
								</tr>
								<tr> <!-- 7 - 8 -->
								</tr>
								<tr>
								</tr>
								<tr> <!-- 8 - 9 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
					<div class="day"> <!-- Friday -->
						<table>
							<thead>
								<tr class="day-name">
									<th>Friday</th>
								</tr>
							</thead>
							<tbody>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course3" rowspan="2">
										<span class="event-time">9:30 to <br class="event-time-space">10:30</span>
										<div class="event-info">
											CISC&nbsp;365&nbsp;Lab
											<br>
											Jeffrey&nbsp;Hall 155
										</div>
									</td>
								</tr>
								<tr> <!-- 10 - 11 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 11 - 12 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 12 - 1 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 1 - 2 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 2 - 3 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 3 - 4 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 4 - 5 -->
									<td></td>
								</tr>
								<tr class="event">
									<td class="course5" rowspan="2">
										<span class="event-time">4:30 to <br class="event-time-space">5:30</span>
										<div class="event-info">
											CISC&nbsp;320&nbsp;Lecture
											<br>
											Jeffrey&nbsp;Hall&nbsp;128
										</div>
									</td>
								</tr>
								<tr> <!-- 5 - 6 -->
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 6 - 7 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 7 - 8 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 8 - 9 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
								<tr> <!-- 9 - 10 -->
									<td></td>
								</tr>
								<tr>
									<td></td>
								</tr>
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
	</body>
</html>