@extends('layouts.app')
@section('content')
<h1 class="titolo">Modifica auto del cliente {{$auto->cliente->nome}} {{$auto->cliente->cognome}}</h1> 
    <div class="container">
        <form method="POST" action="{{ route('clienti.auto.update', ['cliente_id' => $auto->cliente->id, 'auto_id' => $auto->id])}}" class="row">
            @csrf
            <h3 class="titolo">Dati Auto</h3>
            <input type="hidden" name="id" value="{{ $auto->id }}">
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="modello">Modello</label>
                    <input type="text" name="modello" id="modello" value="{{ $auto->modello }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="targa">Targa</label>
                    <input type="text" name="targa" id="targa" value="{{ $auto->targa }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="n_telaio">Numero del telaio</label>
                    <input type="text" name="n_telaio" id="n_telaio" value="{{ $auto->n_telaio }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="marca">Marca</label>
                    <input type="text" name="marca" id="marca" value="{{ $auto->marca }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="anno">Anno</label>
                    <input type="text" name="anno" id="anno" value="{{ $auto->anno }}" class="form-control">
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="chilometri">Chilometri</label>
                    <input type="text" name="chilometri" id="chilometri" value="{{ $auto->chilometri }}" class="form-control">
                </div>
            </div>
            {{-- <div class="col-md-6">
                <div class="form-group">
                    <label for="note_stato" class="titolo-label">Note sulle modifiche / stato dell'auto</label>
                    <textarea name="note_stato" class="form-control" id="note_stato" rows="1">{{ $auto->note_stato }}</textarea>
                </div>
            </div>
            <div class="col-md-6">
                <div class="form-group">
                    <label class="titolo-label" for="data_intervento">Data dell'intervento</label>
                    <input type="text" name="data_intervento" id="data_intervento" value="{{ $auto->data_intervento }}" class="form-control">
                </div>
            </div> --}}
            <div class="col-md-6 mb-3">
                <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>   
            </div>
            <div class="col-md-6 mb-3">
                <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
            </div>
        </form>
    </div>
@endsection 