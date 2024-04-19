<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

use Filme\Router as Rout;
// use Serie\Router as SerieRouter;
// use Livro\Router as LivroRouter;
// use Musica\Router as MusicaRouter;

$router = new Rout($metodo, $caminho);
// $router = new SerieRouter($metodo, $caminho);
// $router = new LivroRouter($metodo, $caminho);
// $router = new MusicaRouter($metodo, $caminho);

#ROTAS

$router->get('/inserir_filme', 
    'Filme\Controllers\HomeController@formExer1');

$router->post('/inserir_filme/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $autor = $_POST['autor'] ?? null;
} );

$router->get('/inserir_serie', 
    'Serie\Controllers\HomeController@formExer1');

$router->post('/inserir_serie/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $criador = $_POST['criador'] ?? null;
});

$router->get('/inserir_livro', 
    'Livro\Controllers\HomeController@formExer1');

$router->post('/inserir_livro/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $escritor = $_POST['escritor'] ?? null;
});

$router->get('/inserir_musica', 
    'Musica\Controllers\HomeController@formExer1');

$router->post('/inserir_musica/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $produtor = $_POST['produtor'] ?? null;
});


//Chamando o formulário para inserir categoria
$router->get('/filme/inserir', 'Projeto\Controllers\FilmeController@inserir');

$router->post('/filme/novo', 'Projeto\Controllers\FilmeController@novo');

$router->get('/serie/inserir', 'Projeto\Controllers\SerieController@inserir');

$router->post('/serie/novo', 'Projeto\Controllers\SerieController@novo');

$router->get('/livro/inserir', 'Projeto\Controllers\LivroController@inserir');

$router->post('/livro/novo', 'Projeto\Controllers\LivroController@novo');

$router->get('/musica/inserir', 'Projeto\Controllers\MusicaController@inserir');

$router->post('/musica/novo', 'Projeto\Controllers\MusicaController@novo');

// $routerUsado = null;
// if ($router->matchRoute()) {
//     $routerUsado = $router;
// } elseif ($router->matchRoute()) {
//     $routerUsado = $router;
// } elseif ($router->matchRoute()) {
//     $routerUsado = $router;
// } elseif ($router->matchRoute()) {
//     $routerUsado = $router;
// } 

// Se nenhum roteador corresponder ao caminho, retornar 404
// if (!$routerUsado) {
//     http_response_code(404);
//     echo "Página não encontrada!";
//     die();
// }


// Manipulando a solicitação usando o roteador correto
$resultado = $router->handler();

// Tratando o resultado
if ($resultado instanceof Closure) {
    echo $resultado($router->getParams());
} elseif (is_string($resultado)) {
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($router->getParams());
}

#ROTAS

/*$resultado = $router->handler() ?? $router->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

if ($resultado instanceof Closure){
    echo $resultado($router->getParams() ?? $router->getParams());
} elseif (is_string($resultado)){
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($router->getParams() ?? $router->getParams());
}
*/