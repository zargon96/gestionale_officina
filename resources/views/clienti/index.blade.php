@extends('layouts.app')
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="">
    <title>Lista Clienti</title>
</head>

<body>
@section('content')
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
<h2 class="titolo">Lista clienti</h2>
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
        
                                <button type="button" class="btn btn-danger" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Elimina Cliente
                                </button>
                            
                        
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: #293133">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Attenzione!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare il cliente?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Elimina Cliente
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </td>
                        </tr>
                        <tr>
                            <td colspan="9">
                                <h3>Interventi</h3>
                                @foreach ($cliente->auto as $auto)
                                    <h4>Auto: {{ $auto->cliente->nome }} {{ $auto->cliente->cognome }}</h4>
                                    <ul>
                                        @foreach ($auto->interventi as $intervento)
                                            <li>{{ $intervento->note_stato }} - {{ $intervento->data_intervento }}</li>
                                        @endforeach
                                    </ul>
                                @endforeach
                            </td>
                        </tr>
                     @endforeach
                </tbody>
            </table>
        </div>
    </div>
@endsection
</body>


