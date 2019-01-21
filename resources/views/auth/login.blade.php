@extends('layouts.app')

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" id="loginform" method="post" action="{{ route('login') }}">
                {{csrf_field()}}
                <h3 class="box-title m-b-20">Authentification</h3>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="email" placeholder="Email" class="form-control{{ $errors->has('email') ? ' is-invalid' : '' }}" name="email" value="{{ old('email') }}" required autofocus>
                        @if ($errors->has('email'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-xs-12">
                        <input id="password"  type="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group">
                    <div class="col-md-12">
                        <div class="checkbox checkbox-primary pull-left p-t-0">
                            <!-- <input type="checkbox" id="checkbox-signup" name="remember" {{ old('remember') ? 'checked' : '' }}>
                            <label for="checkbox-signup"> Remember me </label> -->
                        </div>
                        <a href="{{ route('password.request') }}" id="to-recover" class="text-dark pull-right"><i class=""></i> </a> </div>
                </div>
                <div class="form-group text-center m-t-20">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit"> Se Connecter
                        </button>
                    </div>
                </div>
                <!-- <div class="row">
                    <div class="col-xs-12 col-sm-12 col-md-12 m-t-10 text-center">
                        <div class="social">
                            <a href="{{url('auth/facebook')}}" class="btn  btn-facebook" data-toggle="tooltip" title="Login with Facebook"> <i aria-hidden="true" class="fa fa-facebook"></i> </a>
                            <a href="{{url('auth/google')}}" class="btn btn-googleplus" data-toggle="tooltip" title="Login with Google"> <i aria-hidden="true" class="fa fa-google-plus"></i> </a>
                        </div>
                    </div>
                </div>
                <div class="form-group m-b-0">
                    <div class="col-sm-12 text-center">
                        <p>Don't have an account? <a href="{{url('register')}}" class="text-primary m-l-5"><b>Sign Up</b></a></p>
                    </div>
                </div> -->
            </form>
        </div>
    </div>
</section>


@endsection
