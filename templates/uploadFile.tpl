{* Smarty *}
<html>
{include file="examhead.tpl"}   
<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
<body >
<div class="container">
<script>
function confirm()
{
	//alert("保存成功！");
}
</script>
<form action='uploadFile.php' method=POST enctype="multipart/form-data">

<p style='color:red'>选择文件上传到服务器,大小不能超过8MB</p>

<input class="btn" type="file" name="infile" id="infile" />
<center><input onclick='confirm()' class="btn btn-primary" 	type=submit name='submit' value='保存'></center>
<br/>

</form>

</div>
</body>
</html>

