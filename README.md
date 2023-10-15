# About the fipe-api Project

This project was developed for the Starter Technical Challenge for the position of backend developer.

It consists of an API in PHP that queries all car models sold in Brazil from an informed brand. This data is obtained through a public API from FIPE(Fundo de Investimento em Pesquisa Econômica).

# Getting Started

These instructions will help you set up and use the project on your server or local environment.

## Prerequisites
 * PHP 7.4;
 * cURL PHP extension;
 * A HTTP server capable of running PHP scripts, such as Apache + mod_php.

## Installing

Simply clone the repository to your machine or server or copy the index file to the HTTP server directory.
~~~bash
git clone https://github.com/viniciusfdalfovo/desafio.git
~~~
Navigate to the project directory.
~~~bash
cd desafio
~~~
## Usage

Simply insert the 'marca' search parameter into the URL.

 * Requisição: '/desafio/api/?marca=Marca';

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

The API provides error messages in JSON format when something goes wrong:

* Brand not provided - "error": "Marca não informada – Erro 400" 
* Brand does not exist - "error": "Marca inexistente – Erro 400" 
* Communication error with the API - "error": "Erro de comunicação com a API – Erro 500"

## Dockerfile

This project also contains a dockerfile so you can use it easyly in another enviroment that has docker installed.

Here is a usage example:
* First build the image by running the following command in the project folder:
~~~~bash
docker build -t desafio .
~~~~
* Then use the following command to start the container an run the app in the port 80;
~~~~bash
docker run -p 80:80 --rm  -d  --name  desafio desafio
~~~~
## Autor
~

Vinícius Falavigna Dalfovo

## License

This project is licensed under the MIT License - see the [original file](https://github.com/viniciusfdalfovo/fipe-api/blob/main/LICENSE) for details.
