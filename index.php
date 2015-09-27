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

		include "TimeHoursMins.php";    // TimeHoursMins class
		include "SchedEvent.php";       // SchedEvent class
		include "Schedule.php";         // Schedule class

		// get a new Schedule instance
		$schedule = new Schedule();

		// better to use a try-catch block for each individual method call than one for all of them,
		// so you can keep progressing past a conflicting event

		// MONDAY EVENTS
		$schedule->addEvent(Schedule::MONDAY, new SchedEvent('Monday', new TimeHoursMins(11, 30), new TimeHoursMins(12, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
		$schedule->addEvent(Schedule::MONDAY, new SchedEvent('Monday', new TimeHoursMins(13, 00), new TimeHoursMins(14, 30), 'CISC 340 Lecture', 'Ellis Hall 333', 'course2'));
		$schedule->addEvent(Schedule::MONDAY, new SchedEvent('Monday', new TimeHoursMins(16, 30), new TimeHoursMins(17, 30), 'CISC 365 Lecture', 'Walter Light Hall 205', 'course3'));
		$schedule->addEvent(Schedule::MONDAY, new SchedEvent('Monday', new TimeHoursMins(18, 30), new TimeHoursMins(21, 30), 'ECON 111 Lecture', 'BioSci AUD', 'course4'));

		// TUESDAY EVENTS
		$schedule->addEvent(Schedule::TUESDAY, new SchedEvent('Tuesday', new TimeHoursMins(13, 30), new TimeHoursMins(14, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
		$schedule->addEvent(Schedule::TUESDAY, new SchedEvent('Tuesday', new TimeHoursMins(15, 30), new TimeHoursMins(16, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));

		// WEDNESDAY EVENTS
		$schedule->addEvent(Schedule::WEDNESDAY, new SchedEvent('Wednesday', new TimeHoursMins(8, 30), new TimeHoursMins(9, 30), 'CISC 365 Lecture', 'Humphrey Hall AUD', 'course3'));
		$schedule->addEvent(Schedule::WEDNESDAY, new SchedEvent('Wednesday', new TimeHoursMins(11, 30), new TimeHoursMins(13, 00), 'CISC 340 Lecture', 'Ellis Hall 333', 'course2'));
		$schedule->addEvent(Schedule::WEDNESDAY, new SchedEvent('Wednesday', new TimeHoursMins(14, 30), new TimeHoursMins(16, 30), 'CISC 340 Lab', 'Goodwin Hall 248', 'course2'));

		// THURSDAY EVENTS
		$schedule->addEvent(Schedule::THURSDAY, new SchedEvent('Thursday', new TimeHoursMins(8, 30), new TimeHoursMins(10, 30), 'CISC 326 Tutorial', 'Miller Hall 201', 'course1'));
		$schedule->addEvent(Schedule::THURSDAY, new SchedEvent('Thursday', new TimeHoursMins(10, 30), new TimeHoursMins(11, 30), 'CISC 365 Lecture', 'Humphrey Hall AUD', 'course3'));
		$schedule->addEvent(Schedule::THURSDAY, new SchedEvent('Thursday', new TimeHoursMins(12, 30), new TimeHoursMins(13, 30), 'CISC 326 Lecture', 'BioSci 1102', 'course1'));
		$schedule->addEvent(Schedule::THURSDAY, new SchedEvent('Thursday', new TimeHoursMins(14, 30), new TimeHoursMins(15, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));
		$schedule->addEvent(Schedule::THURSDAY, new SchedEvent('Thursday', new TimeHoursMins(18, 30), new TimeHoursMins(20, 30), 'CISC 320 Tutorial', 'Ellis Hall 321', 'course5'));

		// FRIDAY EVENTS
		$schedule->addEvent(Schedule::FRIDAY, new SchedEvent('Friday', new TimeHoursMins(9, 30), new TimeHoursMins(11, 30), 'CISC 365 Lab', 'Jeffrey Hall 155', 'course3'));
		$schedule->addEvent(Schedule::FRIDAY, new SchedEvent('Friday', new TimeHoursMins(9, 30), new TimeHoursMins(11, 30), 'CISC 365 Lab', 'Jeffrey Hall 155', 'course3'));
		$schedule->addEvent(Schedule::FRIDAY, new SchedEvent('Friday', new TimeHoursMins(16, 30), new TimeHoursMins(17, 30), 'CISC 320 Lecture', 'Jeffrey Hall 128', 'course5'));

		// display any scheduling conflict exceptions generated
		echo $schedule->getConflictList();

		?>

		<div class="container">
			<div class="container-head">Simon's Fall 2015 Course Schedule</div>
			<div class="container-body">
				<?php echo $schedule; ?>
			</div> <!-- end container-body -->
		</div> <!-- end container -->
	</body>
</html>