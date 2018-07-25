@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading" id="tituloQuiz">Cadastrar novo quiz</div>
                    <div class="panel-body">
                        <form class="form-horizontal" method="POST" autocomplete="off">
                        {{ csrf_field() }}
                        @if ($sucesso == true)
    						<div class="alert alert-success">
                              	<strong>Sucesso!</strong> O seu quiz foi publicado com sucesso.
                            </div>
                        @endif
                        @if ($falha == true)
    						<div class="alert alert-warning">
                              	<strong>Atenção!</strong> Houve um erro ao tentar cadastrar. Verifique se está tudo preenchido
                            </div>
                        @endif
                        <div class="form-group">
                        	<div class="col-md-2"></div>
                        	<div class="col-md-8">
                            	<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título do Quiz" required autofocus><br>
                                <button class="btn btn-primary">Avançar</button>
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
@endsection