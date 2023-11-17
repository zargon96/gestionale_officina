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
        <div class="col-md-6">
            <button type="submit" class="btn btn-primary mt-3">Salva Modifiche</button>
        </div>
        <div class="col-md-6">
            <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
        </div>
           
    </form>
</div>
    
@endsection 
