@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Questões cadastradas</div>
                    <div class="panel-body">
                        @foreach ($perguntas as $questao)
                            <a href="/responderQuestoes/{{ $questao->id }}">{{ $questao->tituloPergunta }}</a>
                            <br>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
