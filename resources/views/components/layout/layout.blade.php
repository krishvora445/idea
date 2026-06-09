<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idea</title>
    @vite('resources/css/app.css')
</head>
<body class="bg-background text-foreground">
    <x-layout.nav />
   <main class="container mx-auto px-4 py-8">
    {{ $slot }}
   </main>
</body>
</html>
