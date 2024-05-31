<?php

require __DIR__."/vendor/autoload.php";

$metodo = $_SERVER['REQUEST_METHOD'];
$caminho = $_SERVER['PATH_INFO'] ?? '/';

// use Projeto\Router as Router;
// use Serie\Router as SerieRouter;
// use Livro\Router as LivroRouter;
// use Musica\Router as MusicaRouter;

$router = new Projeto\Router($metodo, $caminho);
// $router = new SerieRouter($metodo, $caminho);
// $router = new LivroRouter($metodo, $caminho);
// $router = new MusicaRouter($metodo, $caminho);

#ROTAS

$router->get('/inserir_filme', 
    'Projeto\Controllers\FilmeController@inserir_filme');

$router->post('/inserir_filme/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $autor = $_POST['autor'] ?? null;
} );

$router->get('/inserir_livro', 
    'Livro\Controllers\HomeController@inserir_livro');

$router->post('/inserir_livro/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $escritor = $_POST['escritor'] ?? null;
});

$router->get('/inserir_serie', 
    'Serie\Controllers\HomeController@inserir_serie');

$router->post('/inserir_serie/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $criador = $_POST['criador'] ?? null;
});


$router->get('/inserir_musica', 
    'Musica\Controllers\HomeController@inserir_musica');

$router->post('/inserir_musica/resposta', function(){
    $nome = $_POST['nome'] ?? null;
    $produtor = $_POST['produtor'] ?? null;
});

// Filme
$router->get('/filme/inserir',
                'Projeto\Controllers\FilmeController@inserir');

$router->post('/filme/novo',
                'Projeto\Controllers\FilmeController@novo');

$router->get('/filme', 
                'Projeto\Controllers\FilmeController@index');

$router->get('/filme/{acao}/{status}', 
                'Projeto\Controllers\FilmeController@index');
            
$router->get('/filme/alterar/id/{id}',
                'Projeto\Controllers\FilmeController@alterar');
            
$router->get('/filme/excluir/id/{id}',
                'Projeto\Controllers\FilmeController@excluir');
            
$router->post('/filme/editar',
                'Projeto\Controllers\FilmeController@editar');
            
$router->post('/filme/deletar',
            'Projeto\Controllers\FilmeController@deletar');

// Serie

$router->get('/serie/inserir', 'Projeto\Controllers\SerieController@inserir');

$router->post('/serie/novo', 'Projeto\Controllers\SerieController@novo');

$router->get('/serie', 
                'Projeto\Controllers\SerieController@index');

$router->get('/serie/{acao}/{status}', 
                'Projeto\Controllers\SerieController@index');
            
$router->get('/serie/alterar/id/{id}',
                'Projeto\Controllers\SerieController@alterar');
            
$router->get('/serie/excluir/id/{id}',
                'Projeto\Controllers\SerieController@excluir');
            
$router->post('/serie/editar',
                'Projeto\Controllers\SerieController@editar');
            
$router->post('/serie/deletar',
            'Projeto\Controllers\SerieController@deletar');


// Livro

$router->get('/livro/inserir', 'Projeto\Controllers\LivroController@inserir');

$router->post('/livro/novo', 'Projeto\Controllers\LivroController@novo');

$router->get('/livro', 
                'Projeto\Controllers\LivroController@index');

$router->get('/livro/{acao}/{status}', 
                'Projeto\Controllers\LivroController@index');
            
$router->get('/livro/alterar/id/{id}',
                'Projeto\Controllers\LivroController@alterar');
            
$router->get('/livro/excluir/id/{id}',
                'Projeto\Controllers\LivroController@excluir');
            
$router->post('/livro/editar',
                'Projeto\Controllers\LivroController@editar');
            
$router->post('/livro/deletar',
            'Projeto\Controllers\LivroController@deletar');

// Musica

$router->get('/musica/inserir', 'Projeto\Controllers\MusicaController@inserir');

$router->post('/musica/novo', 'Projeto\Controllers\MusicaController@novo');

$router->get('/musica', 
                'Projeto\Controllers\MusicaController@index');

$router->get('/musica/{acao}/{status}', 
                'Projeto\Controllers\MusicaController@index');
            
$router->get('/musica/alterar/id/{id}',
                'Projeto\Controllers\MusicaController@alterar');
            
$router->get('/musica/excluir/id/{id}',
                'Projeto\Controllers\MusicaController@excluir');
            
$router->post('/musica/editar',
                'Projeto\Controllers\MusicaController@editar');
            
$router->post('/musica/deletar',
            'Projeto\Controllers\MusicaController@deletar');


// Manipulando a solicitação usando o roteador correto
$resultado = $router->handler();

if(!$resultado){
    http_response_code(404);
    echo "Página não encontrada!";
    die();
}

// Tratando o resultado
if ($resultado instanceof Closure) {
    echo $resultado($router->getParams());
} elseif (is_string($resultado)) {
    $resultado = explode("@", $resultado);
    $controller = new $resultado[0];
    $resultado = $resultado[1];
    echo $controller->$resultado($router->getParams());
}
