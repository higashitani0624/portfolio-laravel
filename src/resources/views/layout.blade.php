<!DOCTYPE html>
<html lang="ja">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>ToDo App</title>
  <link href="https://unpkg.com/tailwindcss@^2/dist/tailwind.min.css" rel="stylesheet">
</head>
<body class="font-mono tracking-wider">
<header class="bg-white shadow-lg w-full h-16 fixed z-10">
    <div class="h-full max-w-screen-lg mx-auto flex justify-between px-5 items-center">
        <h2 class="text-2xl tracking-wider"><a href="/">Hiyokko Engineer</a></h2>
        <ul class="flex">
        @if(Auth::check())
            <a href="{{route('customer.info')}}"><li class="text-base h-full tracking-wider">{{Auth::user()->name}}<span>さん専用ページ</span></li></a>
            <a href="#" id="logout" class=" pl-5">ログアウト</a>
            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
              @csrf
            </form>
        @else
            <li class="text-base h-full px-3 tracking-wider"><a href="/login">ログイン</a></li>
            <li class="text-base h-full px-3 tracking-wider"><a href="/register">サインアップ</a></li> 
        @endif
            <li class="text-base h-full px-3 tracking-wider"><a href="/">一覧</a></li>
        </ul>
    </div>
</header>
<main class="bg-gray-50 h-full w-full pb-10">
  @yield('content')
</main>
<footer class="bg-black h-10 w-full items-center flex">
    <p class="text-center text-white mx-auto">©︎Hiyokko Engineer</p>
</footer>
@if(Auth::check())
  <script>
    document.getElementById('logout').addEventListener('click', function(event) {
      event.preventDefault();
      document.getElementById('logout-form').submit();
    });
  </script>
@endif
@yield('scripts')
</body>
</html>