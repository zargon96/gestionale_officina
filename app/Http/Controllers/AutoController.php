<?php
namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\models\Cliente;
use App\models\Auto;


class AutoController extends Controller
{
    public function create($clienteId)
    {
        $auto = [new Auto()];
        $cliente = Cliente::find($clienteId);
    
        if (!$cliente) {
            return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
        }
    
        return view('auto.crea_auto', compact('cliente', 'auto'));
    }


    

public function store(Request $request, $clienteId)
{
    $request->validate([
        'modello' => 'required',
        'targa' => 'required',
        'n_telaio' => 'required',
        'marca' => 'required',
        'anno' => 'required',
        'chilometri' => 'required',
        'note_stato' => 'required',
        'data_intervento' => 'required',
    ]);

    // Trova il cliente
    $cliente = Cliente::find($clienteId);

    if (!$cliente) {
        return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
    }

    // Crea un nuovo oggetto Auto
    $auto = new Auto([
        'modello' => $request->input('modello'),
        'targa' => $request->input('targa'),
        'n_telaio' => $request->input('n_telaio'),
        'marca' => $request->input('marca'),
        'anno' => $request->input('anno'),
        'chilometri' => $request->input('chilometri'),
        'note_stato' => $request->input('note_stato'),
        'data_intervento' => $request->input('data_intervento'),
    ]);

    // Associa l'auto al cliente
    $cliente->auto()->save($auto);

    return redirect()->route('clienti.auto.create', $cliente->id)->with('success', 'Auto aggiunte con successo! aggiungine altre o premi su "torna indietro"');
}

public function edit($cliente_id)
{
    $auto = Auto::with('cliente')->find($cliente_id);

    if ($auto) {
        return view('auto.edit_auto', ['auto' => $auto ]);
    } else {
        return redirect()->route('clienti.index')->with('error', 'Auto non trovata');
    }
}


public function update(Request $request, $cliente_id)
{
    $cliente = Cliente::find($cliente_id);

    if (!$cliente) {
        return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
    }

    // Utilizza la relazione tra Cliente e Auto per ottenere l'auto
    $auto = $cliente->auto;

    if (!$auto) {
        return redirect()->route('clienti.index')->with('error', 'Auto non trovata');
    }

    // Ottieni tutte le auto associate al cliente
    $auto_cliente = $cliente->auto;

    // Itera su ciascuna auto e aggiorna i campi desiderati
    foreach ($auto_cliente as $auto) {
        $auto->update([
            'modello' => $request->input("modello"),
            'targa' => $request->input("targa"),
            'n_telaio' => $request->input("n_telaio"),
            'marca' => $request->input("marca"),
            'anno' => $request->input("anno"),
            'chilometri' => $request->input("chilometri"),
            'note_stato' => $request->input("note_stato"),
            'data_intervento' => $request->input("data_intervento"),
        ]);
    }

    $auto->save(); // Salva le modifiche all'auto

    return redirect()->route('clienti.index')->with('success', 'Auto aggiornata con successo');
}


}






