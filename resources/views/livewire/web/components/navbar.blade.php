<header class="sticky top-0 z-50 border-b border-white/5 bg-zinc-950/70 backdrop-blur-xl">
    <nav class="mx-auto flex h-16 max-w-6xl items-center justify-between px-4 sm:px-6">
        <a href="{{ route('home') }}" wire:navigate class="flex items-center gap-2 text-lg font-semibold tracking-tight">
            <span class="h-2.5 w-2.5 rounded-full bg-red-600"></span>
            Cine
        </a>

        <div class="flex items-center gap-2 text-sm font-medium">
            <a href="{{ route('home') }}" wire:navigate @class([
                'rounded-full px-4 py-2 transition-colors',
                'text-white' => request()->routeIs('home'),
                'text-zinc-400 hover:text-white' => !request()->routeIs('home'),
            ])>
                Filmes
            </a>
            <a href="{{ route('create') }}" wire:navigate
                class="rounded-full bg-red-600 px-4 py-2 text-white transition-colors hover:bg-red-500">
                Cadastrar filme
            </a>
        </div>
    </nav>
</header>
