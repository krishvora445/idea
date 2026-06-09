@props(['title' ,'subtitle',])


<div class="flex min-h-[calc(100dvh-4rem)] items-center justify-center px-4">
    <div class="w-full max-w-md">
        <div class="text-center">
            <h1>{{ $title }}</h1>
            <p class="text-gray-500">{{ $subtitle }}</p>
        </div>
        {{ $slot }}
    </div>
</div>
