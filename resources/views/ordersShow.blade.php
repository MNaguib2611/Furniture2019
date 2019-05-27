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
    <form action="{{url('orders').'/'.$order->id}}" method="POST">
            @csrf
            <input type="hidden" name="_method" value="PUT">
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
            <td>
                <span class="update-hide">{{$order->delivery_time}} </span>
               <span class="update" style="display:none;"> <input  type="date"></span>
            </td>

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
                <table class="table table-condensed" dir="rtl">
                    <tr><th>رقم المنتج</th><th>اسم المنتج</th><th>سعر المنتج</th><th>&nbsp;</th></tr>
                    @foreach ($order->orderProduct as $item)
                    <tr>
                        <td><a  href="{{url('products').'/'.$item->product_id}}">{{$item->product_id}}</a></td>
                        <td>{{$item->product->name}}</td>
                        <td>{{$item->product->price}}</td>
                        <td>
                            <a href="{{url('orderProducts/delete').'/'.$item->id}}" class="btn btn-sm  btn-danger">X</a>
                        </td>
                    </tr>
                    @endforeach
                </table>
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
        <tr>
                <td>
                        &nbsp;
                    </td>
            <td>
                &nbsp;
            </td>
            <td>
            <button id="edit-confirm" type="submit" class="update btn btn-block btn-success" style="display:none;">تاكيد</button>
            </td>
        </tr>
    </form>
    </table>
<button  id="edit-button" type="button" class=" btn btn-info"> تعديل</button>

  </div>
</div>
<div class="row createEditElements ">
        @if (\Session::has('Success'))
        <div class="alert alert-success" style="position:fixed;top:50px;right:50px;width:30%;">
            <ul>
                <li style="float:right;direction:rtl !important; text-align:right;width:80%;">{!! \Session::get('Success') !!}</li>
            </ul>
        </div>
        @endif
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
    <div class="col-lg-6 col-lg-offset-3">
    <form action="{{url('orderProducts')}}" method="post">
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
<script
  src="https://code.jquery.com/jquery-3.4.1.min.js"
  integrity="sha256-CSXorXvZcTkaix6Yvo6HppcZGetbYMGWSFlBw8HfCJo="
  crossorigin="anonymous"></script>

  <script>
  $('#edit-button').click(function () {
      if ($('#edit-confirm').css('display')=='none') {
        $('.update').css('display','block');
        $('.update-hide').css('display','none');
      } else {
        $('.update').css('display','none');
        $('.update-hide').css('display','block');
      }

  });
  </script>
</body>
</html>
