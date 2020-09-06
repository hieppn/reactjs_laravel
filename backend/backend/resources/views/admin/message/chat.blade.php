<!DOCTYPE html>
<html>
<head>
     <link rel="shortcut icon" type="image/png" href="/img/logo.jpg"/>
    <a href="../message"><button>Quay lại <=</button></a>
    <title>Chat</title>
     <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.5.0/css/bootstrap.min.css" integrity="sha384-9aIt2nRpC12Uk9gS9baDl411NQApFmC26EwAOH8WgZl5MYYxFfc+NcPb1dKGj7Sk" crossorigin="anonymous">
     <style>
     .messgr{
background-color: thistle;
width: 100%;
height: 1500px;
}
.mes{
   width: 500px; 
   background-color: blanchedalmond;
   height: 1000px;
   align-items: center;
   margin-left: 300px;
   margin-top: 20px;
}
     .you{
    display: block;
    margin-right: 5px;
    text-align: right;
    float: right;
    margin-top: 20px;
    width: 500px;
}
.admin{
    margin-top: 20px;
    display: block;
    margin-right: 5px;
    text-align: left;
    float: left;
    width: 400px;
}
     </style>
</head>
<body>
<!-- <a href="./book/create"><button type="button" class=" btn btn-light">Thêm sản phẩm</button></a> -->
<center><h1>{{$user->email}}</h1></center>
<div className="messgr">
<div className="mes">
                <form className="cmt" action="{{'../message/'.$user->id}}" method="post">
                @csrf
                    <input type="text" name="content" placeholder="say something" />
                    <button type="submit">Send</button>
                </form>
                    @foreach($mess as $mes)
                    @if($mes->id_user!=1)
                    <hr/><i class="you"> {{$mes->content}}</i>
                    <br/>
                    @else
                    <hr/><i class="admin"> {{$mes->content}}</i>
                    <br/>
                    @endif
                    @endforeach   
                    </div>
                    </div>    
</html>