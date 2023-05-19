@extends('layouts.parent2')
@section('title','List of Admin')
@section('content')
@include('messages.message')
    {{-- {{ dd($admins[0]['id']) }} --}}
<div class="col-lg-12" bis_skin_checked="1">
    <div class="white_card card_height_100 mb_30 pt-4" bis_skin_checked="1">
        <div class="white_card_body" bis_skin_checked="1">
            <div class="QA_section" bis_skin_checked="1">
                <div class="white_box_tittle list_header" bis_skin_checked="1">
                    <h4>@yield('title')</h4>
                    <div class="box_right d-flex lms_block" bis_skin_checked="1">
                        <div class="serach_field_2" bis_skin_checked="1">
                            <div class="search_inner" bis_skin_checked="1">
                                    <input type="text" id="myInput" onkeyup="myFunction()" placeholder="Search for id.." title="Type id">                                </div>
                        </div>
                    </div>
                </div>
                <div class="QA_table mb_30" bis_skin_checked="1">

                    <div id="DataTables_Table_0_wrapper" class="dataTables_wrapper no-footer" bis_skin_checked="1">
                        <table class="table lms_table_active dataTable no-footer dtr-inline" id="DataTables_Table_0"
                            role="grid" aria-describedby="DataTables_Table_0_info" style="width: 843px;">
                            <thead>
                                <tr role="row">
                                    <th scope="col" class="sorting_asc" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 29.0057px;" aria-sort="ascending"
                                        aria-label="id: activate to sort column descending">id</th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 74px;"
                                        aria-label="User: activate to sort column ascending">name</th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 64px;"
                                        aria-label="Role: activate to sort column ascending">email</th>
                                    <th scope="col" class="sorting" tabindex="0" aria-controls="DataTables_Table_0"
                                        rowspan="1" colspan="1" style="width: 116.006px;"
                                        aria-label="Action: activate to sort column ascending">Action</th>
                                </tr>
                            </thead>
                            <tbody>
                                @foreach ($admins as $student)
                                <tr role="row" class="odd">
                                    <th scope="row" tabindex="0" class="sorting_1">
                                         {{-- <a href="{{ route('edit', $student->id) }}"> --}}
                                            {{ $student->id }}</th>
                                    <td>{{ $student->name }}</td>
                                    <td>{{ $student->email }}</td>
                                    <td>
                                        <div class="action_btns d-flex" bis_skin_checked="1">
                                            <form action="{{ route('adminedit') }}" method="post">
                                                @csrf
                                                <input type="hidden" name="id" value="{{ $student->id }}">
                                                <button class="action_btn"><i class="far fa-edit"></i></button>
                                            </form>
                                            <form action="{{ route('admindelete', $student->id) }}" method="post">
                                                @csrf
                                                @method('DELETE')
                                                <button class="action_btn"><i class="fas fa-trash"></i></button>
                                            </form>
                                        </div>
                                    </td>
                                </tr>
                                @endforeach
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <script>
        function myFunction() {
          var input, filter, table, tr, td, i, txtValue;
          input = document.getElementById("myInput");
          filter = input.value.toUpperCase();
          table = document.getElementById("DataTables_Table_0");
          tr = table.getElementsByTagName("tr");
          for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("tr")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
            th = table.getElementsByTagName("th");
            for (i = 0; i < tr.length; i++) {
            td = tr[i].getElementsByTagName("th")[0];
            if (td) {
              txtValue = td.textContent || td.innerText;
              if (txtValue.toUpperCase().indexOf(filter) > -1) {
                tr[i].style.display = "";
              } else {
                tr[i].style.display = "none";
              }
            }       
          }
        }
            </script>

@endsection