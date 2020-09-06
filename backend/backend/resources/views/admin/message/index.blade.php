<!DOCTYPE html>
<html>
<head>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <a href="admin/dashboard"><button>Quay lại <=</button></a>
    <title>Chat</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <style>
     button{
             border:none;
             background:none;
     }
     </style>
</head>
<body>
<!-- <a href="./book/create"><button type="button" class=" btn btn-light">Thêm sản phẩm</button></a> -->
<center><h1>Hộp thư của bạn</h1></center>
                    @foreach($users as $user)
                    <form  action="{{'/message/'.$user->id}}">
                    <button> {{$user->email}}</button>
                    </form>
                    @endforeach       
</html>