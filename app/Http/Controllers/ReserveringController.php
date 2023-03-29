<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Reservering;

class ReserveringController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        // Selecteer alle reserveringen waar de persoon_id gelijk is aan 1
        // De reserveringen moet op datum aflopend zijn
        // Vraag de voornaam, tussenvoegsel, achternaam en combineer deze tot een volledige naam
        // Datum, AantalUren, BeginTijd, EindTijd, AantalVolwassenen, AantalKinderen uit de reservering tabel
        // Selecteer de optiepakket naam uit de pakket_opties tabel via de foreign key pakket_optie_id in de reservering tabel (join)

        // Check of de datum niet leeg is
        if (!empty($request->date)) {
            // Selecteer alle reserveringen vanaf de meegegeven datum
            $reserveringen = Reservering::select('reserverings.id', 'persoon.voornaam', 'persoon.tussenvoegsel', 'persoon.achternaam', 'reserverings.datum', 'reserverings.aantal_uren', 'reserverings.begin_tijd', 'reserverings.eind_tijd', 'reserverings.aantal_volwassenen', 'reserverings.aantal_kinderen')
                ->join('persoon', 'persoon.id', '=', 'reserverings.persoon_id')
                ->where('persoon.id', '=', 1)
                ->where('reserverings.datum', '>=', $request->date)
                ->orderBy('reserverings.datum', 'desc')
                ->get();

            // Check of er wel reserveringen zijn
            if ($reserveringen->isEmpty()) {
                // Geen reserveringen gevonden
                return redirect()->route('reserveringen.index')->with('error', 'Er zijn geen reserveringen gevonden voor de datum: ' . $request->date);
            }
        } else {
            // Selecteer alle reserveringen voor die persoon
            $reserveringen = Reservering::select('reserverings.id', 'persoon.voornaam', 'persoon.tussenvoegsel', 'persoon.achternaam', 'reserverings.datum', 'reserverings.aantal_uren', 'reserverings.begin_tijd', 'reserverings.eind_tijd', 'reserverings.aantal_volwassenen', 'reserverings.aantal_kinderen', 'reserverings.baan_nummer')
                ->join('persoon', 'persoon.id', '=', 'reserverings.persoon_id')
                ->where('persoon.id', '=', 1)
                ->orderBy('reserverings.datum', 'desc')
                ->get();
        }

        // Return de view met de reserveringen
        return view('reserveringen.index', compact('reserveringen'));
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {



        $reservering = Reservering::select('reserverings.id', 'reserverings.baan_nummer')
            ->where('reserverings.id', '=', $id)
            ->first();

        // Return de view met de reservering
        return view('reserveringen.edit', compact('reservering'));
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */

    public function update(Request $request, $id)
    {
        // Update de reservering
        $reservering = Reservering::find($id);
        $reservering->baan_nummer = $request->baan_nummer;
        $reservering->save();

        // Return de view met de reservering
        return redirect()->route('reserveringen.index')->with('success', 'Reservering is succesvol geupdate');
    }
}
