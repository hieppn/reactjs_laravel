<!DOCTYPE html>
<html>
<head>
    <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <title>Trang chỉnh sửa sản phẩm</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <center><h1>Chỉnh sửa thông tin loại sản phẩm</h1></center>
    <div class="container-fluid mt-3">
         <form method="post" action="{{'/admin/category/'.$category->id}}" enctype="multipart/form-data" style="margin-left: 500px;">
            @csrf
            @method("PATCH")
            <div class="form-group">
               <div >
                  <label>Tên loại:</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" required name="name" value="{{$category->name}}">
                  </div>
               </div>
               <div class="col-md-8" style="margin-top: 20px;">
                  <button type="submit" class="btn btn-success">Chỉnh sửa</button>
               </div>
            </div>
         </form>
      </div>
</body>
</html>