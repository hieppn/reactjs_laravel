<!DOCTYPE html>
<html>

<head>
    <title>Chi tiết sản phẩm</title>
   <style>
   i{
       margin-top:50px;
   }
   </style>
</head>
<body>
    <a href="/admin/order"><button>Quay lại<=</button></a>
    @foreach($book as $book)
       <div class="wrapper row" style="display:flex;">
            <div class="preview col-md-6">
                 <div class="preview-pic tab-content">
                      <div class="tab-pane active" id="pic-1"> <img src="{{'/storage/'.$book->image }}" width="500px"
                        height="500px" style="margin-left:200px;">
                          </div>
                     </div>
                </div>
            <div style="margin:20px;">
                 <i style="text-align:center;color:red;font-size:50px;">{{$book->name}}</i>  <br/>
            <i>Tác giả: {{$book->author}}</i><br/>
            <i>Số lượng: {{$book->quantity}}</i><br/>
                 <i>Mô tả: {{$book->description}}</i> <br/>
                 <i>Giá hiện tại: {{$book->price}}.vnđ</i> <br/>
                    <i style="margin-left:10px;">Giá cũ: <span
                    style="text-decoration: line-through;color:blue;">{{$book->oldprice}}.vnđ</span><br/></i>               
                    
                </div>
           </div>
    @endforeach
</body>

</html>