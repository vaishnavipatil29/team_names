#include <SoftwareSerial.h>

SoftwareSerial BT(10, 11); // RX | TX

void setup()
{
  pinMode(13, OUTPUT);
  pinMode(9, OUTPUT);  // this pin will pull the HC-05 pin 34 (key pin) HIGH to switch module to AT mode
  digitalWrite(9, HIGH);
  Serial.begin(9600);
  BT.begin(38400);  // HC-05 default speed in AT command mode
  Serial.println("Enter AT commands:");
}

void loop()
{ 
 
  String b;
  char hex[20];
  //Starting the AT command sequence for the BT Module
  BT.write("AT+INIT\r\n");

  if (BT.available())
  {
    b=BT.readString();
  }
  delay(1000);

   while(1)
   {
   //AT commmand to get the list of device in range
   BT.write("AT+INQ\n");
   if (BT.available())
   {
    String first  = BT.readStringUntil(',');
    BT.read(); //next character is comma, so skip it using this
    String second = BT.readStringUntil(',');
    BT.read();
    String third  = BT.readStringUntil('\0');
    Serial.println(third);
    third.toCharArray(hex,third.length());
    //Converting HEX to DEC
    int number = (int)strtol(hex, NULL, 0);
    //The value above which the LED glows (FFFB0)
    if(number>=1048496)
      digitalWrite(13,HIGH);
    else
      digitalWrite(13,LOW);
   delay(1000);
   }
  }
   
}
