@extends('admin.auth.authmester')
@section('content')
    <div class="">
        <div id="wrapper">
            <div id="register1" class=" form">
                <section class="login_content">
                    <form action="{{url('/admin/register')}}" method="post">
                        {!! csrf_field() !!}
                        <h1>Tạo tài khoản</h1>
                        <div id="errors">
                            @include('flash::message')
                        </div>
                        <div class=" {{ $errors->has('username') ? ' has-error' : '' }}">
                            <input type="text" class="form-control" placeholder="Tên đăng nhập"
                                   value="{!! old('username') !!}"
                                   required="" name="username"/>
                            @if ($errors->has('username'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('username') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class=" {{ $errors->has('email') ? ' has-error' : '' }}">
                            <input type="email" class="form-control" placeholder="Email" required=""
                                   value="{!! old('email') !!}" name="email"/>
                            @if ($errors->has('email'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('email') }}</strong>
                                    </span>
                            @endif
                        </div>
                        <div class=" {{ $errors->has('password') ? ' has-error' : '' }}">
                            <input type="password" class="form-control" placeholder="Password" required=""
                                   name="password" value="{!! old('password') !!}"/>
                            @if ($errors->has('password'))
                                <span class="help-block">
                                        <strong>{{ $errors->first('password') }}</strong>
                                    </span>
                            @endif
                        </div>
                        {{-- <div class=" {{ $errors->has('password_confirmation') ? ' has-error' : '' }}">
                             <input id="password-confirm" type="password" class="form-control" name="password_confirmation"
                                    placeholder="Comfirm password">

                             @if ($errors->has('password_confirmation'))
                                 <span class="help-block">
                                             <strong>{{ $errors->first('password_confirmation') }}</strong>
                                         </span>
                             @endif
                         </div>--}}
                        <div>
                            <button class="btn btn-primary submit" type="submit">Đăng ký</button>
                        </div>
                        <div class="clearfix"></div>
                        <div class="separator">
                            <p class="change_link">Bạn đã có tài khoản ?
                                <a href="{{url('/admin/login')}}" class="to_register"> Đăng nhập </a>
                            </p>
                            <div class="clearfix"></div>
                            <br/>
                            <div>
                                <h1><i class="fa fa-paw" style="font-size: 26px;"></i> ShopMobile!</h1>

                                <p>©2021 Bản quyển thuộc admin.</p>
                            </div>
                        </div>
                    </form>
                </section>
            </div>
        </div>
    </div>
@endsection