<?php 

	namespace App\Http\Controllers;

	use Illuminate\Support\Facades\DB;
	use Illuminate\Http\Request;

	use App\questoes;
	use App\respostas;

  	class questoesController extends Controller{

  		public function listarResultados(){
  			$perguntas = questoes::all();
  			$respostas = respostas::all();
  			return view('listarResultados',['perguntas'=>$perguntas, 'respostas'=>$respostas]);
  		}

  		public function listarPerguntas(){
			$perguntas = questoes::all();
	    	return view('listaPerguntas',['perguntas' => $perguntas]);
  		}
	    
	    public function votar(Request $request, $id){
	    	if (empty($_POST)){
	    		$pergunta = questoes::find($id);
	    		if (empty($pergunta)){
	    			return "Não há questão com o id $id!";
	    		}
	    		else{
	    			$alternativas = respostas::where('idPergunta', $id)->get();
	    			
	    			return view('responderPergunta',['Questao' => $pergunta->tituloPergunta,
	    											 'Alternativas' => $alternativas]);
	    		}
	    	}
	    	else{

	    		$adicinarVoto = respostas::find($request->alternativa);
	    		$adicinarVoto->votos = $adicinarVoto->votos + 1;
	    		$adicinarVoto->save();
	    		return redirect()->route('listarQuestoes');
	    	}
	    }

	    public function cadastrar(Request $request){

	    	if (!empty($_POST)){

	    		$novaPergunta = new questoes;
	    		$novaPergunta->tituloPergunta = $request->pergunta;
	    		$novaPergunta->save();

			    $Alternativas = $request->field_name;
			    foreach ($Alternativas as $valor) {
			    	$novaAlterativa = new respostas;
			    	$novaAlterativa->idPergunta = $novaPergunta->id;
			    	$novaAlterativa->respostas = $valor;
			    	$novaAlterativa->save();
			    }
			    redirect('home');
			}

	    	return view("cadQuestoes");

	    }

	}

 ?>
