//A standard client program
#include<iostream>
#include<istream>
#include <stdio.h>
#include <stdlib.h>
#include <netdb.h>
#include <netinet/in.h>
#include <arpa/inet.h>
#include <string.h>

using namespace std;
int main(int argc, char*argv[])
{
	int sockfd, portno;
	char buffer[256];
	struct sockaddr_in server_address;
	int n;
	if (argc != 2)
	{
  		perror("Client IP address not provided!");
  		exit(1);
 	}
	sockfd = socket(AF_INET, SOCK_STREAM, 0);
	if(sockfd < 0)
	{
		perror("Error opening socket!");
		exit(1);
	}
	memset(&server_address, 0, sizeof(server_address));
	portno = 5001;
 	server_address.sin_family = AF_INET;
 	server_address.sin_addr.s_addr= inet_addr(argv[1]);
 	server_address.sin_port =  htons(portno);

 	if (connect(sockfd, (struct sockaddr *) &server_address, sizeof(server_address)) < 0)
 	{
  		perror("Problem in connecting to the server!");
  		exit(1);
 	}
 	
 	n = send(sockfd,"10.196.2.10",255,0);		// change to server's IP address
 	if (n<0)
 	{
      	perror("Error writing to socket!");
      	exit(1);
   	}

   	bzero(buffer,256);
   	n=recv(sockfd,buffer,255,0);

   	string playfile = "open http://10.196.2.10/";		// change to server's IP address
   	playfile = playfile + buffer;
   	const char *command = playfile.c_str();
   	system(command); 

}
