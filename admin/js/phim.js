function add()
{
	theloai=$('#theloai').val();
	tenphim=$('#tenphim').val();
	dienvien=$('#dienvien').val();
	thongtinphim=$("#thongtinphim").val();
	daodien=$('#daodien').val();
	thoiluongphim=$('#thoiluongphim').val();
	namsanxuat=$('#namsanxuat').val();
	noisanxuat=$('#noisanxuat').val();
	trailer=$('#trailer').val();
	alert(thongtinphim);
	if(theloai!="" && tenphim!="" && dienvien!="" && thongtinphim!="" && daodien!="" && thoiluongphim!="" && namsanxuat!="" && noisanxuat!="")
	{
	var m_data = new FormData(); 
			m_data.append('addP',"add");
			m_data.append('theloai',theloai);
			m_data.append('tenphim',tenphim);
			m_data.append('dienvien',dienvien);
			m_data.append('thongtinphim',thongtinphim);
			m_data.append('daodien',daodien);
			m_data.append('thoiluongphim',thoiluongphim);
			m_data.append('namsanxuat',namsanxuat);
			m_data.append('noisanxuat',noisanxuat);
			m_data.append('trailer',trailer);
			m_data.append( 'file', $('input[name=file]')[0].files[0]);
			
			$.ajax({
				url: "quanly/phim.php",
				type: "post",
				dateType: "json",
				data: m_data,
				processData: false,
				contentType: false,
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
			url : "quanly/phim.php",
			type : "post",
			dateType:"json",
			data : {
				deleteP:"delete",
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
	var link="../admin/editphim.php?id="+id;
	window.location.href=link;
}
function add_episode(id)
{
	var link="../admin/tapphim.php?id="+id;
	window.location.href=link;
}