@props([
    'align' => 'left',
    'width' => '56'
])

@php
switch ($align) {
    case 'left':
        $alignmentClasses = 'left-0 origin-top-left';
        break;
    case 'right':
        $alignmentClasses = 'right-0 origin-top-right';
        break;
    default:
        $alignmentClasses = 'left-0 origin-top-left';
        break;
}

switch ($width) {
    case '48':
        $widthClass = 'w-48';
        break;
    case '56':
        $widthClass = 'w-56';
        break;
    case '64':
        $widthClass = 'w-64';
        break;
    default:
        $widthClass = $width;
        break;
}
@endphp

<div 
    x-data="{ open: false }" 
    class="relative inline-block text-left" 
    @click.outside="open = false" 
    {{ $attributes }}
>
    <!-- Dropdown Trigger Slot -->
    <div @click="open = !open">
        {{ $trigger }}
    </div>

    <!-- Dropdown Panel -->
    <div 
        x-show="open"
        x-cloak
        x-transition:enter="transition ease-out duration-150"
        x-transition:enter-start="opacity-0 scale-95 translate-y-[-10px]"
        x-transition:enter-end="opacity-100 scale-100 translate-y-0"
        x-transition:leave="transition ease-in duration-100"
        x-transition:leave-start="opacity-100 scale-100 translate-y-0"
        x-transition:leave-end="opacity-0 scale-95 translate-y-[-10px]"
        class="absolute {{ $alignmentClasses }} mt-2 {{ $widthClass }} rounded-xl border border-[var(--color-border)] bg-[var(--color-card)] shadow-2xl z-50 py-1.5 focus:outline-none"
    >
        {{ $slot }}
    </div>
</div>
