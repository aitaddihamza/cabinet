<?php

namespace App\Http\Controllers\doctor;

use App\Http\Controllers\Controller;
use App\Http\Requests\DoctorSearchRequest;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;

class DoctorController extends Controller
{
    public function index(DoctorSearchRequest $request)
    {
        $query = DB::table('users')->select()->join('reservations', 'users.id', '=', 'reservations.user_id')->where('reservations.specialite', '=', Auth::user()->specialite);
        if ($request->validated('firstname')) {
            $query =  $query->where('firstname', 'like', "%{$request->validated('firstname')}%");
        }
        if ($request->validated('cin')) {
            $query =  $query->where('cin', 'like', "%{$request->validated('cin')}%");
        }
        if ($request->validated('phone')) {
            $query =  $query->where('phone', 'like', "%{$request->validated('phone')}%");
        }
        if ($request->validated('date_reservation')) {
            $query =  $query->where('date_reservation', '=', $request->validated('date_reservation'));
        }
        if ($request->validated('heure_reservation')) {
            $query =  $query->where('heure_reservation', '=', $request->validated('heure_reservation'));
        }

        $patients = $query->paginate(10);
        $inputs = $request->validated();
        return view('doctor.index', compact('patients', 'inputs'));
    }
}
