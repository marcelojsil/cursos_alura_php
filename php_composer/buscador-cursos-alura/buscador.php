<?php

// traz o pacote de autoload
require 'vendor/autoload.php';

// classes vindas de teste.php com "classmap": ["./teste.php"], no composer.json
Teste::metodo();
Teste2::metodo2();


use Alura\BuscadorDeCursos\Buscador;
use \GuzzleHttp\Client;
use Symfony\Component\DomCrawler\Crawler;

// busca os cursos direto no diretório da Alura
$client = new Client(['base_uri' => 'https://www.alura.com.br/']);
$crawler = new Crawler();

$buscador = new Buscador($client, $crawler);
$cursos = $buscador->buscar('/cursos-online-programacao/php');

// preenche as linhas com os cursos
foreach ($cursos as $curso) {

     // a função vem de functions.php com "files": ["./functions.php"], no composer.json
     echo exibeMensagem($curso);

}

?>