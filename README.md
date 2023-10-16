# About the Project

This project was developed for the Starter Technical Challenge for the position of backend developer.

It consists of an API developed in PHP that returns all car models sold in Brazil from an informed brand. This data is obtained through a public API from FIPE (Fundo de Investimento em Pesquisa Econômica).

# Getting Started

These instructions will help you set up and use the project on your server or local environment.

## Prerequisites
 * PHP 7.4;
 * cURL PHP extension;
 * A HTTP server capable of running PHP scripts, such as Apache + mod_php.

## Installing

Simply clone the repository to your machine or server:
~~~bash
$ git clone https://github.com/viniciusfdalfovo/desafio.git
~~~

Navigate to the project directory:
~~~bash
$ cd desafio
~~~

## Usage

Simply insert the 'marca' search parameter into the URL.

 * Example: '/desafio/api/?marca=Marca'.

### Usage example

~~~bash
$ GET http://localhost/desafio/api/?marca=Saturn
~~~
~~~json
{
  "data": [
  {
   "code": 51,
   "vehicle": "Saturn"
  },
  {
   "code": 2096,
   "vehicle": "SL-2 1.9"
  }
 ]
}
~~~

## Errors

The API provides error messages when something goes wrong:

* Brand not provided - "error": "Marca não informada – Erro 400" 
* Brand does not exist - "error": "Marca inexistente – Erro 400" 
* Communication error with the API - "error": "Erro de comunicação com a API – Erro 500"

## Dockerfile

This project also contains a dockerfile so you can use it easily in another enviroment that has docker installed.

Here is a usage example:
* First build the image by running the following command in the project folder:
~~~~bash
# docker build -t desafio .
~~~~
* Then use the following command to start the container an run the app in the port 80;
~~~~bash
# docker run -p 80:80 -d --name desafio desafio
~~~~

## Makefile

There is also an automation for creating the image and running the docker container via Makefile. To execute it, navigate to the project repository and run the following commands:
~~~~bash
$ make docker

[+] Building 2.6s (8/8) FINISHED                                                                                                                                                                                      docker:default
 => [internal] load .dockerignore                                                                                                                                                                                               0.2s
 => => transferring context: 2B                                                                                                                                                                                                 0.0s
 => [internal] load build definition from Dockerfile                                                                                                                                                                            0.2s
 => => transferring dockerfile: 125B                                                                                                                                                                                            0.0s
 => [internal] load metadata for docker.io/library/php:7.4-apache                                                                                                                                                               1.3s
 => [1/3] FROM docker.io/library/php:7.4-apache@sha256:c9d7e608f73832673479770d66aacc8100011ec751d1905ff63fae3fe2e0ca6d                                                                                                         0.0s
 => [internal] load build context                                                                                                                                                                                               0.2s
 => => transferring context: 58B                                                                                                                                                                                                0.0s
 => CACHED [2/3] RUN apt update; apt install libwww-perl -y                                                                                                                                                                     0.0s
 => CACHED [3/3] COPY api/ /var/www/html/                                                                                                                                                                                       0.0s
 => exporting to image                                                                                                                                                                                                          0.1s
 => => exporting layers                                                                                                                                                                                                         0.0s
 => => writing image sha256:339f0a7ed3863fd499d05d362df4ac5625b089eda604510c15ac0fe4da8102e8                                                                                                                                    0.0s
 => => naming to docker.io/library/desafio                                                                                                                                                                                      0.0s
ab41bb469a34d0690190a8751ca62737c1fa6129622f2e0248ff7f29c18cf583
~~~~

You can see the other options with help:
~~~~bash
$ make help

Usage:
  make <target>

Targets:
  help        Print help
  docker      Build image and run container
  build       Build image
  run         Run container
  stop        Stop container
~~~~

OBS: the endpoint changes when running the API with docker and the queries have to be done like this:
~~~~bash
$ GET localhost/?marca=Saturn
{
  "data": [
  {
   "code": 51,
   "vehicle": "Saturn"
  },
  {
   "code": 2096,
   "vehicle": "SL-2 1.9"
  }
 ]
}
~~~~

## APIv2

There is also another version of the API called apiv2. This version outputs the request in the array format, but it can also be changed to JSON format by editing the variable in the var_dump function on the line 75.
* Array output:
~~~~php
var_dump($aoutput);
~~~~
* JSON output:
~~~~php
var_dump($joutput);
~~~~

To query it, just change the URL from api to apv2:
~~~bash
$ GET http://localhost/desafio/apiv2/?marca=Saturn
~~~

To build its docker image, just edit the docker file changing the source directory to apiv2:
~~~bash
FROM php:7.4-apache
RUN apt update; apt install libwww-perl -y
COPY apiv2/ /var/www/html/
~~~

## Autor

Vinícius Falavigna Dalfovo

## License

This project is licensed under the MIT License - see the [original file](https://github.com/viniciusfdalfovo/fipe-api/blob/main/LICENSE) for details.
