@extends('layouts.parent2')
@section('title', 'All Students')
@section('css')
<link rel="stylesheet" href="https://cdn.datatables.net/1.13.2/css/jquery.dataTables.min.css">
@endsection
@section('content')
@include('messages.message')
<div class="col-lg-12" bis_skin_checked="1">
    <div class="white_card card_height_100 mb_30 pt-4" bis_skin_checked="1">
        <div class="white_card_body" bis_skin_checked="1">
            <div class="QA_section" bis_skin_checked="1">
                <div class="white_box_tittle list_header" bis_skin_checked="1">
                    <h4>@yield('title')</h4>
                    {{-- <div class="box_right d-flex lms_block" bis_skin_checked="1">
                        <div class="serach_field_2" bis_skin_checked="1">
                            <div class="search_inner" bis_skin_checked="1">
                                <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id.."
                                    title="Type id">
                            </div>
                        </div>
                    </div> --}}
                </div>
                <div id="printBar"></div>

                <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer" bis_skin_checked="1">
                    @php
                    $counter = 1;
                    @endphp
                    <table class="table  dataTable no-footer dtr-inline" id="DataTables_Table_0" role="grid"
                        aria-describedby="DataTables_Table_0_info">
                        <thead>
                            <tr role="row">
                                <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 29.0057px;" aria-sort="ascending"
                                    aria-label="id: activate to sort column descending">#</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 74px;"
                                    aria-label="User: activate to sort column ascending">name</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 64px;"
                                    aria-label="Role: activate to sort column ascending">number</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 64px;"
                                    aria-label="Role: activate to sort column ascending">NationalID</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 112px;"
                                    aria-label="Status: activate to sort column ascending">status</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 64px;"
                                    aria-label="Role: activate to sort column ascending">status</th>
                                <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                    rowspan="1" colspan="1" style="width: 116.006px;"
                                    aria-label="Action: activate to sort column ascending">Action</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach ($students as $student)
                            <tr role="row" class="odd">
                                <th scope="row" tabindex="0" class="sorting_1">
                                    {{ $counter }}
                                </th>
                                <td>{{ $student->name }}</td>
                                <td>{{ $student->number }}</td>
                                <td>{{ $student->NationalID }}</td>
                                <td>
                                    @switch($student->gender)
                                    @case('m')
                                    {{ "male" }}
                                    @break

                                    @case('f')
                                    {{ "female" }}
                                    @break
                                    @endswitch
                                </td>
                                <td><span
                                    class="{{ $student->status == 1 ? 'status_btn' : 'status_btn yellow_btn' }}">{{ $student->status == 1 ? 'active' : 'not actived' }}</span>
                                </td>
                                <td>
                                    <div class="action_btns d-flex" bis_skin_checked="1">
                                        <form action="{{ route('student.edit',$student->id) }}" method="get">
                                            <button class="action_btn"><i class="far fa-edit"></i></button>
                                        </form>
                                        <form action="{{ route('student.destroy',$student->id) }}" method="post">
                                            @csrf
                                            @method('DELETE')
                                            <button class="action_btn"><i class="fas fa-trash"></i></button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                            @php
                            $counter++;
                            @endphp
                            @endforeach
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>
@section('js')
<script src="https://cdn.datatables.net/1.13.2/js/jquery.dataTables.min.js"></script>
<script src="https://cdn.datatables.net/buttons/2.3.4/js/buttons.colVis.min.js"></script>
<script src="https://cdn.datatables.net/buttons/1.0.3/js/buttons.colVis.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/2.1.4/jquery.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/moment.js/2.10.6/moment-with-locales.min.js"></script>
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.5/js/bootstrap.min.js"></script>
<script src="//cdn.jsdelivr.net/bootstrap.daterangepicker/1/daterangepicker.js"></script>

<script
    src="https://cdn.datatables.net/s/bs-3.3.5/jszip-2.5.0,pdfmake-0.1.18,dt-1.10.10,b-1.1.0,b-colvis-1.1.0,b-flash-1.1.0,b-html5-1.1.0,b-print-1.1.0,r-2.0.0/datatables.min.js">
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
@endsection
@endsection
