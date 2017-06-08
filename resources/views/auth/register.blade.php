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
                        <header class="panel-heading text-uppercase"> <h5><b>Register</b></h5> </header>
                        <div class="p15">
                            <form role="form" method="POST" action="{{ url('/auth/register') }}">
                                {{ csrf_field() }}
                                <div class="form-group{{ $errors->has('customer_type_id') ? ' has-error' : '' }}">
                                    <select id="customer_type_id" class="form-control" name="customer_type_id" value="{{ old('customer_type_id') }}">
                                        <option value="1">Practice</option>
                                        <option value="2">Pharmacy</option>
                                        <option value="3">Medical Lab</option>
                                        <option value="4">Radiological Lab</option>
                                    </select>
                                    @if ($errors->has('customer_type_id'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('customer_type_id') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('first_name') ? ' has-error' : '' }}">
                                    <input id="first_name" type="text" class="form-control" name="first_name" value="{{ old('first_name') }}" placeholder="First Name" required autofocus>
                                    @if ($errors->has('first_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('first_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('last_name') ? ' has-error' : '' }}">
                                    <input id="last_name" type="text" class="form-control" name="last_name" value="{{ old('last_name') }}" placeholder="Last Name" autofocus>
                                    @if ($errors->has('last_name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('last_name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('name') ? ' has-error' : '' }}">
                                    <input id="name" type="text" class="form-control" name="name" value="{{ old('name') }}" placeholder="Business Name" autofocus>
                                    @if ($errors->has('name'))
                                        <span class="help-block">
                                            <strong>{{ $errors->first('name') }}</strong>
                                        </span>
                                    @endif
                                </div>
                                <div class="form-group{{ $errors->has('email_primary') ? ' has-error' : '' }}">
                                    <input id="email_primary" type="email" class="form-control" name="email_primary" value="{{ old('email_primary') }}" placeholder="Email" required>
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
                                <div class="form-group">
                                    <input id="password-confirm" type="password" class="form-control" name="password_confirmation" placeholder="Confirm Password" required>
                                </div>
                                <button class="btn btn-primary btn-block" type="submit">Register</button>
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
