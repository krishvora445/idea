<x-layout>

        <div class="container mx-auto px-4 py-6">
            <header>
                <h1 class="text-3xl font-bold mb-6">Ideas</h1>
                <p class="text-gray-600 mb-4">Capture your thoughts. Make a plan.</p>

                <x-card
                    x-data
                    @click="$dispatch('open-modal', 'create-idea')"
                    is="button"
                    type="button"
                    class="mb-6 cursor-pointer h-32 w-full text-left"
                    >
                    <p class=" mb-4 text-amber-50">What's the idea?</p>
                </x-card>
            </header>

            @php
                $currentStatus = \App\IdeaStatus::tryFrom(request('status') ?? '');
                $currentLabel = $currentStatus ? $currentStatus->label() : 'All';
//                dd($currentLabel);
            @endphp

            <div class="mb-6 flex items-center gap-4">
                <x-dropdown align="left" width="56">
                    <x-slot name="trigger">
                        <!-- Dropdown Trigger Button -->
                        <button
                            type="button"
                            class="btn btn-outlined flex items-center gap-2 select-none"
                            aria-haspopup="true"
                            :aria-expanded="open.toString()"
                        >
                            <span>Filter: {{ $currentLabel }}</span>
                            <!-- SVG Chevron Down Icon -->
                            <svg
                                :class="open ? 'rotate-180' : ''"
                                class="w-4 h-4 transition-transform duration-200 text-[var(--color-muted-foreground)]"
                                fill="none"
                                stroke="currentColor"
                                viewBox="0 0 24 24"
                                xmlns="http://www.w3.org/2000/svg"
                            >
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2" d="M19 9l-7 7-7-7"></path>
                            </svg>
                        </button>
                    </x-slot>

                    <!-- "All" option -->
                    <a
                        href="{{ route('idea.index') }}"
                        class="flex items-center justify-between px-4 py-2.5 text-sm transition-colors duration-150 rounded-lg mx-1.5 {{ !request()->has('status') ? 'bg-[var(--color-primary)] text-[var(--color-primary-foreground)] font-semibold' : 'text-[var(--color-foreground)] hover:bg-[color-mix(in_srgb,black_25%,var(--color-input))]' }}"
                        @click="open = false"
                    >
                        <span>All</span>
                        <span class="text-xs ">
{{--                                {{ $status->ideas_count }}--}}
                                {{$statusCounts->get('all') ?? 0}}
                            </span>
                        @if(!request()->has('status'))
                            <!-- SVG Checkmark Icon -->
                            <svg class="w-4 h-4 text-[var(--color-primary-foreground)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                            </svg>
                        @endif
                    </a>

                    <!-- Custom separator line -->
                    <div class="h-px bg-[var(--color-border)] my-1 mx-1.5"></div>

                    <!-- Status options -->
                    @foreach(\App\IdeaStatus::cases() as $status)
                        @php
                            $isActive = request('status') === $status->value;
                        @endphp
                        <a
                            href="{{ route('idea.index', ['status' => $status->value]) }}"
                            class="flex items-center justify-between px-4 py-2.5 text-sm transition-colors duration-150 rounded-lg mx-1.5 {{ $isActive ? 'bg-[var(--color-primary)] text-[var(--color-primary-foreground)] font-semibold' : 'text-[var(--color-foreground)] hover:bg-[color-mix(in_srgb,black_25%,var(--color-input))]' }}"
                            @click="open = false"
                        >
                            <span>{{ $status->label() }}</span>
                            <span class="text-xs ">
{{--                                {{ $status->ide.as_count }}--}}
                                {{$statusCounts->get($status->value) ?? 0}}
                            </span>
                            @if($isActive)
                                <!-- SVG Checkmark Icon -->
                                <svg class="w-4 h-4 text-[var(--color-primary-foreground)]" fill="none" stroke="currentColor" viewBox="0 0 24 24" xmlns="http://www.w3.org/2000/svg">
                                    <path stroke-linecap="round" stroke-linejoin="round" stroke-width="2.5" d="M5 13l4 4L19 7"></path>
                                </svg>
                            @endif
                        </a>
                    @endforeach
                </x-dropdown>
            </div>

            <div class="grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 gap-6 items-stretch">
                @forelse($ideas as $idea)
{{--                    <x-card href="{{ $idea->path() }}" class="h-full flex flex-col">--}}
{{--                    <x-card href=" /ideas/ {{  $idea->id }}" class="h-full flex flex-col">--}}
                    <x-card href="{{ route('idea.show',$idea) }}" class="h-full flex flex-col">
                        <h3 class="text-xl font-semibold mb-2">{{ $idea->title }}</h3>
                        <div class="">
                            <x-idea.status-lable status="{{ $idea->status }}" >
                                {{ $idea->status->label() }}
                            </x-idea.status-lable>
                        </div>
                        <div class="text-gray-700 mb-4 flex-1 ">{{ Str::limit($idea->description, 100) }}</div>
                        <div class="text-gray-600">{{ $idea->created_at->diffForHumans() }}</div>
                    </x-card>
                @empty
                    <x-card>
                        <p class="text-gray-600">No ideas found.</p>
                    </x-card>
                @endforelse
            </div>
        </div>

        <x-modal name="create-idea" title="Create New Idea">
            <x-card class="mb-4">

            </x-card>
{{--            <p>this is new idea</p>--}}
        </x-modal>

</x-layout>
