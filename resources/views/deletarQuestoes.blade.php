@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Deletar Questões</div>
                    <div class="panel-body text-center">
                         <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        @if ($sucesso == true)
    						<div class="alert alert-success">
                              	<strong>Sucesso!</strong> Operação realizada com sucesso.
                            </div>
                        @endif
						<select class="custom-select custom-select-lg mb-3" size="15" style="width:90%;" name="selecionarQuestao">                                	
                            @foreach( $questoes as $quest)
                            	<option value="{{$quest->id}}">{{$quest->tituloPergunta}}</option>
                        	@endforeach
                        </select><br><br>
                        <button type="submit" class="btn btn-primary mb-2">Deletar</button>
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
