@extends('layouts.admin')

@section('title')
    <title>Ganti Driver</title>
@endsection

@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Ganti Driver</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Ganti Driver</li>
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
        <h4 class="modal-title">Form Ganti Driver</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formchangedriver">
                @csrf
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-4">
                      <label for="">Kode Schedule</label>
                      <div class="form-group"> 
                        <input type="text" class="form-control" id="sched_id" name="sched_id" readonly placeholder="Kode Schedule"/>
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">Tanggal Schedule</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="sched_date" name="sched_date" readonly placeholder="Tanggal Schedule"/> 
                      </div>
                    </div>
                    <div class="col-md-4">
                      <label for="">Cabang</label>
                      <div class="input-group">
                        <div class="input-group">
                          <input type="text" class="form-control" id="branch_id" name="branch_id" readonly placeholder="Cabang"/> 
                        </div>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">No SI</label>
                      <div class="form-group">
                        <input type="hidden" name="line" id="line"/>
                        <input type="text" class="form-control" id="si_id" name="si_id" readonly placeholder="No SI"/>
                      </div>
                    </div>
                         
                    <div class="col-md-3">
                      <label for="">Bisnis Unit</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="buss_unit" name="si_buss_unitid" readonly placeholder="Buss Unit"/>
                      </div>
                    </div>
                          
                    <div class="col-md-3">
                      <label for="">Depo</label>
                      <div class="input-group">
                        <input type="text" class="form-control" id="depo" name="depo" readonly placeholder="Depo"/> 
                      </div>         
                    </div>
                  </div>
                </div>
   
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Tempat Muat</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pickup_name" name="pickup_name" readonly placeholder="Tempat Muat"/>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Tempat Bongkar</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="dest_name" name="dest_name" readonly placeholder="Tempat Bongkar"/>
                      </div>
                    </div>
                  </div>
                </div>

                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Kontak Tempat Muat</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="pickup_contact" name="pickup_contact" readonly placeholder="Kontak Tempat Muat"/>
                      </div>
                    </div>
                        
                    <div class="col-md-6">
                      <label for="">Kontak Tempat Bongkar</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="dest_contact" name="dest_contact" readonly placeholder="Kontak Tempat Bongkar"/>
                      </div>
                    </div>
                  </div>
                </div>
                    
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-6">
                      <label for="">Alamat Tempat Muat</label>
                      <div class="form-group">
                        <textarea class="form-control" id="pickup_address" name="pickup_address" readonly placeholder="Alamat Tempat Muat"></textarea>
                      </div>
                    </div>
                    <div class="col-md-6">
                      <label for="">Alamat Tempat Bongkar</label>
                      <div class="form-group">
                        <textarea class="form-control" id="dest_address" name="dest_address" readonly placeholder="Alamat Tempat Bongkar"></textarea>
                      </div>
                    </div>
                  </div>
                </div>
                    
                <div class="form-group">
                  <label for="">Customer</label>
                  <input type="text" class="form-control" name="cust_id" id="cust_id" readonly placeholder="Customer">
                </div>
                    
                <div class="form-group">
                  <label for="">Alamat Customer</label>
                  <textarea class="form-control" id="cust_address" name="cust_address" readonly placeholder="Customer Address Untuk Penagihan"></textarea>
                </div>
                    
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Container</label>
                      <div class="form-group">
                        <input type="text" class="form-control" name="cont_id" id="cont_id" readonly> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">No Container</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="cont_no" name="cont_no" readonly placeholder="No Container"/>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">No Seal</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="seal_no" name="seal_no" readonly placeholder="No Seal"/> 
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Gembok</label>
                      <div class="form-group">
                        <input type="text" class="form-control" id="padlock" name="padlock" readonly placeholder="No Seal"/> 
                      </div>
                    </div>
                  </div>
                </div>
                    
                <div class="form-group">
                  <div class="row">
                    <div class="col-md-3">
                      <label for="">Sopir</label>
                      <div class="form-group">
                        <select name="drv_id" id="drv_id" class="form-control select2">
                          <option value="" selected>--Pilih Sopir--</option>
                          @foreach($drivers as $driver) 
                            <option value="{{ $driver->drv_id }}">{{ $driver->drv_name }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Kendaraan</label>
                      <div class="input-group">
                        <select name="vhc_id" id="vhc_id" class="form-control select2">
                          <option value="" selected>--Pilih Kendaraan--</option>
                          @foreach($vehicles as $vehicle) 
                            <option value="{{ $vehicle->vhc_id }}">{{ $vehicle->vhc_plat_no }}</option>
                          @endforeach
                        </select>
                      </div>
                    </div>
                    <div class="col-md-3">
                      <label for="">Dana Kerja</label>
                      <div class="input-group">
                        <input type="number" class="form-control" min="0" id="amount" name="amount"/>
                      </div>
                    </div>
                  </div>
                </div>
            </form>
          </div>
        </div> 

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosechangedriver" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavechangedriver">Save</button>
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
                <div class="col-xs-3">List Ganti Driver </div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblchangedriver" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Sched</th>
                <th>Tanggal</th>
                <th>SI</th>
                <th>Muat</th>
                <th>Bongkar</th>
                <th>Driver</th>
                <th>Kendaraan</th>
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
      $('#tblchangedriver').dataTable().fnClearTable();
      $('#tblchangedriver').dataTable().fnDestroy();

      var tblchangedriver=$("#tblchangedriver").DataTable({
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
      ajax:"{{ route('changedriverlist') }}",
      columns:[
          {data:"sched_id", name:"sched_id"},
          {data:"sched_date", name:"sched_date"},
          {data:"si_id", name:"si_id"},
          {data:"pickup_name", name:"pickup_name"}, 
          {data:"dest_name", name:"dest_name"},
          {data:"drv_name", name:"drv_name"},
          {data:"vhc_plat_no", name:"vhc_plat_no"},
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

  function formchangedriver(id) {
    $.ajax({
      url: baseurl+"/changedriver/"+id+"/edit",
      method: "GET",
      data: "", 
      success: function (data) {
        $('#sched_id').val(data[0].sched_id); 
        $('#line').val(data[0].line);
        $('#sched_date').val(data[0].sched_date);
        $('#branch_id').val(data[0].branch_id);
        $('#si_id').val(data[0].si_id);
        $('#buss_unit').val(data[0].buss_unit);
        $('#depo').val(data[0].depo);
        $('#pickup_name').val(data[0].pickup_name);
        $('#dest_name').val(data[0].dest_name);
        $('#pickup_contact').val(data[0].pickup_contact);
        $('#dest_contact').val(data[0].dest_contact);
        $('#pickup_address').val(data[0].pickup_address);
        $('#dest_address').val(data[0].dest_address);
        $('#cust_id').val(data[0].cust_id);
        $('#cust_address').val(data[0].cust_address);
        $('#cont_id').val(data[0].cont_id);
        $('#cont_no').val(data[0].cont_no);
        $('#seal_no').val(data[0].seal_no);
        $('#padlock').val(data[0].padlock);
        $("#drv_id").val(null).trigger('change');
        $("#vhc_id").val(null).trigger('change');
        $("#amount").val(0);
        $('#modalform').modal('show');
      }
    });
  }

  $("#btnsavechangedriver").click(function(e){
    if(!$("#drv_id").val()) {
        toastr.info("Pilih Driver !!");
        $("#drv_id").focus();
        return false;
    } else if(!$("#vhc_id").val()) {
        toastr.info("Pilih Kendaraan !!");
        $("#vhc_id").focus();
        return false;
    }  else if(parseInt($("#amount").val()) <= 0) {
        toastr.info("Amount Tidak Boleh 0 !!");
        return false;
    } else {
      var formData = $("#formchangedriver").serialize(); 
      e.preventDefault();
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: formData,
        url: baseurl+"/changedriver",
        type: 'POST',
        cache: false,
        beforeSend:function(data) {
          loaderin();
        },
        error:function(data) {
          toastr.error(data);
          loaderout();
          $("#btnclosechangedriver").click();
            return false;
          },
          complete:function() {
            loaderout(); 
            $("#tblchangedriver").DataTable().ajax.reload();
            return false;
          },
          success:function(data) {
            if(data=="Save") {
              toastr.success("Data Berhasil Disimpan");
              $("#btnclosechangedriver").click();
              loaderout();
              return false;
            } else if(data=="Failed Save") {
              toastr.info("Data Tidak Berhasil Disimpan");
              $("#btnclosechangedriver").click();
              loaderout();
              return false;
            } else {
              toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
              $("#btnclosechangedriver").click();
              loaderout();
              return false;
            }
          }
      });
    } 
  });

</script>
@endpush