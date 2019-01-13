#include <Servo.h>
#define trigPin1 11
#define echoPin1 12
#define trigPin2 9
#define echoPin2 10
#define trigPin3 7
#define echoPin3 8
Servo servo_test;
long duration, distance, RightSensor,BackSensor,FrontSensor,LeftSensor;
 
void setup()
{
Serial.begin (9600);
pinMode(trigPin1, OUTPUT);
pinMode(echoPin1, INPUT);
pinMode(trigPin2, OUTPUT);
pinMode(echoPin2, INPUT);
pinMode(trigPin3, OUTPUT);
pinMode(echoPin3, INPUT);
servo_test.attach(3);
servo_test.write(0);
}
 
void loop() {
SonarSensor(trigPin1, echoPin1);
RightSensor = distance;
SonarSensor(trigPin2, echoPin2);
LeftSensor = distance;
SonarSensor(trigPin3, echoPin3);
FrontSensor = distance;
 
//Serial.print(LeftSensor);
//Serial.print(" - ");
//Serial.print(FrontSensor);
//Serial.print(" - ");
//Serial.println(RightSensor);
if (RightSensor >= 11) {
   if(LeftSensor>= 5 && LeftSensor<=40){
   
  servo_test.write(180);
  delay(5000);
  servo_test.write(0);
  }
  
}
else {
  servo_test.write(0);
  delay(5000);
}

double per;
   if(RightSensor <=11){
    per = 100;
   }
   else{
    per = (40-RightSensor)*100/40;
   }
   if(per<0){
    Serial.println("0 % filled");
   }
   else{
    Serial.print(per);
    Serial.print(" % filled");
    Serial.println();
    delay(1000);
   }

}
 
void SonarSensor(int trigPin,int echoPin)
{
digitalWrite(trigPin, LOW);
delayMicroseconds(2);
digitalWrite(trigPin, HIGH);
delayMicroseconds(10);
digitalWrite(trigPin, LOW);
duration = pulseIn(echoPin, HIGH);
distance = (duration/2) / 29.1;
 
}
