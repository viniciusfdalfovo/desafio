<?php
// Configurar os parâmetros do cURL

// Inicializar uma sessão cURL
$ch = curl_init();
// Definir URL do endpoint
$url = "https://parallelum.com.br/fipe/api/v1/carros/marcas/";
// Definir URL a ser buscada
curl_setopt($ch, CURLOPT_URL, $url);
// Retonar resultado como string
curl_setopt($ch, CURLOPT_RETURNTRANSFER, true);
// Limitar o tempo de epera pela conexão em 20s
curl_setopt($ch, CURLOPT_TIMEOUT, 20);


// Armazenar e consultar os pré-resultados da cURL

// Guardar o valor 'marca' consultado na variável 'input'
$input = $_GET['marca'];
// Armazenar o resultado da consulta inicial na variável 'iresp'
$iresp = curl_exec($ch);
// Decodificar o resultado da consulta de JSON para no array multidimensional 'decoded'
$decoded = json_decode($iresp, true);
// Guardar os dados de marca e código do resultado no array 'brands'
$brands = array_column($decoded, 'nome', 'codigo');
// Consulta no array brands pelo parâmetro 'input' fornecido
$brand_found = array_search("$input", $brands);


// Validar as informações inseridas e retornadas e exibir o resultado final ou erros

// Validar se houve erros na comunicação com a API
if(curl_error($ch)){
    echo '"error": "Erro de comunicação com a API – Erro 500"';
}
// Validar se o parâmetro de consulta foi inserido
elseif (empty($input)) {
    echo '"error": "Marca não informada – Erro 400"';
}
// Validar se o parâmetro de consulta é válido
elseif (empty($brand_found)) {
    echo '"error": "Marca inexistente – Erro 400"';
}
// Realizar consulta final após validar os passos anteriores
else {
    // Configurar a cURL final
    curl_setopt($ch, CURLOPT_URL, "$url$brand_found/modelos");
    // Armazenar o resultado da consulta final em 'fresp'
    $fresp = curl_exec($ch);
    // Decodificar 'resp2' para o array 'decoded2'
    $decoded2 = json_decode($fresp, true);
    // Selecionar as entradas 'modelos' no array relacional 'decode2' e guardar em 'models'
    $models = $decoded2['modelos'];
    //Contar o número de entradas no array models e armazenar em 'nmod'
    $nmod = count($models);

    // Iteração de 0 até o número de modelos
    for ($i = 0;$i < $nmod; $i++){
        // Armazenar em 'modesp' o modelo específico, de acordo com sua posição no array
        $modesp = $models[$i]['nome'];
        // Armazenar em 'codesp' o código específico do modelo, de acordo com sua posição no array
        $codesp = $models[$i]['codigo'];
        // Criar um novo array 'aoutput' coms os dados especificos
        $aoutput = [
            ['vehicle'=>$input,'code'=>$brand_found],
            ['vehicle'=>$modesp,'code'=>$codesp]
        ];
        // Formatar em JSON, caso necessario
        $joutput = json_encode($aoutput);
        // Formatar como, caso necessario
        $ooutput = json_decode($joutput);
        // Faz o output da API no formato de array
        var_dump($aoutput);
    }
}
