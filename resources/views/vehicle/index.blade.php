@extends('layouts.admin')

@section('title')
    <title>Kendaraan</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Kendaraan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Kendaraan</li>
          </ol>
        </div>
      </div>
    </div><!-- /.container-fluid -->
  </section>
@endsection

@section('content')
<div id="modalform" class="modal fade">
  <div class="modal-dialog modal-lg">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title">Form Kendaraan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-12 col-sm-12">
            <ul class="nav nav-tabs" id="custom-content-below-tab" role="tablist">
              <li class="nav-item">
                <a class="nav-link active" id="home-tab" data-toggle="pill" href="#tabhome" role="tab" aria-controls="tabhome" aria-selected="true">Kendaraan</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="doc-tab" data-toggle="pill" href="#tabdoc" role="tab" aria-controls="tabdoc" aria-selected="false">Dokumen</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-messages-tab" data-toggle="pill" href="#custom-content-below-messages" role="tab" aria-controls="custom-content-below-messages" aria-selected="false">Messages</a>
              </li>
              <li class="nav-item">
                <a class="nav-link" id="custom-content-below-settings-tab" data-toggle="pill" href="#custom-content-below-settings" role="tab" aria-controls="custom-content-below-settings" aria-selected="false">Settings</a>
              </li>
            </ul>
            <div class="tab-content" id="custom-content-below-tabContent">
              <div class="tab-pane fade show active" id="tabhome" role="tabpanel" aria-labelledby="home-tab">
                <form id="formvehicle">
                  @csrf
                    <div class="form-group">
                      <label for=""></label>
                    </div>
                    <div class="form-group">
                      <label for="">Kode Kendaraan</label>
                      <input type="text" class="form-control" id="vhc_id" name="vhc_id" placeholder="Kode Kendaraan" onblur="refreshvehicledocs(this.value);"/>
                    </div>
                    <div class="form-group">
                      <label for="">Nama Kendaraan</label>
                      <input type="text" class="form-control" id="vhc_name" name="vhc_name" maxlength="255" placeholder="Nama Kendaraan"/>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-3">
                          <label for="">Plat No Kendaraan</label>
                          <div class="form-group">
                            <input type="text" class="form-control" id="vhc_plat_no" name="vhc_plat_no" maxlength="10" placeholder="Plat No Kendaraan"/>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="">Tahun Kendaraan</label>
                          <div class="form-group">
                            <input type="number" class="form-control" id="vhc_year" name="vhc_year" min="1980" placeholder="Tahun Kendaraan"/>
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="">CC Mesin</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="vhc_cc" name="vhc_cc" placeholder="CC Mesin"/> 
                          </div>
                        </div>
                        <div class="col-md-3">
                          <label for="">Jumlah Ban</label>
                          <div class="input-group">
                            <input type="number" class="form-control" id="vhc_count_ban" min="0" name="vhc_count_ban" placeholder="Jumlah Ban"/> 
                          </div>
                        </div>   
                      </div>
                    </div>
                    <div class="form-group">
                      <div class="row">
                        <div class="col-md-4">
                          <label for="">No Mesin</label>
                          <div class="form-group">
                            <input type="text" class="form-control" id="vhc_machine_no" name="vhc_machine_no" placeholder="No Mesin"/>
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">No Rangka</label>
                          <div class="input-group">
                            <input type="text" class="form-control" id="vhc_frame_no" name="vhc_frame_no" placeholder="No Rangka"/> 
                          </div>
                        </div>
                        <div class="col-md-4">
                          <label for="">Warna Kendaraan</label>
                          <div class="form-group">
                            <input type="text" class="form-control" id="vhc_color" name="vhc_color" placeholder="Warna Kendaraan"/>
                          </div>
                        </div>
                      </div>
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
                      <label for="">Active</label>
                      <select class="form-control" name="active" id="active">
                        <option value="Y"> Yes </option>
                        <option value="N"> No </option>
                      </select>
                    </div>
                    <div class="form-group">
                      <button class="btn btn-primary" id="btnsavevehicle">Save</button>
                    </div>
                  <!-- /.card-body -->       
                </form> 
              </div>
              <div class="tab-pane fade" id="tabdoc" role="tabpanel" aria-labelledby="doc-tab">
                <form id="formdocs">
                  @csrf
                  <div class="form-group">
                    <label for=""></label>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Kode Dokumen</label>
                        <div class="form-group">
                          <select class="form-control select2" id="doc_id" name="doc_id" placeholder="Kode Dokumen">
                            <option value="" selected>--Pilih Dokumen--</option> 
                            @foreach($docs as $doc)
                              <option value="{{ $doc->doc_id }}">{{ $doc->doc_name }}</option>
                            @endforeach
                          </select>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="">No Dokumen</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="doc_no" name="doc_no" maxlength="30" placeholder="No Dokumen"/> 
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="">Masa Habis Berlaku</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="doc_exp_date" name="doc_exp_date" placeholder="Masa Habis Berlaku"/>
                        </div>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Dokumen</label>
                    <input type="text" class="form-control" id="doc_name" name="doc_name" maxlength="255" placeholder="Nama Dokumen"/>
                  </div>
                  <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea class="form-control" id="remark" name="remark" placeholder="Keterangan"></textarea>
                  </div>
                  <div class="form-group">
                    <button class="btn btn-primary" id="btnsavedocs">Save</button>
                    <button class="btn btn-default" id="btnresetdocs">Reset</button>
                  </div>
                </form>
                
                <div class="tab-custom-content">
                  <table id="tblvehicledocs" class="table table-bordered table-striped">
                    <thead>
                      <tr>
                        <th>Doc ID</th>
                        <th>Doc No</th>
                        <th>Doc Name</th>
                        <th>Exp Date</th>
                        <th>Remarks</th>
                        <th>Action</th>
                      </tr>
                    </thead>
                  </table>
                  @csrf
                </div>
              </div>
              <div class="tab-pane fade" id="custom-content-below-messages" role="tabpanel" aria-labelledby="custom-content-below-messages-tab">
                 Morbi turpis dolor, vulputate vitae felis non, tincidunt congue mauris. Phasellus volutpat augue id mi placerat mollis. Vivamus faucibus eu massa eget condimentum. Fusce nec hendrerit sem, ac tristique nulla. Integer vestibulum orci odio. Cras nec augue ipsum. Suspendisse ut velit condimentum, mattis urna a, malesuada nunc. Curabitur eleifend facilisis velit finibus tristique. Nam vulputate, eros non luctus efficitur, ipsum odio volutpat massa, sit amet sollicitudin est libero sed ipsum. Nulla lacinia, ex vitae gravida fermentum, lectus ipsum gravida arcu, id fermentum metus arcu vel metus. Curabitur eget sem eu risus tincidunt eleifend ac ornare magna. 
              </div>
              <div class="tab-pane fade" id="custom-content-below-settings" role="tabpanel" aria-labelledby="custom-content-below-settings-tab">
                 Pellentesque vestibulum commodo nibh nec blandit. Maecenas neque magna, iaculis tempus turpis ac, ornare sodales tellus. Mauris eget blandit dolor. Quisque tincidunt venenatis vulputate. Morbi euismod molestie tristique. Vestibulum consectetur dolor a vestibulum pharetra. Donec interdum placerat urna nec pharetra. Etiam eget dapibus orci, eget aliquet urna. Nunc at consequat diam. Nunc et felis ut nisl commodo dignissim. In hac habitasse platea dictumst. Praesent imperdiet accumsan ex sit amet facilisis. 
              </div>
            </div>
           
          </div>

          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
               
          </div>
        </div> 

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosevehicle" data-dismiss="modal">Close</button>
        <!--<button type="button" class="btn btn-primary" id="btnsavevehicle">Save</button>-->
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
                <div class="col-xs-3">List Kendaraan </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="clearvehicle()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblvehicle" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Kendaraan</th>
                <th>Plat No</th>
                <th>Tahun</th>
                <th>Jumlah Ban</th>
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
      $('#tblvehicle').dataTable().fnClearTable();
      $('#tblvehicle').dataTable().fnDestroy();

      var tblvehicle=$("#tblvehicle").DataTable({
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
      responsive: true,
      rowReorder: {
            selector: 'td:nth-child(2)'
      },
      ajax:"{{ route('datavehicle') }}",
      columns:[
          {data:"vhc_id", name:"vhc_id"},
          {data:"vhc_name", name:"vhc_name"},
          {data:"vhc_plat_no", name:"vhc_plat_no"},
          {data:"vhc_year", name:"vhc_year"}, 
          {data:"vhc_count_ban", name:"vhc_count_ban"},
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
      
      $('#doc_exp_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });
  });
  
  function refreshvehicledocs(id) {

    $(function(){ 
      $('#tblvehicledocs').dataTable().fnClearTable();
      $('#tblvehicledocs').dataTable().fnDestroy();

      var tblvehicledocs=$("#tblvehicledocs").DataTable({
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
      ajax: 'kendaraan/'+id+'/docs',
      columns:[
          {data:"doc_id", name:"doc_id"},
          {data:"doc_no", name:"doc_no"},
          {data:"doc_name", name:"doc_name"},
          {data:"doc_exp_date", name:"doc_exp_date"}, 
          {data:"remark", name:"remark"}, 
          {data:"action", name:"action"}
          ]
      });
    });
  }

</script>
@endpush