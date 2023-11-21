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
        <div class="col-md-6 mb-3">
            <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>   
        </div>
        <div class="col-md-6 mb-3">
            <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
        </div>
           
    </form>
</div>
    
@endsection 
