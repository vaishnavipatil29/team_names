<!--type your content here-->
# Are you Straight Enough? - A posture correction robot

## Objective
College can demand excessive hours of sitting on chairs and benches. Our daily posture can play a vital role in determining our future health. Can you find out a way to keep us in good shape.

## Materials used
1. Arduino Uno
2. Gyrosensor MPU-6050
3. Servo motor MG995
4. DC batteries
5. Consumables like wire, cardboard, 3D printing materials, sheet metal, etc.

## Outlay of the design
1. There are three cardboard bases which forms the backbone of the structure. These are made of hard cardboard and sheet metal embedded within it. 
2. These three bases are connected to each other by a thin flexible steel wire.
3. There are 2 3D generated pulleys which are attached to the top base and 2 wires pass through them to the bottom most base. This is basically to rotate the cardboard structure about the bottom most base to bring it back to the normal position .
4. All the other materials are glued on top of this backbone and a backpack kind of structure is made.

## Working mechanism 
1. This robot is designed to correct the posture of a person when he is sitting or he is standing. This takes responsibility to make the person sit or stand ergonomically when he is slouching.
2. The gyrosensor attached to the topmost base senses the difference in the proper position and the way he is sitting and sends the data to the arduino.
3. The code in the arduino decides upon the data wheather he's in the healthy posture or not.
4. if he's not in the healthy posture, arduino switches the servo motor on, which pulls the wires back pivoted about the pulleys attached to the topmost base. This pulls the person back to the proper posture.
5. It does nothing when the person is sitting properly.
## The reason why we opted 'Are you Straight Enough? '.
1.As student ourselves we know know how hard it is sit in an uncomfortable posture for a long time so we wanted to find a solution for that.

##code
#include <Wire.h>
//#include "I2CDEV.h"
#include "MPU6050.h"
 //AD0 low = 0x68 (default for InvenSense evaluation board)
// AD0 high = 0x69
MPU6050 accelgyro;
const int MPU_addr=0x68;
const int MPU_addr1=0x69;
MPU6050 accelgyroIC1(0x68);
MPU6050 accelgyroIC2(0x69);
int16_t ax1, ay1, az1;
int16_t gx1, gy1, gz1;

int16_t ax2, ay2, az2;
int16_t gx2, gy2, gz2;
//#define LED_PIN 13
//bool blinkState = false;
void setup() {
  Wire.begin();
  Serial.begin(38400);
  // initialize device
  Serial.println("Initializing I2C devices...");
  //accelgyro.initialize();
  accelgyroIC1.initialize();
  accelgyroIC2.initialize();

  // verify connection
  Serial.println("Testing device connections...");
  Serial.println(accelgyroIC1.testConnection() ? "MPU6050 #1 connectionsuccessful" : "MPU6050 connection failed");
  Serial.println(accelgyroIC2.testConnection() ? "MPU6050 #2 connection successful" : "MPU6050 connection failed");
  // configure Arduino LED for
  pinMode(LED_PIN, OUTPUT);
}
void loop() {
  // read raw accel/gyro measurements from device
  accelgyroIC1.getMotion6(&ax1, &ay1, &az1, &gx1, &gy1, &gz1);
  accelgyroIC2.getMotion6(&ax2, &ay2, &az2, &gx2, &gy2, &gz2);
  // display tab-separated accel/gyro x/y/z values
  Serial.print("MPU1:\t");
  Serial.print(ax1); Serial.print("\t");
  Serial.print(ay1); Serial.print("\t");
  Serial.print(az1); Serial.print("\t");
  Serial.print(gx1); Serial.print("\t");
  Serial.print(gy1); Serial.print("\t");
  Serial.println(gz1);


  // display tab-separated accel/gyro x/y/z values
  Serial.print("MPU2:\t");
  Serial.print(ax2); Serial.print("\t");
  Serial.print(ay2); Serial.print("\t");
  Serial.print(az2); Serial.print("\t");
  Serial.print(gx2); Serial.print("\t");
  Serial.print(gy2); Serial.print("\t");
  Serial.println(gz2);
  // blink LED to indicate activity
  blinkState = !blinkState;
  digitalWrite(LED_PIN, blinkState);
 }
## youtube link
https://youtu.be/7HCZ8Z6UbJY


