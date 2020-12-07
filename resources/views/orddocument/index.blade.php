@extends('layouts.admin')

@section('title')
    <title>Dokumen</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Dokumen</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Dokumen</li>
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
        <h4 class="modal-title">Form Dokumen</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formdokumen">
                @csrf
                  <div class="form-group">
                    <label for="">Kode Dokumen</label>
                    <input type="text" class="form-control" id="doc_id" name="doc_id" placeholder="Kode Dokumen"/>
                  </div>
                  <div class="form-group">
                    <label for="">Dokumen</label>
                    <input type="text" class="form-control" id="doc_name" name="doc_name" placeholder="Dokumen"/>
                  </div>
                  <div class="form-group">
                    <label for="">Tipe Dokumen</label>
                    <select name="doc_type" id="doc_type" class="form-control select2">
                      <option value="">--Pilih Dokumen--</option>
                      <option value="VC"> Kendaraan </option>
                      <option value="OP"> Operasional </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">Keterangan</label>
                    <textarea name="remark" id="remark" class="form-control"></textarea>
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
        <button type="button" class="btn btn-default" id="btnclosedocument" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavedocument">Save</button>
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
                <div class="col-xs-3">List Dokumen </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="cleardokumen()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tbldokumen" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Dokumen</th>
                <th>Dokumen</th>
                <th>Tipe</th>
                <th>Keterangan</th>
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
      var tbldokumen=$("#tbldokumen").DataTable({
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
      ajax:"{{ route('dataorddocument') }}",
      columns:[
          {data:"doc_id", name:"doc_id"},
          {data:"doc_name", name:"doc_name"},
          {data:"doc_type", name:"doc_type"},
          {data:"remark", name:"remark"},  
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

  
//---------------------------------------- dokumen ---------------------------------------------//

function cleardokumen() {
    $('#doc_id').val("");
    $('#doc_name').val(""); 
    $("#doc_type").val(null).trigger('change');
    $('#remark').val("");
    $('active').val("");
    $('#btnsavedocument').text('Save');
    $('#modalform').modal('show');
}

$("#btnsavedocument").click(function(e){
    if(!$("#doc_id").val()) {
        toastr.info("Kode Dokumen Harus Diisi");
        $("#doc_id").focus();
        return false;
    } else if(!$("#doc_name").val()) {
        toastr.info("Nama Dokumen Harus Diisi");
        $("#doc_name").focus();
        return false;
    } else { 
        var formData = $("#formdokumen").serialize(); 
        e.preventDefault();
        
        if($("#btnsavedocument").text()=="Update") {
            var tipe = "PATCH"; 
        } 
        else {
            var tipe="POST"; 
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            url: baseurl+"/orddocument",
            type: tipe,
            cache: false,
            beforeSend:function(data) {
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosedocument").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tbldokumen").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosedocument").click();
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosedocument").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
                    $("#btnclosedocument").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});

function editdokumen(id) {
    $.ajax({
        url: baseurl+"/orddocument/"+id+"/edit",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#doc_id').val(data[0].doc_id);
            $('#doc_id').attr('readonly',true);
            $('#doc_name').val(data[0].doc_name);
            $('#doc_type').val(data[0].doc_type).trigger('change');
            $('#remark').val(data[0].remark);
            $('#active').val(data[0].active);
            $('#btnsavedocument').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deletedokumen(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Dokumen "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"orddocument",
                cache:false,
                data:{ id: id, _token:token },
                success:function(data) {
                    if(data == "Success") {
                        swal({
                            title: "Deleted!",
                            text: data, 
                            icon: "success"
                        });
                    } else {
                        swal({
                            title:"Error",
                            text:data, 
                            icon:"error"
                        });
                    }
                },
                complete:function() {
                    $('.theme-loader').fadeOut();
                    $("#tbldokumen").DataTable().ajax.reload();
                },
                error:function() {
                    swal({
                        title:"Error",
                        text:"Terjadi Kesalahan!!!", 
                        icon:"error"
                    });
                },
                beforeSend:function() {
                    $('.theme-loader').fadeIn();
                }
            });    
        } else {
            swal("Cancel Delete");
        }
    });
}

</script>
@endpush