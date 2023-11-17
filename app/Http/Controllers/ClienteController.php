<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Cliente;
use App\models\Auto;

class ClienteController extends Controller
{
    public function index()
    {
        // Recupera l'elenco dei clienti dal database e passalo alla vista
        $clienti = Cliente::all();
        return view('clienti.index', ['clienti' => $clienti]);
    }

    public function create()
    {
        return view('clienti.create');
    }


public function store(Request $request)
{
    $request->validate([
        'nome' => 'required',
        'cognome' => 'required',
        'email' => 'required|email',
        'telefono' => 'nullable|string',
        'codice_fiscale' => 'nullable|string',
    ]);

    // Verifica l'esistenza del cliente
    $cliente = Cliente::firstOrCreate([
        'email' => $request->input('email'),
    ], [
        'nome' => $request->input('nome'),
        'cognome' => $request->input('cognome'),
        'telefono' => $request->input('telefono'),
        'codice_fiscale' => $request->input('codice_fiscale'),
    ]);

    // Crea un'auto associata al cliente
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

    // Assegna l'auto al cliente
    $cliente->auto()->save($auto);

    return redirect()->route('clienti.index')->with('success', 'Cliente creato con successo');
}




    public function show($id)

    {
        // Recupera il dettaglio del cliente dal database
        $cliente = Cliente::find($id);
    
        if (!$cliente) {
            return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
        }
    
        return view('clienti.show', ['cliente' => $cliente]);
    }
    

    public function edit($id)
    {
        $cliente = Cliente::find($id);
    
        if ($cliente) {
            return view('clienti.edit', ['cliente' => $cliente]);
        } else {
            return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
        }
    }
    

    public function update(Request $request, $id)
{
    // Alcuni controlli e validazioni del form

    $cliente = Cliente::find($id);

    if (!$cliente) {
        return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
    }
    $cliente->fill([
        'nome' => $request->input('nome'),
        'cognome' => $request->input('cognome'),
        'email' => $request->input('email'),
        'telefono' => $request->input('telefono'),
        'codice_fiscale' => $request->input('codice_fiscale'),
        // 'gruppo_cliente_id' => $request->input('gruppo_cliente_id'),
    ]);

    if ($cliente->isDirty()) {
        $cliente->save();
        return redirect()->route('clienti.index')->with('success', 'Cliente aggiornato con successo');
    } else {
        return redirect()->route('clienti.index')->with('error', 'Errore: Non è stato possibile aggiornare il cliente');
    }
}




    public function destroy($id)
    {
    // Recupera il cliente dal database
    $cliente = Cliente::find($id);

    // Verifica se il cliente esiste
    if (!$cliente) {
        return redirect()->route('clienti.index')->with('error', 'Cliente non trovato');
    }

    // Elimina il cliente dal database
    $cliente->delete();

    return redirect()->route('clienti.index')->with('success', 'Cliente eliminato con successo');
    }
}

