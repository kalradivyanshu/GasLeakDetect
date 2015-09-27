int ledPin = 13;
int val = 0; 
void setup() {
  pinMode(ledPin,OUTPUT);
  Serial.begin(9600);
}
void loop() {
   if(Serial.available())
 {
  val = Serial.read();      // read the serial port
Serial.println(val);
 // if the stored value is a single-digit number, blink the LED that number
 if (val == '0') {
    digitalWrite(ledPin, LOW);
   }
   else{
     digitalWrite(ledPin, HIGH);
   }
  int sensorValue = analogRead(A0);
  Serial.println(sensorValue);
  delay(1100);
}
