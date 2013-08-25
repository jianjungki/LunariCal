LunariCal
=========

This is a Lunar tools writen by php, if you like it, please tell what i can do better.

###Usage:
-----------------------------------Lunar iCal(can add lunar event on google by ical)---------------------------------------------------------------
``` php
$lunarsdas = new Lunar();
$nowYear = 2014;
$lunarmonth = 7;
$lunarday = 13;
for($i = 0;$i <= 2031 - $nowYear;$i++){//now just can convert to 2031,so if you want more,please tell me
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
``` 


