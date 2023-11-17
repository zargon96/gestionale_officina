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
            <h3 class="titolo">Dati Auto</h3>
            <div class="col-md-6">
                <label class="form-label">Modello</label>
                <input type="text" name="modello" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Targa</label>
                <input type="text" name="targa" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Numero del telaio</label>
                <input type="text" name="n_telaio" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Marca</label>
                <input type="text" name="marca" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Anno</label>
                <input type="text" name="anno" class="form-control">
            </div>
            <div class="col-md-6">
                <label class="form-label">Chilometri</label>
                <input type="text" name="chilometri" class="form-control">
            </div>
            <div class="col-md-6">
                <label for="note_stato" class="form-label">Note sulle modifiche / stato dell'auto</label>
                <textarea class="form-control" name="note_stato" id="note_stato" rows="1"></textarea>
            </div>
            <div class="col-md-6">
                {{-- <div class="form-group">
                    <label class="active form-label" for="dateStandard">Data dell'intervento</label>
                    <input type="date" id="dateStandard" name="data_intervento">
                </div> --}}
                <label class="form-label">Data dell'intervento</label>
                <input type="text" name="data_intervento" class="form-control">
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

