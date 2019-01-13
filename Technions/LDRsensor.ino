  
const int ldrPin = A0;

 
void setup() {
 
  Serial.begin(9600); 
  pinMode(ldrPin, INPUT); 
  pinMode(8,OUTPUT);  
}

void loop() {
  
  int ldrvalue = analogRead(ldrPin); 
  Serial.println(ldrvalue);
  delay(1000) ;
 
   if (ldrvalue <=250) {
 
    digitalWrite(8, HIGH);               
    Serial.println("on");
    delay(500);
   }
  else {
 
    digitalWrite(8, LOW);          
    Serial.println("off");
    delay(500);
  }
}

