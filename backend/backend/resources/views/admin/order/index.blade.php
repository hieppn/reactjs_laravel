<!DOCTYPE html>
<html>

<head>
    <title>Trang tất cả các hóa đơn</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css"
        integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
</head>

<body>
    <a href="dashboard"><button>Quay lại trang chủ <= </button></a>
    <center>
        <h1>Thông tin hoá đơn</h1>
    </center>
    <table align="center" border="1" cellspacing="0" cellpadding="1">
        <tr class="table-primary table-header" style="text-align: center;">
            <th>ID</th>
            <th>Tên khách hàng</th>
            <th>Địa chỉ khách hàng</th>
            <th>SĐT khách hàng</th>
            <th>Email</th>
            <th>Sản phẩm</th>
            <th>Giảm giá</th>
            <th>Thành tiền</th>
            <th>Trạng thái</th>
        </tr>
        @foreach($orders as $order)
        <?php $ids = json_decode($order->products);
        $user=App\User::where('id',$order->id_user)->first();?>
        <tr>
            <td>{{$order->id}}</td>
            <td>{{$user->name}}</td>
            <td>{{$user->address}}</td>
            <td>{{$user->phone}}</td>
            <td>{{$user->email}}</td>
            <td>
                <table border="1" cellspacing="0" cellpadding="1">
                    @foreach($ids as $id)
                    <?php $book =App\Book::where('id',$id)->first()?>
                    <form action="{{'/order/book/'.$book->id.'/show'}}" method="get" style="margin-left: 50px;">
                        @csrf
                        <tr>
                            <th>Hình ảnh</th>
                            <th>Tên sách</th>
                        </tr>
                        <tr>
                            <td><button type="submit"><img src="/storage/{{$book->image}}" width="50px"
                                        height="50px"></button></td>
                            <div>
                                <td>{{$book->name}}</td>
                            </div>
                        </tr>
                        @endforeach
                </table>
            </td>
            <td>{{$order->discount}} vnđ</td>
            <td>{{$order->total}} vnđ</td>
            <td>{{$order->status}}</td>
            </form>
            <!-- <form action="{{'/admin/order/'.$order->id.'/edit'}}" method="post">
                @csrf
                @if($order->status=='cho ship')
                <td>
                    {{$order->status}}
                    <input type="text" readOnly name="action" style="display:none" value="{{$order->status}}">
                </td>
                @else
                <td>{{$order->status}}
                    <input type="text" readOnly name="action" style="display:none" value="{{$order->status}}">
                </td>
                @endif
                <td>
                    @if($order->status=='cho ship')
                    <button type="submit">Giao hàng</button>
                    @else
                    <button type="submit" disabled>Giao hàng</button>
                    @endif
                </td>
            </form> -->
            @endforeach

    </table>
</body>

</html>