function add()
{
	theloai=$('#theloai').val();
	if(theloai!="")
	{
		$.ajax({
			url: "quanly/theloai.php",
			type: "post",
			dateType: "json",
			data: {
				addTL:"add",
				theloai:theloai,
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
			url : "quanly/theloai.php",
			type : "post",
			dateType:"json",
			data : {
				deleteTL:"delete",
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
	var link="../admin/edittheloai.php?id="+id;
	window.location.href=link;
}