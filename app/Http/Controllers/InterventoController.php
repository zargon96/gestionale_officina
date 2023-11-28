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

        if ($auto) {
            $cliente = $auto->cliente;
        } else {
            return redirect()->route('clienti.index')->with('error', 'Auto non trovata per il cliente');
        }
    

        return view('interventi.crea_intervento', compact('cliente', 'auto'));
    }

    public function store(Request $request, $cliente_id, $auto_id)
    {
        
        // Trova l'auto tramite l'ID
        $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);
        
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

    public function show($cliente_id, $auto_id)

    {
        $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);
        
        if (!$auto) {
            return redirect()->back()->with('error', 'Auto non trovata');
        }

        $cliente = $auto->cliente;
       
        return view('interventi.show_intervento', compact('auto', 'cliente'));
    }
    


    public function edit($cliente_id, $auto_id, $intervento_id)
    {
        $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);

    if (!$auto) {
        return redirect()->route('clienti.index')->with('error', 'Auto non trovata');
    }

    // Trova l'intervento associato all'auto
    $intervento = $auto->interventi()->find($intervento_id);

    if ($intervento) {
        return view('interventi.edit_intervento', compact('auto', 'intervento'));
    } else {
        return redirect()->route('clienti.index')->with('error', 'Intervento non trovato');
    }
    }
    

    public function update(Request $request, $cliente_id,$auto_id,$intervento_id)
    {
        $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);

        if (!$auto) {
            return redirect()->route('clienti.index')->with('error', 'Auto non trovata');
        }

        $intervento = $auto->interventi()->find($intervento_id);

        if (!$intervento) {
            return redirect()->route('clienti.index')->with('error', 'Intervento non trovato');
        }
    
        // Aggiorna i campi dell'intervento con i nuovi dati
        $intervento->fill([
            'note_stato' => $request->input('note_stato'),
            'data_intervento' => $request->input('data_intervento'),
        ]);
    
        $intervento->save(); // Salva le modifiche all'intervento

        return redirect()->route('clienti.index')->with('success', 'intervento aggiornato con successo');

    }

    public function destroy($cliente_id, $auto_id, $intervento_id)
{
    $auto = Auto::where('cliente_id', $cliente_id)->with('cliente')->find($auto_id);

    if (!$auto) {
        return redirect()->route('clienti.index')->with('error', 'Auto non trovata');
    }

    $intervento = $auto->interventi()->find($intervento_id);

    if ($intervento) {
        // Elimina l'intervento solo se esiste
        $intervento->delete();

        return redirect()->route('clienti.index')->with('success', 'Intervento eliminato con successo');
    } else {
        // Se l'intervento non esiste, reindirizza a una pagina di errore
        return redirect()->route('clienti.index')->with('error', 'Intervento non trovato');
    }
}

}


