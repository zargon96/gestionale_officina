@extends('layouts.app')
@section('content')
    <h1 class="titolo">Dettagli Auto cliente {{$cliente->nome}} {{$cliente->cognome}}</h1>
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
                                <a class="btn btn-primary mt-3" href="{{ route('clienti.auto.edit', ['cliente_id' => $cliente->id, 'auto_id' => $auto->id]) }}">
                                    Modifica Auto
                                </a>
                            </td>
                            <td>

                                <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Elimina Auto
                                </button>
                            
                        
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: #293133">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Attenzione!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare l'auto del cliente {{$cliente->nome}} {{$cliente->cognome}}?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form method="POST" action="{{ route('clienti.auto.destroy', ['cliente' => $cliente->id, 'auto' => $auto->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Elimina Auto
                                                    </button>
                                                </form>
                                            </div>
                                        </div>
                                    </div>
                                </div>
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

