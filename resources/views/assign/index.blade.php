@extends('layouts.admin')

@section('title')
    <title>Assign Driver</title>
@endsection

@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Assign Driver</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li> 
            <li class="breadcrumb-item active">Assign Driver</li>
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
              <label for="" class="col-form-label">Tanggal Schedule</label>
              <div class="col-sm-2">
                <input type="text" class="form-control" id="sched_date" name="sched_date" placeholder="Tanggal Schedule"/> 
              </div>
              <label for="" class="col-form-label">Cabang</label>
              <div class="col-sm-2">
              <select class="form-control select2" name="branch_id" id="branch_id">
                <option value="" selected>--Pilih Cabang--</option>
                @foreach($branchs as $branch) 
                  <option value="{{ $branch->branch_id }}">{{ $branch->branch_id."-".$branch->branch_name }}</option>
                @endforeach
              </select>
              </div>
              <button id="btnviewassign" name="btnviewassign" class="btn btn-primary">View</button>
            </div>
            </form>

            <form id="formassign">
            <div id="showdata"></div>
            </form>

            <div class="row">
              <button class="btn btn-primary" name="btnsaveassign" id="btnsaveassign">Save</button>
            </div>
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
  $('#sched_date').datepicker({
    format: 'yyyy-mm-dd',
    autoclose: true
  });
  
  function checkall(source) { 
    if (source.checked) {
      var daftarku = document.getElementsByName("assign[]");
      var jml=daftarku.length;
      var b=0;
      for (b=0;b<jml;b++)
      {
          daftarku[b].checked=true;
      }
    } else {
      var daftarku = document.getElementsByName("assign[]");
      var jml=daftarku.length;
      var b=0;
      for (b=0;b<jml;b++)
      {
          daftarku[b].checked=false;
      }  
    }
  }

  $("#btnviewassign").click(function(e){ 
    $('#showdata').html("");
    if(!$("#sched_date").val()) {
        toastr.info("Isi Tanggal Schedule ! ");
        $("#sched_date").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang !");
        $("#branch_id").focus();
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
        url: '/assign/list',
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

  $("#btnsaveassign").click(function(e){ 
    
    e.preventDefault();

    var daftarku = document.getElementsByName("assign[]");
    var jml=daftarku.length;
    var b=0;
    var hasil;
    var numhasil = 0;
    for (b=0;b<jml;b++)
    {
      if(daftarku[b].checked) {
        if(numhasil == 0) {
          hasil = daftarku[b].value;
        } else {
          hasil = hasil+","+daftarku[b].value; 
        }
        numhasil = numhasil+1;
      }
    }
     
    $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: { id:hasil } ,
        url: '/assign/submit',
        type: 'POST',
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
          toastr.success("Assign Driver Berhasil");
          loaderout();
          window.location.href = '/assign';
          return false;
        }
      });
    
  });
 
</script>
@endpush