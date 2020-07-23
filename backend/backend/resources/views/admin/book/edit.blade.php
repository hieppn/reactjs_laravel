<!DOCTYPE html>
<html>
<head>
    <title>Trang chỉnh sửa sản phẩm</title>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <center><h1>Chỉnh sửa thông tin sản phẩm</h1></center>
    <div class="container-fluid mt-3">
         <form method="post" action="{{'/admin/book/'.$book->id}}" enctype="multipart/form-data" style="margin-left: 500px;">
            @csrf
            @method("PATCH")
            <div class="form-group">
               <div >
                  <label>Tên sản phẩm:</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" required name="name" value="{{$book->name}}">
                  </div>
               </div>
               <div>
                     <label>Giá hiện tại:</label>
                  <div class="col-md-6">
                     <input type="number" class="form-control"required min="0"name="price" value="{{$book->price}}">
                  </div>
               </div>
               <div>
                     <label>Giá cũ:</label>
                  <div class="col-md-6">
                     <input type="number" class="form-control"required min="0" name="oldprice" value="{{$book->oldprice}}">
                  </div>
               </div>
               <div >
                    <label>Số lượng:</label>
                    <div class="col-md-6">
                        <input type="number" class="form-control"required name="quantity" value="{{$book->quantity}}"min="0">
                        </div>
                    </div>
                    <div >
                    <label>Tac gia:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" required name="author" value="{{$book->author}}">
                        </div>
                    </div>
                    <div >
                    <label>Trạng thái:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" disabled name="status" value="{{$book->status}}">
                        </div>
                    </div>
                    <div >
                    <label>Tên loại sản phẩm:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="cate" disabled value="{{$book->category->id}}">
                        </div>
                    </div>
                    <div >
                    <label>Hình ảnh:</label>
                    <div class="col-md-6">
                        <input type="file" required class="form-control" value="{{$book->image}}" name="image"><img src="{{'/storage/'.$book->image}}" width="150px" height="130px" >
                        </div>
                    </div>
                    <div >
                    <label>Mô tả:</label>
                    <div class="col-md-6">
                        <textarea  class="form-control"required name="description" style="width: 500px;height: 400px;">
                          {{$book->description}}
                        </textarea>
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
