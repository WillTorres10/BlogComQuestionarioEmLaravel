@extends('layouts.app')

@section('content')
<div class="container">
     @if (Auth::user()->Admin == 1)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Adminstração</div>
                <div class="panel-body">
                	<h3>Questionário</h3>
                    <ul>
                        <li><a href="{{ route('cadastrarQuestoes') }}">Cadastrar Questionário</a></li>
                        <li><a href="{{ route('editarQuestionario') }}">Editar Questionário</a></li>
                        <li><a href="{{ route('listarResultados') }}">Vizualizar Resultados</a></li>
                        <li><a href="{{ route('deletarQuestionario') }}">Deletar Questionário</a></li>
                    </ul>
                    <h3>Postagens</h3>
                    <ul>
                        <li><a href="{{ route('cadastrarPostagens') }}">Cadastrar Postagem</a></li>
                        <li><a href="{{ route('editarPostagens') }}">Editar Postagens</a></li>
                        <li><a href="{{ route('deletarPostagem') }}">Deletar Postagens</a></li>
                    </ul>
                </div>
            </div>
        </div>
    </div>
    @endif  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Painel</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('listarQuestoes') }}">Listar Questões</a>

                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
