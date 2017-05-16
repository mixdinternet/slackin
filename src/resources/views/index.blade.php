<!doctype html>
<html lang="pt-BR">

<head>
    {{--
    <meta charset="UTF-8">
    <title>@if($team['name']) {{$team['name']}} @else {{'Lumen Slackin'}} @endif</title>
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    @if($team['icon'])
        <link rel="icon" href="{{$team['icon']['image_132']}}"/>
    @endif
    --}}

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>

    <!-- HTML5 shim and Respond.js for IE8 support of HTML5 elements and media queries -->
    <!-- WARNING: Respond.js doesn't work if you view the page via file:// -->
    <!--[if lt IE 9]>
    <script src="https://oss.maxcdn.com/html5shiv/3.7.2/html5shiv.min.js"></script>
    <script src="https://oss.maxcdn.com/respond/1.4.2/respond.min.js"></script>
    <![endif]-->
</head>
<body>
<div class="container">
    <div class="row">
        <div class="col-sm-8 col-sm-offset-2">
            <div id="logo">
                <a href="https://{{ $slack->team->domain }}.slack.com">
                    <img src="{{ $slack->team->icon->image_132 }}"/>
                </a>
            </div>

            <div id="message">
                {!! $slack->team->name !!}
                {!! $slack->team->domain !!}
            </div>

            <div id="form-invite" class="col-sm-6 col-sm-offset-3">
                @if (session('success'))
                    <div class="alert alert-success">
                        {{ session('success') }}
                    </div>
                @endif

                @if (session('error'))
                    <div class="alert alert-danger">
                        {{ session('error') }}
                    </div>
                @endif

                <form action="{{ route('slackin.invite') }}" method="post" class="form-horizontal" role="form">
                    <input type="hidden" name="_token" value="{{ csrf_token() }}"/>

                    <div class="form-group">
                        <input class="form-control" type="text" name="email"
                               placeholder="Email"/>
                        @if($errors->has('email'))
                            <div class="help-block">
                                {{ $errors->first('email') }}
                            </div>
                        @endif
                    </div>

                    <div class="form-group">
                        <input type="submit" class="form-control btn btn-default"
                               value="Enviar"/>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<footer>

</footer>
</body>
</html>