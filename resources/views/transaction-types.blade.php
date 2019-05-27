<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Furniture</title>
    <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
    <link rel="stylesheet" href="{{url('css/main.css')}}">
    {{-- <link rel="stylesheet" href="{{url('css/bootstrap.min.css')}}"> --}}
    <script src="//maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js"></script>
    <script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
</head>
<body>

        <div class="col-lg-6" style="margin:0 auto;margin-top:50px;">
            <h1  class="main-h1 btn btn-lg btn-info"> انواع المعاملات</h1>
        </div>
        <ul class="nav justify-content-center">
            <li class="nav-item">
                <a href="{{url('/customers')}}" class="btn btn-lg btn-danger">العملاء</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/products')}}" class="btn btn-lg btn-success">المنتجات</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/orders')}}" class="btn btn-lg btn-primary">الطلبات</a>
            </li>
            <li class="nav-item">
                <a href="{{url('/transactions')}}" class="btn btn-lg btn-warning">المعاملات النقدية</a>
            </li>
        </ul>


        <div id="linksContent" class="row">
            <table class="table tabel-hover" style="margin-top:45px;" dir="rtl">

            </table>
        </div>

</body>
</html>
