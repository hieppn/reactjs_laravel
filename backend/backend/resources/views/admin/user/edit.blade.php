<!DOCTYPE html>
<html>
<head>
    <title>Trang chỉnh sửa người dùng</title>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <center><h1>Chỉnh sửa thông tin người dùng</h1></center>
    <div class="container-fluid mt-3">
         <form method="post" action="{{'/admin/user/'.$user->id}}" enctype="multipart/form-data">
            @csrf
            @method("PATCH")
            <div class="form-group">
               <div >
                  <label>Địa chỉ:</label>
                  <div class="col-md-6">
                     <input type="text"  class="form-control" name="address" value="{{$user->address}}">
                  </div>
               </div>
               <div>
                     <label>Số điện thoại:</label>
                  <div class="col-md-6">
                     <input type="text" class="form-control" name="phone" value="{{$user->phone}}">
                  </div>
               </div>
               <div>
                     <label>Vai trò:</label>
                  <div class="col-md-6">
                  @if($user->role=="admin")
                     <input type="text" class="form-control"readOnly name="role" value="{{$user->role}}">
                     @else
                     <input type="text" class="form-control" name="role" value="{{$user->role}}">
                     @endif
                  </div>
               </div>
               <div >
                    <label>Email:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="email" value="{{$user->email}}">
                        </div>
                    </div>
                    <div >
                    <label>Số dư khả dụng:</label>
                    <div class="col-md-6">
                        <input type="text" class="form-control" name="money" value="{{$user->money}}" disabled>
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