//#include <DHT.h>
#include <MySQL_Connection.h>
#include <MySQL_Cursor.h>
#include <ESP8266WiFi.h>
#include <WiFiClient.h>

#define sensorPin1 0

char ssid[] = "IITDH-Wireless-1";                 // Network Name
char pass[] = "!!tdh@KA25#";                 // Network Password
byte mac[6];

WiFiServer server(80);
IPAddress ip(10, 196, 4, 220);
IPAddress gateway(10, 196, 4, 220);
IPAddress subnet(255, 0, 0, 0);

WiFiClient client;
MySQL_Connection conn((Client *)&client);

char INSERT_SQL[] = "INSERT INTO arduino.hello VALUES ('Shruti')";
char query[128];

IPAddress server_addr(10, 196 ,4, 220);          // MySQL server IP
char user[] = "root";           // MySQL user
char password[] = "Shruti@123";       // MySQL password

void setup() {

  Serial.begin(115200);

  pinMode(sensorPin1, INPUT);
  //pinMode(sensorPin2, INPUT);

  Serial.println("Initialising connection");
  Serial.print(F("Setting static ip to : "));
  Serial.println(ip);

  Serial.println("");
  Serial.println("");
  Serial.print("Connecting to ");
  Serial.println(ssid);
  WiFi.config(ip, gateway, subnet); 
  WiFi.begin(ssid, pass);

  while (WiFi.status() != WL_CONNECTED) {
    delay(200);
    Serial.print(".");
  }

  Serial.println("");
  Serial.println("WiFi Connected");

  WiFi.macAddress(mac);
  Serial.print("MAC: ");
  Serial.print(mac[5],HEX);
  Serial.print(":");
  Serial.print(mac[4],HEX);
  Serial.print(":");
  Serial.print(mac[3],HEX);
  Serial.print(":");
  Serial.print(mac[2],HEX);
  Serial.print(":");
  Serial.print(mac[1],HEX);
  Serial.print(":");
  Serial.println(mac[0],HEX);
  Serial.println("");
  Serial.print("Assigned IP: ");
  Serial.print(WiFi.localIP());
  Serial.println("");

  Serial.println("Connecting to database");

  while (conn.connect(server_addr, 3306, user, password) != true) {
    delay(200);
    Serial.print ( "." );
  }

  Serial.println("");
  Serial.println("Connected to SQL Server!");  

}

void loop() {

  delay(1000); //1 sec

  sprintf(query, INSERT_SQL);
  //sprintf(query, INSERT_SQL, soil_hum, t);

  Serial.println("Recording data.");
  Serial.println(query);
  
  MySQL_Cursor *cur_mem = new MySQL_Cursor(&conn);
  
  cur_mem->execute(query);

  delete cur_mem;

}
