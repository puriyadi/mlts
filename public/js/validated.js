//---------------------------------------- general ---------------------------------------------//
'use strict'
function loaderin() {
    $(".theme-loader").fadeIn({
        'opacity': '0',
    },2000);
}

function loaderout() {
    $(".theme-loader").fadeOut();
}

var baseurl="";

//---------------------------------------- branch ---------------------------------------------//
$("#btnsavebranch").click(function(){
    if(!$("#branch_id").val()) {
        toastr.info("Kode Cabang Harus Diisi");
        $("#branch_id").focus();
        return false;
    } else if(!$("#branch_name").val()) {
        toastr.info("Nama Cabang Harus Diisi");
        $("#branch_name").focus();
        return false;
    } else if(!$("#branch_phone1").val()) {
        toastr.info("No Telp Cabang Harus Diisi");
        $("#branch_phone1").focus();
        return false;
    } else if(!$("#branch_handphone1").val()) {
        toastr.info("No Handphone Cabang Harus Diisi");
        $("#branch_handphone1").focus();
        return false;
    } else if(!$("#branch_pic").val()) {
        toastr.info("Kontak cabang yang bisa dihubungi Harus Diisi");
        $("#branch_pic").focus();
        return false;
    } else if(!$("#branch_address").val()) {
        toastr.info("Alamat Cabang Harus Diisi!!!");
        $("#branch_address").focus();
        return false;
    } else if(!$("#active").val()) {
        toastr.info("Pilih Aktive Yes/No !!");
        $("#active").focus();
        return false;
    } else {
        var data=$("#formbranch").serialize();

        if($("#btnsavebranch").text()=="Update") {
            var tipe="PATCH";
        } else {
            var tipe="POST";
        }
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content')
            },
            cache:false,
            data:data,
            url:baseurl+"branch",
            type:tipe,
            beforeSend:function() { 
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosebranch").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tblcabang").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosebranch").click();
                    loaderout();
                    return false;
                }
                else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosebranch").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT");
                    $("#btnclosebranch").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});

function editbranch(id) {
    $.ajax({
        url: baseurl+"/branch/"+id+"/edit",
        method: "GET",
        data: "", 
        success: function (data) {
            $('#branch_id').val(data[0].branch_id);
            $('#branch_id').attr('readonly',true);
            $('#branch_name').val(data[0].branch_name);
            $('#branch_address').val(data[0].branch_address);
            $('#branch_phone1').val(data[0].branch_phone1);
            $('#branch_phone2').val(data[0].branch_phone2);
            $('#branch_fax1').val(data[0].branch_fax1);
            $('#branch_fax2').val(data[0].branch_fax2);
            $('#branch_handphone1').val(data[0].branch_handphone1);
            $('#branch_handphone2').val(data[0].branch_handphone2);
            $('#branch_email1').val(data[0].branch_email1);
            $('#branch_email2').val(data[0].branch_email2);
            $('#branch_pic').val(data[0].branch_pic);
            $('#branch_parent').val(data[0].branch_parent);
            $('#active').val(data[0].active);
            $('#btnsavebranch').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deletebranch(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Cabang "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"branch",
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
                    $("#tblcabang").DataTable().ajax.reload();
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

function clearbranch() {
    $('#branch_id').attr('readonly',false);
    $('#branch_id').val("");
    $('#branch_name').val("");
    $('#branch_address').val("");
    $('#branch_phone1').val("");
    $('#branch_phone2').val("");
    $('#branch_fax1').val("");
    $('#branch_fax2').val("");
    $('#branch_handphone1').val("");
    $('#branch_handphone2').val("");
    $('#branch_email1').val("");
    $('#branch_email2').val("");
    $('#branch_pic').val("");
    $('#branch_parent').val("");
    $('#active').val("");
    $('#btnsavebranch').text('Save');
    $('#modalform').modal('show');
}

//---------------------------------------- karyawan ---------------------------------------------//

function clearkaryawan() {
    $('#empl_id').attr('readonly',false);
    $('#empl_id').val("");
    $('#empl_fullname').val("");
    $('#empl_shortname').val("");
    $('#empl_birthday').val("");
    $('#empl_placebirth').val("");
    $('#empl_gender').val("");
    $('#empl_on_id').val("");
    $('#empl_address_on_id').val("");
    $('#empl_check_address_current').val(!$('#empl_check_address_current').is(':checked')); 
    $('#empl_check_address_current').prop('checked', false);
    $('#empl_address_current').val("");
    $('#empl_address_current').attr('readonly',false);
    $('#empl_phone1').val("");
    $('#empl_phone2').val("");
    $('#empl_handphone1').val("");
    $('#empl_handphone2').val("");
    $('#empl_email1').val("");
    $('#empl_email2').val("");
    $('#empl_hobbies').val("");
    $('#empl_blood').val("");
    $('#relg_id').val("");
    $('#empl_start_work').val("");  
    $('#empl_resign').prop('checked', false);
    $('#empl_resign_date').val("");
    $('#empl_resign_date').attr('disabled',true);
    $('active').val("");
    var image = $('#empl_photo')[0];
    var downloadingImage = new Image();
    downloadingImage.onload = function(){
        image.src =  this.src;   
    }; 
    downloadingImage.src = "img/people.png";
    $('#btnsavekaryawan').text('Save');
    $('#modalform').modal('show');
}

function sameidentitas() {
    if ( $('#empl_check_address_current').is(':checked') ) { 
       $('#empl_address_current').val($('#empl_address_on_id').val());
       $('#empl_address_current').attr('readonly', true);
    } else {
       $('#empl_address_current').val("");
       $('#empl_address_current').attr('readonly', false);
    }
}

function checkresign() {
    if ( $('#empl_resign').is(':checked') ) { 
        $('#empl_resign_date').attr('disabled', false);
    }
    else {
        $('#empl_resign_date').attr('disabled', true);
        $('#empl_resign_date').val("");
    }
}

$("#btnsavekaryawan").click(function(e){
    if(!$("#empl_id").val())
    {
        toastr.info("Kode Karyawan Harus Diisi");
        $("#empl_id").focus();
        return false;
    }
    else if(!$("#empl_fullname").val())
    {
        toastr.info("Nama Lengkap Harus Diisi");
        $("#empl_fullname").focus();
        return false;
    }
    else if(!$("#empl_shortname").val())
    {
        toastr.info("Nama Singkatan Harus Diisi");
        $("#empl_shortname").focus();
        return false;
    }
    else if(!$("#empl_on_id").val())
    {
        toastr.info("No Identitas Harus Diisi");
        $("#empl_on_id").focus();
        return false;
    }
    else if(!$("#empl_address_on_id").val())
    {
        toastr.info("Alamat KTP Harus Diisi");
        $("#empl_address_on_id").focus();
        return false;
    }
    else if(!$("#empl_address_current").val())
    {
        toastr.info("Alamat Sekarang Harus Diisi");
        $("#branch_pic").focus();
        return false;
    }
    else if(!$("#empl_handphone1").val())
    {
        toastr.info("Handphone Karyawan Harus Diisi!!!");
        $("#empl_handphone1").focus();
        return false;
    }
    else if(!$("#relg_id").val())
    {
        toastr.info("Agama Harus Diisi!!!");
        $("#relg_id").focus();
        return false;
    }
    else if(!$("#empl_start_work").val())
    {
        toastr.info("Tanggal Mulai Bekerja Harus Diisi!!!");
        $("#empl_start_work").focus();
        return false;
    }
    else if(!$("#active").val())
    {
        toastr.info("Pilih Aktive Yes/No !!");
        $("#active").focus();
        return false;
    }
    else
    {
        var form = $("#formkaryawan")[0];
        var formData = new FormData(form);
        //var formData = $("#formkaryawan").serialize();
        /*
        var form = $("#formkaryawan");
        var formData = false;
        if (window.FormData){
            var formData = new FormData(form[0]);
        }
        */
        e.preventDefault();
        var linkurl;

        if($("#btnsavekaryawan").text()=="Update") {
            var tipe = "POST";
            linkurl = baseurl+"karyawan/update";
        } 
        else {
            var tipe="POST";
            linkurl = baseurl+"karyawan";
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData, //formData ? formData : form.serialize()  ,
            url: linkurl,
            type: tipe,
            cache: false,
            contentType: false,
            processData: false,
            enctype: 'multipart/form-data',
            beforeSend:function(data) {
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosekaryawan").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tblkaryawan").DataTable().ajax.reload();
                return false;
            },
            success:function(data)
            {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosekaryawan").click();
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosekaryawan").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
                    $("#btnclosekaryawan").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});

function editemployee(id) {
    $.ajax({
        url: baseurl+"/karyawan/"+id+"/edit",
        method: "GET",
        data: { id: id },
        success: function (data) {
            $('#empl_id').val(data[0].empl_id);
            $('#empl_id').attr('readonly',true);
            $('#empl_fullname').val(data[0].empl_fullname);
            $('#empl_shortname').val(data[0].empl_shortname);
            $('#empl_birthday').val(data[0].empl_birthday);
            $('#empl_placebirth').val(data[0].empl_placebirth);
            $('#empl_gender').val(data[0].empl_gender);
            $('#empl_on_id').val(data[0].empl_on_id);
            $('#empl_address_on_id').val(data[0].empl_address_on_id);
            $('#empl_address_current').val(data[0].empl_address_current);
            if (data[0].empl_address_on_id == data[0].empl_address_current) {
                $('#empl_check_address_current').prop('checked', true);
                $('#empl_address_current').attr('readonly', true);
            }
            $('#empl_phone1').val(data[0].empl_phone1);
            $('#empl_phone2').val(data[0].empl_phone2);
            $('#empl_handphone1').val(data[0].empl_handphone1);
            $('#empl_handphone2').val(data[0].empl_handphone2);
            $('#empl_email1').val(data[0].empl_email1);
            $('#empl_email2').val(data[0].empl_email2);
            $('#empl_hobbies').val(data[0].empl_hobbies);
            $('#empl_blood').val(data[0].empl_blood);
            $('#relg_id').val(data[0].relg_id);
            $('#empl_start_work').val(data[0].empl_start_work); 
            if (data[0].empl_resign_date === '' || data[0].empl_resign_date === null || data[0].empl_resign_date === undefined ) {
                $('#empl_resign').prop('checked', false);
                $('#empl_resign_date').val("");
                $('#empl_resign_date').attr('disabled', true);
            } else {
                $('#empl_resign').prop('checked', true);
                $('#empl_resign_date').val(data[0].empl_resign_date);
                $('#empl_resign_date').attr('disabled', false);
            }
            $('#empl_handphone1').val(data[0].empl_handphone1);
            $('#empl_handphone2').val(data[0].empl_handphone2);
            $('#active').val(data[0].active);
            
            if (data[0].empl_photo === '' ||data[0].empl_photo === null || data[0].empl_photo === undefined ) {
                var image = $('#empl_photo')[0];
                var downloadingImage = new Image();
                downloadingImage.onload = function(){
                    image.src =  this.src;   
                }; 
                downloadingImage.src = "img/people.png";    
            } else {
                var image = $('#empl_photo')[0];
                var downloadingImage = new Image();
                downloadingImage.onload = function(){
                    image.src =  this.src;   
                };
                downloadingImage.src = data[0].empl_photo;
            }
            $('#oldFile').val(data[0].empl_photo);
            $('#btnsavekaryawan').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deleteemployee(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Karyawan "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"karyawan",
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
                    $("#tblkaryawan").DataTable().ajax.reload();
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

//---------------------------------------- driver ---------------------------------------------//

function cleardriver() {
    $('#drv_id').attr('readonly',false);
    $('#drv_id').val("");
    $("#empl_id").val(null).trigger('change');
    $("#branch_id").val(null).trigger('change');
    $('#drv_name').val("");
    $('#drv_handphone').val("");
    $('active').val("");
    $('#btnsavedriver').text('Save');
    $('#modalform').modal('show');
}


$("#btnsavedriver").click(function(e){
    if(!$("#drv_id").val()) {
        toastr.info("Kode Driver Harus Diisi");
        $("#drv_id").focus();
        return false;
    } else if(!$("#drv_name").val()) {
        toastr.info("Nama Driver Harus Diisi");
        $("#drv_name").focus();
        return false;
    } else if(!$("#empl_id").val()) {
        toastr.info("Pilih Kode Karyawan");
        $("#empl_id").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang Driver");
        $("#branch_id").focus();
        return false;
    } else { 
        var formData = $("#formdriver").serialize(); 
        e.preventDefault();
        
        if($("#btnsavedriver").text()=="Update") {
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
            url: baseurl+"/driver",
            type: tipe,
            cache: false,
            beforeSend:function(data) {
                loaderin();
            },
            error:function(data) {
                toastr.error(data);
                loaderout();
                $("#btnclosedriver").click();
                return false;
            },
            complete:function() {
                loaderout(); 
                $("#tbldriver").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan");
                    $("#btnclosedriver").click();
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan");
                    $("#btnclosedriver").click();
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data);
                    $("#btnclosedriver").click();
                    loaderout();
                    return false;
                }
            }
        });
    }
});


function editdriver(id) {
    $.ajax({
        url: baseurl+"/driver/"+id+"/edit",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#drv_id').val(data[0].drv_id);
            $('#drv_id').attr('readonly',true);
            $('#drv_name').val(data[0].drv_name);
            $('#drv_handphone').val(data[0].drv_handphone);
            $('#empl_id').val(data[0].empl_id).trigger('change'); 
            $("#branch_id").val(data[0].branch_id).trigger('change');
            $('#active').val(data[0].active);
            $('#btnsavedriver').text('Update');
            $('#modalform').modal('show');
        }
    });
}

function deletedriver(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Data dengan Kode Driver "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"driver",
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
                    $("#tbldriver").DataTable().ajax.reload();
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

//---------------------------------------- Kendaraan ---------------------------------------------//

function clearvehicle() {
    //---------- TAB KENDARAAN ------------
    $('#vhc_id').attr('readonly',false);
    $('#vhc_id').val("");
    $("#branch_id").val(null).trigger('change');
    $('#vhc_name').val("");
    $('#vhc_plat_no').val("");
    $('#vhc_year').val("");
    $('#vhc_cc').val("");
    $('#vhc_machine_no').val("");
    $('#vhc_frame_no').val("");
    $('#vhc_color').val("");
    $('#vhc_count_ban').val("0");
    $('#remark').val("");
    $('active').val("");
    $('#btnsavevehicle').text('Save');
    //---------- TAB DOKUMEN ------------
    $("#doc_id").val(null).trigger('change');
    $('#doc_no').val("");
    $('#doc_name').val("");
    $('#doc_exp_date').val("");
    $('#remark').val("");
    $('#btnsavedocs').text('Save');
    //$('#tblvehicledocs').dataTable().fnClearTable();
    //$('#tblvehicledocs').dataTable().fnDestroy(); 
    if ( $.fn.DataTable.isDataTable('#tblvehicledocs') ) {
        $('#tblvehicledocs').DataTable().destroy();
    }
    $('#tblvehicledocs tbody').empty();

    $('#modalform').modal('show');
}

$("#btnsavevehicle").click(function(e){
    if(!$("#vhc_id").val()) {
        toastr.info("Kode Kendaraan Harus Diisi");
        $("#vhc_id").focus();
        return false;
    } else if(!$("#vhc_name").val()) {
        toastr.info("Nama Kendaraan Harus Diisi");
        $("#vhc_name").focus();
        return false;
    } else if(!$("#vhc_plat_no").val()) {
        toastr.info("Plat Nomor Kendaraan Harus Diisi!");
        $("#vhc_plat_no").focus();
        return false;
    } else if(!$("#vhc_count_ban").val()) {
        toastr.info("Jumlah Ban Kendaraan Harus Diisi!");
        $("#vhc_count_ban").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Pilih Cabang Kendaraan");
        $("#branch_id").focus();
        return false;
    } else { 
        var formData = $("#formvehicle").serialize(); 
        e.preventDefault();
        
        if($("#btnsavevehicle").text()=="Update") {
            var tipe = "PATCH"; 
        } else {
            var tipe="POST"; 
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            url: baseurl+"/kendaraan",
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
                $("#tblvehicle").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan"); 
                    loaderout();
                    return false;
                }
                else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan"); 
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data); 
                    loaderout();
                    return false;
                }
            }
        });
    }
});

$("#btnsavedocs").click(function(e){
    if(!$("#vhc_id").val()) {
        toastr.info("Isi Data pada Tab Kendaraan Terlebih Dahulu");
        $("#vhc_id").focus();
        return false;
    } else if(!$("#doc_id").val()) {
        toastr.info("Pilih Dokumen !");
        $("#doc_id").focus();
        return false;
    } else if(!$("#doc_name").val()) {
        toastr.info("Nama Dokumen Harus Diisi !");
        $("#doc_name").focus();
        return false;
    } else if(!$("#doc_no").val()) {
        toastr.info("Nomor Dokumen Harus Diisi!");
        $("#doc_no").focus();
        return false;
    } else if(!$("#doc_exp_date").val()) {
        toastr.info("Tanggal Masa Habis Berlaku Dokumen Harus Diisi!");
        $("#doc_exp_date").focus();
        return false;
    } 
    else {
        var vhc_id = $('#vhc_id').val(); 
        //var formData = $("#formdocs").serialize();
        var form = $("#formdocs")[0];
        var formData = new FormData(form);
        formData.append('id', vhc_id);

        e.preventDefault();
        
        if($("#btnsavedocs").text()=="Update") {
            var tipe = "POST"; 
            var linkurl = baseurl+"/kendaraan/docs/update";
        } 
        else {
            var tipe="POST";
            var linkurl = baseurl+"/kendaraan/docs";
        }

        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            url: linkurl,
            type: tipe,
            cache: false,
            processData: false,
            contentType: false,
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
                $("#tblvehicledocs").DataTable().ajax.reload();
                return false;
            },
            success:function(data) {
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan"); 
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan"); 
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data); 
                    loaderout();
                    return false;
                }
            }
        });
    }
}); 

$("#btnresetdocs").click(function(e){
    e.preventDefault();
    $("#doc_id").val(null).trigger('change');
    $('#doc_id').select2({
        readonly: false
    });
    $('#doc_no').val("");
    $('#doc_name').val("");
    $('#doc_exp_date').val("");
    $('#remark').val("");
    $('#btnsavedocs').text('Save');
});

function editvehicle(id) {
    $.ajax({
        url: baseurl+"/kendaraan/"+id+"/edit",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#vhc_id').val(data[0].vhc_id);
            $('#vhc_id').attr('readonly',true);
            $('#vhc_name').val(data[0].vhc_name);
            $('#vhc_plat_no').val(data[0].vhc_plat_no);
            $('#vhc_year').val(data[0].vhc_year);
            $('#vhc_cc').val(data[0].vhc_cc);
            $('#vhc_count_ban').val(data[0].vhc_count_ban);
            $('#vhc_machine_no').val(data[0].vhc_machine_no);
            $('#vhc_frame_no').val(data[0].vhc_frame_no); 
            $('#vhc_color').val(data[0].vhc_color); 
            $("#branch_id").val(data[0].branch_id).trigger('change');
            $('#active').val(data[0].active);
            $('#btnsavevehicle').text('Update'); 
            $('#modalform').modal('show');
        }
    });

    refreshvehicledocs(id);
}

function editvehicledocs(data) {
    $.ajax({
        url: baseurl+"/kendaraan/"+data+"/editdocs",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#doc_id').val(data[0].doc_id).trigger('change');
            $('#doc_id').select2({
                readonly: true
            });
            $('#doc_name').val(data[0].doc_name);
            $('#doc_no').val(data[0].doc_no);
            $('#doc_exp_date').val(data[0].doc_exp_date);
            $('#remark').val(data[0].remark); 
            $('#btnsavedocs').text('Update');
        }
    });
}

function deletevehicledocs(id) {
    var arr = id.split("||");
    swal({
        title: "Apakah Anda Yakin?",
        text: "Dokumen Kendaraan "+ arr[1] + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"kendaraan/docs/delete",
                cache:false,
                data:{ id: arr[0], doc_id: arr[1], _token:token },
                success:function(data)
                {
                    if(data == "Success")
                    {
                        swal({  
                            title: "Deleted!",
                            text: data, 
                            icon: "success"
                        });
                    }
                    else
                    {
                        swal({
                            title:"Error",
                            text:data, 
                            icon:"error"
                        });
                    }
                },
                complete:function()
                {
                    $('.theme-loader').fadeOut();
                    $("#tblvehicledocs").DataTable().ajax.reload();
                },
                error:function()
                {
                    swal({
                        title:"Error",
                        text:"Terjadi Kesalahan!!!", 
                        icon:"error"
                    });
                },
                beforeSend:function()
                {
                    $('.theme-loader').fadeIn();
                }
            });    
            
        } else {
            swal("Cancel Delete");
        }
    });
}

function deletevehicle(id) {
    swal({
        title: "Apakah Anda Yakin ?",
        text: "Semua Data Kendaraan termasuk Dokumen untuk Kendaraan "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:baseurl+"kendaraan",
                cache:false,
                data:{ id: id, _token:token },
                success:function(data)
                {
                    if(data == "Success")
                    {
                        swal({
                            title: "Deleted!",
                            text: data, 
                            icon: "success"
                        });
                    }
                    else
                    {
                        swal({
                            title:"Error",
                            text:data, 
                            icon:"error"
                        });
                    }
                },
                complete:function()
                {
                    $('.theme-loader').fadeOut();
                    $("#tblkendaraan").DataTable().ajax.reload();
                },
                error:function()
                {
                    swal({
                        title:"Error",
                        text:"Terjadi Kesalahan!!!", 
                        icon:"error"
                    });
                },
                beforeSend:function()
                {
                    $('.theme-loader').fadeIn();
                }
            });    
            
        } else {
            swal("Cancel Delete");
        }
    });
}

//---------------------------------------- schedule ---------------------------------------------//
$("#btnsaveschedule").click(function(e){ 
    if(!$("#sched_id").val()) {
        toastr.info("Isi Kode Schedule !");
        $("#sched_id").focus();
        return false;
    } else if(!$("#sched_date").val()) {
        toastr.info("Tanggal Schedule Harus Diisi !");
        $("#sched_date").focus();
        return false;
    } else if(!$("#branch_id").val()) {
        toastr.info("Kode Cabang Harus Diisi !");
        $("#branch_id").focus();
        return false;
    } else if(!$("#si_id").val()) {
        toastr.info("Nomor SI Harus Diisi!");
        $("#si_id").focus();
        return false;
    } else if(!$("#buss_unit").val()) {
        toastr.info("Pilih Bisnis Unit !");
        $("#buss_unit").focus();
        return false;
    } else if(!$("#pickup_name").val()) {
        toastr.info("Tempat Muat Harus Diisi !");
        $("#pickup_name").focus();
        return false;
    } else if(!$("#latitude_muat").val()) {
        toastr.info("Pilih Tempat Dari Peta yang Disediakan !");
        return false;
    } else if(!$("#longitude_muat").val()) {
        toastr.info("Pilih Tempat Dari Peta yang Disediakan !"); 
        return false;
    } else if(!$("#pickup_address").val()) {
        toastr.info("Alamat Tempat Muat Harus Diisi !");
        $("#pickup_address").focus();
        return false;
    } else if(!$("#dest_name").val()) {
        toastr.info("Tempat Bongkar Harus Diisi !");
        $("#dest_name").focus();
        return false;
    } else if(!$("#latitude_bongkar").val()) {
        toastr.info("Pilih Tempat Dari Peta yang Disediakan !");
        return false;
    } else if(!$("#longitude_bongkar").val()) {
        toastr.info("Pilih Tempat Dari Peta yang Disediakan !"); 
        return false;
    } else if(!$("#dest_address").val()) {
        toastr.info("Alamat Tempat Bongkar Harus Diisi !");
        $("#pickup_address").focus();
        return false;
    } else if(!$("#cust_id").val()) {
        toastr.info("Customer Harus Diisi !");
        $("#cust_id").focus();
        return false;
    } else if(!$("#cont_id").val()) {
        toastr.info("Customer Harus Diisi !");
        $("#cont_id").focus();
        return false;
    } else if(!$("#drv_id").val()) {
        toastr.info("Pilih Sopir !");
        $("#drv_id").focus();
        return false;
    } else if(!$("#vhc_id").val()) {
        toastr.info("Pilih Kendaraan !");
        $("#vhc_id").focus();
        return false;
    } else if(!$("#amount").val()) {
        toastr.info("Isi Dana Kerja Tersebut !");
        $("#amount").focus();
        return false;
    } 
    else {
        var formData = $("#formschedule").serialize(); 

        e.preventDefault();
        
        if($("#btnsaveschedule").text()=="Update") {
            var tipe = "PATCH";
        } 
        else {
            var tipe="POST";
        }
        //var linkurl = baseurl+"/schedule/tambah";
        var linkurl = $('#linkurl').val(); 
        
        $.ajax({
            headers: {
                'X-CSRF-TOKEN': $('meta[name="csrf-token"]').attr('content'),
            },
            data: formData,
            url: linkurl,
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
                refreshschedulesi($("#sched_id").val());
                return false;
            },
            success:function(data) {
                //alert("Data => "+data);
                if(data=="Save") {
                    toastr.success("Data Berhasil Disimpan"); 
                    loaderout();
                    return false;
                } else if(data=="Failed Save") {
                    toastr.info("Data Tidak Berhasil Disimpan"); 
                    loaderout();
                    return false;
                } else {
                    toastr.error("Terjadi Kesalahan, Silahkan Hubungi IT "+data); 
                    loaderout();
                    return false;
                }
            }
        });
    }
}); 

$("#btnresetschedule").click(function(e){
    e.preventDefault();
    $('#si_id').val("");
    $('#buss_unit').val(null).trigger('change');
    $('#depo').val("");
    $('#pickup_name').val("");
    $('#latitude_muat').val("");
    $('#longitude_muat').val("");
    $('#pickup_contact').val("");
    $('#pickup_address').val("");
    $('#dest_name').val("");
    $('#latitude_bongkar').val("");
    $('#longitude_bongkar').val("");
    $('#dest_contact').val("");
    $('#dest_address').val("");
    $('#cont_id').val(null).trigger('change');
    $('#cont_no').val("");
    $('#padlock').val("");
    $('#seal_no').val("");
    $('#drv_id').val(null).trigger('change');
    $('#vhc_id').val(null).trigger('change');
    $('#amount').val("");
    $('#btnsaveschedule').text('Save');
     
}); 

function editschedulesi(str) {
    $.ajax({
        url: baseurl+"/schedule/"+str+"/editschedulesi",
        method: "GET",
        data: "",
        success: function (data) { 
            $('#line').val(data[0].line);
            $('#si_id').val(data[0].si_id);
            $('#buss_unit').val(data[0].buss_unit).trigger('change');
            $('#depo').val(data[0].depo);
            $('#pickup_name').val(data[0].pickup_name);
            $('#latitude_muat').val(data[0].latitude_pickup);
            $('#longitude_muat').val(data[0].longitude_pickup);
            $('#pickup_contact').val(data[0].pickup_contact);
            $('#pickup_address').val(data[0].pickup_address);
            $('#dest_name').val(data[0].dest_name);
            $('#latitude_bongkar').val(data[0].latitude_dest);
            $('#longitude_bongkar').val(data[0].longitude_dest);
            $('#dest_contact').val(data[0].dest_contact);
            $('#dest_address').val(data[0].dest_address);
            $('#cust_id').val(data[0].cust_id).trigger('change');
            $('#cust_address').val(data[0].cust_address);
            $('#cont_id').val(data[0].cont_id).trigger('change');
            $('#cont_no').val(data[0].cont_no);
            $('#padlock').val(data[0].padlock);
            $('#seal_no').val(data[0].seal_no);
            $('#drv_id').val(data[0].drv_id).trigger('change');
            $('#vhc_id').val(data[0].vhc_id).trigger('change');
            $('#amount').val(data[0].amount);
            $('#btnsaveschedule').text('Update');
        }
    });
}

function deleteschedulesi(str) {
    var arr = str.split("||");
    swal({
        title: "Apakah Anda Yakin?",
        text: "Schedule SI ID "+ arr[2] + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var linkurl = $('#linkurl').val();
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:linkurl,
                cache:false,
                data:{ id: arr[0], line: arr[1], _token:token },
                success:function(data)
                {
                    if(data == "Success")
                    {
                        swal({  
                            title: "Deleted!",
                            text: data, 
                            icon: "success"
                        });
                    }
                    else
                    {
                        swal({
                            title:"Error",
                            text:data, 
                            icon:"error"
                        });
                    }
                },
                complete:function()
                {
                    $('.theme-loader').fadeOut();
                    $("#tblsalesinvoice").DataTable().ajax.reload();
                },
                error:function()
                {
                    swal({
                        title:"Error",
                        text:"Terjadi Kesalahan!!!", 
                        icon:"error"
                    });
                },
                beforeSend:function()
                {
                    $('.theme-loader').fadeIn();
                }
            });    
            
        } else {
            swal("Cancel Delete");
        }
    });
}

function deleteschedule(id) {
    swal({
        title: "Apakah Anda Yakin?",
        text: "Schedule "+ id + " akan dihapus ? ",
        icon: "warning",
        buttons: true,
        infoMode: true,
    })
    .then((willDelete) => {
        if (willDelete) {
            var token=$('input[name="_token"]').val();
            $.ajax({
                type:"DELETE",
                url:"/schedule",
                cache:false,
                data:{ id: id, _token:token },
                success:function(data)
                {
                    if(data == "Success")
                    {
                        swal({  
                            title: "Deleted!",
                            text: data, 
                            icon: "success"
                        });
                    }
                    else
                    {
                        swal({
                            title:"Error",
                            text:data, 
                            icon:"error"
                        });
                    }
                },
                complete:function()
                {
                    $('.theme-loader').fadeOut();
                    $("#tblschedule").DataTable().ajax.reload();
                },
                error:function()
                {
                    swal({
                        title:"Error",
                        text:"Terjadi Kesalahan!!!", 
                        icon:"error"
                    });
                },
                beforeSend:function()
                {
                    $('.theme-loader').fadeIn();
                }
            });    
            
        } else {
            swal("Cancel Delete");
        }
    });
}

//---------------------------------------- function get ---------------------------------------------//
function getemployee(form, value) {
    if(value != "") {
        $.ajax({
            url: baseurl+"/karyawan/"+value+"/getemployee",
            method: "GET",
            data: { id: value },
            success: function (data) {
                if(form == 'DRV') {
                    $('#drv_name').val(data[0].empl_fullname);
                    $('#drv_handphone').val(data[0].empl_handphone1);
                }
            }
        });
    }
}

function getCust(value) { 
    if(value != "") { 
        $.ajax({
            url: baseurl+"/customer/"+value+"/getcust", 
            method: "GET",
            data: "",
            success: function (data) {
                $("#cust_id").empty();
                $("#cust_id").append("<option value=''>--Pilih Customer--</option>");
                for(var i = 0; i < data.length; i++){
                    var id = data[i]['cust_id'];
                    var name = data[i]['cust_name'];
                    $("#cust_id").append("<option value='"+id+"'>"+name+"</option>");
                } 
            }
        });
    }
}

function getCustAddress(value) {
    var branch_id = $('#branch_id').val();
    if(value != "") {
        $.ajax({
            url: baseurl+"/customer/"+value+"/getcustaddress", 
            method: "GET",
            data: "",
            success: function (data) { 
                $('#cust_address').val(data[0].cust_address);
            }
        });
    }
}

