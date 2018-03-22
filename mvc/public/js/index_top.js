//去除前后空格
String.prototype.trim = function(){
	return this.replace(/^( |[\s　])+|( |[\s　])+$/g, "");
}

// 判断是否存为空
function empty(str){
	str = $.trim(str);
	return str == null || str == "" ? true : false;
}
// 检查邮箱格式是否正确
function checkemail(email){
	var   pattern   =   /^([a-zA-Z0-9_-])+@([a-zA-Z0-9_-])+(\.[a-zA-Z0-9_-])+/;
	return !pattern.test(email)?false:true;
}
// 检查是否存在特殊字符
function checkstring(str){
	var pattern=/^([\u4E00-\u9FA5]|\w)*$/;
	return !pattern.test(str)?false:true;
}
function is_number(str){
	eval("var reg = /^[0-9]*$/;");
	return reg.test(str);
}
//身份证号验证格式是否正确
function is_cardnum(str){
	var reg = /^[1-9]\d{5}[1-9]\d{3}((0\d)|(1[0-2]))(([0|1|2]\d)|3[0-1])\d{3}([0-9]|X)$/;
	return reg.test(str);
}
//手机号验证是否正确
function is_phone(str){
	var reg = /^0?(13[0-9]|15[012356789]|18[0236789]|14[57])[0-9]{8}$/;
	return reg.test(str);
}

function is_email(){
	var val = $("input[name=email]").val();
	var myReg = /^[-_A-Za-z0-9]+@([_A-Za-z0-9]+\.)+[A-Za-z0-9]{2,3}$/;
	if(!myReg.test(val)){
		return false;
	}else{
		return true;
	}
}
function changecode(){
	$('.image_code').attr("src", "/index/getcode?m=" + Math.random()*10000);

}

$(document).ready(function(){
	/*返回顶部*/
    $("#gotop").click(function(e){
		$('body,html').animate({scrollTop:0},1000);
	})
	$(window).scroll(function(e){
    	if ($(window).scrollTop() > 100 ) {
    		$("#gotop").fadeIn(1000)
    	}else{
    		$("#gotop").fadeOut(1000)
    	}

    })


	$(".yz_zan").bind('click',function(){
		var obj = $(this);
		var newsid = parseInt(obj.parent().prevAll(".zan_newsid").val());
		var Num = parseInt(obj.text());
		obj.css({cursor:"default"});
		$.ajax({
			type:"post",
			url:'/index/zan',
			data:"num="+Num+"&id="+newsid,
			dataType:"json",
			success:function(data){
				if(data.isZan == 1){
					obj.text(data.num);
					obj.css({ backgroundPosition: "-47px -327px", color: "#406ca9", textDecoration: "none", cursor: "default"});
					obj.after("<em>+1</em>");
					$("em").fadeOut('slow');
				}else{
					obj.css({cursor:"default"});
					obj.removeAttr('href');return false;
				}
			}

		})
	})
})

/*切换新闻*/
function showHot(obj){
   $('#bd'+obj).show().siblings().hide();
   $('.myself-bd'+obj).parent().addClass("cur").siblings().removeClass("cur");
}

