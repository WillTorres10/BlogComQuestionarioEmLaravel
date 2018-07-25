@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h2>Resultados Quiz: <strong>{{ $Quiz['Titulo'] }}</strong></h2></div>
                            <div class="panel-body">
                                @foreach ($Perguntas as $perg)
                                <table class="table table-striped">
                                    <caption><h3>{{$perg['Pergunta']->tituloPergunta}}</h3></caption>
                                    <thead > 
                                        <tr>
                                          <th scope="col">Alternativa</th>
                                          <th scope="col">Votos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($perg['Respostas'] as $resp)
                                        <tr>
                                          <th scope="row">{{ $resp->respostas }}</th>
                                          <td>{{ $resp->votos }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                @endforeach
                                <div class="form-group">
                                    <table class="table table-striped">
                                        <caption><h3>Visualizações</h3></caption>
                                    <thead > 
                                        <tr>
                                          <th scope="col">Nome</th>
                                          <th scope="col">Email</th>
                                          <th scope="col">Vezes</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($visualizacoes as $visu)
                                        <tr>
                                          <th scope="row">{{ $visu['nome'] }}</th>
                                          <td>{{ $visu['email'] }}</td>
                                          <td>{{ $visu['vezes'] }}</td>
                                        </tr>
                                        @endforeach
                                    </tbody>
                                </table>
                                </div>
                            <div class="col-md-12 text-center">
                                    <a href="/listarQuiz">Vizualizar outros Quizes</a>
                                </div>
                            </div>
                                
                        </div>
                    </div>
                </div>
        @endif
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
