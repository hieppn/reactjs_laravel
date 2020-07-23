<!DOCTYPE html>
<html>
<head>
         <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <a href="dashboard"><button>Quay lại trang chủ <=</button></a>
    <title>Trang tất cả các người dùng</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<center><h1>Thông tin người dùng</h1></center>
<table align="center" width="600px" border="1" cellspacing="0" cellpadding="3"
                class="table table-hover table-bordered">
                <tr class="table-primary table-header" style="text-align: center;">
                    <th>Mã người dùng</th>
                    <th>Tên người dùng</th>
                    <th>Địa chỉ</th>
                    <th>Số điện thoại</th>
                    <th>Email</th>
                    <th>Vai trò</th>
                    <th>Số dư khả dụng 
                    </th>
                    <th colspan="2">Xử lý</th>
                </tr>
                    @foreach($users as $user)
                            <tr>
                            <td>{{$user->id}}</td>
                            <td>{{$user->name}}</td>
                            <td>{{$user->address}}</td>
                            <td>{{$user->phone}}</td>
                            <td>{{$user->email}}</td>
                            <td>{{$user->role}}</td>
                            <td>{{$user->money}}.vnđ</td>
                            <td>
                                <form action="{{'/admin/user/'.$user->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger" style="margin-right: 15px;">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{'/admin/user/'.$user->id.'/edit'}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="margin-right: 15px;">Edit</button>
                                </form>
                            </td>
                    @endforeach
                    
            </table>
</body>
</html>