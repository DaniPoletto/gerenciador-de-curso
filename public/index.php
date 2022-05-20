<?php
require __DIR__ . '/../vendor/autoload.php';

use Alura\Cursos\Controller\ListarCursos;
use Alura\Cursos\Controller\Persistencia;
use Alura\Cursos\Controller\FormularioInsercao;
use Alura\Cursos\Controller\InterfaceControladorRequisicao;

$caminho = $_SERVER['PATH_INFO'];
$rotas = require __DIR__ . '/../config/routes.php';

if(!array_key_exists($caminho, $rotas)){
    http_response_code(404);
    exit();
}

session_start();
$ehRotaDeLogin = stripos($caminho, 'login');

//está logado tentando acessar a página de login
if(isset($_SESSION['logado']) && $ehRotaDeLogin!==false){
    header("Location: /listar-cursos");
    exit();
}

//não está logado e tenta acessar uma página que não é de login
if(!isset($_SESSION['logado']) && $ehRotaDeLogin===false){
    header("Location: /login");
    exit();
}

$classeControladora = $rotas[$caminho];
/**@var InterfaceControladorRequisicao $controlador */
$controlador = new $classeControladora();
$controlador->processaRequisicao();
?>