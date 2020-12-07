@extends('layouts.admin')

@section('title')
    <title>Schedule</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Schedule</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Schedule</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="container">
            <div class="card-title">
              <div class="row">
                <div class="col-xs-3">List Schedule </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <a href="schedule/tambah"><button class="btn btn-primary btn-xs"><i class="icon-plus3"></i> Tambah</button></a>
                </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblschedule" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Tanggal</th>
                <th>Cabang</th>
                <th>Dana Kerja</th>
                <th>Kode Pembayaran</th>
                <th>Action</th>
              </tr>
            </thead>
          </table>
          @csrf
        </div>
        <!-- /.card-body -->
      </div>
      <!-- /.card -->
    </div>
  </div>
</div>
@endsection

@push('dttable')
<script>
  'use strict'
  //Initialize Select2 Elements
  $('.select2').select2();
  
  var baseurl="";
  $(function(){
      $('#tblschedule').dataTable().fnClearTable();
      $('#tblschedule').dataTable().fnDestroy();

      var tblvehicle=$("#tblschedule").DataTable({
        language: {
          search: '<span>Filter:</span> _INPUT_',
          lengthMenu: '<span>Show:</span> _MENU_',
          paginate: { 'first': 'First', 'last': 'Last', 'next': '&rarr;', 'previous': '&larr;' }
        },
        drawCallback: function () {
          $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').addClass('dropup');
        },
        preDrawCallback: function() {
          $(this).find('tbody tr').slice(-3).find('.dropdown, .btn-group').removeClass('dropup');
        },
      processing:true,
      serverSide:true,
      order: [[0,"ASC"]],
      ajax:"{{ route('dataschedule') }}",
      columns:[
          {data:"sched_id", name:"sched_id"},
          {data:"sched_date", name:"sched_date"},
          {data:"branch_id", name:"branch_id"},
          {data:"grand_total", name:"grand_total"}, 
          {data:"payment_id", name:"payment_id"}, 
          {data:"action", name:"action"}
          ]
      });
      
      $('.datatable-pagination').DataTable({
          pagingType: "simple",
          language: {
              paginate: {'next': 'Next &rarr;', 'previous': '&larr; Prev'}
          }
      });
      $('.datatable-save-state').DataTable({
          stateSave: true
      });
      $('.datatable-scroll-y').DataTable({
          autoWidth: true,
          scrollY: 300
      });
      $('.dataTables_filter input[type=search]').attr('placeholder','Type to filter...');  
  });
</script>
@endpush