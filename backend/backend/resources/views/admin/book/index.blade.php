<!DOCTYPE html>
<html>
<head>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <a href="dashboard"><button>Quay lại trang chủ <=</button></a>
    <title>Trang tất cả các sản phẩm</title>

     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>
<body>
<a href="./book/create"><button type="button" class=" btn btn-light">Thêm sản sách</button></a>
<table align="center" width="600px" border="1" cellspacing="0" cellpadding="3"
                class="table table-hover table-bordered">
                <tr class="table-primary table-header" style="text-align: center;">
                    <th>Mã sản phẩm</th>
                    <th>Tên sản phẩm</th>
                    <th>Giá hiện tại</th>
                    <th>Giá cũ</th>
                    <th>Số lượng</th>
                    <th>Tác giả</th>
                    <th>Trạng thái</th>
                    <th>Tên loại sản phẩm</th>
                    <th>Hình ảnh</th>
                    <th>Mô tả</th>
                    <th colspan="2">Xử lý</th>
                </tr>
                    @foreach($books as $book)
                            <tr>
                            <td>{{$book->id}}</td>
                            <td>{{$book->name}}</td>
                            <td>{{$book->price}}.vnd</td>
                            <td>{{$book->oldprice}}.vnd</td>
                            <td>{{$book->quantity}}</td>
                            <td>{{$book->author}}</td>
                            <td>{{$book->status}}</td>
                            <td>{{$book->category->name}}</td>
                            <td><img src="/storage/{{$book->image}}" width="150px" height="130px" ></td>
                            <td >{{$book->description}}</td>
                            <td>
                                <form action="{{'/admin/book/'.$book->id}}" method="POST">
                                    @csrf
                                    @method("DELETE")
                                    <button type="submit" class="btn btn-danger" style="margin-right: 15px;">Delete</button>
                                </form>
                            </td>
                            <td>
                                <form action="{{'/admin/book/'.$book->id.'/edit'}}" method="post">
                                    @csrf
                                    <button type="submit" class="btn btn-warning" style="margin-right: 15px;">Edit</button>
                                </form>
                            </td>
                    @endforeach
                    
            </table>
</body>
</html>