@extends('layouts.parent2')
@section('title', 'Add New Attendance From Excel')
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
            <form action="{{ route('lesson.update',$lesson->id ) }}" method="post" enctype="multipart/form-data" id="fileUploadForm">
                @csrf
                @method('put')
                <div class="row" bis_skin_checked="1">
                    <div class="col-lg-6">
                        <div class=" mb-0">
                            <label for="title">title</label>
                            <input class="form-control" type="text" name="title" id="videoTitle" value="{{ $lesson->title }}" >
                            @error('title')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-lg-6">
                        <div class=" mb-0">
                            <label for="sheet">file</label>
                            <input class="form-control" type="file" name="file" id="videoFile">
                            @error('file')
                            <div class="text-danger font-weight-bold">*{{ $message }}</div>
                            @enderror
                        </div>
                    </div>
                    <div class="col-12" bis_skin_checked="1">
                        <center>
                            <div class="create_report_btn mt_30" bis_skin_checked="1">
                                <button type="submit" class="btn_1 radius_btn d-block text-center" >Update</button>
                            </div>
                        </center>
                    </div>
                </div>
                <div class="progress" style="display: none;">
                    <div class="progress-bar progress-bar-striped progress-bar-animated bg-success" role="progressbar" aria-valuenow="0" aria-valuemin="0" aria-valuemax="100"></div>
                </div>

            </form>
        </div>
    </div>
</div>
<script src="https://cdn.jsdelivr.net/npm/bs-custom-file-input/dist/bs-custom-file-input.min.js"></script>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
<script>
    $(document).ready(function() {
        // Initialize bs-custom-file-input library
        bsCustomFileInput.init();

        // Handle form submit event
        $('#fileUploadForm').on('submit', function(e) {
            e.preventDefault();

            var formData = new FormData(this);
            var progressBar = $('.progress-bar');
            var fileInput = $('#videoFile');
            var title = $('#videoTitle').val();
            if (title === '') {
                alert('Please enter a video title.');
                return;
            }
            formData.append('title', title);

            // Show progress bar
            $('.progress').show();

            $.ajax({
                type: 'PUT',
                url: $(this).attr('action'),
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    var xhr = new window.XMLHttpRequest();

                    // Upload progress
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            var percent = Math.round((e.loaded / e.total) * 100);
                            progressBar.width(percent + '%');
                            progressBar.attr('aria-valuenow', percent);
                        }
                    });

                    return xhr;
                },
                success: function(response) {
                    // Hide progress bar
                    $('.progress').hide();

                    // Display success message
                    alert(response.success);
                    window.location.href ='{{ route('home') }}';
                },
                error: function(xhr, status, error) {
                    // Hide progress bar
                    $('.progress').hide();

                    // Display error message
                    if (xhr.status === 422) {
                        var errors = xhr.responseJSON.errors;
                        var errorMessages = '';

                        for (var field in errors) {
                            errorMessages += errors[field][0] + '\n';
                        }

                        alert('Validation error(s):\n' + errorMessages);
                    } else {
                        alert('An error occurred while uploading the video.');
                    }
                    }
            });
        });
    });
</script>
<script>
    function myFunction(){
        var input, filter, input1, tr, td, rnd, txtValue,str,str1;
          input = document.getElementById("myInput");
          input1 =document.getElementById("input1");
          filter = input.value.toUpperCase();
          str = input.value;
          rnd = Math.floor(Math.random() * 100);
          str1 = str.replaceAll(' ','_')+'_'+rnd;
          input1.setAttribute('value',str1);
    }
</script>
@endsection
