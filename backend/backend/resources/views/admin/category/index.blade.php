<!DOCTYPE html>
<html>
<head>
        <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <title>Trang tất cả các loại sản phẩm</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
    <a href="dashboard"><button>Quay lại trang chủ <=</button></a>
<a href="./category/create"><button type="button" class=" btn btn-light">Thêm loại sản phẩm</button></a>
<center><h1>Thông tin loại sản phẩm</h1></center>
<table align="center" border="1" cellspacing="0" cellpadding="3"
                >
                <tr class="table-primary table-header" style="text-align: center;">
                    <th>Mã loại</th>
                    <th>Tên loại</th>
                    <th colspan="2">Xử lý</th>
                </tr>
                    @foreach($categories as $categories)
                            <tr>
                            <td>{{$categories->id}}</td>
                            <td>{{$categories->name}}</td>
                            <td>
                                <form action="{{'/admin/category/'.$categories->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger" style="margin-right: 15px;">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{'/admin/category/'.$categories->id.'/edit'}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="margin-right: 15px;">Edit</button>
                                </form>
                            </td>
                    @endforeach
                    
            </table>
</body>
</html>