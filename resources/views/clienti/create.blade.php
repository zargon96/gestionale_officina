@extends('layouts.app')
@section('content')
    <h1 class="titolo">Crea un nuovo cliente</h1>
    <div class="container d-flex justify-content-center">
        <form action="{{ route('clienti.store') }}" method="POST" class="row">
            <h3 class="titolo">Dati Anagrafici</h1>
            @csrf
            <div class="col-md-4">
                <label class="form-label">Email</label>
                <input type="email" name="email" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Nome</label>
                <input type="text" name="nome" class="form-control">
            </div>
            <div class="col-md-4">
                <label class="form-label">Cognome</label>
                <input type="text" name="cognome" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Telefono</label>
                <input type="text" name="telefono" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Codicefiscale</label>
                <input type="text" name="codice_fiscale" class="form-control">
            </div>
            {{-- <div class="col-md-3">
                <label class="form-label">Gruppo Cliente</label>
                <input type="text" name="gruppo_cliente_id" class="form-control">
            </div> --}}
            <div class="col-md-6">
                <button type="submit" class="btn btn-primary mt-3">Salva Cliente</button>
            </div>
            <div class="col-md-6">
                <a href="{{ route('clienti.index') }}" class="btn btn-primary mt-3">Torna all'elenco dei clienti</a>
            </div>
        </form>
    </div>
    
@endsection

