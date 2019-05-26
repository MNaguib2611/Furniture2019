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
            <h1  class="main-h1 btn btn-lg btn-danger " style="position:relative;left:50%;margin-top:30px;" >العملاء</h1>
            <div style="position:relative;left:65%;right:65%;">
                    <a href="{{url('/customers')}}" class="btn btn-lg btn-danger">العملاء</a>
                    <a href="{{url('/products')}}" class="btn btn-lg btn-success">المنتجات</a>
                    <a href="{{url('/orders')}}" class="btn btn-lg btn-primary">الطلبات</a>
                    <a href="{{url('/transactions')}}" class="btn btn-lg btn-warning">المعاملات النقدية</a>
            </div>
    </div>

<div>
    <div id="linksContent" class="row">
            <table class="table table-hover" dir="rtl">
                    <tr>
                        <th>رقم الطلب</th>
                        <th>اسم العميل</th>
                        <th>وقت الطلب</th>
                        <th>ميعاد التسليم</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{url('orders').'/'.$order->id}}">{{$order->id}}</a></td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->created_at}}</td>
                        <td>{{$order->delivery_time}}</td>
                    </tr>
                    @endforeach
            </table>
            {{$orders->links()}}
    </div>

</div>




  <div class="row createEditElements">
        @if (count($errors) > 0)
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                    <li style="float:right; width:100%; text-align:right;">{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif
        @if (\Session::has('OrderSuccess'))
        <div class="row alert alert-success">
            <ul>
                <li style="float:right;direction:rtl !important; text-align:right;">{!! \Session::get('OrderSuccess') !!}</li>
            </ul>
        </div>
        @endif
        <div class="col-6 col-offset-3" style="height: 200px;">
            <form action="{{url('orders')}}" method="post">
                @csrf
                <label for="customer_id"></label>
                <select class="browser-default custom-select col-lg-6" name="customer_id" required>
                    <option class="placeholder" value="">إختار العميل</option>
                    @foreach ($customers as $customer)
                    <option style="padding:5px 25px;"  value="{{$customer->id}}">
                    <span>{{$customer->name}}</span>
                    </option>
                    @endforeach
                </select>
                <br>
                <label for="delivery_time"></label>
                <strong><span>ميعاد التسليم</span></strong>
                <input name="delivery_time" id="delivery_time" type="date" placeholder="ميعاد التسليم " >
               <br>
               <button type="submit" class="btn-success">إضافة طلب جديد</button>
            </form>
        </div>
    </div>

</body>
</html>
