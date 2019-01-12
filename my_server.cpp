//A standard server program
#include<iostream>
#include<istream>
#include <stdio.h>
#include <stdlib.h>
#include <unistd.h>
#include <netdb.h>
#include <netinet/in.h>
#include <sys/types.h>
#include <sys/socket.h>
#include <string.h>

using namespace std;
int main(int argc, char*argv[])
{
	
	int sockfd, newsockfd, portno;
	unsigned int clilen;
	char buffer[256];
	struct sockaddr_in server_address, client_address;
	int n;
	sockfd = socket(AF_INET, SOCK_STREAM, 0);

	if(sockfd<0)
	{
		perror("Error opening socket!");
		exit(1);
	}
	bzero((char*) &server_address, sizeof(server_address));
	portno=5001;
	server_address.sin_family = AF_INET;
   	server_address.sin_addr.s_addr = INADDR_ANY;
   	server_address.sin_port = htons(portno);
   	if (bind(sockfd, (struct sockaddr *) &server_address, sizeof(server_address)) < 0)
   	{
      	perror("Error on binding!");
      	exit(1);
    }
    listen(sockfd,5);
    clilen = sizeof(client_address);

   	int pid;
    while (1) 
    {
         newsockfd = accept(sockfd, (struct sockaddr *) &client_address, &clilen);
         if (newsockfd < 0)
                perror("ERROR on accept");
         //fork new process
         pid = fork();
         if (pid < 0) 
         {
              perror("ERROR in new process creation");
         }
         if (pid == 0) 
         {
         	bzero(buffer, 256);
           	n=recv(newsockfd,buffer,255,0);
            if (n < 0)
                perror("ERROR reading from socket");
            printf("Here is the message: %s\n", buffer);
            n=send(newsockfd,"1.mp3",n,0);
            if (n < 0)
                 perror("ERROR writing to socket");
          }
    }
   	exit(1);
}

