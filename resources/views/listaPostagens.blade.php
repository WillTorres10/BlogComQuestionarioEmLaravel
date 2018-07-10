@extends('layouts.app')

@section('content')
<div class="container">
	@foreach ($postagens as $post)
        <div class="row">
            <div class="col-md-8 col-md-offset-2">
                <div class="panel panel-default">
                    <div class="panel-heading"><h4>{{ $post->titulo }}</h4></div>
                    <div class="panel-body">
						<div class="col-md-8">
							<p>{{ $post->conteudo }}</p>
						</div>
                    </div>
                </div>
            </div>
        </div>
     @endforeach
</div>
<script src="{{ asset('js/cadastrarQuestoes.js') }}"></script>

@endsection
