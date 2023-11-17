@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="">
    <title>Lista Clienti</title>
</head>

<body>
<div class="container">
    @if (Route::has('login'))
    <div class="pt-3">
        @auth
            <form method="POST" action="{{ route('logout') }}">
                @csrf
                <button type="submit" class="btn btn-secondary">Logout</button>
            </form>
        @endauth
    </div>
@endif

</div>
<div class="container">
    <h1 class="titolo">Benvenuto nel gestionale {{ Auth::user()->name }}</h1>
    <div class="row">
        <div class="col-md-4">         
        </div>
        <div class="col-md-4">
            <a class="btn btn-primary flex1 mt-3" href="{{ route('clienti.create') }}">
                Aggiungi Cliente
            </a>
        </div>
        <div class="col-md-4">
        </div>
    </div>
</div>
  

@foreach ($clienti as $cliente)
    <div class="container">   
        <div class="row mt-5">
            <div class="col-md-4">
                <a class="btn btn-primary flex1" href="{{ route('clienti.edit', $cliente->id) }}"> 
                    Modifica Cliente
                </a>
            </div>
        
            <div class="col-md-4">
                <a class="btn btn-primary flex1" href="{{ route('clienti.show', $cliente->id) }}">
                    Mostra Cliente
                </a>
            </div>
        
            <div class="col-md-4">
                <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}" class="flex1">
                    @csrf
                    @method('DELETE')
                    <button class="btn btn-danger" type="submit">
                        Elimina Cliente
                    </button>
                </form>
            </div>
        </div>
    </div>
@endforeach
</body>


