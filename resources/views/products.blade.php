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

    <div class="col-6 col-offset-3">
            <h1  class="main-h1 btn btn-lg btn-success " style="position:relative;left:50%;" >المنتجات</h1>
            <div style="position:relative;left:65%;right:65%;">
                            <a href="{{url('/customers')}}" class="btn btn-lg btn-danger">العملاء</a>
                            <a href="{{url('/products')}}" class="btn btn-lg btn-success">المنتجات</a>
                            <a href="{{url('/orders')}}" class="btn btn-lg btn-primary">الطلبات</a>
                            <a href="{{url('/transactions')}}" class="btn btn-lg btn-warning">المعاملات النقدية</a>
            </div>

    </div>

<div >

  <div id="linksContent" class="row">
    <table class="table tabel-hover" style="margin-top:45px;">
        <tr><th>ID</th><th>اسم المنتج</th><th>الوصف</th><th>السعر</th><th>&nbsp;</th></tr>
        @foreach ($products as $product)
    <tr><td>{{$product->id}}</td><td>{{$product->name}}</td><td>{{$product->description}}</td><td>{{$product->price}} </td><td><a href="{{url('products/delete').'/'.$product->id}}" class="btn btn-sm btn-danger">X</a></td></tr>
        @endforeach
    </table>
    {{ $products->links()}}
  </div>

</div>
<div class="row createEditElements ">
        @if (count($errors) > 0)
        <div class="alert alert-danger">
            <ul>
                @foreach ($errors->all() as $error)
                <li style="float:right; width:100%; text-align:right;">{{ $error }}</li>
                @endforeach
            </ul>
        </div>
    @endif
    @if (\Session::has('Success'))
        <div class="alert alert-success">
            <ul>
                <li style="float:right;direction:rtl !important; text-align:right;">{!! \Session::get('Success') !!}</li>
            </ul>
        </div>
    @endif
    <div class="col-lg-6 col-lg-offset-3">
    <form action="{{url('products')}}" method="post">
            @csrf
            <label for="product_name"></label>
            <input id="product_name" name="product_name" type="text" placeholder="اسم المنتج">
            <label for="product_description"></label>
            <input id="product_description" name="product_description" type="text" placeholder="وصف المنتج">
            <label for="product_price"></label>
            <input id="product_price" name="product_price" type="text" placeholder="سعر المنتج">
            <br>
            <input type="submit" class="btn btn-success" value="إضافة منتج جديد">
        </form>
    </div>
</div>
</body>
</html>
