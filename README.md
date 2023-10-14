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
git clone https://github.com/MEUUSER/fipe-api.git
~~~

## Usage

Simply insert the 'marca' search parameter into the URL.

 * Requisição: '/fipe-api/?marca=Marca';

### Usage example

~~~bash
GET http://localhost/fipe-api/?marca=Saturn
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

## Autor

Vinícius Falavigna Dalfovo

## License

This project is licensed under the MIT License - see the [original source](https://opensource.org/license/mit/) for details.
