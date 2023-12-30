<?php

namespace App\Http\Controllers\patient;

use App\Http\Controllers\Controller;
use App\Http\Requests\ReservationRequest;
use App\Models\Reservation;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class PatientController extends Controller
{
    public function index()
    {
        $reservation = Auth::user()->reservation;
        return view('patient.index', compact('reservation'));
    }
    public function create()
    {
        if (Auth::user()->reservation)
            return to_route('patient.index')->with('infos', "Vous avez déjà un rendez-vous le " . Auth::user()->reservation->date_reservation);
        $reservation = new Reservation();
        $specialites = DB::table('users')->select('specialite')->where('specialite', '!=', 'null')->distinct()->get();
        return view('patient.form', compact('specialites', 'reservation'));
    }
    public function edit(Reservation $reservation)
    {
        $specialites = DB::table('users')->select('specialite')->where('specialite', '!=', 'null')->distinct()->get();
        return view('patient.form', compact('specialites', 'reservation'));
    }
    public function store(ReservationRequest $request)
    {
        $data = $request->validated();

        $reservation = Auth::user()->reservation;
        if ($reservation)
            return to_route('patient.index')->with('infos', "Vous avez déjà un rendez-vous le " . $reservation->date_reservation);

        $reservationExists = $this->reservationExists($request);

        if ($reservationExists)
            return redirect()->back()->with('warning', "rendez-vous déjà réservé veuillez choisir une autre heure ou date de réservation");

        $data['user_id'] = Auth::user()->id;
        Reservation::create($data);
        return to_route('patient.index')->with('success', "Vous avez réservé un rendez-vous successevement ! ");
    }
    public function update(ReservationRequest $request, Reservation $reservation)
    {
        $data = $request->validated();
        $reservationExists = $this->reservationExists($request);
        if ($reservationExists)
            return redirect()->back()->with('warning', "rendez-vous déjà réservé veuillez choisir une autre heure ou date de réservation");
        $reservation->update($data);
        return to_route('patient.index')->with('infos', "Vous avez modifié le rendez-vous successevement ! ");
    }

    public function destroy(Reservation $reservation)
    {
        $reservation->delete();
        return to_route('patient.index')->with('warning', "Vous avez annulé le rendez-vous successevement ! ");
    }

    public function reservationExists(ReservationRequest $request)
    {
        $data = $request->validated();
        $date = $data['date_reservation'];
        $time = $data['heure_reservation'];
        $specialite = $data['specialite'];
        $reservationExists = Reservation::query()
            ->where('date_reservation', '=', $date)
            ->where('heure_reservation', '=', $time)
            ->where('specialite', '=', $specialite)
            ->where('user_id', '!=', Auth::user()->id)
            ->exists();
        return $reservationExists;
    }
}
