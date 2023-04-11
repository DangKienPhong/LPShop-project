<!doctype html>
<!--[if lt IE 7]>      <html class="no-js lt-ie9 lt-ie8 lt-ie7" lang=""> <![endif]-->
<!--[if IE 7]>         <html class="no-js lt-ie9 lt-ie8" lang=""> <![endif]-->
<!--[if IE 8]>         <html class="no-js lt-ie9" lang=""> <![endif]-->
<!--[if gt IE 8]><!--> <html class="no-js" lang=""> <!--<![endif]-->
@include('Admin.Layout.header')

<body class="bg-dark">

    <div class="sufee-login d-flex align-content-center flex-wrap">
        <div class="container">
            <div class="login-content">
                <div class="login-logo">
                    <a href="index.html">
                        <img class="align-content" src="{{ asset('back_assets/images/logo.png') }}" alt="">
                    </a>
                </div>
                <div class="login-form">
                    <form  method="POST" action="{{route('admin.xacNhanAdmin')}}" autocomplete="off">
                        @csrf
                        @if (session('error'))
                            <div class="alerts">
                                <div class="row">
                                    <div class="col-md-12">

                                        
                                        <div class="sufee-alert alert with-close alert-danger alert-dismissible fade show">
                                                <h4 class="alert-heading"> <span class="badge badge-pill badge-danger">{{session('error')}}</span></h4> 
                                                <hr>
                                                <p class="mb-0">Hãy kiểm tra lại thông tin bạn đã nhập.</p>
                                                <hr>
                                                {{-- @foreach ( $errors as $errors)
                                                    <p class="mb-0">Lỗi: $errors - {{$message}} </p>
                                                    <hr>
                                                    <br>
                                                @endforeach --}}
                                                
                                            <button type="button" class="close" data-dismiss="alert" aria-label="Close">
                                                <span aria-hidden="true">&times;</span>
                                            </button>
                                        
                                        </div>


                                    </div>


                                    
                                </div>
                            </div> <!-- .alerts -->
                        @endif
                        <div class="form-group">
                            <label>Email address</label>
                            <input type="email" class="form-control" name="email" placeholder="Email" value="{{old('email')}}">
                            <span style="color:red" class="help-block">
                                @error('email')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        <div class="form-group">
                            <label>Password</label>
                            <input type="password" class="form-control" name="password" placeholder="Password" value="{{old('password')}}">
                            <span style="color:red" class="help-block">
                                @error('password')
                                    {{$message}}
                                @enderror
                            </span>
                        </div>
                        {{-- <div class="checkbox">
                            <label>
                                <input type="checkbox"> Remember Me
                            </label>
                            <label class="pull-right">
                                <a href="#">Forgotten Password?</a>
                            </label>

                        </div> --}}
                        <button type="submit" class="btn btn-success btn-flat m-b-30 m-t-30">Log in</button>
                        {{-- <div class="social-login-content">
                            <div class="social-button">
                                <button type="button" class="btn social facebook btn-flat btn-addon mb-3"><i class="ti-facebook"></i>Sign in with facebook</button>
                                <button type="button" class="btn social twitter btn-flat btn-addon mt-2"><i class="ti-twitter"></i>Sign in with twitter</button>
                            </div>
                        </div> --}}
                        <div class="register-link m-t-15 text-center">
                            {{-- <p>Don't have account ? <a href="{{ route('admin.register') }}"> Sign Up Here</a></p> --}}
                            <p>Developed by LPSHOP</p>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>

    <script src="https://cdn.jsdelivr.net/npm/jquery@2.2.4/dist/jquery.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.14.4/dist/umd/popper.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/js/bootstrap.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/jquery-match-height@0.7.2/dist/jquery.matchHeight.min.js"></script>
    <script src="{{ asset('assets/js/main.js') }} "></script>

</body>
</html>
