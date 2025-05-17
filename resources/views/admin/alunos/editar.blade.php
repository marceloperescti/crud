@extends('layout.site')
@section('titulo','Alunos')
@section('conteudo')
    <div class="container">
        <div class="row">
            <h3 class="center">Editando Aluno</h3>
            <form class="" action="{{route('admin.alunos.atualizar', $linha->id)}}"
                method="post" enctype="multipart/form-data">
                {{ csrf_field() }} 
                <input type="hidden" name="_method" value="put"> 
                @include('admin.alunos._form')
                <button class="btn deep-orange">Atualizar</button>
            </form>
        </div>
    </div>
@endsection