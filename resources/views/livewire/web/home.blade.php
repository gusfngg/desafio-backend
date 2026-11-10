<div class="mx-auto max-w-6xl px-4 py-10 sm:px-6 sm:py-14">
    <div class="mb-10 flex flex-col gap-1">
        <h1 class="text-3xl font-semibold tracking-tight sm:text-4xl">Filmes</h1>
        <p class="text-zinc-400">
            {{ $films->total() }} {{ $films->total() === 1 ? 'filme no catálogo' : 'filmes no catálogo' }}
        </p>
    </div>

    @if ($films->isEmpty())
        <div class="flex flex-col items-center rounded-3xl border border-dashed border-white/10 px-6 py-20 text-center">
            <p class="text-lg font-medium">Nenhum filme cadastrado ainda</p>
            <p class="mt-1 text-zinc-400">Comece adicionando o primeiro ao catálogo.</p>
            <a href="{{ route('create') }}" wire:navigate
                class="mt-6 rounded-full bg-red-600 px-5 py-2.5 text-sm font-medium text-white transition-colors hover:bg-red-500">
                Cadastrar filme
            </a>
        </div>
    @else
        <div class="grid grid-cols-2 gap-x-5 gap-y-8 sm:grid-cols-3 md:grid-cols-4 lg:grid-cols-5">
            @foreach ($films as $film)
                <a href="{{ route('see', $film) }}" wire:navigate wire:key="film-{{ $film->id }}" class="group">
                    <div
                        class="aspect-[2/3] overflow-hidden rounded-2xl bg-zinc-900 ring-1 ring-white/10 transition duration-300 group-hover:ring-white/25 group-hover:shadow-2xl group-hover:shadow-black/60">
                        <img src="{{ $film->cover_url }}" alt="Capa do filme {{ $film->title }}" loading="lazy"
                            class="h-full w-full object-cover transition duration-500 group-hover:scale-105">
                    </div>
                    <h2 class="mt-3 line-clamp-1 text-sm font-medium">{{ $film->title }}</h2>
                    <p class="text-xs text-zinc-500">{{ $film->created_at->format('d/m/Y') }}</p>
                </a>
            @endforeach
        </div>

        <div class="mt-12">
            {{ $films->links('livewire.pagination') }}
        </div>
    @endif
</div>
