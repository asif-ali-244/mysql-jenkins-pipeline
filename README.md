# Docker Compose with PHP and MySQL

A simple web application which adds users to a msql database. The application uses images from docker hub and run their instances and link them using docker compose.

## Getting Started

These instructions will get you a copy of the project up and running on your local machine for development and testing purposes. 

### Prerequisites

What things you need to install the software and how to install them. 
* Docker Engine
* Docker Compose

1. Update the `apt` package index and install packages to allow `apt` to use a repository over HTTPS:

```bash
$ sudo apt-get update
$ sudo apt-get install \
    apt-transport-https \
    ca-certificates \
    curl \
    gnupg \
    lsb-release
```
2. Add Docker’s official GPG key:

```bash
$ curl -fsSL https://download.docker.com/linux/ubuntu/gpg | sudo gpg --dearmor -o /usr/share/keyrings/docker-archive-keyring.gpg
```
3. Install Docker Engine
```bash
 $ sudo apt-get update
 $ sudo apt-get install docker-ce docker-ce-cli containerd.io
```
### Build and Run!

I am using `php:7.2.2-apache` and `mysql:5.7` docker images from the docker hub. Clone this repository to your local machine and run the following command:

```
$ sudo docker-compose up -d
```
This will run your docker images as containers. 
Go to your favourite web browser and enter the address `http://localhost:8001`
This will open the `index.php` web page.

## Configuration

The package comes with some default configurations. I have mapped port `8001` to local host's HTTP port and `3000` to mysql port.
`.env` file contains the mysql credentials of the mysql container. 
You can enter mysql client using the following command:
```bash
$ sudo docker-compose exec db mysql -u root -p 
```


## Stopping 

To stop the running containers, networks, volumes etc. Use the following command:
```bash
$ sudo docker-compose down -v
```
