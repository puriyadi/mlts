@extends('layouts.admin')

@section('title')
    <title>Drivers</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Drivers</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Drivers</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
<div id="modalform" class="modal fade">
  <div class="modal-dialog">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Driver</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formdriver">
                @csrf
                  <div class="form-group">
                    <label for="">Kode Sopir</label>
                    <input type="text" class="form-control" id="drv_id" name="drv_id" placeholder="Kode Sopir"/>
                  </div>
                  <div class="form-group">
                    <label for="">Kode Employee</label>
                    <select class="form-control select2" id="empl_id" name="empl_id" placeholder="Kode Karyawan"
                    onchange="getemployee('DRV',this.value);">
                      <option value="" selected>--Pilih Karyawan--</option> 
                      @foreach($employees ?? '' as $employee)
                        <option value="{{ $employee->empl_id }}">{{ $employee->empl_id." - ".$employee->empl_fullname }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Kode Cabang</label>
                    <select class="form-control select2" id="branch_id" name="branch_id" placeholder="Kode Cabang">
                      <option value="" selected>--Pilih Cabang--</option> 
                      @foreach($branchs as $branch)
                        <option value="{{ $branch->branch_id }}">{{ $branch->branch_id." - ".$branch->branch_name }}</option>
                      @endforeach
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Driver</label>
                    <input type="text" class="form-control" id="drv_name" name="drv_name" placeholder="Nama Sopir" readonly/>
                  </div>
                  <div class="form-group">
                    <label for="">No Handphone</label>
                    <input type="text" class="form-control" id="drv_handphone" name="drv_handphone" readonly placeholder="Nomor Handphone Driver"/>
                  </div>
                  <!--
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">IMEI Handphone</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="imei_handphone" name="imei_handphone" placeholder="IMEI Handphone"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">Phone ID</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="phone_id" name="phone_id" placeholder="ID Handphone"/> 
                        </div>
                      </div>    
                    </div>
                  </div>
                  -->
                  <div class="form-group">
                    <label for="">Active</label>
                    <select class="form-control" name="active" id="active">
                      <option value="Y"> Yes </option>
                      <option value="N"> No </option>
                    </select>
                  </div>
                <!-- /.card-body -->       
              </form> 
          </div>
        </div> 

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosedriver" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavedriver">Save</button>
      </div>
    </div>
    <!-- /.modal-content -->
  </div>
  <!-- /.modal-dialog -->
</div>

<div class="container-fluid">
  <div class="row">
    <div class="col-12">
      <div class="card">
        <div class="card-header">
          <div class="container">
            <div class="card-title">
              <div class="row">
                <div class="col-xs-3">List Drivers </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="cleardriver()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tbldriver" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Sopir</th>
                <th>Kode Karyawan</th>
                <th>Cabang</th>
                <th>Nama Lengkap</th>
                <th>Handphone</th>
                <th>Active</th>
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
      var tblkaryawan=$("#tbldriver").DataTable({
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
      responsive: true,
      rowReorder: {
            selector: 'td:nth-child(2)'
      },
      order: [[0,"ASC"]],
      ajax:"{{ route('datadriver') }}",
      columns:[
          {data:"drv_id", name:"drv_id"},
          {data:"empl_id", name:"empl_id"},
          {data:"branch_id", name:"branch_id"},
          {data:"drv_name", name:"drv_name"}, 
          {data:"drv_handphone", name:"drv_handphone"},
          {data:"active", name:"active"},
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