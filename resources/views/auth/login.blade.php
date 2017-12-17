@extends('layouts.auth')

@section('content')
<div class="row">

@include('partials.header')

</div>
<div class="row" style="margin-top: 2%;">
</div>
    <div class="row">
     <div class="panel panel-default">                      
                
            <div class="panel-body">
            <h1>We recommend you to register before taking quiz to maintain records for your reference.</h1>
            <h3><strong> But it is entirely upto you. Even without it you can take a quiz</strong></h3>
            </div>
        </div>
    </div>
    </div>
    <div class="row">

            @include('partials.quizsummary')
                </div>
    <div class="row">

        <div class="col-md-6"> 
            @include('partials.quizselect')
        </div>
     <div class="col-md-6">
            <h1 class="text-center" style="color: white">Ameyem Quiz</h1>
            <h3 class="text-center" style="color: white">We recommend you to register before taking quiz to maintain records</h3>
            
            <br />
            <div class="panel panel-default">
                <div class="panel-heading">Login</div>
                <div class="panel-body">
                    @if (count($errors) > 0)
                        <div class="alert alert-danger">
                            <strong>Whoops!</strong> There were problems with input:
                            <br><br>
                            <ul>
                                @foreach ($errors->all() as $error)
                                    <li>{{ $error }}</li>
                                @endforeach
                            </ul>
                        </div>
                    @endif

                    <form class="form-horizontal"
                          role="form"
                          method="POST"
                          action="{{ url('login') }}">
                        <div class="form-group">
                            <label class="col-md-4 control-label">login with:</label>
                                <div class="col-md-6 col-md-offset-4">
                                <a href="{{ route('oauth2google') }}"
                                        class="btn btn-info">
                                    Google
                                </a>
                                <a href="{{ route('oauth2facebook') }}"
                                        class="btn btn-info">
                                    Facebook
                                </a>
                                <a href="{{ route('oauth2github') }}"
                                        class="btn btn-info">
                                    GitHub
                                </a>
                                <br>
                                Or
                                <br>
                            </div>
                        </div>

                        <input type="hidden"
                               name="_token"
                               value="{{ csrf_token() }}">

                        <div class="form-group">
                            <label class="col-md-4 control-label">Email</label>

                            <div class="col-md-6">
                                <input type="email"
                                       class="form-control"
                                       name="email"
                                       value="{{ old('email') }}">
                            </div>
                        </div>

                        <div class="form-group">
                            <label class="col-md-4 control-label">Password</label>

                            <div class="col-md-6">
                                <input type="password"
                                       class="form-control"
                                       name="password">
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <label>
                                    <input type="checkbox"
                                           name="remember">Remember me
                                </label>
                            </div>
                        </div>

                        <div class="form-group">
                            <div class="col-md-6 col-md-offset-4">
                                <button type="submit"
                                        class="btn btn-primary">
                                    Login
                                </button>
                                <a href="{{ route('auth.register') }}"
                                        class="btn btn-default">
                                    Register
                                </a>
                                <br>
                                <a href="{{ route('auth.password.reset') }}">Forgot password</a>
                                
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            {{--  <div class="text-center" style="color: white">Created by <a href="http://laraveldaily.com">Laravel Daily Team</a></div>
            <div class="text-center" style="color: white">Powered by <a href="https://quickadminpanel.com">QuickAdminPanel.com</a></div>  --}}
        </div>
    </div>
@endsection
