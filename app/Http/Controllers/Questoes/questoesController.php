<?php namespace App\Http\Controllers;

  use Illuminate\Support\Facades\DB;
  use App\questoes;
  class questoesController extends Controller{
    
    function listar(){
      $data = questoes::all();
      echo "<pre>";
    }
  }

 ?>
