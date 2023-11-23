
@extends('layouts.app')

@section('content')
    <h1 class="titolo">Aggiungi Auto</h1>
    <div class="container">
        <form action="{{ route('clienti.auto.store', $cliente->id) }}" method="POST" class="row">
            @csrf
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
                    <label class="form-label">Data dell'intervento</label>
                    <input type="text" name="data_intervento" class="form-control">
                </div>
            <div class="col-md-6 mt-3">
                <button type="submit" class="btn btn-primary">Salva Auto</button>
                {{-- <button type="button" class="btn btn-success" onclick="aggiungiAltraAuto()">Aggiungi Altra Auto</button> --}}
            </div>
            <div class="col-md-6 mt-3">
                <a type="button" class="btn btn-primary" onclick="location.href='{{ route('clienti.index') }}'">Torna Indietro</a>
            </div>
        </form>
    </div>
    {{-- <script>
        var autoCounter = 1;

        function aggiungiAltraAuto() {
            var container = document.getElementById('autoContainer');
            var clonedForm = document.getElementById('autoForm').cloneNode(true);

           
            clonedForm.removeAttribute('id');
            clonedForm.reset();

            container.appendChild(clonedForm);

            autoCounter++;
        }
    </script> --}}
    
    </div>
@endsection
