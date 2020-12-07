@extends('layouts.admin')

@section('title')
    <title>Containers</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Containers</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Containers</li>
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
        <h4 class="modal-title">Form Containers</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formcontainer">
                @csrf
                  <div class="form-group">
                    <label for="">Kode Container</label>
                    <input type="text" class="form-control" id="cont_id" name="cont_id" placeholder="Kode Container"/>
                  </div>
                  <div class="form-group">
                    <label for="">Container</label>
                    <input type="text" class="form-control" id="cont_name" name="cont_name" placeholder="Container"/>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Panjang</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="cont_length" name="cont_length" placeholder="Panjang Container"/>
                        </div>
                      </div>
                      <div class="col-md-4">
                        <label for="">Lebar</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="cont_width" name="cont_width" placeholder="Lebar Container"/> 
                        </div>
                      </div>    
                      <div class="col-md-4">
                        <label for="">Tinggi</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="cont_height" name="cont_height" placeholder="Tinggi Container"/> 
                        </div>
                      </div>    
                    </div>
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
        <button type="button" class="btn btn-default" id="btnclosecontainer" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavecontainer">Save</button>
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
                <div class="col-xs-3">List Containers </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="clearcontainer()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblcontainer" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode Cont</th>
                <th>Containers</th>
                <th>Panjang</th>
                <th>Lebar</th>
                <th>Tinggi</th>
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
      var tblcontainer=$("#tblcontainer").DataTable({
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
      ajax:"{{ route('datacontainer') }}",
      columns:[
          {data:"cont_id", name:"cont_id"},
          {data:"cont_name", name:"cont_name"},
          {data:"cont_length", name:"cont_length"},
          {data:"cont_width", name:"cont_width"}, 
          {data:"cont_height", name:"cont_height"},
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

  
//---------------------------------------- container ---------------------------------------------//

function clearcontainer() {
    $('#cont_id').val("");
    $('#cont_name').val("");
    $('#cont_length').val("");
    $('#cont_width').val("");
    $('#cont_height').val("");
    $('active').val("");
    $('#btnsavecontainer').text('Save');
    $('#modalform').modal('show');
}

$("#btnsavecontainer").click(function(e){
    if(!$("#cont_id").val()) {
        toastr.info("Kode Container Harus Diisi");
        $("#cont_id").focus();
        return false;
    } else if(!$("#cont_name").val()) {
        toastr.info("Nama Container Harus Diisi");
        $("#cont_name").focus();
        return false;
    } else { 
        var formData = $("#formcontainer").serialize(); 
        e.preventDefault();
        
        if($("#btnsavecontainer").text()=="Update") {
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
            url: baseurl+"/container",
            type: tipe,
            cache: false,
            beforeSend:function(data) {
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosecontainer").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tblcontainer").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosecontainer").click();
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosecontainer").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
                    $("#btnclosecontainer").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});

function editcontainer(id) {
    $.ajax({
        url: baseurl+"/container/"+id+"/edit",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#cont_id').val(data[0].cont_id);
            $('#cont_id').attr('readonly',true);
            $('#cont_name').val(data[0].cont_name);
            $('#cont_length').val(data[0].cont_length);
            $('#cont_width').val(data[0].cont_width);
            $('#cont_height').val(data[0].cont_height);
            $('#active').val(data[0].active);
            $('#btnsavecontainer').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deletecontainer(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Container "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"container",
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
                    $("#tblcontainer").DataTable().ajax.reload();
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