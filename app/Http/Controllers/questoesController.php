<?php 

    namespace App\Http\Controllers;

    use Illuminate\Support\Facades\DB;
    use Illuminate\Http\Request;

    use App\questoes;
    use App\respostas;
    use App\quiz;

    class questoesController extends Controller{

        public function editarQuestao(Request $request, $quiz, $id){
            if(empty($_POST)){
                $questao = questoes::find($id);
                $respostas = respostas::where('idPergunta',$id)->get();
                $dados = ['questoes'=>$questao, 'respostas'=>$respostas];
                return view('editarQuestoes',$dados);
            }
            else{
                $idEditar = $request['idQuestao'];
                $questao = questoes::find($idEditar);
                $questao->tituloPergunta = $request['pergunta'];
                $questao->save();
                $Alternativas = $request->field_name;
                $respostasAntigas = respostas::where('idPergunta', $idEditar);
                /*
                 * 1º Seleciono todas as respostas que possuem o idPergunta equevalente ao que estou editando
                 * 2º Busco dentre as rows selecionadas quais tem a quantidade votos zero
                 * 3º Atualizo o valor de votos para -1
                 * */
                $respo = respostas::where('idPergunta',$idEditar)->where('votos',"0")->update(['votos' => -1]);;
                foreach ($Alternativas as $alter){
                    /*
                     * 4º Percorro a lista de alternativas que chegou do cliente
                     * 5º Percorro a lista de respostas procurando as rows que possuem o idPerguntas = id que 
                     * estou etidando, quantidade de votos difrentes de -zero e o campo respostas que corresponda
                     * ao texto da alternativa
                     * 6º Conto a quantidade de elementos que vem na query anterioir, se for igual a zero ele 
                     * cria um novo objeto e salva
                     * 7º caso a quantidade d elementos encontrada na query seja diferente de zero eu 
                     * dou um update nele para por o valor zero
                     * */
                    $teste = respostas::where('idPergunta',$idEditar)->where('votos','<>','0')
                                        ->where('respostas',$alter)->get();
                if($teste->count() == 0){  	                    
                    $novaAlterativa = new respostas;
                    $novaAlterativa->idPergunta = $idEditar;
                    $novaAlterativa->respostas = $alter;
                    $novaAlterativa->save();
                    }
                    else{
                        respostas::where('idPergunta',$idEditar)->where('votos','=','-1')
                        ->where('respostas',$alter)->update(['votos'=>0]);
                    }

                }
                $deletar = respostas::where('idPergunta',$idEditar)->where('votos',-1)->delete();

                return redirect()->route('verQuiz', ['id' => $quiz]);
            }
        }

        public function deletarQuestao(Request $request, $quiz, $id){
            $repostas = respostas::where('idPergunta', $id)->delete();
            $questao = questoes::find($id)->delete();
            return redirect()->route('verQuiz', ['id' => $quiz]);
        }

        public function cadastrar(Request $request, $id){

            if (!empty($_POST)){
                $novaPergunta = new questoes;
                $novaPergunta->tituloPergunta = $request->pergunta;
                $novaPergunta->id_quiz = $request->IdQuiz;
                $novaPergunta->save();
                    $Alternativas = $request->field_name;
                    foreach ($Alternativas as $valor) {
                        $novaAlterativa = new respostas;
                        $novaAlterativa->idPergunta = $novaPergunta->id;
                        $novaAlterativa->respostas = $valor;
                        $novaAlterativa->save();
                    }
                    return redirect()->route('verQuiz', ['id' => $id]);
            }
            else{
                $quiz = quiz::find($id);
                $Dados = ['id'=>$id, 'titulo'=>$quiz->titulo];
                return view("cadQuestoes",$Dados);
            }
        }

    }

 ?>
