@extends('layouts.auth')

@section('content')
    <div class="center-block w-xxl w-auto-xs p-y-md text-center">
        <div class="p-a-md">
            <!--div>
                <a href="#" class="btn btn-block indigo text-white m-b-sm">
                    <i class="fa fa-facebook pull-left"></i>Sign in with Facebook
                </a>
                <a href="#" class="btn btn-block red text-white">
                    <i class="fa fa-google-plus pull-left"></i>Sign in with Google+
                </a>
            </div>
            <div class="m-y text-sm">OR</div-->
            @if (session('status'))
                <div class="alert alert-success">
                    {{ session('status') }}
                </div>
            @endif
            <div>
                <h4>Forgot your password?</h4>
                <p class="text-muted m-y">Enter your email below and we will send you instructions on how to change your password.</p>
            </div>
            <form class="form-horizontal" role="form" method="POST" action="{{ url('/password/email') }}">
                {{ csrf_field() }}
                <div class="form-group{{ $errors->has('email') ? ' has-error' : '' }}">
                    <input id="email" type="email" class="form-control" name="email" value="{{ old('email') }}" placeholder="Email" required>
                    @if ($errors->has('email'))
                        <span class="help-block">
                            <strong>{{ $errors->first('email') }}</strong>
                        </span>
                    @endif
                </div>
                <button type="submit" class="btn black btn-block p-x-md">Send</button>
            </form>
            <div class="p-y-lg">Return to <a href="{{ url('/login') }}" class="text-primary _600">Login</a></div>
        </div>
    </div>
@endsection
