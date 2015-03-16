import mechanize
import subprocess													

SENSOR_NAME = "galileo1"
ACTIVE_ACTUATORS = set(["galileo2", "galileo3"])
VALUE = subprocess.check_output(['cat', '/sys/bus/iio/devices/iio\:device0/in_voltage0_raw']).strip()

browser = mechanize.Browser()
browser.set_handle_robots(False)
browser.open('http://83.212.86.224/login_sensor.php')
browser.select_form(name="login_sensor")
control_names = [c.name for c in browser.controls]

for cn in control_names:
	if cn == "sensor_name":
		browser.form[cn] = SENSOR_NAME
	elif cn == "submit":
		pass
	else:
		if cn in ACTIVE_ACTUATORS:
			browser.form[cn] = VALUE
req = browser.submit()