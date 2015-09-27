import urllib2
import serial
import time
ser = serial.Serial('/dev/ttyACM0', 9600)
val = 0
#ser.write(chr(1))
#val = ser.readline()
#print val
while 1:
	val = ser.readline()
	response = urllib2.urlopen("http://192.168.2.149/gassensor/insert.php?value="+str(val))
	print val
	#response = urllib2.urlopen("http://192.168.2.149/gassensor/getval.php")
	time.sleep(1)
