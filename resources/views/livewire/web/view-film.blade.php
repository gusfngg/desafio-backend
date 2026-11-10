<div>
    <div class="max-w-screen-md mx-auto px-4 py-8 flex flex-col">
        <img src="{{ $film->cover_url }}" alt="Capa do filme {{ $film->title }}"
            class="aspect-video w-full h-auto mx-auto rounded-lg object-cover object-center mb-4 lg:mb-8">
        <h1 class="text-2xl lg:text-4xl font-bold">
            {{ $film->title }}
        </h1>
        <h2 class="text-lg lg:text-2xl font-semibold mb-4">
            Cadastrado em {{ $film->created_at->format('d/m/Y') }}
        </h2>

        <p class="whitespace-pre-line">{{ $film->summary }}</p>
    </div>
</div>
