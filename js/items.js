function getWeekdayName(day)
{
	var weekdays = new Array(7);
	weekdays[0] = "Sunday";
	weekdays[1] = "Monday";
	weekdays[2] = "Tuesday";
	weekdays[3] = "Wednesday";
	weekdays[4] = "Thursday";
	weekdays[5] = "Friday";
	weekdays[6] = "Saturday";
	return weekdays[day];
}

function getMonthName(month)
{
	var monthNames = new Array(12);
	monthNames[0] = "January";
	monthNames[1] = "February";
	monthNames[2] = "March";
	monthNames[3] = "April";
	monthNames[4] = "May";
	monthNames[5] = "June";
	monthNames[6] = "July";
	monthNames[7] = "August";
	monthNames[8] = "September";
	monthNames[9] = "October";
	monthNames[10] = "November";
	monthNames[11] = "December";
	return monthNames[month];
}

function getTimeRemainingString( days, hours, minutes )
{
var dayString   =  ( days == 1 ? "day " : "days " );
var hourString   =  ( hours == 1 ? "hour " : "hours " );
var minuteString =  ( minutes  == 1 ? "minute" : "minutes" );
var daysRemaining = "";
var hoursRemaining = "";
var minutesRemaining = "";
var andSeperator = "";
if (days >= 1) { daysRemaining = days + " " + dayString; }
if (hours >= 1) { hoursRemaining = hours + " " + hourString; }
if (minutes >= 1) { minutesRemaining = minutes + " " + minuteString; }
if ((hours >= 1)&&(minutes >= 1)) { andSeperator = "and "; }
return daysRemaining + hoursRemaining + andSeperator + minutesRemaining;
}

function updateClock(itemAvail)
{
var currentTime = new Date();
var currentHours = currentTime.getHours();
var currentMinutes = currentTime.getMinutes();
var currentSeconds = currentTime.getSeconds();
var currentDay = currentTime.getDay();
var currentCountdown = currentHours * 3600 + currentMinutes * 60 + currentSeconds;
var remainingTime;

switch(currentDay)
{
	case 0:
			currentTime.setDate(currentTime.getDate() + 2);
			remainingTime = 52200 + (86400 - currentCountdown);
		break;
	case 1:
		if(currentCountdown < 52200)
		{
			currentTime.setDate(currentTime.getDate() + 1);
			remainingTime = 52200 - currentCountdown;
		}
		else
		{
			currentTime.setDate(currentTime.getDate() + 2);
			remainingTime = 52200 + (86400 - currentCountdown);
		}
		break;
	case 2:
		if(currentCountdown < 52200)
		{
			currentTime.setDate(currentTime.getDate() + 1);
			remainingTime = 52200 - currentCountdown;
		}
		else
		{
			currentTime.setDate(currentTime.getDate() + 2);
			remainingTime = 52200 + (86400 - currentCountdown);
		}
		break;
	case 3:
		if(currentCountdown < 52200)
		{
			currentTime.setDate(currentTime.getDate() + 1);
			remainingTime = 52200 - currentCountdown;
		}
		else
		{
			currentTime.setDate(currentTime.getDate() + 2);
			remainingTime = 52200 + (86400 - currentCountdown);
		}
		break;
	case 4:
		if(currentCountdown < 52200)
		{
			currentTime.setDate(currentTime.getDate() + 1);
			remainingTime = 52200 - currentCountdown;
		}
		else
		{
			currentTime.setDate(currentTime.getDate() + 4);
			remainingTime = 52200 + (86400 - currentCountdown);
		}
		break;
	case 5:
		if(currentCountdown < 52200)
		{
			currentTime.setDate(currentTime.getDate() + 3);
			remainingTime = 52200 - currentCountdown;
		}
		else
		{
			currentTime.setDate(currentTime.getDate() + 4);
			remainingTime = 52200 + 86400 + 86400 + (86400 - currentCountdown);
		}
		break;
	case 6:
			currentTime.setDate(currentTime.getDate() + 3);
			remainingTime = 52200 + 86400 + (86400 - currentCountdown);
		break;
	default:
}

var FT_secondsPerDay = 24 * 60 * 60;
var FT_daysLong = remainingTime / FT_secondsPerDay;
var FT_days = Math.floor(FT_daysLong);
var FT_hoursLong = (FT_daysLong - FT_days) * 24;
var FT_hours = Math.floor(FT_hoursLong);
var FT_minsLong = (FT_hoursLong - FT_hours) * 60;
var FT_mins = Math.floor(FT_minsLong);
var ftCountdown = getTimeRemainingString( FT_days, FT_hours, FT_mins );
var dateCountdown = getWeekdayName(currentTime.getDay()) + ", " + getMonthName(currentTime.getMonth()) + " " + currentTime.getDate();
var currentTimeString = '<p>Order this product in the next <span class="countdown">' + ftCountdown + '</span> and get it delivered by <span class="countdown">' + dateCountdown + '</span>. Choose \'<strong>Next Day Delivery</strong>\' at the checkout. <a href="/Delivery-Information" title="Delivery Information">See details</a>.</p>';

document.getElementById("FT_Message").innerHTML = currentTimeString;

var stockMessage;
var itemAvailability = document.getElementById('itemavail'+itemAvail);

if(itemAvailability!=null)
{
     if(itemAvailability.innerHTML == '') { itemAvailability.innerHTML = 'In Stock';}
}
}