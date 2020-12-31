@extends('layouts.admin')

@section('title')
    <title>Laporan Ritase Driver</title>
@endsection

@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Laporan Ritase Driver</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li> 
            <li class="breadcrumb-item active">Laporan Ritase Driver</li>
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
        <!--
        <div class="card-header">
          <div class="container">
            <div class="card-title">
              <div class="row">
                
              </div>
            </div>
          </div>
        </div> -->
        <!-- /.card-header -->
          <div class="card-body">
            <form id="formviewassign">
            <div class="form-group row">
              <div>
                <label for="" class="col-form-label">Tanggal</label>
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control" id="from" name="from" placeholder="From"/> 
              </div>
              <div>
                <label for="" class="col-form-label">s/d</label>
              </div>
              <div class="col-md-2">
                <input type="text" class="form-control" id="to" name="to" placeholder="To"/> 
              </div>&nbsp;
              <div>
                <select class="form-control select2" name="branch_id" id="branch_id">
                  <option value="" selected>--Pilih Cabang--</option>
                  @foreach($branchs as $branch) 
                    <option value="{{ $branch->branch_id }}">{{ $branch->branch_id."-".$branch->branch_name }}</option>
                  @endforeach
                </select>
              </div>&nbsp;
              <div>
                <select class="form-control select2" name="drv_id" id="drv_id">
                  <option value="" selected>--Pilih Sopir--</option>
                  @foreach($drivers as $drv) 
                    <option value="{{ $drv->drv_id }}">{{ $drv->drv_name. " - (".$drv->branch_name.")" }}</option>
                  @endforeach
                </select>
              </div>&nbsp;
              <div>
                <button id="btnviewassign" name="btnviewassign" class="btn btn-primary">View</button>
                <a href="rpt_schedule/excel" target="_blank">
                  <button class="btn btn-primary" name="btnexportexcel" id="btnexportexcel">Excel</button>
                </a>
              </div>
            </div>
            </form>

            <form id="formview">
            <div id="showdata"></div>
            </form>
          </div>
        
      </div>
    </div>
  </div>
</div>
@endsection

@push('dttable')
<script>
  'use strict'
  //Initialize Select2 Elements
  $('.select2').select2();
  $('#from').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  $('#to').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  
  $("#btnviewassign").click(function(e){ 
    $('#showdata').html("");
    if(!$("#from").val()) {
        toastr.info("Isi Tanggal From ! ");
        $("#from").focus();
        return false;
    } else if(!$("#to").val()) {
        toastr.info("Isi Tanggal To ! ");
        $("#to").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang !");
        $("#branch_id").focus();
        return false;
    } else if(!$("#drv_id").val()) {
        toastr.info("Pilih Driver !");
        $("#drv_id").focus();
        return false;
    } else {
      var formData = $("#formviewassign").serialize(); 
      e.preventDefault();
      if($("#btnviewassign").text()=="View") {
        var tipe = "POST";
      }

      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: formData,
        url: '/rpt_ritase/list',
        type: tipe,
        cache: false,
        beforeSend:function(data) {
          loaderin();
        },
        error:function(data) {
          toastr.error(data);
          loaderout(); 
          return false;
        },
        complete:function() {
          loaderout(); 
          return false;
        },
        success:function(data) {
          $('#showdata').html(data);
        }
      });
    }
  });
  
  /*
  var btnsaveassign = document.getElementById("btnsaveassign");
  alert("btn "+btnsaveassign);
  
  btnsaveassign.addEventListener('click', function(e) {
    alert("prevent");
    e.preventDefault();
  });
  */

</script>
@endpush