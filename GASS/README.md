# SPAS - Silent Public Addressing System
### Idea:
To create a system that notifies personally, regularly without the need of internet even on a simple mobile and is both readable and audible
### Implementation:
* A device carrying app is present at various locations in the railway station
* Users can feed in their mobile number and train number 
* SMS containing present status and a link is sent to the user whenever there is an update on the train status  
* Link contains live updates of the user's train 
* One can look for status of all other trains going through the station
## Languages Used:
* django (a python framework)-for the website
* java-for the app used to submit passenger's details
* PHP-to retrieve the data from the app and send a SMS to the passengers with train's current status and a link containing live updates of the train (SMS was sent using way2SMS API)
