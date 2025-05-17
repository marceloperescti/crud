<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\curso;

class cursoController extends Controller
{
    public function index() 
    {
       $rows = Curso::all();
       return view ("admin.cursos.index", compact("rows")); 
    }

    public function excluir($id) {
      // repare que ele recebe o id da ROTA
      Curso::find($id)->delete();
      // apos selecionar o registro, é chamado o       
      // método DELETE do OBJETO registro
      // é mapeado internamente como um 'delete from'
      // interno que rodara no BD
      return redirect()->route('admin.cursos');
      // abre a visão da lista de cursos
    }
    
    public function editar($id) {
      // repare que ele recebe o id da ROTA
      $linha = Curso::find($id);
      // carrega o registro (realiza um select e um fetch internamente)
      return view('admin.cursos.editar',compact('linha'));
      // manda o registro encontrado para ser editado na visão
    }

    public function salvar(Request $req) 
    {     
     $dados = $req->all();
     if (isset($dados['publicado'])) {
         $dados['publicado'] = 'sim';
     } else {
         $dados['publicado'] = 'nao';
     }
     if ($req->hasFile('arquivo')) {
       $imagem = $req->file('arquivo');
       $num = rand(1111,9999);
       $dir = "img/cursos/";
       $ex = $imagem->guessClientExtension();
       $nomeImagem = "imagem_".$num.".".$ex;
       $imagem->move($dir,$nomeImagem);
       $dados['imagem'] = $dir."/".$nomeImagem;
     }
     Curso::create($dados);
     return redirect()->route('admin.cursos');
    }

    public function atualizar(Request $req, $id)
    {
     $dados = $req->all();
     if(isset($dados['publicado'])){
        $dados['publicado'] = 'sim';
     }else{
        $dados['publicado'] = 'não';
     }
     if($req->hasFile('arquivo')){
        $imagem = $req->file('arquivo');
        $num = rand(1111,9999);
        $dir = "img/cursos/";
        $ex = $imagem->guessClientExtension();
        $nomeImagem = "imagem_".$num.".".$ex;
        $imagem->move($dir,$nomeImagem);
        $dados['imagem'] = $dir."/".$nomeImagem;
     }
     Curso::create($dados);
     return redirect()->route('admin.cursos');
    }

    public function adicionar() {
      return view('admin.cursos.adicionar');
    }  
}