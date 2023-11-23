@extends('layouts.app')
@section('content')
    <h1 class="titolo">Dettagli Auto cliente</h1>
    <div class="container mt-5">
        <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">Modello</th>
                            <th scope="col">Targa</th>
                            <th scope="col">Numero del telaio</th>
                            <th scope="col">Marca</th>
                            <th scope="col">Anno</th>
                            <th scope="col">Chilometri</th>
                            <th scope="col">Note</th>
                            <th scope="col">Data dell'intervento</th>
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
                            <td>
                                <a class="btn btn-primary" href="{{ route('clienti.auto.edit', ['cliente' => $cliente->id, 'auto' => $auto->id]) }}">
                                    Modifica Auto
                                </a>
                            </td>
                            <td>
                                <form method="POST" action="{{ route('clienti.auto.destroy', ['cliente' => $cliente->id, 'auto' => $auto->id]) }}">
                                    @csrf
                                    @method('DELETE')
                                    <button class="btn btn-danger" type="submit">
                                        Elimina Auto
                                    </button>
                                </form>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
            
            
            <div class="col-md-6 mt-3">
                <a href="{{ route('clienti.auto.create', $cliente->id)}}" class="btn btn-primary">aggiungi un altra auto</a> 
            </div>
            <div class="col-md-6 mt-3">
                <a href="{{ route('clienti.index') }}" class="btn btn-primary">Torna all'elenco dei clienti</a> 
            </div>

            {{-- <form method="POST" action="{{ route('clienti.destroy', $cliente->id) }}" class="row mt-4">
                @csrf
                @method('DELETE')
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-danger">Elimina Cliente</button>
                </div>
                
            </form> --}}
        </div>
    </div>
@endsection

