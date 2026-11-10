<div class="relative isolate overflow-hidden">
    {{-- Fundo: a própria capa, desfocada, sumindo no preto --}}
    <div class="absolute inset-x-0 top-0 -z-10 h-[36rem] overflow-hidden" aria-hidden="true"
        style="-webkit-mask-image: linear-gradient(to bottom, black 30%, transparent); mask-image: linear-gradient(to bottom, black 30%, transparent);">
        <img src="{{ $film->cover_url }}" alt="" class="h-full w-full scale-125 object-cover opacity-30 blur-3xl">
    </div>

    <div class="mx-auto max-w-5xl px-4 py-10 sm:px-6 sm:py-14">
        <a href="{{ route('home') }}" wire:navigate class="text-sm text-zinc-400 transition-colors hover:text-white">
            ← Voltar para filmes
        </a>

        <div class="mt-8 grid gap-8 md:grid-cols-[280px_1fr] md:gap-12">
            <div class="mx-auto w-56 md:w-full">
                <div class="aspect-[2/3] overflow-hidden rounded-2xl bg-zinc-900 shadow-2xl shadow-black/60 ring-1 ring-white/10">
                    <img src="{{ $film->cover_url }}" alt="Capa do filme {{ $film->title }}" class="h-full w-full object-cover">
                </div>
            </div>

            <div class="md:pt-6">
                <h1 class="text-3xl font-semibold tracking-tight sm:text-5xl">{{ $film->title }}</h1>
                <p class="mt-3 text-sm text-zinc-400">Cadastrado em {{ $film->created_at->format('d/m/Y') }}</p>

                <h2 class="mt-10 text-xs font-medium uppercase tracking-widest text-zinc-500">Sinopse</h2>
                <p class="mt-3 max-w-prose whitespace-pre-line leading-relaxed text-zinc-300">{{ $film->summary }}</p>
            </div>
        </div>
    </div>
</div>
