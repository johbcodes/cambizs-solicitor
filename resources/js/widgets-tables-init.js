"use strict";
/*
<--!----------------------------------------------------------------!-->
<--! Coundown Timer !-->
<--!----------------------------------------------------------------!-->
*/
$(document).ready(function () {
	$('[data-time-countdown="countdown_1"]').timeTo(new Date("Tue Feb 23 2024 00:00:00 GMT+0600 (Bangladesh Standard Time)"));
	$('[data-time-countdown="countdown_2"]').timeTo(new Date("Tue Feb 25 2024 00:00:00 GMT+0600 (Bangladesh Standard Time)"));
	$('[data-time-countdown="countdown_3"]').timeTo(new Date("Tue Feb 24 2024 00:00:00 GMT+0600 (Bangladesh Standard Time)"));
	$('[data-time-countdown="countdown_4"]').timeTo(new Date("Tue Feb 22 2024 00:00:00 GMT+0600 (Bangladesh Standard Time)"));
	$('[data-time-countdown="countdown_5"]').timeTo(new Date("Tue Feb 20 2024 00:00:00 GMT+0600 (Bangladesh Standard Time)"));
});
