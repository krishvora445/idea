<!doctype html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Idea</title>
    @vite(['resources/css/app.css', 'resources/js/app.js'])
</head>
<body class="bg-background text-foreground">
    <x-layout.nav />
   <main class="container mx-auto px-4 py-8">
    {{ $slot }}
   </main>
{{--    <div class="container mx-auto px-4 py-8" x-data="{ greeting: 'Hello',show: false }">--}}
{{--        <p x-text="greeting" x-show="show" class="text-amber-200"></p>--}}
{{--        <input type="text" x-model="greeting" class="input">--}}
{{--        <button @click="show = true ">Change Greeting</button>--}}
{{--    </div>--}}


    @session('success')

    <div
        x-data="{ show: true }"
        x-init="setTimeout(() => show = false, 3000)"
        x-show="show"
        x-transition.opacity.scale.duration.400ms
        class="absolute bottom-4 right-4 bg-primary text-white px-5 py-4 rounded-xl shadow-xl"
    >
        {{ $value }}👋
    </div>
    @endsession
</body>
</html>
