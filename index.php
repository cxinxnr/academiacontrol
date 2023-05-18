<?php 

require 'vendor/autoload.php';

use App\Controllers\ClienteController;
use App\Controllers\HomeController;
use App\Controllers\LoginController;
use App\Controllers\PlanoController;
use App\Controllers\AulaController;

use Pecee\SimpleRouter\SimpleRouter as Router;

Router::get('/', [HomeController::class, 'index']);
Router::post('/login', [LoginController::class, 'login']);
Router::get('/logout', [LoginController::class, 'logout']);
Router::get('/home', [HomeController::class, 'dashboard']);
Router::get('/cadastro-cliente', [ClienteController::class, 'exibeCadastro']);
Router::post('/cadastro-cliente', [ClienteController::class, 'enviaFormCadastro']);
Router::get('/lista-cliente', [ClienteController::class, 'listarClientes']);
Router::get('/editar-cliente/{id}', [ClienteController::class, 'buscarCliente']);
Router::post('/editar-cliente', [ClienteController::class, 'enviaFormEdicao']);
Router::get('/excluir-cliente/{id}', [ClienteController::class, 'excluirCliente']);
Router::get('/cadastro-plano', [PlanoController::class, 'exibeCadastro']);
Router::post('/cadastro-plano', [PlanoController::class, 'enviaFormCadastro']);
Router::get('/lista-plano', [PlanoController::class, 'listarPlanos']);
Router::get('/editar-plano/{id}', [PlanoController::class, 'buscarPlano']);
Router::post('/editar-plano', [PlanoController::class, 'enviaFormEdicao']);
Router::get('/excluir-plano/{id}', [PlanoController::class, 'excluirPlano']);
Router::get('/cadastro-aula', [AulaController::class, 'exibeCadastro']);
Router::post('/cadastro-aula', [AulaController::class, 'enviaFormCadastro']);
Router::get('/lista-aula', [AulaController::class, 'listarAulas']);
Router::get('/editar-aula/{id}', [AulaController::class, 'buscarAula']);
Router::post('/editar-aula', [AulaController::class, 'enviaFormEdicao']);
Router::get('/excluir-aula/{id}', [AulaController::class, 'excluirAula']);

//fazer todos os cadastros.




Router::start();
