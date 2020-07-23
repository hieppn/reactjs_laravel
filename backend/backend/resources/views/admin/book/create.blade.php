<!DOCTYPE html>
<html>
<head>
	        <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
	<title>Thêm sản phẩm</title>
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
	<center><h1>Thêm sản phẩm</h1></center>
	<form method="post" action="/admin/books" enctype="multipart/form-data">
		@csrf
	  <div class="form-group">
	    <label for="name">Tên sản phẩm:</label>
	    <input type="text"required class="form-control" name="name" >
	  </div>
	  <div class="form-group">
	    <label for="oldprice">Giá hiện tại:</label>
	    <input type="number"required class="form-control" name="oldprice">
	  </div>
	  <div class="form-group">
	    <label for="source">Tac gia:</label>
	    <input type="text"required class="form-control" name="author">
	  </div>
	  <div class="form-group">
	    <label for="description">Mô tả:</label>
	    <textarea class="form-control" name="description"required></textarea>
	  </div>
	  <div class="form-group">
	    <label for="category_name">Category</label>
	    <select name="category">
        @foreach($categories as $category)
        <option value="{{$category->id}}" name="category"required>{{$category->name}}</option>
  @endforeach
</select>
	  </div>
	  <div class="form-group">
	    <label for="quantity">Số lượng:</label>
	    <input type="number"required class="form-control" name="quantity">
	  </div>
	  <div class="form-group">
	    <label for="image">Hình ảnh:</label>
	    <input type="file"required class="form-control" name="image">
	  </div>
	  <button type="submit" class="btn btn-primary">Submit</button>
	</form>
</body>
</html>