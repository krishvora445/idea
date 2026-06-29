<x-layout>
    <div class="max-w-4xl mx-auto py-8">
        <!-- Back Navigation & Actions -->
        <div class="flex flex-col sm:flex-row sm:items-center sm:justify-between gap-4 mb-8">
            <a href="{{ route('idea.index') }}" class="btn btn-outlined group inline-flex items-center gap-2">
                <x-icons.arrow-back class="w-4 h-4 transition-transform group-hover:-translate-x-1" />
                <span>Back to Ideas</span>
            </a>

            <div class="flex items-center gap-3">
                <x-idea.status-lable :status="$idea->status->value">
                    {{ $idea->status->label() }}
                </x-idea.status-lable>
                <span class="text-xs text-[var(--color-muted-foreground)]">
                    Created {{ $idea->created_at->diffForHumans() }}
                </span>
            </div>
        </div>

        <!-- Title & Action Buttons -->
        <div class="flex items-center justify-between gap-4 mb-6">
            <h1 class="text-3xl font-extrabold tracking-tight text-[var(--color-foreground)]">
                {{ $idea->title }}
            </h1>
            <div class="flex items-center gap-3">
                <a href="{{ route('idea.edit', $idea) }}" class="inline-flex items-center text-[var(--color-muted-foreground)] hover:text-[var(--color-primary)] transition-colors" title="Edit Idea">
                    <x-icons.edit class="w-6 h-6" />
                </a>
                <div class="w-px h-6 bg-[var(--color-border)] mx-0.5"></div>
                <form action="{{ route('idea.destroy', $idea) }}" method="POST" onsubmit="return confirm('Are you sure you want to delete this idea?');" class="inline-flex items-center">
                    @csrf
                    @method('DELETE')
                    <button type="submit" class="inline-flex items-center text-[var(--color-muted-foreground)] hover:text-red-500 transition-colors bg-transparent border-none p-0 cursor-pointer" title="Delete Idea">
                        <x-icons.trash class="w-6 h-6" />
                    </button>
                </form>
            </div>
        </div>

        <div class="border cursor-pointer border-[var(--color-border)] rounded-3xl bg-[var(--color-card)] p-6 md:p-8 shadow-md mb-8">
            <p class="text-gray-300 leading-relaxed whitespace-pre-line text-base">{{ $idea->description }}</p>
        </div>

        <!-- Links Section -->
        @php
            $validLinks = array_filter((array) ($idea->links ?? []));
        @endphp
        @if(count($validLinks) > 0)
            <div>
                <h3 class="font-bold text-xl mb-4 text-[var(--color-foreground)]">Links & Resources</h3>
                <div class="grid grid-cols-1 sm:grid-cols-2 gap-4">
                    @foreach($validLinks as $link)
                        <div class="border border-[var(--color-border)] rounded-2xl bg-[var(--color-card)] p-4 flex items-center justify-between transition-all duration-200 hover:border-gray-700">
                            <a href="{{ $link }}" target="_blank" rel="noopener noreferrer" class="flex items-center gap-2.5 text-[var(--color-primary)] hover:underline truncate font-medium text-sm">
                                <x-icons.external class="w-4 h-4 shrink-0" />
                                <span class="truncate">{{ preg_replace('(^https?://)', '', $link) }}</span>
                            </a>
                        </div>
                    @endforeach
                </div>
            </div>
        @endif
    </div>
</x-layout>
