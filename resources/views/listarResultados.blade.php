@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
            @foreach ($perguntas as $questao)
                <div class="row">
                    <div class="col-md-8 col-md-offset-2">
                        <div class="panel panel-default">
                            <div class="panel-heading"><h2>{{ $questao->tituloPergunta }}</h2></div>
                            <div class="panel-body">
                                <table class="table table-striped">
                                    <thead > 
                                        <tr>
                                          <th scope="col">Alternativa</th>
                                          <th scope="col">Votos</th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        @foreach ($respostas as $results)
                                             @if ($results['idPergunta'] == $questao->id)
                                                <tr>
                                                  <th scope="row">{{$results['respostas']}}</th>
                                                  <td>{{$results['votos']}}</td>
                                                </tr>
                                            @endif
                                        @endforeach
                                    </tbody>
                                </table>

                                
                            </div>
                        </div>
                    </div>
                </div>
            @endforeach
        @endif
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
