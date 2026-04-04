@extends('admin.maindesign')

@section('admin_dashboard')
    <form action="{{ route('post_add_doctor') }}" method="POST" enctype="multipart/form-data">
        @csrf

        @if (session('doctor_addmessage'))
            <div class="bg bg-primary">
                {{ session('doctor_addmessage') }}
            </div>
        @endif

        <div>
            <input type="text" placeholder="Doctor Name" name="doctors_name">
        </div>
        <br>
        <br>
        <div>
            <input type="text" placeholder="Doctor Phone" name="doctors_phone">
        </div>
        <br>
        <br>
        <div>
            <input type="text" placeholder="Speciality" name="speciality">
        </div>
        <br>
        <br>
        <div>
            <input type="text" placeholder="Room Number" name="room_number">
        </div>
        <br>
        <br>
        <div>
            <label style="border-radius: 12px; padding: 8px;" class="bg bg-primary" for="doctor_image">Upload Doctor's
                Image</label> <br>
            <input type="file" name="doctor_image">
        </div>
        <br>
        <br>
        <div>
            <input type="submit" name="submit" value="Add Doctor">
        </div>
        <br>
        <br>
    </form>
@endsection
