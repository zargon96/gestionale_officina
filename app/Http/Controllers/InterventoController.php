<?php

namespace App\Http\Controllers;
use Illuminate\Http\Request;
use App\Models\Auto;
use App\Models\Intervento;

class InterventoController extends Controller
{
    public function create($cliente_id, $auto_id)
    {
        $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);

        return view('interventi.crea_intervento', compact('cliente', 'auto'));
    }
    public function store(Request $request, $autoId)
    {
        // Trova l'auto tramite l'ID
        $auto = Auto::find($autoId);

        if (!$auto) {
            return redirect()->back()->with('error', 'Auto non trovata');
        }

        // Validazione della richiesta
        $request->validate([
            'note_stato' => 'required',
            'data_intervento' => 'required|date',
        ]);

        // Creiamo un nuovo intervento
        $intervento = new Intervento([
            'note_stato' => $request->input('note_stato'),
            'data_intervento' => $request->input('data_intervento'),
        ]);

        // Associamo l'auto all'intervento
        $auto->interventi()->save($intervento);

        return redirect()->back()->with('success', 'Intervento aggiunto con successo');
    }
}


