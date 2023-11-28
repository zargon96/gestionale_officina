@extends('layouts.app')
@section('content')
    <h1 class="titolo">Dettagli intervento cliente {{$auto->cliente->nome}} {{$auto->cliente->cognome}}</h1> 
    <div class="container mt-5">
        <div class="row">
                <table>
                    <thead>
                        <tr>
                            <th scope="col">note intervento</th>
                            <th scope="col">data intervento</th>
                            <th scope="col">Modifica intervento</th>
                            <th scope="col">Elimina intervento</th>
                        </tr>
                    </thead>
                    <tbody>
                    @foreach ($auto->interventi as $intervento)
                        <tr>
                            <td>{{ $intervento->note_stato }}</td>
                            <td>{{ $intervento->data_intervento }}</td>
                            <td>
                                <a class="btn btn-primary mt-3" href="{{ route('intervento.edit',['cliente_id' => $auto->cliente->id, 'auto_id' => $auto->id,'intervento_id' => $intervento->id]) }}">
                                    Modifica intervento
                                </a>
                            </td>
                            <td>

                                <button type="button" class="btn btn-danger mt-3" data-bs-toggle="modal" data-bs-target="#staticBackdrop">
                                    Elimina intervento
                                </button>
                            
                        
                                <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
                                    <div class="modal-dialog">
                                        <div class="modal-content" style="background-color: #293133">
                                            <div class="modal-header">
                                            <h1 class="modal-title fs-5" id="staticBackdropLabel">Attenzione!</h1>
                                            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                                            </div>
                                            <div class="modal-body">
                                                Sei sicuro di voler eliminare l'intervento del cliente {{$auto->cliente->nome}} {{$auto->cliente->cognome}}?
                                            </div>
                                            <div class="modal-footer">
                                            <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Annulla</button>
                                                <form method="POST" action="{{ route('intervento.destroy',['cliente_id' => $auto->cliente->id, 'auto_id' => $auto->id,'intervento_id' => $intervento->id]) }}">
                                                    @csrf
                                                    @method('DELETE')
                                                    <button class="btn btn-danger" type="submit">
                                                        Elimina intervento
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
                <a href="{{ route('intervento.create',['cliente_id' => $auto->cliente->id, 'auto_id' => $auto->id])}}" class="btn btn-primary">aggiungi un altro intervento</a> 
            </div>
            <div class="col-md-6 mt-3">
                <a href="{{ route('clienti.index') }}" class="btn btn-primary">Torna all'elenco dei clienti</a> 
            </div>
        </div>
    </div>
@endsection