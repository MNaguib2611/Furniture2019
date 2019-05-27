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
                <h1  class="main-h1 btn btn-lg btn-danger">العملاء</h1>
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

<div >

  <div id="linksContent" class="row">
    <table class="table tabel-hover" style="margin-top:45px;" dir="rtl">
        <tr><th  width="15%">ID</th><th>اسم المنتج</th><th>الوصف</th><th>السعر</th><th>&nbsp;</th></tr>
        @foreach ($products as $product)
    <tr><td>{{$product->id}}</td><td>{{$product->name}}</td><td>{{$product->description}}</td><td>{{$product->price}} </td><td><a href="{{url('products/delete').'/'.$product->id}}" class="btn btn-sm  btn-danger">X</a></td></tr>
        @endforeach
        <tr>
            <form action="{{url('products')}}" method="post">
            @csrf
            <td title="إضافة منتج جديد"><img src="{{asset('images/add-product.png')}}" width="25%"></td>
            <td>
                <input id="product_name" name="product_name" type="text" placeholder="اسم المنتج">
            </td>
            <td> <input id="product_description" name="product_description" type="text" placeholder="وصف المنتج"></td>
            <td>
                    <input id="product_price" name="product_price" type="text" placeholder="سعر المنتج">
            </td>
            <td>
               <button type="submit"  class="btn btn-success" > إضافة منتج جديد</button>
            </td>
        </form>
        </tr>
    </table>
    {{ $products->links()}}
  </div>

</div>

@if (count($errors) > 0)
<div class="alert alert-danger" style="position:fixed;top:50px;right:50px;width:30%;">
    <ul>
        @foreach ($errors->all() as $error)
        <li style="float:right; width:100%; text-align:right;width:80%;">{{ $error }}</li>
        @endforeach
    </ul>
</div>
@endif
@if (\Session::has('Success'))
<div class="alert alert-success" style="position:fixed;top:50px;right:50px;width:30%;">
    <ul>
        <li style="float:right;direction:rtl !important; text-align:right;width:80%;">{!! \Session::get('Success') !!}</li>
    </ul>
</div>
@endif
{{-- <div class="row createEditElements ">
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
</div> --}}
</body>
</html>
