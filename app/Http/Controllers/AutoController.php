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
            // Gestisci il caso in cui il cliente non viene trovato
        }
    
        return view('crea_auto', compact('cliente', 'auto'));
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
// public function store(Request $request, $clienteId)
// {
//     $request->validate([
//         'modello' => 'required',
//         'targa' => 'required',
//         'n_telaio' => 'required',
//         'marca' => 'required',
//         'anno' => 'required',
//         'chilometri' => 'required',
//         'note_stato' => 'required',
//         'data_intervento' => 'required',
//     ]);

//     $autosData = $request->input('auto');

//     $cliente = Cliente::find($clienteId);

//     if (!$cliente) {
//         return redirect()->route('cliente.create')->with('error', 'Cliente non trovato');
//     }

//     foreach ($autosData as $autoData) {
//         $auto = new Auto($autoData);
//         $cliente->auto()->save($auto);
//     }

//     return redirect()->route('clienti.auto.create', $cliente->id)->with('success', 'Auto aggiunte con successo al cliente');
// }



    
}






