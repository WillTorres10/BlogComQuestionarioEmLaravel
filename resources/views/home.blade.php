@extends('layouts.app')

@section('content')
<div class="container">
     @if (Auth::user()->Admin == 1)
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Admin Part</div>
                <div class="panel-body">
                    <a href="{{ route('cadastrarQuestoes') }}">Cadastrar Questionario</a><br>
                    <a href="{{ route('listarResultados') }}">Vizualizar Resultados</a>
                    
                </div>
            </div>
        </div>
    </div>
    @endif  
    <div class="row">
        <div class="col-md-8 col-md-offset-2">
            <div class="panel panel-default">
                <div class="panel-heading">Dashboard</div>
                <div class="panel-body">
                    @if (session('status'))
                        <div class="alert alert-success">
                            {{ session('status') }}
                        </div>
                    @endif
                    <a href="{{ route('listarQuestoes') }}">Listar Questões</a>

                </div>
            </div>
        </div>    
    </div>
</div>
@endsection
