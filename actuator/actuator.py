import mechanize
import json
import os												

ACTUATOR_NAME = "galileo2"
ACTIVE_SENSORS = set([“galileo1”])							                PIN_OUT = “/sys/class/gpio/gpio26/value”

browser = mechanize.Browser()
browser.set_handle_robots(False)
browser.open('http://83.212.86.224/login_actuator.php')
while True:
	browser.select_form(name="login_actuator")
	browser.form["actuator_name"] = ACTUATOR_NAME
	response = browser.submit()
	data = json.loads(str(response.read()))
	if data.sensor_name in ACTIVE_SENSORS:
		if data.value >= 3000:
			os.system(“echo -n 1 ” + PIN_OUT)
		else:
			os.system(“echo -n 0 ” + PIN_OUT)
