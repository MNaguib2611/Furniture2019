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
    <div id="linksContent" class="row">
    <table class="table tabel-hover" style="margin-top:45px;" dir="rtl">
        <tr><th>ID</th><th>الاسم</th><th>التليفون</th><th>البريد الإلكتروني</th><th>العنوان</th></tr>
    <tr><td>{{$customer->id}}</td><td>{{$customer->name}}</td><td>{{$customer->phone}}</td><td>{{$customer->email}} </td><td>{{$customer->address}}</td></tr>
    </table>
    </div>

<div class="row" dir="rtl" style="margin-top:50px;">
        <div class="col-8" >

                <table class="table table-hover" dir="rtl">
                        <tr>
                            <th>رقم الطلب</th>
                            <th>وقت الطلب</th>
                            <th>موعد التسليم</th>
                            <th>&nbsp;</th>
                        </tr>
                        @foreach ($orders as $order)
                        <tr>
                            <td><a href="{{url('orders').'/'.$order->id}}">{{$order->id}}</a></td>
                            <td>{{$order->created_at}}</td>
                            <td>{{$order->delivery_time}}</td>
                            <td width="10%" title="التفاصيل">
                                <a href="{{url('orders').'/'.$order->id}}">
                                <img src="{{asset('images/more-details.svg')}}"  width="40%"></td>
                                </a>
                        </tr>
                        @endforeach
                </table>
                {{$orders->links()}}
        </div>
        <div class="col-4" style="padding:50px 50px;">
            <form action="{{url('orders')}}" method="POST">
                @csrf
                <input type="text" hidden name="customer_id" value="{{$customer->id}}">
                <label for="delivery_time"></label>
                <strong><span>ميعاد التسليم</span></strong>
                <input name="delivery_time" id="delivery_time" type="date" placeholder="ميعاد التسليم " >
            <br>
                <button type="submit" class="btn-success">إضافة طلب جديد</button>
            </form>
        </div>
</div>
@if (\Session::has('OrderSuccess'))
<div class="alert alert-success" style="position:fixed;top:50px;right:50px;width:30%;">
            <ul>
                <li style="float:right; width:100%; text-align:right;width:80%;">{!! \Session::get('OrderSuccess') !!}</li>
            </ul>
        </div>
    @endif
  <div class="row createEditElements">
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
        <div class="col-6 col-offset-3">
            <form action="{{url('customers').'/'.$customer->id}}" method="post">
                <input type="hidden" name="_method" value="PATCH">
                @csrf
                <label for="name"></label>
            <input name="name" id="name" type="text" placeholder="اسم العميل" required value="{{$customer->name}}">
                <label for="phone"></label>
                <input name="phone" id="phone" type="text" placeholder="الهاتف " required value="{{$customer->phone}}">
                <label for="email"></label>
                <input name="email" id="email" type="text" placeholder="البريد الإلكتروني -إختياري-" value="{{$customer->email}}">
                <label for="address"></label>
                <input  type="text" name="address" id="address" placeholder="العنوان" required value="{{$customer->address}}">
                <br>
                <button type="submit" class="btn btn-danger">تعديل بيانات العميل</button>
            </form>
        </div>
    </div>

</body>
</html>
