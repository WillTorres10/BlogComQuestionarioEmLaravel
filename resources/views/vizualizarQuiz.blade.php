@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><center><h2>{{$Quiz['Titulo']}}</h2></center></div>
                    <div class="panel-body">
                        <form method="POST">
                            {{ csrf_field() }}
                            <div class="row">
                            <div class="form-group text-right">
                                <div class="col-md-12">
                                    <input id="IdQuiz" type="text" class="form-control" name="idQuiz" value="{{$Quiz['Id']}}" readonly>
                                </div>
                            </div>
                            @if (Auth::user()->Admin == 1)
                            <div class="form-group text-center">
                                 <div class="col-md-12">
                                    <a href="{{route('cadastrarQuestoes', ['id' => $Quiz['Id']])}}">Cadastrar Questão</a>
                                 </div>
                            </div>
                            @endif 
                            <br><br>
                            <h3 class="text-center">Questões</h3>
                            <div class="form-group">
                                @foreach ($Perguntas as $Perg)
                                <div class="col-md-12">
                                    <select class="form-control" name="quest{{$Perg['Pergunta']->id}}">
                                        <option disabled value="-1" selected>{{$Perg['Pergunta']->tituloPergunta}}</option>
                                        @foreach ($Perg['Respostas'] as $Resp)
                                        <option value="{{$Resp->id}}">{{$Resp->respostas}}</option>
                                        @endforeach
                                    </select>
                                </div>
                                <div class="col-md-12">
                                    @if (Auth::user()->Admin == 1)
                                    <a href="/editarQuestoes/{{ $Quiz['Id'] }}/{{ $Perg['Pergunta']->id }}">Alterar Questão</a> | 
                                    <a href="/deletarQuestoes/{{ $Quiz['Id'] }}/{{ $Perg['Pergunta']->id }}">Deletar Questão</a>
                                    @endif
                                <br>
                                </div>
                                @endforeach
                            </div>
                             <div class="form-group">
                                 <div class="col-md-12 text-center">
                                    <button type="submit" class="btn btn-primary">
                                        Votar
                                    </button>
                                 </div>
                                 <div class="col-md-12 text-center">
                                    <a href="/listarQuiz">Selecionar outro Quiz</a>
                                 </div>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    @endguest
</div>
@endsection

@section('script')
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>
@endsection