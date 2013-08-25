<?php

// require files
require_once '../src/Eluceo/iCal/Component.php';
require_once '../src/Eluceo/iCal/PropertyBag.php';
require_once '../src/Eluceo/iCal/Property.php';
require_once '../src/Eluceo/iCal/Component/Calendar.php';
require_once '../src/Eluceo/iCal/Component/Event.php';
require_once '../lunarget.php';

// set default timezone (PHP 5.4)
date_default_timezone_set('PRC');

// 1. Create new calendar
$vCalendar = new \Eluceo\iCal\Component\Calendar('MyFamily');

// 2. Convert to  lunar calender
$lunarsdas = new Lunar();
$nowYear = 2014;
$lunarmonth = 7;
$lunarday = 13;
for($i = 0;$i <= 2031 - $nowYear;$i++){
	// 3. Create an event
	$vEvent = new \Eluceo\iCal\Component\Event();
	$vEvent->setDtStart($lunarsdas->CommonWork($nowYear+$i,$lunarmonth,$lunarday,1));
	$vEvent->setDtEnd($lunarsdas->CommonWork($nowYear+$i,$lunarmonth,$lunarday+1,1));
	$vEvent->setNoTime(true);
	$vEvent->setSummary('Mother Birthday');
	$vEvent->setDescription("老妈生日的节奏");
	$vEvent->setLocation("phone or go home");
	// Adding Timezone (optional)
	$vEvent->setUseTimezone(true);
	// 4. Add event to calendar
	$vCalendar->addEvent($vEvent);
}

// 5. Set headers
header('Content-Type: text/calendar; charset=utf-8');
header('Content-Disposition: attachment; filename="calender.ics"');

// 6. Output
echo $vCalendar->render();
