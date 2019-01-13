/*
 * Automatic AC Temperature control using Arduino and TSOP
 * Code Technions
 * Dated: 12-01-2019
 
       S.No: Component Pin Arduino Pin
    1 DHT11 – Vcc 5V
    2 DHT11 – Gnd Gnd
    3  DHT11 – Signal  13
    4  TSOP – Vcc  5V
    5  TSOP – Gnd  Gnd
    6  IR Led – Anode  9
    7  IR Led – Cathode  Gnd
 */
 
 #include <IRremote.h> //Lib for IT Blaster and TSOP
 #include <SPI.h> // Inbuilt Lib
 #include <Wire.h> //Inbuilt Lib
 
 #include <dht.h> //Library for dht11 Temperature and Humidity sensor (Download from Link in article)
 
 
#define DHT11_PIN 13 //Sensor output pin is connected to pin 13
dht DHT; //Sensor object named as DHT

#define Desired_temperature 22 //The desired temperature is 27*C at any time

//Decoded Remote Signals For my AC ##CHANGE IT FOR YOUR REMOTE
unsigned int ACoff[] = {3550,1500, 550,1150, 550,1100, 550,500, 550,450, 600,450, 550,1150, 550,450, 550,500, 550,1100, 600,1100, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,1150, 550,450, 550,1150, 550,1100, 600,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 600,1100, 550,450, 550,500, 550,1100 }; 
unsigned int ACon[] = {3500,1550, 600,1100, 550,1150, 550,450, 550,500, 600,400, 600,1100, 550,500, 550,450, 600,1100, 550,1100, 600,450, 550,1150, 550,450, 600,450, 550,1150, 550,1100, 550,500, 550,1100, 550,1150, 550,450, 600,450, 550,1150, 550,450, 550,500, 550,1150, 550,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,450, 600,1100, 550,500, 550,450, 600,1100, 550,500, 550,450, 550,1150 };

unsigned int Temp17[] = {3550,1550, 550,1100, 550,1150, 550,450, 600,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,1150, 550,450, 600,1100, 550,450, 600,450, 550,1150, 550,1100, 550,500, 550,1100, 600,1100, 550,500, 550,450, 600,1100, 550,500, 550,450, 550,1150, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 600,450, 550,450, 550,500, 550,450, 600,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,500, 550,450, 600,1100 };
unsigned int Temp18[] = {3500,1550, 600,1100, 550,1100, 600,450, 600,450, 550,450, 550,1150, 550,500, 500,500, 550,1150, 550,1100, 550,500, 550,1150, 550,450, 550,500, 550,1100, 550,1150, 550,500, 550,1100, 550,1150, 500,500, 600,450, 550,1150, 550,450, 550,500, 550,1100, 600,450, 550,500, 550,450, 600,450, 550,500, 500,500, 550,500, 550,500, 500,500, 550,500, 550,500, 550,450, 550,500, 500,500, 600,450, 550,500, 500,500, 600,1100, 550,500, 500,500, 550,1150, 550,450, 600,450, 550,1150 };
unsigned int Temp19[] = {3500,1550, 600,1100, 550,1150, 550,450, 550,500, 550,500, 550,1100, 550,500, 500,500, 600,1100, 550,1150, 500,500, 550,1150, 500,500, 550,500, 550,1150, 550,1100, 550,500, 500,1150, 550,1150, 550,500, 550,450, 550,1150, 550,450, 550,500, 550,1150, 550,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,500, 550,1100, 550,500, 500,500, 600,1100, 550,500, 550,450, 550,1150 };
unsigned int Temp20[] = {3500,1550, 600,1100, 550,1100, 600,450, 550,500, 550,450, 600,1100, 550,500, 550,450, 550,1150, 550,1100, 550,500, 550,1150, 550,450, 550,500, 550,1100, 550,1150, 550,500, 550,1100, 550,1150, 550,450, 600,450, 550,1150, 550,450, 550,500, 550,1100, 600,450, 550,500, 500,500, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 500,500, 600,450, 550,500, 550,450, 600,1100, 550,500, 500,500, 550,1150, 550,450, 600,450, 550,1150 };
unsigned int Temp21[] = {3500,1550, 500,1150, 600,1100, 550,500, 550,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,1150, 500,500, 600,1100, 550,500, 550,450, 550,1150, 500,1150, 600,450, 550,1150, 500,1150, 550,500, 550,450, 600,1100, 550,500, 500,500, 550,1150, 550,500, 550,450, 550,500, 550,450, 600,450, 550,500, 500,500, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,500, 500,500, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,500, 550,500, 550,1100 };
unsigned int Temp22[] = {3500,1550, 550,1100, 600,1100, 550,500, 550,450, 550,500, 550,1100, 550,500, 550,500, 550,1100, 600,1100, 550,500, 550,1100, 550,500, 550,450, 600,1100, 550,1100, 600,450, 550,1150, 500,1150, 550,500, 550,500, 550,1100, 550,500, 500,500, 600,1100, 550,500, 550,450, 550,500, 550,500, 500,500, 550,500, 500,500, 600,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 550,500, 550,500, 550,1100 };
unsigned int Temp23[] = {3550,1550, 550,1100, 550,1150, 550,450, 600,450, 550,500, 550,1100, 600,450, 550,500, 550,1100, 600,1100, 500,500, 600,1100, 550,500, 550,450, 550,1150, 500,1150, 550,500, 550,1100, 550,1150, 550,500, 550,450, 600,1100, 550,500, 500,500, 550,1150, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,450, 600,450, 550,500, 550,450, 550,500, 550,500, 550,1100, 550,500, 550,500, 550,1100, 550,500, 550,450, 600,1100 };
unsigned int Temp24[] = {3500,1600, 550,1100, 550,1150, 550,450, 550,500, 550,500, 550,1100, 550,500, 500,500, 550,1150, 550,1150, 500,500, 550,1150, 500,500, 600,450, 550,1150, 500,1150, 550,500, 550,1100, 550,1150, 500,550, 550,450, 550,1150, 550,450, 550,500, 550,1150, 550,450, 550,500, 550,500, 550,450, 550,500, 550,450, 550,500, 550,500, 500,500, 600,450, 550,500, 550,450, 550,500, 550,500, 550,450, 550,500, 550,500, 550,1100, 550,500, 500,500, 600,1100, 550,500, 550,450, 550,1150 };
//Change it for your remote

IRsend irsend;

int Measured_temp;
int Measured_Humi;
int AC_Temp;
char temp_error = 2;
int Pev_value;
boolean AC = false;

byte serialA;

int khz = 38; // 38kHz carrier frequency for the NEC protocol

void setup()
{
Serial.begin(9600);
 
}

void loop() {
  
  int ck = DHT.read11(DHT11_PIN); //Read the Temp and Humidity
  Measured_temp = DHT.temperature + temp_error;
  Measured_Humi = DHT.humidity;
  if(Measured_temp<0)
 {
   delay(1000);
  loop();
 }
  Serial.print("Temperature = ");
  Serial.println(Measured_temp);
  Serial.print("Humidity = ");
  Serial.println(Measured_Humi);
  
 
 if ((Measured_temp <= (Desired_temperature-3)) && AC == true) //If AC is turned on and temperature is less than 3 degree of Desired value #24 turn off
 {
  irsend.sendRaw(ACoff, sizeof(ACoff) / sizeof(ACoff[0]), khz);  delay(2000);//Send signal to Turn Off the AC
  AC_Temp = 0; AC=false;
 }

  if ((Measured_temp >= Desired_temperature+4) && AC == false && Measured_temp>0 && Measured_temp!=Pev_value ) //If AC is off and measured Temp is greater than Desired Temp
 {
  irsend.sendRaw(ACon, sizeof(ACon) / sizeof(ACon[0]), khz); delay(2000); //Send Signal to Turn On the AC 
  delay(2000);
  irsend.sendRaw(Temp22, sizeof(Temp22) / sizeof(Temp22[0]), khz); //Send signal to set 22*C
  AC_Temp = 22; AC=true;
 }

if ( Measured_temp != Pev_value) //Change the temperature only if the measured voltage value changes
{

if (Measured_temp == Desired_temperature+3) //If AC is ON and measured temp is very very high than desired
{
   irsend.sendRaw(Temp19, sizeof(Temp19) / sizeof(Temp19[0]), khz); delay(2000);//Send signal to set 19*C
  AC_Temp = 19; 
}

if (Measured_temp == Desired_temperature+2) //If AC is ON and measured temp is very high than desired
{
   irsend.sendRaw(Temp20, sizeof(Temp20) / sizeof(Temp20[0]), khz); delay(2000);//Send signal to set 20*C
  AC_Temp = 20; 
}

if (Measured_temp == Desired_temperature+1) //If AC is ON and measured temp is very high than desired
{
   irsend.sendRaw(Temp22, sizeof(Temp22) / sizeof(Temp22[0]), khz); delay(2000);//Send signal to set 22*C
  AC_Temp = 22; 
}
 
if (Measured_temp == 22 ) //If AC is ON and measured temp is desired value
{
  irsend.sendRaw(Temp22, sizeof(Temp22) / sizeof(Temp22[0]), khz); //Send signal to set 22*C
  AC_Temp = 22; 
}

if (Measured_temp == Desired_temperature-1) //If AC is ON and measured temp is low than desired value
{
  irsend.sendRaw(Temp23, sizeof(Temp23) / sizeof(Temp23[0]), khz); delay(2000);//Send signal to set 23*C
  AC_Temp = 23; 
}

if (Measured_temp == Desired_temperature-2 ) //If AC is ON and measured temp is very low than desired value
{
  irsend.sendRaw(Temp24, sizeof(Temp24) / sizeof(Temp24[0]), khz); delay(2000);//Send signal to set 24*C
  AC_Temp = 24; 
}

if (Measured_temp == Desired_temperature-3 ) //If AC is ON and measured temp is very very low desired value
{
  irsend.sendRaw(Temp24, sizeof(Temp24) / sizeof(Temp24[0]), khz); delay(2000);//Send signal to set 24*C
  AC_Temp = 24; 
}
}

Pev_value = Measured_temp;

}
