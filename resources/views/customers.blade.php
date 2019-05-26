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
    <table class="table tabel-hover" style="margin-top:45px;">
        <tr><th>ID</th><th>الاسم</th><th>التليفون</th><th>البريد الإلكتروني</th><th>العنوان</th></tr>
        @foreach ($customers as $customer)
    <tr><td>{{$customer->id}}</td><td><a href="{{url('customers/'.$customer->id)}}">{{$customer->name}}</a></td><td>{{$customer->phone}}</td><td>{{$customer->email}} </td><td>{{$customer->address}}</td></tr>
        @endforeach
    </table>
    {{ $customers->links()}}
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
        @if (\Session::has('Success'))
            <div class="alert alert-success">
                <ul>
                    <li style="float:right;direction:rtl !important; text-align:right;">{!! \Session::get('Success') !!}</li>
                </ul>
            </div>
        @endif
        <div class="col-6 col-offset-3">
            <form action="{{url('customers')}}" method="post">
                @csrf
                <label for="customer_name"></label>
                <input name="customer_name" id="customer_name" type="text" placeholder="اسم العميل" required>
                <label for="phone"></label>
                <input name="phone" id="phone" type="text" placeholder="الهاتف " required >
                <label for="customer_email"></label>
                <input name="customer_email" id="customer_email" type="email" placeholder="(البريد الإلكتروني (إختياري">
                <label for="customer_address"></label>
                <input  type="text" name="customer_address" id="customer_address" placeholder="العنوان" required>
                <br>
                <input type="submit" class="btn btn-danger" value="إضافة عميل جديد">
            </form>
        </div>
    </div>

</body>
</html>
