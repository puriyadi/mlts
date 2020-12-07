@extends('layouts.admin')

@section('title')
    <title>Karyawan</title>
@endsection


@section('breadcrumb')
  <!-- Content Header (Page header) -->
  <section class="content-header">
    <div class="container-fluid">
      <div class="row mb-2">
        <div class="col-sm-6">
          <h1>Karyawan</h1>
        </div>
        <div class="col-sm-6">
          <ol class="breadcrumb float-sm-right">
            <li class="breadcrumb-item"><a href="#">Home</a></li>
            <li class="breadcrumb-item active">Karyawan</li>
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
        <h4 class="modal-title">Form Karyawan</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close">
          <span aria-hidden="true">&times;</span>
        </button>
      </div>
      <div class="modal-body">
        <div class="row">
          <div class="col-md-12"> 
              <!-- /.card-header -->
              <!-- form start -->
              <form id="formkaryawan">
                @csrf
                  <div class="form-group">
                    <label for="">Kode Karyawan</label>
                    <input type="text" class="form-control" id="empl_id" name="empl_id" placeholder="Kode Karyawan"/>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Lengkap</label>
                    <input type="text" class="form-control" id="empl_fullname" name="empl_fullname" placeholder="Nama Lengkap"/>
                  </div>
                  <div class="form-group">
                    <label for="">Nama Singkatan</label>
                    <input type="text" class="form-control" id="empl_shortname" name="empl_shortname" placeholder="Nama Singkatan"/>
                  </div>
                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Tempat Lahir</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_placebirth" name="empl_placebirth" placeholder="Tempat Lahir"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">Tanggal Lahir</label>
                        <div class="input-group">
                          <input type="text" class="form-control" id="empl_birthday" name="empl_birthday" placeholder="Tanggal Lahir"/> 
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Jenis Kelamin</label>
                    <select class="form-control" name="empl_gender" id="empl_gender">
                      <option value=""> --Jenis Kelamin-- </option>
                      <option value="P"> Pria </option>
                      <option value="W"> Wanita </option>
                    </select>
                  </div>
                  <div class="form-group">
                    <label for="">No KTP</label>
                    <input type="text" class="form-control" id="empl_on_id" name="empl_on_id" maxlength="16" placeholder="No Identitas KTP"/>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat KTP</label>
                    <textarea class="form-control" id="empl_address_on_id" name="empl_address_on_id" placeholder="Alamat KTP"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Alamat Sekarang</label>
                    <input type="checkbox" id="empl_check_address_current" onclick="sameidentitas()"/>
                    <label class="form-check-label"> Sama dengan KTP</label>
                    <textarea class="form-control" id="empl_address_current" name="empl_address_current" placeholder="Alamat Sekarang"></textarea>
                  </div>
                  <div class="form-group">
                    <label for="">Telephone</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_phone1" name="empl_phone1" maxlength="13" placeholder="Telepon 1"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_phone2" name="empl_phone2" maxlength="13" placeholder="Telepon 2"/>
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Handphone</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_handphone1" name="empl_handphone1" maxlength="13" placeholder="Handphone 1"/> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_handphone2" name="empl_handphone2" maxlength="13" placeholder="Handphone 2"/>
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Email</label>
                    <div class="row">
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_email1" name="empl_email1" placeholder="Email 1"/> 
                        </div>
                      </div>
                      <div class="col-md-6">
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_email2" name="empl_email2" placeholder="Email 2"/>
                        </div>
                      </div>    
                    </div>
                  </div>
                  <div class="form-group">
                    <label for="">Hobi</label>
                    <input type="text" class="form-control" id="empl_hobbies" name="empl_hobbies" placeholder="Hobi"/>
                  </div>
                  <div class="form-group">
                    <label for="">Golongan Darah</label>
                    <input type="text" class="form-control" id="empl_blood" name="empl_blood" maxlength="2" placeholder="Golongan Darah"/>
                  </div>
                  <div class="form-group">
                    <label for="">Agama</label>
                    <select class="form-control" name="relg_id" id="relg_id">
                      <option value=""> --Pilih Agama-- </option>
                      <option value="Islam"> Islam </option>
                      <option value="Kristen"> Kristen </option>
                      <option value="Khatolik"> Khatolik </option>
                      <option value="Buddha"> Buddha </option>
                      <option value="Hindu"> Hindu </option>
                      <option value="Kong Hu Cu"> Kong Hu Cu </option>
                    </select>
                  </div>

                  <div class="form-group">
                    <div class="row">
                      <div class="col-md-6">
                        <label for="">Tgl Mulai Kerja</label>
                        <div class="form-group">
                          <input type="text" class="form-control" id="empl_start_work" name="empl_start_work" placeholder="Tanggal Mulai Bekerja"/>
                        </div>
                      </div>
                      <div class="col-md-6">
                        <label for="">Tgl Resign</label>
                        <div class="input-group">
                          <div class="input-group-prepend">
                            <span class="input-group-text"> 
                              <input type="checkbox" name="empl_resign" id="empl_resign" onclick="checkresign()"/>
                            </span>
                          </div>
                          <input type="text" class="form-control" id="empl_resign_date" name="empl_resign_date" placeholder="Tanggal Berakhir Bekerja"/>
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

                  <div class="form-group">
                    <label for="">Photo</label>
                    <div class="input-group">
                      <div class="custom-file">
                        <input type="file" name="inputFile" id="inputFile" /> 
                        <input type="hidden" name="oldFile" id="oldFile" />
                      </div>
                    </div>
                  </div>
                  
                  <div class="form-group">
                    <div class="col-sm-6">
                      <img id="empl_photo" class="img-fluid" src="img/people.png" 
                      width="100" height="100" alt="Photo Profile"/>
                    </div>
                  </div>
                <!-- /.card-body -->       
              </form> 
          </div>
        </div> 

      </div>
      <div class="modal-footer justify-content-between">
        <button type="button" class="btn btn-default" id="btnclosekaryawan" data-dismiss="modal">Close</button>
        <button type="button" class="btn btn-primary" id="btnsavekaryawan">Save</button>
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
                <div class="col-xs-3">List Karyawan </div>
                <div class="col-xs-3"> &nbsp;&nbsp;&nbsp;
                  <button class="btn btn-primary btn-xs" onclick="clearkaryawan()"><i class="icon-plus3"></i> Tambah </button></div>
              </div>
            </div>
          </div>
        </div>
        <!-- /.card-header -->
        <div class="card-body">
          <table id="tblkaryawan" class="table table-bordered table-striped">
            <thead>
              <tr>
                <th>Kode</th>
                <th>Nama Lengkap</th>
                <th>TTL</th>
                <th>Gender</th>
                <th>Alamat</th>
                <th>Handphone</th>
                <th>Resign</th>
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
      var tblkaryawan=$("#tblkaryawan").DataTable({
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
      ajax:"{{ route('datakaryawan') }}",
      columns:[
          {data:"empl_id", name:"empl_id"},
          {data:"empl_fullname", name:"empl_fullname"}, 
          {data:"empl_placebirth",render: function (data, type, row) {
                return row.empl_placebirth + ' , ' + row.empl_birthday
          }, name: "empl_placebirth" },
          {data:"empl_gender", name:"empl_gender"},
          {data:"empl_address_current", name:"empl_address_current"},
          {data:"empl_handphone1", name:"empl_handphone1"},
          {data:"empl_resign_date", name:"empl_resign_date"},
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

      $('#empl_birthday').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      $('#empl_start_work').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });

      $('#empl_resign_date').datepicker({
        format: 'yyyy-mm-dd',
        autoclose: true
      });
  });
  
 

</script>
@endpush