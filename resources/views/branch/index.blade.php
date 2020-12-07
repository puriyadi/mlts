@extends('layouts.admin')

@section('title')
    <title>Branch</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Branch</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Branch</li>
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
        <h4 class="modal-title">Form Cabang</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-9"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form role="form" name="formbranch" id="formbranch" method="POST">
                @csrf
                  <div class="form-group">
                    <label for="">Kode Cabang</label>
                    <input type="text" class="form-control" id="branch_id" name="branch_id" placeholder="Kode Cabang">
                  </div>
                  <div class="form-group">
                    <label for="">Cabang</label>
                    <input type="text" class="form-control" id="branch_name" name="branch_name" placeholder="Nama Cabang">
                  </div>
                  <div class="form-group">
                    <label for="">Alamat</label>
                    <textarea class="form-control" id="branch_address" name="branch_address" placeholder="Alamat"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Telephone</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_phone1" name="branch_phone1" placeholder="Telepon 1"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_phone2" name="branch_phone2" placeholder="Telepon 2">
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Fax</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_fax1" name="branch_fax1" placeholder="Fax 1"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_fax2" name="branch_fax2" placeholder="Fax 2">
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Handphone</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_handphone1" name="branch_handphone1" placeholder="Handphone 1"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_handphone2" name="branch_handphone2" placeholder="Handphone 2">
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_email1" name="branch_email1" placeholder="Email 1"> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="branch_email2" name="branch_email2" placeholder="Email 2">
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Kontak Cabang</label>
                    <input type="text" class="form-control" id="branch_pic" name="branch_pic" placeholder="Kontak Perwakilan Cabang">
                  </div>
                  <div class="form-group">
                    <label for="">Sub Cabang Dari</label>
                    <select class="form-control" name="branch_parent" id="branch_parent">
                      <option value="">--Pilih Jika Ada--</option>
                      @foreach($items as $item)
                        <option value="{{ $item->branch_id }}">{{ $item->branch_id." - ".$item->branch_name }}</option>
                      @endforeach
                    </select>
                  </div>

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
        <button type="button" class="btn btn-default" id="btnclosebranch" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavebranch">Save</button>
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
                <div class="col-xs-3">List Cabang </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="clearbranch()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblcabang" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Cabang</th>
                <th>PIC</th>
                <th>Telp</th>
                <th>Fax</th>
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
  var baseurl="";
    $(function(){
      var tblcabang=$("#tblcabang").DataTable({
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
      ajax:"{{ route('datacabang') }}",
      columns:[
          {data:'branch_id',name:"branch_id"},
          {data:'branch_name',name:"branch_name"},
          {data:'branch_pic',name:"branch_pic"},
          {data:'branch_phone1',name:"branch_phone1"},
          {data:'branch_fax1',name:"branch_fax1"},
          {data:'branch_handphone1',name:"branch_handphone1"},
          {data:'active',name:"active"},
          {data:'action', name:'action'}
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