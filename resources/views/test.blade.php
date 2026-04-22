<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.8/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-sRIl4kxILFvY47J16cr9ZwB07vP4J8+LH7qKQnuqkuIAvNWLzeN8tE5YBujZqJLB" crossorigin="anonymous">
    <link rel="stylesheet" href="{{ url('/') }}/css/test.css">
    <title>Document</title>
</head>
<body>
    <header>
        <h3>ENCABEZADO</h3>
    </header>
    <div class="container my-5">
        <h1>Blade en Laravel</h1>
        <p>es un motor de plantillas</p>
        @yield('dinamico')

        @if (true)
            <h4>gggg</h4>
        @endif

        <?php if(true) { ?>
            <h4></h4>
        <?php } ?>

    </div>
</body>
</html>