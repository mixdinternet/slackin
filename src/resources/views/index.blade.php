<!doctype html>
<html lang="pt-BR">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="shortcut icon" type="image/x-icon" href="../favicon.ico">
    <link rel=manifest href="manifest.json">
    <title>{!! $slack->team->name !!}</title>

    <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/3.3.7/css/bootstrap.min.css"/>
    <link rel="stylesheet" href="../assets/css/frontend.min.css">

</head>
<body>

<header>
    <div class="row">
        <div class="columns medium-12">
            <div class="before"></div>
            <img src="{{ $slack->team->icon->image_132 }}" id="logotipo" alt="{!! $slack->team->name !!}">
            <p>
                Entre para nossa comunidade no Slack. <br>
                Receba um convite deixando seu email abaixo.
            </p>
            <div class="after"></div>
        </div>
    </div>
</header>

<main>
    <div class="row">
        <div id="form-invite" class="columns medium-12">
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
                <div class="input">
                    <input type="text" class="txt" name="email" placeholder="Digite seu email">
                    <input type="submit" value="" class="submit">
                </div>
                <p>
                    Se você ainda não tem uma conta no Slack será necessário criar.
                </p>
            </form>
        </div>
    </div>
</main>


<script src="../assets/js/frontend.min.js"></script>
</body>