@extends('layout')

@section('content')
<div class="h-screen pt-60">
    <div class="row justify-content-center">
        <div class="w-3/5 mx-auto">
            <div class="w-full bg-gray-100 rounded shadow-lg">
                <p class="text-3xl text-center py-10">{{ __('ログイン') }}</p>

                <div class="w-2/5 mx-auto">
                    <form method="POST" action="{{ route('login') }}">
                        @csrf

                        <div class="flex py-5 justify-between">
                            <label for="email" class="text-xl">{{ __('メールアドレス') }}</label>

                            <div class="col-md-6">
                                <input id="email" type="email" class="form-control @error('email') is-invalid @enderror h-8 w-full" name="email" value="{{ old('email') }}" required autocomplete="email" autofocus>

                                @error('email')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <div class="flex py-5 justify-between">
                            <label for="password" class="col-md-4 col-form-label text-md-end text-xl">{{ __('パスワード') }}</label>

                            <div class="col-md-6">
                                <input id="password" type="password" class="form-control @error('password') is-invalid @enderror h-8" name="password" required autocomplete="current-password">

                                @error('password')
                                    <span class="invalid-feedback" role="alert">
                                        <strong>{{ $message }}</strong>
                                    </span>
                                @enderror
                            </div>
                        </div>

                        <!--<div class="py-5">
                            <div class="col-md-6 offset-md-4">
                                <div class="form-check">
                                    <input class="h-5 w-5" type="checkbox" name="remember" id="remember" {{ old('remember') ? 'checked' : '' }}>

                                    <label class="form-check-label text-xl" for="remember">
                                        {{ __('Remember Me') }}
                                    </label>
                                </div>
                            </div>
                        </div>-->

                        <div class="py-5">
                            <div class="col-md-8 offset-md-4 text-center">
                                <button type="submit" class="mx-auto bg-yellow-500 mb-10 text-xl px-16 py-3 rounded-full text-white">
                                    {{ __('ログイン') }}
                                </button><br>

                                @if (Route::has('password.request'))
                                    <a class="" href="{{ route('password.request') }}">
                                        {{ __('パスワードを忘れた方はこちら') }}
                                    </a>
                                @endif
                            </div>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
@endsection
