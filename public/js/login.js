'use strict'
/*
$(document).ready(function(){
    $(".theme-loader").fadeOut();
});
*/
function loaderin()
{
    $(".theme-loader").fadeIn({
        'opacity': '0',
    },2000);
}
function loaderout()
{
    $(".theme-loader").fadeOut();
}

var baseurl="/";
$("#btnlogin").click(function(){
    if(!$("#username").val())
    {
        //toastr.info("Username harus diisi","Information",opsi);
        toastr.info("Username harus diisi","Information");
        $("#username").focus();
        return false;
    }
    else if(!$("#password").val())
    {
        //toastr.info("Password harus diisi","Information",opsi);
        toastr.info("Password harus diisi");
        $("#password").focus();
        return false;
    }
    else{
        loaderin();
        toastr.info("Authenticating...");

        var data=$("#formlogin").serialize();
        $.ajax({
            cache:false,
            data:data,
            url:baseurl+"login",
            type:"POST",
            beforeSend:function()
            {
                loaderin();
            },
            error:function()
            {
                //toastr.error("Terjadi kesalahan / User Password Salah",null,opsi);
                toastr.error("Terjadi kesalahan / User Password Salah",null,opsi);
                loaderout();
                return false;
            },
            complete:function()
            {
                loaderout();
            },
            success:function(data)
            {
                if(data=="Login Success")
                {
                    //toastr.success('Login Berhasil',null,opsi);
                    toastr.success("Login Berhasil");
                    window.location.href = baseurl+"home";
                    return false;
                }
                else
                {
                    //toastr.error(response,null,opsi);
                    toastr.error(data);
                    return false;
                }
                
                loaderout();
                return false;
            },
        });
    }
});