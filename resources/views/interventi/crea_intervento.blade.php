@extends('layouts.app')

@section('content')
    <h1 class="titolo">Aggiungi Intervento</h1>
    <div class="container">
        <form action="{{ route('intervento.store', ['cliente_id' => $cliente->id, 'auto_id' => $auto->id]) }}" method="POST" class="row">
            @csrf
            <h3 class="titolo">Dati Intervento</h3>
                <div class="col-md-6">
                    <label for="note_stato" class="form-label">Note sulle modifiche / stato dell'auto</label>
                    <textarea class="form-control" name="note_stato" id="note_stato" rows="1"></textarea>
                </div>
                <div class="col-md-6">
                    <label class="form-label">Data dell'intervento</label>
                    <input type="date" name="data_intervento" class="form-control">
                </div>
                <div class="col-md-6 mt-3">
                    <button type="submit" class="btn btn-primary">Salva Intervento</button>
                </div>
                <div class="col-md-6 mt-3">
                    <a href="{{ url()->previous() }}" class="btn btn-primary">Torna Indietro</a>
                </div>                
        </form>
    </div>
@endsection