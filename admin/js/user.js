function add()
{
	hoten=$('#hoten').val();
	taikhoan=$('#taikhoan').val();
	matkhau=$('#matkhau').val();
	email=$('#email').val();
	sdt=$('#sdt').val();
	diachi=$('#diachi').val();
	if(hoten!="" && taikhoan!="" && matkhau!="" && sdt!="" && diachi!="")
	{
		$.ajax({
			url: "quanly/user.php",
			type: "post",
			dateType: "json",
			data: {
				addU:"add",
				hoten:hoten,
				taikhoan:taikhoan,
				matkhau:matkhau,
				sdt:sdt,
				diachi:diachi,
				email:email
			},
			success: function(result){
				var obj = JSON.parse(result);
				document.getElementById("alert-success-top").innerHTML = obj.message;
				window.setTimeout(function(){location.reload()},500)
			}
		});
	}else{
			alert('Hãy nhập đầy đủ thông tin');
	}
}
function del(id)
{
	if(confirm('Bạn có muốn xóa không?'))
	{
	$.ajax({
			url : "quanly/user.php",
			type : "post",
			dateType:"json",
			data : {
				deleteU:"delete",
				id:id,
			},
			success : function (result){		
				var obj = JSON.parse(result);
				document.getElementById("alert-success-top").innerHTML = obj.message;
				window.setTimeout(function(){location.reload()},500)
			}
		});
	}else{
		return;
	}
}
function edit(id)
{
	var link="../admin/edituser.php?id="+id;
	window.location.href=link;
}