@extends('layout.site')
@section('titulo','Cursos')
@section('conteudo')
    <div class="container">
        <div class="row">
            <h3 class="center">Adicionar Curso</h3>
            <form class="" action="{{route('admin.cursos.salvar')}}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }}
                @include('admin.cursos._form') 
                <button class="btn deep-orange">Salvar</button> 
            </form>
        </div>
    </div>
@endsection