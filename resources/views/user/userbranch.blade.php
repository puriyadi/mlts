@extends('layouts.admin')

@section('title')
    <title>User Branchs</title>
@endsection

@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>User Branchs</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">User Branchs</li>
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
        <!-- /.card-header -->
          <div class="card-body">
            <form id="formuserbranch">
            <div class="form-group row">
              <label for="" class="col-form-label">Username</label>
              <div class="col-sm-4">
              <select class="form-control select2" name="username" id="username">
                <option value="" selected>-- Username --</option>
                @foreach($users as $user) 
                  <option value="{{ $user->username }}">{{ $user->username." - ".$user->name }}</option>
                @endforeach
              </select>
              </div>
              <div class="col-sm-2">
                <select class="form-control select2" name="branch_id" id="branch_id">
                  <option value="" selected>-- Branchs --</option>
                  @foreach($branchs as $branch) 
                    <option value="{{ $branch->branch_id }}">{{ $branch->branch_id." - ".$branch->branch_name }}</option>
                  @endforeach
                </select>
                </div>
              <button id="btnchange" name="btnchange" class="btn btn-primary">Change Branchs</button>
            </div>
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

  $("#btnchange").click(function(e){ 
    if(!$("#username").val()) {
        toastr.info("Pilih Username ! ");
        $("#username").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang !");
        $("#branch_id").focus();
        return false;
    } else {
      var formData = $("#formuserbranch").serialize(); 
      e.preventDefault();
      var tipe = "POST";
      
      $.ajax({
        headers: {
          'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
        },
        data: formData,
        url: '/user/branchs',
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
          toastr.success("Change User Branchs Berhasil");
          loaderout();
          return false;
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