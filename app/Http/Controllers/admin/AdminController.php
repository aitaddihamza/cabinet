<?php

namespace App\Http\Controllers\admin;

use App\Http\Controllers\Controller;
use App\Http\Requests\AdminSearchRequest;
use App\Http\Requests\StoreDoctorRequest;
use App\Http\Requests\UpdateDoctorRequest;
use App\Models\User;

class AdminController extends Controller
{
    public function index(AdminSearchRequest $request)
    {
        $query = User::query()->where('role', '=', 'doctor');
        if ($request->validated('firstname')) {
            $query =  $query->where('firstname', 'like', "%{$request->validated('firstname')}%");
        }
        if ($request->validated('cin')) {
            $query =  $query->where('cin', 'like', "%{$request->validated('cin')}%");
        }
        if ($request->validated('phone')) {
            $query =  $query->where('phone', 'like', "%{$request->validated('phone')}%");
        }
        if ($request->validated('specialite')) {
            $query =  $query->where('specialite', 'like', "%{$request->validated('specialite')}%");
        }

        $inputs = $request->validated();
        $doctors = $query->orderBy('updated_at', 'desc')->paginate(4);
        return view('admin.index', compact('doctors', 'inputs'));
    }
    public function create()
    {
        $doctor = new User();
        return view('admin.form', compact('doctor'));
    }
    public function edit(User $doctor)
    {
        return view('admin.form', compact('doctor'));
    }
    public function store(StoreDoctorRequest $request)
    {
        $data = $request->validated();
        $data['role'] = 'doctor';
        $data['password'] = bcrypt($data['password']);
        User::create($data);

        return to_route('admin.index')->with('success', "Médecin a été bien créé !");
    }

    public function update(UpdateDoctorRequest $request, User $doctor)
    {
        $data = $request->validated();
        if ($data['password'])
            $data['password'] = bcrypt($data['password']);
        else
            $data['password'] = $doctor->password;
        $doctor->update($data);
        return to_route('admin.index')->with('infos', "Médecin a été bien modifié !");
    }

    public function destroy(User $doctor)
    {
        $doctor->delete();
        return to_route('admin.index')->with('warning', "Médecin a été bien supprimé !");
    }
}
