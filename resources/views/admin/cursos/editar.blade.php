@extends('layout.site')
@section('titulo','Cursos')
@section('conteudo')
    <div class="container">
        <div class="row">
            <h3 class="center">Editando Curso</h3>
            <form class="" action="{{route('admin.cursos.atualizar', $linha->id)}}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="_method" value="put"> 
                @include('admin.cursos._form')
                <button class="btn deep-orange">Atualizar</button>
            </form>
        </div>
    </div>
@endsection