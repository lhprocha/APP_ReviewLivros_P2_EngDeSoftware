<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use App\Http\Controllers\UsuarioController;
use App\Http\Controllers\AutorController;
use App\Http\Controllers\GeneroController;
use App\Http\Controllers\LivroController;
use App\Http\Controllers\ReviewController;



Route::get('/user', function (Request $request) {
    return $request->user();
})->middleware('auth:sanctum');

Route::controller(UsuarioController::class)->group(function (){
        Route::get('/usuarios', 'get');
        Route::get('/usuarios/{id}', 'details');
        Route::get('/usuario/{id}/review', 'listReviewUser');
        Route::post('/usuarios', 'store');
        Route::patch('/usuarios/{id}', 'update');
        Route::delete('/usuarios/{id}', 'delete');

    });

Route::controller(AutorController::class)->group(function (){
        Route::get('/autores', 'get');
        Route::get('/autores/{id}', 'details');
        Route::post('/autores', 'store');
        Route::patch('/autores/{id}', 'update');
        Route::delete('/autores/{id}', 'delete');
        Route::get('/autor/{id}/livros', 'livrosDoAutor');
        Route::get('/autores-com-livros', 'autoresComLivros');

    });

Route::controller(GeneroController::class)->group(function (){
        Route::get('/generos', 'get');
        Route::get('/generos/livros', 'generosWithLivros');
        Route::get('/generos/{id}', 'details');
        Route::post('/generos', 'store');
        Route::patch('/generos/{id}', 'update');
        Route::delete('/generos/{id}', 'delete');
        Route::get('/genero/{id}/livros', 'livrosDoGenero'); 


    });


Route::controller(LivroController::class)->group(function () {
    Route::get('/livros', 'get');                              // Lista todos os livros
    Route::get('/livros-completos', 'livrosCompletos');        // Lista com autor, genero, reviews
    Route::get('/livros/{id}', 'details');                     // Detalhes de um livro
    Route::get('/livros/{id}/review', 'reviews');              // Reviews de um livro
    Route::post('/livros', 'store');                           // Cadastrar livro
    Route::patch('/livros/{id}', 'update');                    // Atualizar livro
    Route::delete('/livros/{id}', 'delete');                   // Deletar livro
});


Route::controller(ReviewController::class)->group(function (){
        Route::get('/reviews', 'get');
        Route::get('/reviews/{id}', 'details');
        Route::post('/reviews', 'store');
        Route::patch('/reviews/{id}', 'update');
        Route::delete('/reviews/{id}', 'delete');

    });