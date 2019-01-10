@extends('layouts.app')

@push('css')
@endpush

@section('content')
<section id="wrapper" class="login-register">
    <div class="login-box">
        <div class="white-box">
            <form class="form-horizontal form-material" method="post" id="loginform" action="{{route('login')}}">
                {{csrf_field()}}
                <div class="form-group">
                    <div class="col-xs-12 text-center">
                        <div class="user-thumb text-center"> <img alt="thumbnail" class="img-circle" width="100" src="{{asset('plugins/images/users/hanna.jpg')}}">
                            <h3>Hanna</h3>
                        </div>
                    </div>
                </div>
                <div class="form-group ">
                    <div class="col-xs-12">
                        <input id="password" class="form-control{{ $errors->has('password') ? ' is-invalid' : '' }}" name="password" required placeholder="Password">
                        @if ($errors->has('password'))
                            <span class="invalid-feedback">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                        @endif
                    </div>
                </div>
                <div class="form-group text-center">
                    <div class="col-xs-12">
                        <button class="btn btn-info btn-lg btn-block text-uppercase waves-effect waves-light" type="submit">Log In</button>
                    </div>
                </div>
            </form>
        </div>
    </div>
</section>
@endsection

@push('js')
@endpush