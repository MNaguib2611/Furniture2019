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



<div class="wrapper fadeInDown">
  <div id="formContent">

    <!-- Login Form -->
  <form method="POST" action="{{url('/login')}}">
    @csrf
        <br><br>
      <input type="text" id="login" class="fadeIn second" name="username" placeholder="username" required>
      <input type="password" id="password" class="fadeIn third" name="password" placeholder="password" required>
      <input type="submit" class="fadeIn fourth" value="Log In">
    </form>

    <!-- Remind Passowrd -->
    <div id="formFooter">
            @if (\Session::has('failed-login'))
            <div class="alert alert-danger">
                <ul>
                    <li style="list-style:none; text-align:center;">{!! \Session::get('failed-login') !!}</li>
                </ul>
            </div>
        @endif
    </div>

  </div>
</div>

</body>
</html>
