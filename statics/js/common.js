// JavaScript Document
$(function () {

    $.mobile.defaultPageTransition = "slide";
    //波动
    $("body").on("pageshow", "[data-role=page]", function () {
        Getpageshow();
		$(this).find("#home").on(function() {
           location.reload();
        });
       
    })
    //刷新
    Getpageshow();
})

function Getpageshow()
{
  //首页	
    
   
   //案例
   $(".case_left").height($(window).height()); 
   
   //团队
   $(".team_01 ul li:last").css("background","none");
 
   //视频专区
   $(".vidio_01 ul li:last").css("background","none");
    
   $(".vidioshow .box").height($(".vidioshow #videos").height());

   $("[class=btn_submit]").click(function () {
       var name = document.getElementById("txtName").value;
       var phone = document.getElementById("txtPhone").value;
       var address = document.getElementById("txtAddress").value;
       var area = document.getElementById("txtArea").value;
       var design = document.getElementById("txtDesign").value;
       var content = document.getElementById("txtContent").value;
       if (name == "" || name == null) {
           alert("联系人不能为空！")
           document.getElementById("txtName").focus();
           return false;
       }
       if (phone == "" || phone == null) {
           alert("联系电话不能为空")
           document.getElementById("txtPhone").focus();
           return false;
       }
       var flag = isphone(phone);
       if (flag == false) {
           alert("联系电话不正确！")
           document.getElementById("txtPhone").focus();
           return false;
       }
       if (address == "" || address == null) {
           alert("地址不能为空！")
           document.getElementById("txtAddress").focus();
           return false;
       }
       if (area == "" || area == null) {
           alert("平米数不能为空！")
           document.getElementById("txtArea").focus();
           return false;
       }
       var flag = isint(area);
       if (flag == false) {
           alert("平米数不正确！")
           document.getElementById("txtArea").focus();
           return false;
       }
       
       if (content == "" || content == null) {
           alert("备注不能为空")
           document.getElementById("txtContent").focus();
           return false;
       }
       $.ajax({
           "url": "Online.aspx",
           "dataType": "html",
           "type": "post",
           //"data": $("#form1").serialize(),
            "data": { "txtName": $("#txtName").val(), "txtPhone": $("#txtPhone").val(), "txtAddress": $("#txtAddress").val(), "txtArea": $("#txtArea").val(),  "txtContent": $("#txtContent").val(), "dosubmit": "1" },
           "success": function (res) {
               alert(res);
           }, "error": function (e1, e2, e3) {
               alert(e1 + "_" + e2 + "_" + e3);
           }
       })
       return false;
   })
}

function isphone(str) {
    var result = str.match(/^0?1[3|4|5|8][0-9]\d{8}$/);
    if (result == null) return false;
    return true;
}
 
function isint(str) {
    var result = str.match(/^(-|\+)?\d+$/);
    if (result == null) return false;
    return true;
}  
 