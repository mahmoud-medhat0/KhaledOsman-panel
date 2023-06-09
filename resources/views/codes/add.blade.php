@extends('layouts.parent2')
@section('title', 'Add New code')
@section('css')
<link href="//netdna.bootstrapcdn.com/bootstrap/3.2.0/css/bootstrap.min.css" rel="stylesheet">
<link rel="stylesheet" href="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/css/bootstrap-select.min.css" />
@endsection
@section('content')
@include('messages.message')
<div class="col-12" bis_skin_checked="1">
    <div class="white_card card_height_100 mb_30" bis_skin_checked="1">
        <div class="white_card_header" bis_skin_checked="1">
            <div class="box_header m-0" bis_skin_checked="1">
                <div class="main-title" bis_skin_checked="1">
                    <h3 class="m-0">@yield('title')</h3>
                </div>
            </div>
        </div>
        <div class="white_card_body" bis_skin_checked="1">
            <form action="{{ route('codes.store') }}" method="post" enctype="multipart/form-data" id="fileUploadForm">
                @csrf
                <div class="row" bis_skin_checked="1">
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="" tabindex="0" bis_skin_checked="1">
                            <select name="student_id" id="status" class="form-control selectpicker" data-live-search="true">
                                <option value="">None</option>
                                @foreach ($students as $student)
                                <option value="{{ $student->id }}"> {{ $student->name.' - '.$student->number }} </option>
                                @endforeach
                            </select>
                            @error('student_id')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="" tabindex="0" bis_skin_checked="1">
                            <select name="lesson_id" id="status" class="form-control">
                                <option value="">None</option>
                                @foreach ($lessons as $lesson)
                                <option value="{{ $lesson->id }}">{{ $lesson->title }}</option>
                                @endforeach
                            </select>
                            @error('lesson_id')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12" bis_skin_checked="1">
                        <center>
                            <div class="create_report_btn mt_30" bis_skin_checked="1">
                                <button type="submit" class="btn_1 radius_btn d-block text-center" > generate code </button>
                            </div>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.2/jquery.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.2/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/bootstrap-select/1.6.3/js/bootstrap-select.min.js"></script>
@endsection
