@extends('layouts.parent2')
@section('title', 'Add New Student')
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
            @isset($success)
            {{ $success }}
            @endisset
            <form action="{{ route('student.update',$student->id) }}" method="post">
                @method('put')
                @csrf
                <div class="row" bis_skin_checked="1">
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="common_input mb_15" bis_skin_checked="1">
                            <input class="form-control" name="name" value="{{ $student->name }}"  id="myInput" type="text"
                                placeholder="Name">
                            @error('name')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="common_input mb_15" bis_skin_checked="1">
                            <input value="{{ $student->number }}" type="text" name="number" placeholder="number">
                            @error('number')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="common_input mb_15" bis_skin_checked="1">
                            <input value="{{ $student->NationalID }}" type="text" name="NationalID" placeholder="NationalID">
                            @error('NationalID')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="common_input mb_15" bis_skin_checked="1">
                            <input class="@error('password') is-invalid @enderror" id="password" name="password"
                                type="password" placeholder="Password">
                            @error('password')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                            @enderror

                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="common_input mb_15" bis_skin_checked="1">
                            <input id="password-confirm" type="password" name="password_confirmation"
                                placeholder="Confirm Password">
                        </div>
                        @error('password_confirm')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="" tabindex="0" bis_skin_checked="1">
                            <select name="gender" id="status" class="form-control">
                                <option @selected($student->gender =='m') value="m"> Male
                                </option>
                                <option @selected($student->gender =='f') value="f"> Female
                                </option>
                            </select>
                            @error('gender')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6" bis_skin_checked="1">
                        <div class="" tabindex="0" bis_skin_checked="1">
                            <select name="status" id="status" class="form-control">
                                <option @selected($student->status =='1') value="1"> Active
                                </option>
                                <option @selected($student->status =='0') value="0"> Not Active
                                </option>
                            </select>
                            @error('status')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <br>
                        <div class="col-12" bis_skin_checked="1">
                        <center>
                            <div class="create_report_btn mt_30" bis_skin_checked="1">
                                <button class="btn_1 radius_btn d-block text-center">Add Student</button>
                            </div>
                        </center>
                    </div>
                </div>
            </form>
        </div>
    </div>
</div>
@endsection
