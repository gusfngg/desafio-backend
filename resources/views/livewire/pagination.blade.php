@if ($paginator->hasPages())
    <nav role="navigation" aria-label="Paginação" class="flex items-center justify-between gap-4 text-sm">
        <button type="button" wire:click="previousPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
            @disabled($paginator->onFirstPage())
            class="rounded-full px-4 py-2 ring-1 ring-white/10 transition-colors hover:bg-white/5 disabled:pointer-events-none disabled:opacity-30">
            ← Anterior
        </button>

        <span class="text-zinc-400">
            Página <span class="font-medium text-white">{{ $paginator->currentPage() }}</span> de {{ $paginator->lastPage() }}
        </span>

        <button type="button" wire:click="nextPage('{{ $paginator->getPageName() }}')" wire:loading.attr="disabled"
            @disabled(!$paginator->hasMorePages())
            class="rounded-full px-4 py-2 ring-1 ring-white/10 transition-colors hover:bg-white/5 disabled:pointer-events-none disabled:opacity-30">
            Próxima →
        </button>
    </nav>
@endif
