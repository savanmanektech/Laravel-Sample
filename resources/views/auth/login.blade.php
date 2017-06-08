<!doctype html>
<html lang="en">
<head>
    <meta charset="utf-8">
    <meta http-equiv="x-ua-compatible" content="ie=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- csrf token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'laravel') }}</title>

    <!-- styles -->
    <link href="/css/admin.css" rel="stylesheet">

    <!-- scripts -->
    <script>
        window.laravel = {!! json_encode([
            'csrftoken' => csrf_token(),
        ]) !!};
    </script>
</head>
<body>
    <div class="center-wrapper">
        <div class="center-content">
            <div class="row no-m">
                <div class="col-xs-10 col-xs-offset-1 col-sm-6 col-sm-offset-3 col-md-4 col-md-offset-4">
                    <section class="panel bg-white no-b">
                        <header class="panel-heading text-uppercase"> <h5><b>Login</b></h5> </header>
                        <div class="p15">
                            <form role="form" method="POST" action="{{ url('/auth/login') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('email_primary') ? ' has-error' : '' }}">
                                    <input id="email_primary" type="text" class="form-control" name="email_primary" value="{{ old('email_primary') }}" placeholder="Email" required autofocus>
                                    @if ($errors->has('email_primary'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('email_primary') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('password') ? ' has-error' : '' }}">
                                    <input id="password" type="password" class="form-control" name="password" placeholder="Password" required>
                                    @if ($errors->has('password'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('password') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Login</button>
                            </form>
                        </div>
                    </section>
                    <p class="text-center">
                        Copyright &copy; {{ date('Y') }} Digiscripts
                    </p>
                </div>
            </div>
        </div>
    </div>
</body>
</html>
