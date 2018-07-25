@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Questões</div>
                    <div class="panel-body">
                         <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        
                        <div class="form-group">
                            <label for="pergunta" class="col-md-4 control-label">ID Quiz</label>
                            <div class="col-md-6">
                                <input id="IdQuiz" type="text" class="form-control" name="IdQuiz" value="{{$id}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pergunta" class="col-md-4 control-label">Titulo Quiz</label>
                            <div class="col-md-6">
                                <input id="TituloQuiz" type="text" class="form-control" name="pergunta" value="{{$titulo}}" readonly>
                            </div>
                        </div>
                        <div class="form-group">
                            <label for="pergunta" class="col-md-4 control-label">Pergunta</label>
                            <div class="col-md-6">
                                <input id="pergunta" type="text" class="form-control" name="pergunta" value="{{ old('name') }}" required autofocus>
                            </div>
                        </div>

                        <div class=" form-group">
                            <label class="col-md-4 control-label">Alternativas</label>
                            <div class="col-md-6 field_wrapper"> 
                                <input type="text" name="field_name[]" class="form-control" value=""/><a href="javascript:void(0);" class="add_button" title="Adicionar mais uma alternativa">Adicionar mais uma alternativa</a>
                                
                            </div>
                        </div>                       

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit" class="btn btn-primary">
                                    Register
                                </button>
                            </div>
                        </div>
                    </form>

                    </div>
                </div>
            </div>
        </div>
    @endif
    @endguest
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
