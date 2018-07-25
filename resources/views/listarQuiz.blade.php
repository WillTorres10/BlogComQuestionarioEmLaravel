@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Quizes</div>
                    <div class="panel-body">
                        @if (Auth::user()->Admin == 1)
                        <div class="col-md-12">
                            <div class="row"><h4>Ferramentas</h4></div>
                            <div class="row">
                                <a href="{{ route('cadastrarQuiz') }}">Cadastrar Quiz</a>
                                <br><br>
                            </div>
                        </div>
                        @endif
                        @foreach ($perguntas as $questao)
                        <div class="col-md-12">
                            <a href="/verQuiz/{{ $questao->id }}"><input class="form-control form-control-lg" type="text" value="{{ $questao->titulo }}" placeholder=".form-control-lg" onlyread ></a>
                        </div>
                        @if (Auth::user()->Admin == 1)
                        <div class="col-md-12">
                            <a href="/editQuiz/{{ $questao->id }}">Editar Quiz</a> | 
                            <a href="/deleteQuiz/{{ $questao->id }}">Deletar Quiz</a> | 
                            <a href="/resultadoQuiz/{{ $questao->id }}">Visualizar resultado</a>
                        </div>
                        @endif
                        <br><br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
@endsection
