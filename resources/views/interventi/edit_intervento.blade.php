@extends('layouts.app')
@section('content')
<h1 class="titolo">Modifica Intervento {{$auto->cliente->nome}} {{$auto->cliente->cognome}}</h1>
<div class="container">
    <form method="POST" action="{{ route('intervento.update', ['cliente_id' => $auto->cliente->id, 'auto_id' => $auto->id])}}" class="row">
        @csrf
        <h3 class="titolo">Dati Anagrafici</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="note_stato">nota intevento</label>
                <input type="text" name="note_stato" id="note_stato" value="{{ $intervento->note_stato }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="data_intervento">data_intervento</label>
                <input type="data" name="data_intervento" id="data_intervento" value="{{ $intervento->data_intervento }}" class="form-control">
            </div>
        </div>
        <div class="row">
            <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>   
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
            </div>
        </div>   
    </form>
</div>
    
@endsection 