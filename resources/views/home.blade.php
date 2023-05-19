@extends('layouts.parent2')

@section('content')
<center>
    {{--  <div class="col-lg-6">
        <div class="create_report_btn mt_30">
            <a href="{{ route('attendlist') }}" class="btn_1 radius_btn d-block text-center">Attendance History</a>
        </div>
    </div>
    <div class="col-lg-6">
        <div class="create_report_btn mt_30">
            <a href="{{ route('exerciselist') }}" class="btn_1 radius_btn d-block text-center">Exercise History</a>
        </div>
    </div>  --}}
    <div class="col-lg-6">
        <div class="create_report_btn mt_30">
            <a href="#" class="btn_1 radius_btn d-block text-center">Students List</a>
        </div>
    </div>
    {{--  <div class="col-lg-6">
        <div class="create_report_btn mt_30">
            <a href="{{ route('lstexm') }}" class="btn_1 radius_btn d-block text-center">Exams List</a>
        </div>
    </div>  --}}
</center>
@endsection
