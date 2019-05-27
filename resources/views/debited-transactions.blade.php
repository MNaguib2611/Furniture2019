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
                <h1  class="main-h1 btn btn-lg btn-danger"> مصروفات</h1>
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
        <tr><th>ID</th><th>المبلغ</th><th>النوع</th><th>وقت الإنشاء</th><th>&nbsp;</th></tr>
        @if (count($debitedTransactions)>0)
            @foreach ( $debitedTransactions as  $debitedTransaction)
                <tr
                 @if ($debitedTransaction->transactionType_name == 'بنك') style='background-color:#90EE90;'
                 @elseif ($debitedTransaction->transactionType_name == 'عميل') style='background-color:#add8e9;'
                 @elseif ($debitedTransaction->transactionType_name == 'مورد') style='background-color:#ffb6c1;'
                 @elseif ($debitedTransaction->transactionType_name == 'مرافق') style='background-color:#ffa500;'
                 @endif
                >
                    <td>{{$debitedTransaction->id}}</td>
                    <td>{{$debitedTransaction->amount}}</td>
                    <td>{{$debitedTransaction->transactionType_name}}</td>
                    <td>{{$debitedTransaction->created_at}} </td>
                    <td>
                        <a href="{{url('debited-transaction/delete').'/'.$debitedTransaction->id}}" class="btn btn-sm  btn-danger">X</a>
                    </td>
                    {{-- <td><a href="{{url('products/delete').'/'.$product->id}}" class="btn btn-sm btn-danger">X</a></td> --}}
                </tr>
            @endforeach
            <tr>
                <th>المبلغ الكلي</th>
                <th>{{$totalAmount}}</th>
            </tr>
        @endif

    </table>
    {{ $debitedTransactions->links()}}
  </div>

</div>
<div class="row createEditElements ">
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
    <div class="col-lg-6 col-lg-offset-3">
    <form action="{{url('debited-transactions')}}" method="post">
            @csrf
            <label for="amount"></label>
            <input id="amount" name="amount" type="text" placeholder="المبلغ" required>
            <select class="browser-default custom-select col-lg-10" name="transactionType_name" required>
                <option class="placeholder" value=""> نوع المعاملة</option>
                @foreach ($transactionTypes as $transactionTypes)
            <option style="padding:5px 25px;"  value="{{$transactionTypes->name}}">
               <span>{{$transactionTypes->name}}</span>
            </option>
                @endforeach
            </select>
            <br>
            <input type="submit" class="btn btn-success" value="إضافة معاملة جديدة">
        </form>
    </div>
</div>
</body>
</html>
