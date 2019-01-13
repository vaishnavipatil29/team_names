/*
 * Automatic AC Temperature control using Arduino and TSOP in=mage in TV
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

#define Desired_temperature 25 //The desired temperature is 22*C at any time

//Decoded Remote Signals For my AC ##CHANGE IT FOR YOUR REMOTE
unsigned int Tvoff[] = {4450,4500, 550,1650, 550,1700, 550,1650, 550,600, 550,550, 550,550, 550,600, 500,600, 550,1650, 550,1700, 550,1650, 550,600, 500,600, 550,550, 550,550, 550,600, 500,600, 550,1650, 550,600, 550,550, 550,550, 550,550, 550,600, 550,550, 550,1650, 550,600, 550,1650, 550,1700, 550,1650, 550,1700, 550,1650, 550,1700, 550};  // SAMSUNG E0E040BF
unsigned int Tvon[]= {4550,4400, 600,1650, 600,1600, 650,1600, 600,500, 600,500, 600,550, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,500, 600,550, 550,550, 600,500, 600,500, 600,1650, 600,500, 600,500, 650,500, 550,550, 600,500, 600,500, 600,1650, 600,500, 600,1650, 550,1650, 600,1650, 550,1650, 600,1650, 600,1600, 600};  // SAMSUNG E0E040BF 
unsigned int Tv0[] = {4550,4450, 600,1600, 650,1600, 600,1600, 650,450, 600,550, 600,500, 600,500, 600,550, 600,1600, 650,1600, 600,1600, 600,500, 600,550, 600,500, 600,500, 650,500, 600,1600, 600,500, 650,500, 550,550, 600,1600, 600,550, 600,500, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,1650, 600,1600, 650,1600, 600};  // SAMSUNG E0E08877
unsigned int Tv1[] = {4550,4450, 600,1600, 600,1650, 600,1600, 600,500, 600,550, 600,500, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,550, 550,550, 600,500, 600,500, 600,550, 600,500, 600,1600, 600,550, 600,500, 600,500, 600,550, 550,550, 600,1600, 600,1650, 600,500, 650,1600, 600,1600, 600,1650, 600,1600, 600,1650, 600};  // SAMSUNG E0E020DF
unsigned int Tv2[] = {4550,4400, 600,1650, 600,1600, 600,1650, 600,500, 600,500, 600,550, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,500, 650,500, 600,500, 600,500, 650,1600, 600,500, 600,1600, 650,500, 600,500, 600,500, 650,500, 600,500, 600,500, 650,1600, 600,500, 600,1600, 650,1600, 600,1600, 600,1650, 600,1600, 600};  // SAMSUNG E0E0A05F 
unsigned int Tv3[] = {4550,4400, 650,1600, 600,1600, 650,1600, 600,500, 600,500, 600,550, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,500, 600,550, 550,550, 600,500, 600,500, 650,1600, 600,1600, 650,500, 600,500, 600,500, 650,450, 650,500, 600,1600, 600,550, 600,500, 600,1600, 650,1600, 600,1600, 600,1650, 600,1600, 600};  // SAMSUNG E0E0609F
unsigned int Tv4[] = {4500,4450, 600,1600, 600,1650, 600,1600, 600,550, 600,500, 600,500, 600,550, 550,550, 600,1600, 600,1650, 600,1600, 600,550, 600,500, 600,500, 600,550, 550,550, 600,500, 600,500, 650,500, 600,1600, 600,500, 600,550, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,500, 600,1650, 550,1650, 600,1650, 600,1600, 600};  // SAMSUNG E0E010EF
unsigned int Tv5[] = {4500,4450, 600,1650, 550,1650, 600,1650, 550,550, 600,500, 600,500, 650,500, 600,500, 600,1600, 650,1600, 600,1600, 600,550, 600,500, 600,500, 600,550, 600,500, 600,1600, 600,550, 600,500, 600,1600, 600,550, 600,500, 600,500, 600,500, 600,550, 600,1600, 600,1650, 600,500, 600,1650, 600,1600, 600,1650, 600,1600, 650};  // SAMSUNG E0E0906F
unsigned int Tv6[] = {4550,4400, 600,1650, 600,1600, 600,1650, 600,500, 600,550, 550,550, 600,500, 600,500, 600,1650, 600,1600, 650,1600, 600,500, 650,450, 650,500, 600,500, 600,500, 650,500, 600,1600, 600,500, 600,1650, 600,500, 600,500, 650,500, 600,500, 600,1600, 600,550, 600,1600, 600,500, 600,1650, 600,1650, 550,1650, 600,1600, 600};  // SAMSUNG E0E050AF
unsigned int Tv7[] = {4550,4400, 600,1650, 600,1600, 650,1600, 600,500, 600,550, 550,550, 600,500, 600,500, 650,1600, 600,1600, 600,1650, 600,500, 600,500, 600,550, 600,500, 600,500, 600,550, 600,500, 600,1600, 600,1650, 600,500, 600,500, 600,550, 600,500, 600,1650, 550,1650, 600,500, 600,550, 600,1600, 600,1650, 600,1600, 600,1650, 600};  // SAMSUNG E0E030CF
unsigned int Tv8[] = {4550,4400, 600,1650, 600,1600, 650,1600, 600,500, 600,500, 650,500, 600,500, 600,500, 650,1600, 600,1600, 650,1600, 600,500, 600,500, 600,550, 600,500, 600,500, 600,1650, 600,500, 600,1600, 600,1650, 600,500, 600,550, 550,550, 600,500, 600,500, 600,1650, 600,500, 600,500, 600,1650, 600,1600, 600,1650, 600,1600, 600};  // SAMSUNG E0E0B04F
unsigned int Tv9[] = {4550,4400, 600,1650, 550,1650, 600,1650, 600,500, 600,500, 600,500, 650,500, 600,500, 600,1600, 650,1600, 600,1600, 600,550, 600,500, 600,500, 600,550, 550,550, 600,500, 600,1650, 550,1650, 600,1650, 550,550, 600,500, 600,500, 600,550, 600,1600, 650,450, 600,550, 600,500, 600,1650, 550,1650, 600,1650, 600,1600, 600};  // SAMSUNG E0E0708F
//Change it for your remote

IRsend irsend;

int Measured_temp;
int Measured_Humi;
int AC_Temp;
char temp_error = 2;
int Pev_value;
boolean AC = false;
int flg=0;
byte serialA;

int khz = 38; // 38kHz carrier frequency for the NEC protocol

void setup()
{
Serial.begin(9600);
 
}

void loop() {
  int tn=0,on=0;
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
  tn=Measured_temp/10;
  on=Measured_temp%10;
  

   
 

 if ( Measured_temp != Pev_value||flg==0) //Change the temperature only if the measured voltage value changes
{
//irsend.sendRaw(Tv0, sizeof(Tv0) / sizeof(Tv0[0]), khz); delay(200);//Send signal to set 0 
if(Measured_temp > Desired_temperature+3)
{
   irsend.sendRaw(Tv1, sizeof(Tv1) / sizeof(Tv1[0]), khz); delay(200);//Send signal to set 1
   irsend.sendRaw(Tv6, sizeof(Tv6) / sizeof(Tv6[0]), khz); delay(200);//Send signal to set 6
  AC_Temp = 16; 
}

if (Measured_temp == Desired_temperature+3) //If AC is ON and measured temp is very very high than desired
{
   irsend.sendRaw(Tv1, sizeof(Tv1) / sizeof(Tv1[0]), khz); delay(200);//Send signal to set 1
   irsend.sendRaw(Tv9, sizeof(Tv9) / sizeof(Tv9[0]), khz); delay(200);//Send signal to set 9
  AC_Temp = 18; 
}

if (Measured_temp == Desired_temperature+2) //If AC is ON and measured temp is very high than desired
{
   irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
   irsend.sendRaw(Tv0, sizeof(Tv0) / sizeof(Tv0[0]), khz); delay(200);//Send signal to set 0 
  AC_Temp = 20; 
}

if (Measured_temp == Desired_temperature+1) //If AC is ON and measured temp is very high than desired
{
   irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
   irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  AC_Temp = 22; 
}
 
if (Measured_temp == 22 ) //If AC is ON and measured temp is desired value
{
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  AC_Temp = 22; 
}

if (Measured_temp == Desired_temperature-1) //If AC is ON and measured temp is low than desired value
{
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  AC_Temp = 22; 
}

if (Measured_temp == Desired_temperature-2 ) //If AC is ON and measured temp is very low than desired value
{
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  irsend.sendRaw(Tv3, sizeof(Tv3) / sizeof(Tv3[0]), khz); delay(200);//Send signal to set 3
  AC_Temp = 23; 
}

if (Measured_temp == Desired_temperature-3 ) //If AC is ON and measured temp is very very low desired value
{
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  irsend.sendRaw(Tv4, sizeof(Tv4) / sizeof(Tv4[0]), khz); delay(200);//Send signal to set 4
  AC_Temp = 24; 
}
if(Measured_temp < Desired_temperature-3)
{
  irsend.sendRaw(Tv2, sizeof(Tv2) / sizeof(Tv2[0]), khz); delay(200);//Send signal to set 2
  irsend.sendRaw(Tv6, sizeof(Tv6) / sizeof(Tv6[0]), khz); delay(200);//Send signal to set 4
  AC_Temp = 26; 
}
flg++;
}

Pev_value = Measured_temp;
for(int i=0;i<10;++i)
delay(1000);
}
  
 
 
