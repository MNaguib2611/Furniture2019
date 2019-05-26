<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furniture</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
    <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}">
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>



<div class="wrapper fadeInDown">
  <div id="linksContent" class="row">
    <div class="col-6 containers-div">
    <a href="{{url('/debited-transactions')}}" class="btn btn-lg btn-danger">مصروفات</a>
    </div>
    <div class="col-6 containers-div">
        <a href="{{url('/credited-transactions')}}" class="btn btn-lg btn-success">واردات</a>
    </div>

  </div>
</div>

</body>
</html>
