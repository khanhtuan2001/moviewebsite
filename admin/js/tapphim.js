function add(id)
{
	tentap=$('#tentap').val();
	linkphim=$('#linkphim').val();
	if(tentap!="" && linkphim!="")
	{
		$.ajax({
			url: "quanly/tapphim.php",
			type: "post",
			dateType: "json",
			data: {
				addTP:"add",
				id:id,
				tentap:tentap,
				linkphim:linkphim,
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
			url : "quanly/tapphim.php",
			type : "post",
			dateType:"json",
			data : {
				deleteTP:"delete",
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
	var link="../admin/edittapphim.php?id="+id;
	window.location.href=link;
}