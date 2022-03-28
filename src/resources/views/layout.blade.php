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
            <li class="text-base h-full px-3 tracking-wider"><a href="#">ログイン</a></li>
            <li class="text-base h-full px-3 tracking-wider"><a href="/">一覧</a></li>
            <li class="text-base h-full pl-20 tracking-wider">東谷<span>さん</span></li>
        </ul>
    </div>
</header>
<main class="bg-gray-50 h-full w-full pb-10">
  @yield('content')
</main>
<footer class="bg-black h-10 w-full items-center flex">
    <p class="text-center text-white mx-auto">©︎Hiyokko Engineer</p>
</footer>
@yield('scripts')
</body>
</html>