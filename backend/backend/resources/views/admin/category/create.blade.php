<!DOCTYPE html>
<html>
<link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
<head>
	<title>Thêm loại sản phẩm</title>
	<link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
	<style type="text/css">
		form{
			margin: auto;
			height: 300px;
			width: 300px;
		}
	</style>
</head>
<body>
	<center><h1>Thêm loại sản phẩm</h1></center>
	<form method="post" action="/admin/category" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label for="name">Tên loại sản phẩm:</label>
	    <input type="text"require class="form-control" name="name"required>
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>