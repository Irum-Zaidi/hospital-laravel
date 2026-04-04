<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Doctor;


class AdminController extends Controller
{
    public function Dashboard()
    {
        return view('admin.dashboard');
    }

    public function AddDoctors()
    {
        return view('admin.add_doctors');
    }

    public function postAddDoctors(Request $request)
    {

        $doctor = new Doctor();
        $doctor->doctors_name = $request->input('doctors_name');
        $doctor->doctors_phone = $request->input('doctors_phone');
        $doctor->speciality = $request->input('speciality');
        $doctor->room_number = $request->input('room_number');

        // Handle file upload for doctor_image
        $image = $request->file('doctor_image');
        if ($image) {
            $imageName = time() . '.' . $image->getClientOriginalExtension();
            $image->move(public_path('project_img'), $imageName);
            $doctor->doctor_image = $imageName;
        }

        $doctor->save();

        return redirect()->back()->with('doctor_addmessage', 'Doctor Added Successfully');
    }
}
