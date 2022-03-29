<!DOCTYPE html>
<html lang="en">
<head>
    <title>Админка</title>

    <!-- Только CSS -->
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet"
          integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
</head>
<body class="">
<div class="wrapper ">
    <div class="main-panel">
        @include('includes.header')
        @include('includes.notification')
        @yield('content')
        @include('includes.footer')
    </div>
</div>

<!-- Пакет JavaScript с Popper -->
<script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js"
        integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p"
        crossorigin="anonymous"></script>
<!-- FontAwesome Icons -->
<script src="https://kit.fontawesome.com/b8a4a33bcb.js" crossorigin="anonymous"></script>
</body>
</html>
