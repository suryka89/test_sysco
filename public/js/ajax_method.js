

$(document).ready(function () {
    $(".alert").slideUp(4000);
    $( "#sortable1, #sortable2,#sortable3, #sortable4").sortable({
        connectWith: ".connectedSortable"
      }).disableSelection();
      var state, id,count=0;
      $( "#sortable1, #sortable2,#sortable3, #sortable4").sortable({
        receive: function( event, ui ) {
            state = $(this).data("state");
            id = $(ui.item[0]).data("id");
            changeState(state,id);
        }
    });
});

function message_box(message, type)
{ 
    msj = '<div class="alert alert-'+type+'" role="alert">'+message+"</div>";
    $(".toast-body").empty();
    $(".toast-header").empty();
    $(".toast-header").append(type);
    $(".toast-body").append(msj);
    $(".content-message").toast({delay: 3000, animation:true});
    $('.content-message').toast('show');
}

$(".validatePass").on("keyup",function(e)
{
    var p1 = document.getElementById("password").value;
    var p2 = document.getElementById("password_confirm").value;
    var espacios = false;
    var cont = 0;
    while (!espacios && (cont < p1.length)) {
        if (p1.charAt(cont) == " ")
            espacios = true;
        cont++;
    }
    if (espacios) {
        message_box(password_blank, warning);
        return false;
    }

    if (p1.length == 0 || p2.length == 0) {
        message_box(password_empty, warning);
        return false;
    } 

    if (p1 != p2) {
        message_box(passwords_must_match, warning);
        return false;
    } else {
        message_box(everything_correct, success);
        return true; 
    }  
});



function getProducts(id_menu= null,id_category,id_subcategory = null)
{
    var dir = url+"/user/getproducts";
    var table = $("#modalProductBody");
    var json_products = $("#json_producs").val();
    if(json_products === "")
    {
        $.ajax({
            url: dir,
            type: "GET",
            data: {"_token": token },
            beforeSend: function() {
                $('#modalLoading').modal({
                    keyboard: false,
                    backdrop: 'static'
                });
                setTimeout(function () {
                    $('#modalLoading').modal('hide');
                }, 1500);
            },
            success: function(data) {
                // console.log(data);
                table.empty();
                table.append(data);
                $('#modalLoading').modal('hide');
                $('#modalProducts').modal('show');
            },
            error: function(e) {
                console.log(e);
                $('#modalLoading').modal('hide');
            }
        });
    }else
    {
        $('#modalProducts').modal('show');
    }
}
$("#fileEditor").on("click",function()
{
    $('#myModal').modal({
        keyboard: true,
        focus:false
    });
});
function setFileEditor(file)
{
    $('#myModal').modal('hide');
    is_editor = true;
    var fil;
    if(b64toBlob(file) !== false)
    {
        // localStorage.setItem('files', file);
        var reader = new FileReader();
        files = b64toBlob(file);
        reader.readAsDataURL(files);
        $("#previewImg").empty();
        reader.onload = function (e) {
            $("#blob_file").val(e.target.result); 
            $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
        }
        // $(".files_list").change();
        $("#myModal").modal('hide');
    }
    else
    {
        let blob = fetchAsBlob(file).then(convertBlobToBase64).then(function(defs){
            files = b64toBlob(defs);
            var reader = new FileReader();
            reader.readAsDataURL(files);
            $("#previewImg").empty();
            reader.onload = function (e) {
                $("#blob_file").val(e.target.result); 
                $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='80' src='" + e.target.result + "'></div>");
            }
            // localStorage.setItem('files', defs);
            // $(".files_list").change();
            $("#myModal").modal('hide');
        });
    }
}

fetchAsBlob = url => fetch(url).then(response => response.blob());
convertBlobToBase64 = blob => new Promise((resolve, reject) => {
const reader = new FileReader;
reader.onerror = reject;
reader.onload = () => {
resolve(reader.result);
};
reader.readAsDataURL(blob);
});

function b64toBlob(dataURI) {
    var byteString;
    try {
        byteString = atob(dataURI.split(',')[1]);
    } catch (err) {
        return false;
    }
    var ab = new ArrayBuffer(byteString.length);
    var ia = new Uint8Array(ab);
    for (var i = 0; i < byteString.length; i++) {
        ia[i] = byteString.charCodeAt(i);
    }
    return new Blob([ab], { type: 'image/jpeg' });
}

$('#myModal').on('shown.bs.modal', function (e) {
    $("[data-action='remove']").click();
});

window.preview = function (input) {
    if (input.files && input.files[0]) {
        $("#previewImg").html('');
        $(input.files).each(function () {
            var reader = new FileReader();
            reader.readAsDataURL(this);
            reader.onload = function (e) {
                $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img  height='150' width='200' src='" + e.target.result + "'></div>");
            }
        });
    }
}

$("#company_logo").on("change",function(){
    console.log(this.files);
    $("#previewLg").html('');
    var reader = new FileReader();
    reader.readAsDataURL(this.files[0]);
    reader.onload = function (e) {
        $("#previewLg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='150' width='200' src='" + e.target.result + "'></div>");
    }
});

$("#image").on("change",function(){
    console.log(this.files);
    $("#previewImg").html('');
        var reader = new FileReader();
        reader.readAsDataURL(this.files[0]);
        reader.onload = function (e) {
            $("#previewImg").append("<div style='float:left;border:4px solid #303641;padding:5px;margin:5px;'><img height='150' width='200' src='" + e.target.result + "'></div>");
        }
});

$(".save_products").on("click",function()
{
    var numberOfChecked = $('[name="id_products"]:checked').length;
    var json = '[';
    var count = 1;
    $("[name='id_products']").each(function(index){
       ;
        //cada elemento seleccionado
        if(this.checked)
        {
            console.log($("qty["+index+"]").val());
            if(numberOfChecked===1)
            {
                json += '{"id":"'+$(this).val()+'","qty":"'+$('input[name="qty['+index+']').val()+'"}';
            }
            else if(count === numberOfChecked)
            {
                json += '{"id":"'+$(this).val()+'","qty":"'+$('input[name="qty['+index+']').val()+'"}';
            }else
            {
                json += '{"id":"'+$(this).val()+'","qty":"'+$('input[name="qty['+index+']').val()+'"},';
            }
        }
        count++;
    });
    json += "]";
  console.log(json);
    $("#json_producs").val(json);
});

$('body').on('click','.signup_btn',function(event){
    event.preventDefault();
    var now = $(this);
    var btntxt = now.html();
    var form = now.closest('form');  
    var ing = now.data('ing');
    var success = now.data('success');
    var unsuccessful = now.data('unsuccessful');
    var rld = now.data('reload');
    var callback = now.data('callback');
    var formdata = false;
    if (window.FormData){
        formdata = new FormData(form[0]);
    }
    $.ajax({
        url: form.attr('action'), // form action url
        type: 'POST', // form submit method get/post
        dataType: 'html', // request type html/json/xml
        data: formdata ? formdata : form.serialize(), // serialize form data 
        cache       : false,
        contentType : false,
        processData : false,
        beforeSend: function() {
        },
        success: function(data) {
                message_box(success, "success"); 
        },
        error: function(e) {
            console.log(e)
        }
    });
});

function changeLanguage(dir,locate)
{
    var aux = dir+"/lenguaje/"+locate;
    console.log(aux);
    $.ajax({
    url: aux,
    beforeSend: function() {
    },
    success: function(data) {
        console.log(data);
        location.reload();

    },
    error: function(e) {
        console.log(e)
    }
});
}


function changeState(value,id)
{
    // var value = $(elem).val();
    var dir = url+"/user/state";
    $.ajax({
        url: dir,
        type: "GET",
        dataType: "text",
        timeout:3000,
        data: {"state":value,
                "id":id,
                "_token": token },
        beforeSend: function() {
            $("#spining").removeAttr("style","display:none");
            setTimeout(function () {
                $("#spining").attr("style","display:none");
         }, 3000);
        },
        success: function(data) {
        //   $('#modalLoading').modal('hide');
        message_box(data, "success");
        $("#spining").attr("style","display:none");
        },
        error: function(xhr, status, error) {
            $("#spining").attr("style","display:none");
            console.log(error);
        }
    });
}

function calcularTotal()
{
    var price=0,total=0, qty=0;
    $("[name='price']").each(function(index){
        price = $(this).val();
        qty = $("[name='qty["+index+"]']").val();
        console.log(price);
        total += price*qty;
        $("#total").empty();
        $("#total").append("₡"+total);
    });
}







