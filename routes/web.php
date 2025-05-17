<?php

use Illuminate\Support\Facades\Route;

Route::get('/admin/cursos',
['as' =>'admin.cursos',
'uses'=>'App\Http\Controllers\Admin\cursoController@index']);

Route::get('/admin/cursos/adicionar',
['as' =>'admin.cursos.adicionar',
'uses'=>'App\Http\Controllers\Admin\cursoController@adicionar']);

Route::post('/admin/cursos/salvar',
['as' =>'admin.cursos.salvar',
'uses'=>'App\Http\Controllers\Admin\cursoController@salvar']);

Route::get('/admin/cursos/editar/{id}',
['as' =>'admin.cursos.editar',
'uses'=>'App\Http\Controllers\Admin\cursoController@editar']);

Route::put('/admin/cursos/atualizar/{id}',
['as' =>'admin.cursos.atualizar',
'uses'=>'App\Http\Controllers\Admin\cursoController@atualizar']);

Route::get('/admin/cursos/excluir/{id}',
['as' =>'admin.cursos.excluir',
'uses'=>'App\Http\Controllers\Admin\cursoController@excluir']);

Route::get('/admin/alunos',
['as' =>'admin.alunos',
'uses'=>'App\Http\Controllers\Admin\alunoController@index']);

Route::get('/admin/alunos/adicionar',
['as' =>'admin.alunos.adicionar',
'uses'=>'App\Http\Controllers\Admin\alunoController@adicionar']);

Route::post('/admin/alunos/salvar',
['as' =>'admin.alunos.salvar',
'uses'=>'App\Http\Controllers\Admin\alunoController@salvar']);

Route::get('/admin/alunos/editar/{id}',
['as' =>'admin.alunos.editar',
'uses'=>'App\Http\Controllers\Admin\alunoController@editar']);

Route::put('/admin/alunos/atualizar/{id}',
['as' =>'admin.alunos.atualizar',
'uses'=>'App\Http\Controllers\Admin\alunoController@atualizar']);

Route::get('/admin/alunos/excluir/{id}',
['as' =>'admin.alunos.excluir',
'uses'=>'App\Http\Controllers\Admin\alunoController@excluir']);