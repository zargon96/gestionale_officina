<?php
namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\models\Cliente;

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

        $cliente = new Cliente([
            'nome' => $request->input('nome'),
            'cognome' => $request->input('cognome'),
            'email' => $request->input('email'),
            'telefono' => $request->input('telefono'),
            'codice_fiscale' => $request->input('codice_fiscale'),
        ]);

        $cliente->save();

        return redirect()->route('clienti.auto.create', $cliente->id)->with('success', 'Cliente creato con successo');

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
        ]);

        $cliente->save(); // Salva le modifiche al cliente

        return redirect()->route('clienti.index')->with('success', 'Cliente aggiornato con successo');

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

