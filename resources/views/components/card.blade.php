@props([
    'is' => 'a',
])

<{{ $is }} {{ $attributes([ 'class' => ' border border-border rounded-2xl bg-card shadow-md p-4 md:text-sm block']) }}>
{{ $slot }}
</{{ $is }}>
