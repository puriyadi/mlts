@extends('layouts.admin')

@section('title')
    <title>Customer</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Customer</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Customer</li>
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
        <h4 class="modal-title">Form Customer</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formcustomer">
                @csrf
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Kode Customer</label>
                        <input type="text" class="form-control" id="cust_id" name="cust_id" placeholder="Kode Customer"/>
                      </div>
                      <div class="col-md-6">
                        <label for="">Cabang</label>
                        <select name="branch_id" id="branch_id" class="form-control select2">
                          <option value="">--Pilih Cabang--</option>
                          @foreach($branchs as $branch)
                          <option value="{{ $branch->branch_id }}">{{ $branch->branch_id." - ".$branch->branch_name }}</option>
                          @endforeach 
                        </select>
                      </div>
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Customer</label>
                    <input type="text" class="form-control" id="cust_name" name="cust_name" placeholder="Customer"/>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat Customer</label>
                    <textarea class="form-control" name="cust_address" id="cust_address" placeholder="Alamat Customer"></textarea>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Telepon 1</label>
                        <input type="text" class="form-control" id="cust_phone1" name="cust_phone1" placeholder="Telepon 1 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Telepon 2</label>
                        <input type="text" class="form-control" id="cust_phone2" name="cust_phone2" placeholder="Telepon 2 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Telepon 3</label>
                        <input type="text" class="form-control" id="cust_phone3" name="cust_phone3" placeholder="Telepon 3 Customer"/>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Fax 1</label>
                        <input type="text" class="form-control" id="cust_fax1" name="cust_fax1" placeholder="Fax 1 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Fax 2</label>
                        <input type="text" class="form-control" id="cust_fax2" name="cust_fax2" placeholder="Fax 2 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Fax 3</label>
                        <input type="text" class="form-control" id="cust_fax3" name="cust_fax3" placeholder="Fax 3 Customer"/>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-4">
                        <label for="">Handphone 1</label>
                        <input type="text" class="form-control" id="cust_handphone1" name="cust_handphone1" placeholder="Handphone 1 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Handphone 2</label>
                        <input type="text" class="form-control" id="cust_handphone2" name="cust_handphone2" placeholder="Handphone 2 Customer"/>
                      </div>
                      <div class="col-md-4">
                        <label for="">Handphone 3</label>
                        <input type="text" class="form-control" id="cust_handphone3" name="cust_handphone3" placeholder="Handphone 3 Customer"/>
                      </div>
                    </div>
                  </div> 
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Kontak</label>
                        <input type="text" class="form-control" id="cust_pic" name="cust_pic" placeholder="Kontak Customer"/>
                      </div>
                      <div class="col-md-3">
                        <label for="">Active</label>
                        <select class="form-control" name="active" id="active">
                          <option value="Y"> Yes </option>
                          <option value="N"> No </option>
                        </select>
                      </div>
                    </div>
                  </div> 
                <!-- /.card-body -->       
              </form> 
          </div>
        </div> 

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosecustomer" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavecustomer">Save</button>
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
                <div class="col-xs-3">List Customer </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="clearcustomer()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblcustomer" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Cabang</th>
                <th>Customer</th>
                <th>Telepon</th>
                <th>Handphone</th>
                <th>Kontak</th>
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
      var tblcustomer=$("#tblcustomer").DataTable({
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
      ajax:"{{ route('datacustomer') }}",
      columns:[
          {data:"cust_id", name:"cust_id"},
          {data:"branch_id", name:"branch_id"},
          {data:"cust_name", name:"cust_name"},
          {data:"cust_phone1", name:"cust_phone1"},
          {data:"cust_handphone1", name:"cust_handphone1"},
          {data:"cust_pic", name:"cust_pic"}, 
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

function clearcustomer() {
    $('#cust_id').val("000");
    $('#cust_id').attr('readonly',true);
    $("#branch_id").val(null).trigger('change');
    $('#cust_name').val(""); 
    $('#cust_address').val("");
    $('#cust_phone1').val("");
    $('#cust_phone2').val("");
    $('#cust_phone3').val("");
    $('#cust_fax1').val("");
    $('#cust_fax2').val("");
    $('#cust_fax3').val("");
    $('#cust_handphone1').val("");
    $('#cust_handphone2').val("");
    $('#cust_handphone3').val("");
    $('#cust_pic').val("");
    $('#active').val("");
    $('#btnsavecustomer').text('Save');
    $('#modalform').modal('show');
}

$("#btnsavecustomer").click(function(e){
    if(!$("#cust_id").val()) {
        toastr.info("Kode Customer Harus Diisi");
        $("#cust_id").focus();
        return false;
    } else if(!$("#cust_name").val()) {
        toastr.info("Nama Customer Harus Diisi");
        $("#cust_name").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang Harus Diisi");
        $("#branch_id").focus();
        return false;
    } else if(!$("#cust_address").val()) {
        toastr.info("Alamat Customer Harus Diisi");
        $("#cust_address").focus();
        return false;
    } else { 
        var formData = $("#formcustomer").serialize(); 
        e.preventDefault();
        
        if($("#btnsavecustomer").text()=="Update") {
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
            url: baseurl+"/customer",
            type: tipe,
            cache: false,
            beforeSend:function(data) {
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosecustomer").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tblcustomer").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosecustomer").click();
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosecustomer").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
                    $("#btnclosecustomer").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});

function editcustomer(id) {
    $.ajax({
        url: baseurl+"/customer/"+id+"/edit",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#cust_id').val(data[0].cust_id);
            $('#cust_id').attr('readonly',true);
            $('#cust_name').val(data[0].cust_name);
            $('#branch_id').val(data[0].branch_id).trigger('change');
            $('#cust_address').val(data[0].cust_address);
            $('#cust_phone1').val(data[0].cust_phone1);
            $('#cust_phone2').val(data[0].cust_phone2);
            $('#cust_phone3').val(data[0].cust_phone3);
            $('#cust_fax1').val(data[0].cust_fax1);
            $('#cust_fax2').val(data[0].cust_fax2);
            $('#cust_fax3').val(data[0].cust_fax3);
            $('#cust_handphone1').val(data[0].cust_handphone1);
            $('#cust_handphone2').val(data[0].cust_handphone2);
            $('#cust_handphone3').val(data[0].cust_handphone3);
            $('#cust_pic').val(data[0].cust_pic);
            $('#active').val(data[0].active);
            $('#btnsavecustomer').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deletecustomer(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Customer "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"customer",
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
                    $("#tblcustomer").DataTable().ajax.reload();
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