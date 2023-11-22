@extends('layouts.app')
@section('content')
    <h1 class="titolo">Dettagli Cliente</h1>
    <div class="container mt-5">
        <div class="row">
            <table class="">
                <tbody>
                    <tr>
                        <td>Nome</td>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                    <tr>
                        <td>Cognome</td>
                        <td>{{ $cliente->cognome }}</td>
                    </tr>
                    <tr>
                        <td>Email</td>
                        <td>{{ $cliente->email }}</td>
                    </tr>
                    <tr>
                        <td>Telefono</td>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <td>Codice fiscale</td>
                        <td>{{ $cliente->codice_fiscale }}</td>
                    </tr>
                </tbody>
            </table>

            <table class="mt-4">
                <thead>
                    <tr>
                        <th>Modello</th>
                        <th>Targa</th>
                        <th>Numero del telaio</th>
                        <th>Marca</th>
                        <th>Anno</th>
                        <th>Chilometri</th>
                        <th>Dettagli intervento / stato</th>
                        <th>Data intervento</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($cliente->auto as $auto)
                        <tr>
                            <td>{{ $auto->modello }}</td>
                            <td>{{ $auto->targa }}</td>
                            <td>{{ $auto->n_telaio }}</td>
                            <td>{{ $auto->marca }}</td>
                            <td>{{ $auto->anno }}</td>
                            <td>{{ $auto->chilometri }}</td>
                            <td>{{ $auto->note_stato }}</td>
                            <td>{{ $auto->data_intervento }}</td>
                        </tr>
                    @endforeach
                </tbody>
            </table>

            <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}" class="row mt-4">
                @csrf
                @method('DELETE')
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-danger">Elimina Cliente</button>
                </div>
                <div class="col-md-6 mt-3">
                    <a href="{{ route('clienti.index') }}" class="btn btn-primary">Torna all'elenco dei clienti</a> 
                </div>
            </form>
        </div>
    </div>
@endsection

