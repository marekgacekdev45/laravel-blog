<!DOCTYPE html>
<html lang="pl">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Blog</title>
    @vite(['resources/css/app.css'])
</head>
<body>
    @foreach ($posts as $post )
    <article>
       {{ $post}}
    </article>
        
    @endforeach
</body>
</html>