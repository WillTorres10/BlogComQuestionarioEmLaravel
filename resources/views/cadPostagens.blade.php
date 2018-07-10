@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading">Cadastrar Postagem</div>
                    <div class="panel-body">
                         <form class="form-horizontal" method="POST">
                        {{ csrf_field() }}
                        @if ($sucesso == true)
    						<div class="alert alert-success">
                              	<strong>Sucesso!</strong> A sua postagem foi publicada com sucesso.
                            </div>
                        @endif
                        @if ($falha == true)
    						<div class="alert alert-warning">
                              	<strong>Atenção!</strong> Houve um erro ao tentar publicar. Verifique se está tudo preenchido
                            </div>
                        @endif
                        <div class="form-group">
                        	<div class="col-md-2"></div>
                        	<div class="col-md-8">
                            	<input id="titulo" type="text" class="form-control" name="titulo" placeholder="Título da postagem" required autofocus><br>
                            	<textarea class="form-control" name="conteudo" rows="10" placeholder="Conteúdo" required></textarea><br>
                        		<button type="submit" class="btn btn-primary mb-2">Publicar</button>
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
