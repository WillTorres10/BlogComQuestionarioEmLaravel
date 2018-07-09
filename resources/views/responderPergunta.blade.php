@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h2>{{$Questao}}</h2></center></div>
                    <div class="panel-body">
                        <center>
                        <form method="POST">
                            {{ csrf_field() }}
                            @foreach ($Alternativas as $alter)

                                <div class="form-check">
                                    <input class="form-check-input" type="radio" name="alternativa" 
                                    id="exampleRadios1" value="{{ $alter->id }}">
                                    <label class="form-check-label">
                                    {{ $alter->respostas }}
                                    </label>
                                </div>
                            @endforeach
                            <br>
                            <button type="submit" class="btn btn-primary">
                                Votar
                            </button>
                        </form>
                    </center>
                    <a href="/listarQuestoes">Selecionar outra pergunta</a>
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
