<?php

namespace App\Http\Controllers;
use Illuminate\Support\Facades\DB;
use Illuminate\Http\Request;
use App\questoes;
use App\respostas;
use App\quiz;
use App\visualizar;
use App\userr;

class quizController extends Controller{
    
    public function resultados($id){
        $Quiz = quiz::find($id);
        $DadosQuiz = ['Titulo'=>$Quiz->titulo,'Id'=>$Quiz->id];
        $questoes = questoes::where('id_quiz',$id)->get();
        $listaQuestoesRespostas = array();
        foreach ($questoes as $quest){
            $respostas = respostas::where('idPergunta',$quest->id)->get();
            $linha = ['Pergunta'=>$quest,'Respostas'=>$respostas];
            array_push($listaQuestoesRespostas, $linha);
        }
        $vizuacoes = visualizar::where('id_quiz',$id)->get();
        $listaVisualizacoes = array();
        foreach ($vizuacoes as $vizu){
            $user = userr::find($vizu->id_user);
            $linha = [
                'nome'=>$user->name,
                'email'=>$user->email,
                'vezes'=>$vizu->vezes
            ];
            array_push($listaVisualizacoes, $linha);
        }
        $dados = ['Quiz'=>$DadosQuiz, 'Perguntas'=>$listaQuestoesRespostas, 'visualizacoes'=>$listaVisualizacoes];
        return view('listarResultados', $dados);
    }
    
    public function deletar(Request $request, $id){
        $quiz = quiz::find($id);
        $perguntas = questoes::where('id_quiz',$id)->get();
        foreach ($perguntas as $perg){
            respostas::where('idPergunta',$perg->id)->delete();
        }
        $perguntas = questoes::where('id_quiz',$id)->delete();
        $quiz->delete();
        return redirect('/listarQuiz');
    }
    
    public function editar(Request $request, $id){
        if(empty($_POST)){
            $quiz = quiz::find($id);
            return view('editQuiz',['quiz' => $quiz]);
        }
        else{
            $quiz = quiz::find($id);
            $quiz->titulo = $_POST['titulo'];
            $quiz->save();
            return redirect('/verQuiz/'.$id);
        }
    }
    
    public function listarQuiz(){
        $QuizAbertos = quiz::all();
        return view('listarQuiz',['perguntas' => $QuizAbertos]);
    }
    
    public function verQuiz(Request $request, $id){
        if(empty($_POST)){
            //contador de visitas
            $user = auth()->user();
            $vizu = visualizar::all();
            $novo = 1;
            foreach ($vizu as $v){
                if(($v->id_quiz == $id)&&($v->id_user == $user->id)){
                    $atualizar = visualizar::find($v->id);
                    $atualizar->vezes = $atualizar->vezes + 1;
                    $atualizar->save();
                    $novo = 0;
                }
            }
            if($novo){
                $no = new visualizar;
                $no->id_quiz = $id;
                $no->id_user = $user->id;
                $no->vezes = 1;
                $no->save();
            }
            //exibindo quiz
            $Quiz = quiz::find($id);
            $DadosQuiz = ['Titulo'=>$Quiz->titulo,'Id'=>$Quiz->id];
            $questoes = questoes::where('id_quiz',$id)->get();
            $listaQuestoesRespostas = array();
            foreach ($questoes as $quest){
                $respostas = respostas::where('idPergunta',$quest->id)->get();
                $linha = ['Pergunta'=>$quest,'Respostas'=>$respostas];
                array_push($listaQuestoesRespostas, $linha);
            }
            $dados = ['Quiz'=>$DadosQuiz, 'Perguntas'=>$listaQuestoesRespostas];
            return view('vizualizarQuiz', $dados);
        }
        else{
            $questoes = questoes::where('id_quiz',$id)->get();
            foreach ($questoes as $quest){
                $postagem = "quest".strval($quest->id);
                if(!empty($request->$postagem)){
                    $resposta = respostas::find($request->$postagem);
                    $resposta->votos = $resposta->votos + 1;
                    $resposta->save();
                }
            }
            return redirect()->route('listarQuiz');
        }
    }
    
    public function cadastrar(Request $request){
        
        if(empty($_POST)){
            $dados = ['sucesso'=>FALSE, 'falha'=>false];
            return view('cadQuiz', $dados);
        }
        else{
            try {
                $Titulo = $request['titulo'];
                $novo = new quiz;
                $novo->titulo = $Titulo;
                $novo->save();
                $dados = ['sucesso'=>TRUE, 'falha'=>false];
                return redirect()->route('verQuiz', ['id' => $novo->id]);
            } catch (Exception $ex) {
                $dados = ['sucesso'=>FALSE, 'falha'=>TRUE];
                return view('cadQuiz', $dados);
            }
        }
    }
    
}
