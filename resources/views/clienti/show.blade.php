
@extends('layouts.app')
@section('content')
    <h1 class="titolo">Dettagli Cliente</h1>
    <div class="container mt-5">
        <div class="row">
            <table>
                <tbody>
                    <tr>
                        <th>Nome:</th>
                        <td>{{ $cliente->nome }}</td>
                    </tr>
                    <tr>
                        <th>Cognome:</th>
                        <td>{{ $cliente->cognome }}</td>
                    </tr>
                    <tr>
                        <th>Email:</th>
                        <td>{{ $cliente->email }}</td>
                    </tr>
                    <tr>
                        <th>Telefono:</th>
                        <td>{{ $cliente->telefono }}</td>
                    </tr>
                    <tr>
                        <th>Codicefiscale:</th>
                        <td>{{ $cliente->codice_fiscale }}</td>
                    </tr>
                    @foreach ($cliente->auto as $auto)
                    <tr>
                        <th>Modello:</th>
                        <td>{{ $auto->modello }}</td>
                    </tr>
                    <tr>
                        <th>Targa:</th>
                        <td>{{ $auto->targa }}</td>
                    </tr>
                    <tr>
                        <th>Numero del telaio:</th>
                        <td>{{ $auto->n_telaio }}</td>
                    </tr>
                    <tr>
                        <th>Marca:</th>
                        <td>{{ $auto->marca }}</td>
                    </tr>
                    <tr>
                        <th>Anno:</th>
                        <td>{{ $auto->anno }}</td>
                    </tr>
                    <tr>
                        <th>Chilometri:</th>
                        <td>{{ $auto->chilometri }}</td>
                    </tr>
                    <tr>
                        <th>Dettagli dell intervento / stato:</th>
                        <td>{{ $auto->note_stato }}</td>
                    </tr>
                    <tr>
                        <th>Data dell'intervento:</th>
                        <td>{{ $auto->data_intervento }}</td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}" class="mt-4">
                @csrf
                @method('DELETE')
                <button type="submit" class="btn btn-danger">Elimina Cliente</button>
                <a href="{{ route('clienti.index') }}" class="btn btn-primary">Torna all'elenco dei clienti</a> 
            </form>
        </div>
    </div>
    
@endsection
