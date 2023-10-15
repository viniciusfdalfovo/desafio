# About the Project

This project was developed for the Starter Technical Challenge for the position of backend developer.

It consists of an API developed in PHP that queries all car models sold in Brazil from an informed brand. This data is obtained through a public API from FIPE (Fundo de Investimento em Pesquisa Econômica).

# Getting Started

These instructions will help you set up and use the project on your server or local environment.

## Prerequisites
 * PHP 7.4;
 * cURL PHP extension;
 * A HTTP server capable of running PHP scripts, such as Apache + mod_php.

## Installing

Simply clone the repository to your machine or server:
~~~bash
git clone https://github.com/viniciusfdalfovo/desafio.git
~~~
Navigate to the project directory.
~~~bash
cd desafio
~~~
You can also just copy the index file to your HTTP server's directory.

## Usage

Simply insert the 'marca' search parameter into the URL.

 * Example: '/desafio/api/?marca=Marca'.

### Usage example

~~~bash
GET http://localhost/desafio/api/?marca=Saturn
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
docker build -t desafio .
~~~~
* Then use the following command to start the container an run the app in the port 80;
~~~~bash
docker run -p 80:80 -d --name desafio desafio
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
GET http://localhost/desafio/apiv2/?marca=Saturn
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
