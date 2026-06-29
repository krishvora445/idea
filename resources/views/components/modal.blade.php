@props([
    'name',
    'title'
])

<div
    x-data="{ show:false ,name : @js($name) }"
{{--    x-data="{ show:false ,name : '{{ $name }}' }"--}}
    x-show="show"
    @open-modal.window="if($event.detail == name) show = true"
    @keydown.escape.window="show = false"
    class= "fixed inset-0 z-50 flex items-center justify-center bg-black/50 backdrop-blur-xs"
    style="display: none"
    role="dialog"
    aria-modal="true"
    aria-labelledby="modal-{{ $name }}-title"
    :aria-hidden="!show"
    tabindex="-1"
    {{--            x-transition:enter="transition ease-out duration-600"--}}
    {{--            x-transition:enter-start="opacity-0 -translate-y-4 -translate-x-4"--}}
    {{--            x-transition:enter-end="opacity-100"--}}
    {{--            x-transition:leave="transition ease-in duration-150"--}}
    {{--            x-transition:leave-start="opacity-100"--}}
    {{--            x-transition:leave-end="opacity-0 -translate-y-4 -translate-x-4"--}}
    x-transition:enter="transition ease-out duration-300"
    x-transition:enter-start="opacity-0"
    x-transition:enter-end="opacity-100"
    x-transition:leave="transition ease-in duration-200"
    x-transition:leave-start="opacity-100"
    x-transition:leave-end="opacity-0"
>
    <x-card @click.away="show = false" class="w-full max-w-lg">
        <div>
            <h2 id="modal-{{ $name }}-title" class="text-xl font-bold">{{ $title }}</h2>
        </div>
        <div>
            {{ $slot }}
        </div>
    </x-card>
</div>
