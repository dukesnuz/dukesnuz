/*link:"http://www.wunderground.com"
title:"Weather Underground"
url:"http://icons.wxug.com/graphics/wu2/logo_130x80.png

full:"Thousand Oaks, CA"
local_time_rfc822:"Wed, 18 Jan 2017 14:39:44 -0800"

ob_url:"http://www.wunderground.com/cgi-bin/findweather/getForecast?query=34.172268,-118.821548"
full:"North Gate - Westlake Village, Westlake Village, California"
history_url:"http://www.wunderground.com/weatherstation/WXDailyHistory.asp?ID=KCAWESTL5"

weather:"Mostly Cloudy"
icon:"mostlycloudy"
icon_url:"http://icons.wxug.com/i/c/k/mostlycloudy.gif"

feelslike_string:"54.4 F (12.4 C)"
temperature_string:"54.4 F (12.4 C)"
wind_gust_kph:"1.6"
wind_gust_mph:"1.0"
wind_string:"From the West at 1.0 MPH Gusting to 1.0 MPH"

windchill_f = obj.windchill_f

relative_humidity : "73%"
forecast_url:"http://www.wunderground.com/US/CA/Thousand_Oaks.html"

termsofService:"http://www.wunderground.com/weather/api/d/terms.html"
*/

/****************************************OBjECT RETURNED*********************************************************************/
/*{
 "response": {
 "version":"0.1",
 "termsofService":"http://www.wunderground.com/weather/api/d/terms.html",
 "features": {
 "conditions": 1
 }
 }*/
(function() { 
	console.log("returned");
var returned = {
	"current_observation" : {
		"image" : {
			"url" : "http://icons.wxug.com/graphics/wu2/logo_130x80.png",
			"title" : "Weather Underground",
			"link" : "http://www.wunderground.com"
		},
		"display_location" : {
			"full" : "Boston, MA",
			"city" : "Boston",
			"state" : "MA",
			"state_name" : "Massachusetts",
			"country" : "US",
			"country_iso3166" : "US",
			"zip" : "02108",
			"magic" : "1",
			"wmo" : "99999",
			"latitude" : "42.36000061",
			"longitude" : "-71.06999969",
			"elevation" : "21.9"
		},
		"observation_location" : {
			"full" : "Cambridge, Charles River, Cambridge, Massachusetts",
			"city" : "Cambridge, Charles River, Cambridge",
			"state" : "Massachusetts",
			"country" : "US",
			"country_iso3166" : "US",
			"latitude" : "42.363503",
			"longitude" : "-71.077904",
			"elevation" : "36 ft"
		},
		"estimated" : {
		},
		"station_id" : "KMACAMBR70",
		"observation_time" : "Last Updated on January 20, 8:26 PM EST",
		"observation_time_rfc822" : "Fri, 20 Jan 2017 20:26:08 -0500",
		"observation_epoch" : "1484961968",
		"local_time_rfc822" : "Fri, 20 Jan 2017 20:26:22 -0500",
		"local_epoch" : "1484961982",
		"local_tz_short" : "EST",
		"local_tz_long" : "America/New_York",
		"local_tz_offset" : "-0500",
		"weather" : "Overcast",
		"temperature_string" : "41.5 F (5.3 C)",
		"temp_f" : 41.5,
		"temp_c" : 5.3,
		"relative_humidity" : "65%",
		"wind_string" : "Calm",
		"wind_dir" : "South",
		"wind_degrees" : 174,
		"wind_mph" : 0.2,
		"wind_gust_mph" : "2.5",
		"wind_kph" : 0,
		"wind_gust_kph" : "4.0",
		"pressure_mb" : "1014",
		"pressure_in" : "29.96",
		"pressure_trend" : "0",
		"dewpoint_string" : "31 F (-1 C)",
		"dewpoint_f" : 31,
		"dewpoint_c" : -1,
		"heat_index_string" : "NA",
		"heat_index_f" : "NA",
		"heat_index_c" : "NA",
		"windchill_string" : "42 F (5 C)",
		"windchill_f" : "42",
		"windchill_c" : "5",
		"feelslike_string" : "42 F (5 C)",
		"feelslike_f" : "42",
		"feelslike_c" : "5",
		"visibility_mi" : "10.0",
		"visibility_km" : "16.1",
		"solarradiation" : "0",
		"UV" : "0.0",
		"precip_1hr_string" : "0.00 in ( 0 mm)",
		"precip_1hr_in" : "0.00",
		"precip_1hr_metric" : " 0",
		"precip_today_string" : "0.00 in (0 mm)",
		"precip_today_in" : "0.00",
		"precip_today_metric" : "0",
		"icon" : "cloudy",
		"icon_url" : "http://icons.wxug.com/i/c/k/nt_cloudy.gif",
		"forecast_url" : "http://www.wunderground.com/US/MA/Boston.html",
		"history_url" : "http://www.wunderground.com/weatherstation/WXDailyHistory.asp?ID=KMACAMBR70",
		"ob_url" : "http://www.wunderground.com/cgi-bin/findweather/getForecast?query=42.363503,-71.077904",
		"nowcast" : ""
	}
};
return returned;
})();
