@extends('layouts.app')
@section('content')
<h1 class="titolo">Modifica Cliente</h1>
<div class="container">
    <form method="POST" action="{{ route('clienti.update', $cliente->id) }}" class="row">
        @csrf
        <h3 class="titolo">Dati Anagrafici</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="nome">Nome</label>
                <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="cognome">Cognome</label>
                <input type="text" name="cognome" id="cognome" value="{{ $cliente->cognome }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="email">Email</label>
                <input type="email" name="email" id="email" value="{{ $cliente->email }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="telefono">Telefono</label>
                <input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="codice_fiscale">Codice fiscale</label> 
                <input type="text" name="codice_fiscale" id="codice_fiscale" value="{{ $cliente->codice_fiscale }}" class="form-control">
            </div>
        </div>
        <h3 class="titolo">Dati Auto</h3>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="modello">Modello</label>
                <input type="text" name="modello" id="modello" value="{{ $cliente->auto->first()->modello ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="targa">Targa</label>
                <input type="text" name="targa" id="targa" value="{{ $cliente->auto->first()->targa ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="n_telaio">Numero del telaio</label>
                <input type="text" name="n_telaio" id="n_telaio" value="{{ $cliente->auto->first()->n_telaio ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="marca">Marca</label>
                <input type="text" name="marca" id="marca" value="{{ $cliente->auto->first()->marca ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="anno">Anno</label>
                <input type="text" name="anno" id="anno" value="{{ $cliente->auto->first()->anno ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                <label class="titolo-label" for="chilometri">Chilometri</label>
                <input type="text" name="chilometri" id="chilometri" value="{{ $cliente->auto->first()->chilometri ?? '' }}" class="form-control">
            </div>
        </div>
        <div class="col-md-6">
            <div class="form-group">
                {{-- <label class="titolo-label" for="note_stato">Dettagli dell intervento / stato</label>
                <input type="text" name="note_stato" id="note_stato" value="{{ $cliente->auto->first()->note_stato ?? '' }}" class="form-control"> --}}
                <label for="note_stato" class="form-label">Dettagli dell intervento / stato</label>
                <textarea name="note_stato" class="form-control" id="note_stato" rows="1">{{ $cliente->auto->first()->note_stato ?? '' }}</textarea>
            </div>
        </div>
        <div class="col-md-6">        
        <div class="form-group">
            <label class="titolo-label" for="data_intervento">Data dell'intervento</label>
            <input type="text" name="data_intervento" id="data_intervento" value="{{ $cliente->auto->first()->data_intervento ?? '' }}" class="form-control">
        </div>
        </div>
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>   
        </div>
        <div class="col-md-6">
            <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
        </div>
           
    </form>
</div>
    
@endsection 
