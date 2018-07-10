<?php

    namespace App\Http\Controllers;
    
    use Illuminate\Http\Request;
    use App\postagens;
    use Exception;
                    
    class PostagensController extends Controller{
        
        public function deletarPostagem(Request $request){
            $postagens = postagens::all();
            if(empty($_POST)){
                return view('editarPostagens', ['postagens'=>$postagens, 'selecionar'=>true, 'sucesso' => false, 'operacao'=>"Deletar", 'nomeBotao'=>'Selecionar']);
            }
            else{
                if(empty($request['titulo'])){
                    $editar = postagens::find($request['selecionarPostagem']);
                    return view('editarPostagens', ['postagens'=>$editar, 'selecionar'=>false, 'sucesso' => false, 'operacao'=>"Deletar", 'nomeBotao'=>'Deletar']);
                }
                else{
                    $editar = postagens::find($request['idPostagem']);
                    $editar->delete();
                    return view('editarPostagens', ['postagens'=>$postagens, 'selecionar'=>true, 'sucesso' => true, 'operacao'=>"Deletar", 'nomeBotao'=>'Atualizar']);
                }
            }
        }
        
        public function editarPostagem(Request $request){
            if(empty($_POST)){
                $postagens = postagens::all();
                return view('editarPostagens', ['postagens'=>$postagens, 'selecionar'=>true, 'sucesso' => false, 'operacao'=>"Editar", 'nomeBotao'=>'Selecionar']);
            }
            else{
                if(empty($request['titulo'])){
                    $editar = postagens::find($request['selecionarPostagem']);
                    return view('editarPostagens', ['postagens'=>$editar, 'selecionar'=>false, 'sucesso' => false, 'operacao'=>"Editar", 'nomeBotao'=>'Atualizar']);
                }
                else{
                    $editar = postagens::find($request['idPostagem']);
                    $editar->titulo = $request['titulo'];
                    $editar->conteudo = $request['conteudo'];
                    $editar->save();
                    return view('editarPostagens', ['postagens'=>$editar, 'selecionar'=>false, 'sucesso' => true, 'operacao'=>"Editar", 'nomeBotao'=>'Atualizar']);
                }
            }
        }
        
        public function listarPostagens(){
            $postagens = postagens::all();
            return view('listaPostagens',['postagens'=>$postagens]);
        }
        
        public function cadastrarPostagem(Request $request){
            if(empty($_POST)){
                return view('cadPostagens',['sucesso'=>false, 'falha'=>false]);
            }
            else{
                try {
                    $novaPostagem = new postagens;
                    $novaPostagem->titulo = $request['titulo'];
                    $novaPostagem->conteudo = $request['conteudo'];
                    $novaPostagem->save();
                    return view('cadPostagens',['sucesso'=>true, 'falha'=>false]);
                } catch (Exception $e) {
                    return view('cadPostagens',['sucesso'=>false, 'falha'=>true]);
                }
            }
        }
    }
