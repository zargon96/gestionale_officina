@extends('layouts.app')
@section('content')
<h1 class="titolo">Modifica Cliente</h1>
<div class="container">
    <form method="POST" action="{{ route('clienti.update', $cliente->id) }}" class="row">
        @csrf
        <div class="form-group">
            <label class="titolo-label" for="nome">Nome</label>
            <input type="text" name="nome" id="nome" value="{{ $cliente->nome }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="titolo-label" for="cognome">Cognome</label>
            <input type="text" name="cognome" id="cognome" value="{{ $cliente->cognome }}" class="form-control">
        </div>

        <div class="form-group">
            <label class="titolo-label" for="email">Email</label>
            <input type="email" name="email" id="email" value="{{ $cliente->email }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="telefono">Telefono</label>
            <input type="text" name="telefono" id="telefono" value="{{ $cliente->telefono }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="codice_fiscale">Codice fiscale</label>
            <input type="text" name="codice_fiscale" id="codice_fiscale" value="{{ $cliente->codice_fiscale }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="modello">Modello</label>
            <input type="text" name="modello" id="modello" value="{{ $cliente->auto->modello ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="targa">Targa</label>
            <input type="text" name="targa" id="targa" value="{{ $cliente->auto->targa ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="n_telaio">Numero del telaio</label>
            <input type="text" name="n_telaio" id="n_telaio" value="{{ $cliente->auto->n_telaio ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="marca">Marca</label>
            <input type="text" name="marca" id="marca" value="{{ $cliente->auto->marca ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="anno">Anno</label>
            <input type="text" name="anno" id="anno" value="{{ $cliente->auto->anno ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="chilometri">Chilometri</label>
            <input type="text" name="chilometri" id="chilometri" value="{{ $cliente->auto->chilometri ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="note_stato">Dettagli dell intervento / stato</label>
            <input type="text" name="note_stato" id="note_stato" value="{{ $cliente->auto->note_stato ?? '' }}" class="form-control">
        </div>
        <div class="form-group">
            <label class="titolo-label" for="data_intervento">Data dell'intervento</label>
            <input type="text" name="data_intervento" id="data_intervento" value="{{ $cliente->auto->data_intervento ?? '' }}" class="form-control">
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
