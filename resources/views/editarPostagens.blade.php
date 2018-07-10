@extends('layouts.app')

@section('content')
<div class="container">
    @guest

    @else
        @if (Auth::user()->Admin == 1)
            <div class="row">
                <div class="col-md-8 col-md-offset-2">
                    <div class="panel panel-default">
                        <div class="panel-heading">{{$operacao}} Postagem</div>
                        <div class="panel-body">
                             <form class="form-horizontal" method="POST">
                            {{ csrf_field() }}
                             @if ($sucesso == true)
        						<div class="alert alert-success">
                                  	<strong>Sucesso!</strong> Operação realizada com sucesso.
                                </div>
                            @endif
                            @if($selecionar==true)
                            <label>Selecione a postagem</label>
                            <div class="form-group text-center">
                            	<select class="custom-select custom-select-lg mb-3" size="15" style="width:90%;" name="selecionarPostagem">                                	
                                    @foreach( $postagens as $post)
                                    <option value="{{$post->id}}">{{$post->titulo}}</option>
                                	@endforeach
                                </select><br><br>
                        		<button type="submit" class="btn btn-primary mb-2">{{$nomeBotao}}</button>
                        	@endif
                        	@if($selecionar==false)
                            	<input value="{{$postagens->id}}" class="form-control" name="idPostagem" readonly><br>
                            	<input id="titulo" value="{{ $postagens->titulo }}" type="text" class="form-control" name="titulo" placeholder="Título da postagem" required autofocus><br>
                            	<textarea class="form-control" name="conteudo" rows="10" placeholder="Conteúdo" required>{{ $postagens->conteudo }}</textarea><br>
                        		<button type="submit" class="btn btn-primary mb-2">{{$nomeBotao}}</button>
                        	@endif
                        	
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
