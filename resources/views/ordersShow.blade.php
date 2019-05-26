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

        <div class="col-lg-6" style="margin:0 auto;">
                <h1  class="main-h1 btn btn-lg btn-primary">الطلبات</h1>
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
        <tr>
            <th>رقم الطلب</th>
            <td>{{$order->id}}</td>
        </tr>
        <tr>
            <th>اسم العميل</th>
            <td>{{$order->customer->name}}</td>
        </tr>
        <tr>
            <th>وقت الطلب</th>
            <td>{{$order->created_at}}</td>
        </tr>
        <tr>
            <th>ميعاد التسليم</th>
            <td>{{$order->delivery_time}}</td>
        </tr>
        <tr>
            <th>الهاتف</th>
            <td>{{$order->customer->phone}}</td>
        </tr>
        <tr>
            <th>البريد الإلكتروني</th>
            <td>{{$order->customer->email}}</td>
        </tr>
        <tr>
            <th>العنوان</th>
            <td>{{$order->customer->address}}</td>
        </tr>
        <tr>
            <th>المنتجات</th>
            <td>
                <ul>
                        <li style="list-style: none;direction:rtl;">
                            <span class="productLinks">رقم المنتج</span>
                            <span class="productLinks">سعر المنتج</span>
                            <span class="productLinks">اسم المنتج</span>&nbsp;

                        </li>
                    @foreach ($order->orderProduct as $item)
                        <li style="list-style: none;direction:rtl;">
                            <span class="productLinks"><a  href="{{url('products').'/'.$item->product_id}}">{{$item->product_id}}</a></span>
                            <span class="productLinks">{{$item->product->name}}</span>&nbsp;
                            <span class="productLinks">{{$item->product->price}}</span>
                        </li>
                    @endforeach

                </ul>
            </td>
        </tr>
        <tr>
                <th>السعر النهائي</th>
                <td>{{$order->total_price}}</td>
            </tr>
        <tr>
            <th>ملاحظات</th>
            <td>
                <textarea name="notes" id="" cols="60" rows="3">
                        {{$order->notes}}
                </textarea>

            </td>
        </tr>
    </table>

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
    <form action="{{url('offerProducts')}}" method="post">
            @csrf
            <input type="hidden" name="order_id" value="{{$order->id}}">
            <select class="browser-default custom-select col-lg-6" name="product_id" required>
                <option class="placeholder" value="">إختار المنتج</option>
                @foreach ($products as $product)
            <option style="padding:5px 25px;"  value="{{$product->id}}">
               <span>{{$product->name}}</span>&nbsp;&nbsp;&nbsp;&nbsp;
               &nbsp;&nbsp;&nbsp;&nbsp;<span>{{$product->price}}</span>
            </option>
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-success" value="إضافة المنتج للطلبية" >
        </form>
    </div>
</div>
</body>
</html>
