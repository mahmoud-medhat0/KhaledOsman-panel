@extends('layouts.parent2')
@section('title', 'List Of Attendence')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection
@section('content')
@include('messages.message')
<div class="row">
    <center>
        <div class="col-md-9">
            @isset($success1)
            {{ $success1 }}
            @endisset
            <div class="table-wrap">
                <div class="white_box_tittle list_header" bis_skin_checked="1">
                    <h4>@yield('title')</h4>
                    <div class="box_right d-flex lms_block" bis_skin_checked="1">
                    </div>
                </div>
                <video id="segmented-video" controls >
                </video>
                <button id="play-button">Play Video</button>            </center>
</div>
@section('js')
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.colVis.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment-with-locales.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>
<script src="https://cdn.datatables.net/s/bs-3.3.5/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,r-2.0.0/datatables.min.js">
</script>
<script src="{{ asset('bundles/fosjsrouting/js/router.js') }}"></script>
<script>
    $('#DataTables_Table_0 thead tr').clone(true).appendTo('#DataTables_Table_0 thead');
        // $('#example1 thead tr').clone(true).appendTo('#example1 thead').css('display','none');
        $('#DataTables_Table_0 thead tr:eq(1) th').each(function(i) {
            var title = $(this).text();
            $(this).html('<input type="text" class="form-control form-control-sm" placeholder="' +
                title + '" />');
            $('input', this).on('keyup click change', function(e) {
                e.stopPropagation();
                if (table.column(i).search() !== this.value) {
                    table
                        .column(i)
                        .search(this.value)
                        .draw();
                }
            });
        })
    var table = $("#DataTables_Table_0").DataTable({
        responsive: false,
        lengthChange: true,
        autoWidth: false,
        orderCellsTop: true,
        paging:false,
        buttons: ["excel"]
    });
    table.buttons().container().appendTo('#printBar');
</script>
<script>
    document.getElementById('play-button').addEventListener('click', function() {
        var xhr = new XMLHttpRequest();
        xhr.open('POST', '{{ route("video.play",$name) }}', true);
        xhr.setRequestHeader('Content-Type', 'application/json');
        xhr.setRequestHeader('X-CSRF-TOKEN', '{{ csrf_token() }}');

        xhr.onreadystatechange = function() {
            if (xhr.readyState === 4 && xhr.status === 200) {
                var video = document.getElementById('segmented-video');
                console.log(xhr.response);
                video.src = URL.createObjectURL(xhr.response);
                video.play();
            } else if (xhr.readyState === 4) {
                console.error('Error:', xhr.status);
            }
        };
        xhr.responseType = 'blob';
        xhr.send(JSON.stringify({ segment: 'segment001.mp4' }));
    });
</script>
@endsection
@endsection
