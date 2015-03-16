echo -n "37" > /sys/class/gpio/export
echo -n "out" > /sys/class/gpio/gpio37/direction
echo -n "0" > /sys/class/gpio/gpio37/value 