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

<div>
    <div id="linksContent" class="row">
            <table class="table table-hover" dir="rtl">
                    <tr>
                        <th  width="15%">رقم الطلب</th>
                        <th>اسم العميل</th>
                        <th>ميعاد التسليم</th>
                        <th width="25%">&nbsp;</th>
                    </tr>
                    @foreach ($orders as $order)
                    <tr>
                        <td><a href="{{url('orders').'/'.$order->id}}">{{$order->id}}</a></td>
                        <td>{{$order->customer->name}}</td>
                        <td>{{$order->delivery_time}}</td>
                        <td width="25%" title="التفاصيل">
                           <a href="{{url('orders').'/'.$order->id}}">
                                <img src="{{asset('images/more-details.png')}}" alt="" width="15%">
                               </a>
                        </td>
                    </tr>
                    @endforeach
                    <tr>
                    <form action="{{url('orders')}}" method="post">
                    @csrf
                        <td  width="15%" title="إضافة طلبية جديد">
                            <img src="{{asset('images/add-order.png')}}" alt="" width="15%">
                        </td>
                        <td>

                            <select class="browser-default custom-select col-lg-6" name="customer_id" required>
                                <option class="placeholder" value="">إختار العميل</option>
                                @foreach ($customers as $customer)
                                <option style="padding:5px 25px;"  value="{{$customer->id}}">
                                <span>{{$customer->name}}</span>
                                </option>
                                @endforeach
                            </select>
                        </td>
                        <td>
                        <input name="delivery_time" id="delivery_time" type="date" placeholder="ميعاد التسليم " >
                        </td>
                        <td>
                                <button type="submit" class="btn-primary">إضافة طلبية جديد</button>
                        </td>
                    </form>
                    </tr>
            </table>
            {{$orders->links()}}
    </div>

</div>

@if (\Session::has('OrderSuccess'))
    <div class="alert alert-success" style="position:fixed;top:50px;right:50px;width:30%;" dir="rtl">
        <ul>
            <li style="float:right; width:100%; text-align:right;width:80%;">{!! \Session::get('OrderSuccess') !!}</li>
        </ul>
    </div>
@endif
@if (count($errors) > 0)
    <div class="alert alert-danger" style="position:fixed;top:50px;right:50px;width:30%;" dir="rtl">
        <ul>
            @foreach ($errors->all() as $error)
            <li style="float:right; width:100%; text-align:right;width:80%;" >{{ $error }}</li>
            @endforeach
        </ul>
    </div>
@endif

  {{-- <div class="row createEditElements">
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
    </div> --}}

</body>
</html>
