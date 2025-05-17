<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Aluno;
use App\Models\Curso;

class alunoController extends Controller
{
    public function index() 
    {
       $rows = Aluno::all();
       return view ("admin.alunos.index", compact("rows")); 
    }

    public function excluir($id) {
      // repare que ele recebe o id da ROTA
      Aluno::find($id)->delete();
      // apos selecionar o registro, é chamado o       
      // método DELETE do OBJETO registro
      // é mapeado internamente como um 'delete from'
      // interno que rodara no BD
      return redirect()->route('admin.alunos');
      // abre a visão da lista de cursos
    }
    
    public function editar($id) {
      // repare que ele recebe o id da ROTA
      $linha = Aluno::find($id);
      $cursos = Curso::all();      
      // carrega o registro (realiza um select e um fetch internamente)
      return view('admin.alunos.editar',compact('linha','cursos'));
      // manda o registro encontrado para ser editado na visão
    }

    public function salvar(Request $req) 
    {     
     $dados = $req->all();

     if ($req->hasFile('arquivo')) {
       $imagem = $req->file('arquivo');
       $num = rand(1111,9999);
       $dir = "img/alunos/";
       $ex = $imagem->guessClientExtension();
       $nomeImagem = "imagem_".$num.".".$ex;
       $imagem->move($dir,$nomeImagem);
       $dados['imagem'] = $dir."/".$nomeImagem;
     }
     Aluno::create($dados);
     return redirect()->route('admin.alunos');
    }

    public function atualizar(Request $req, $id)
    {
     $dados = $req->all();

     if($req->hasFile('arquivo')){
        $imagem = $req->file('arquivo');
        $num = rand(1111,9999);
        $dir = "img/alunos/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
     }
     Aluno::create($dados);
     return redirect()->route('admin.alunos');
    }

    public function adicionar() 
    {
      $cursos = Curso::all()->where('publicado', '=', 'sim');
      return view('admin.alunos.adicionar',compact('cursos'));
    }  
}
