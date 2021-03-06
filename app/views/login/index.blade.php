<!DOCTYPE html>
<html class="lockscreen">
    <head>
        <meta charset="UTF-8">
        <title>Log in</title>
        <meta content='width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no' name='viewport'>
        <link href="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/css/bootstrap.min.css" rel="stylesheet" type="text/css" />
        <link href="http://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.2.0/css/font-awesome.min.css" rel="stylesheet" type="text/css" />
        <!-- Theme style -->
        <link href="/css/AdminLTE.css" rel="stylesheet" type="text/css" />

        <!-- HTML5 Shim and Respond.js IE8 support of HTML5 elements and media queries -->
        <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
        <!--[if lt IE 9]>
          <script src="https://oss.maxcdn.com/libs/html5shiv/3.7.0/html5shiv.js"></script>
          <script src="https://oss.maxcdn.com/libs/respond.js/1.3.0/respond.min.js"></script>
        <![endif]-->
    </head>
    <body class="skin-black">

        <div class="form-box" id="login-box" style="box-shadow: 5px 5px 20px #333;">
            <div class="header"><img src="/img/login-logo.png"><br />Sign In</div>
            {{ Form::open(array('url' => 'login')) }}
                <div class="body bg-gray">
                    @if(sizeof($errors) > 1)
                        {{ $errors->first('email') }}<br />
                        {{ $errors->first('password') }}
                    @endif
                    <div class="form-group">
                        <!-- <input type="text" name="userid" class="form-control" placeholder="User ID"/> -->
                        <input id="email" name="email" class="form-control" type="text" placeholder="E-mail">
                    </div>
                    <div class="form-group">
                        <input type="password" name="password" class="form-control" placeholder="Password"/>
                    </div>

                </div>
                <div class="footer">
                    <!-- <a href="/dashboard" class="btn bg-olive btn-block">Sign me in</a> -->
                    <button class="btn bg-olive btn-block">Sign In</button>
                    <p><a href="#">I forgot my password</a></p>

                </div>
            {{ Form::close() }}


        </div>
    <br />
    <br />
        <script src="http://ajax.googleapis.com/ajax/libs/jquery/2.1.3/jquery.min.js" type="text/javascript"></script>
        <script src="http://maxcdn.bootstrapcdn.com/bootstrap/3.3.1/js/bootstrap.min.js" type="text/javascript"></script>

    </body>
</html>
