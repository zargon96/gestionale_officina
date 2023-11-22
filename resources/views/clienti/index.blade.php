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
            </div>
           
            <div class="col-md-4">
               
            </div>
            <div class="col-md-4">
            </div>

        </div>
    </div>
@endforeach
<h2 class="titolo">Dettagli cliente</h2>
    <div class="container mt-5">
        <div class="row">
            <table>
                <thead>
                    <tr>
                        <th scope="col">Nome</th>
                        <th scope="col">Cognome</th>
                        <th scope="col">Email</th>
                        <th scope="col">Telefono</th>
                        <th scope="col">Codice Fiscale</th>
                        <th scope="col">Modifica Cliente</th>
                        <th scope="col">Mostra auto</th>
                        <th scope="col">Elimina Cliente</th>
                    </tr>
                </thead>
                <tbody>
                @foreach ($clienti as $cliente)
                    <tr>
                        <td>{{ $cliente->nome }}</td>
                        <td>{{ $cliente->cognome }}</td>
                        <td>{{ $cliente->email }}</td>
                        <td>{{ $cliente->telefono }}</td>
                        <td>{{ $cliente->codice_fiscale }}</td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('clienti.edit', $cliente->id) }}">
                                Modifica Cliente
                            </a>
                        </td>
                        <td>
                            <a class="btn btn-primary" href="{{ route('clienti.show', $cliente->id) }}">
                                Mostra Auto
                            </a>
                        </td>
                        <td>
                            <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}">
                                @csrf
                                @method('DELETE')
                                <button class="btn btn-danger mt-2" type="submit">
                                    Elimina Cliente
                                </button>
                            </form>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
</body>


