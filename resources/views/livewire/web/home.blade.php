<div>
    <div class="px-4 py-8 mx-auto grid grid-cols-1 md:grid-cols-2 lg:grid-cols-3 xl:grid-cols-4 gap-4 lg:gap-8">
        @forelse ($films as $film)
            <a href="{{ route('see', $film) }}" wire:navigate wire:key="film-{{ $film->id }}"
                class="relative w-full aspect-video bg-cover bg-center bg-no-repeat"
                style="background-image: url('{{ $film->cover_url }}')">
                <div
                    class="absolute flex items-end p-4 top-0 left-0 w-full h-full bg-gradient-to-t from-black to-black/20">
                    <div>
                        <h1 class="text-2xl font-bold">
                            {{ $film->title }}
                        </h1>
                        <h2 class="font-medium">
                            {{ $film->created_at->format('d/m/Y') }}
                        </h2>
                    </div>
                </div>
            </a>
        @empty
            <p class="col-span-full text-center text-zinc-400">
                Nenhum filme cadastrado ainda.
                <a href="{{ route('create') }}" wire:navigate class="text-red-600 underline">Cadastre o primeiro.</a>
            </p>
        @endforelse
    </div>

    <div class="px-4 pb-8">
        {{ $films->links() }}
    </div>
</div>
