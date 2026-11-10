<div class="mx-auto max-w-2xl px-4 py-10 sm:px-6 sm:py-14">
    <div class="mb-8">
        <a href="{{ route('home') }}" wire:navigate class="text-sm text-zinc-400 transition-colors hover:text-white">
            ← Voltar para filmes
        </a>
        <h1 class="mt-4 text-3xl font-semibold tracking-tight sm:text-4xl">Cadastrar filme</h1>
        <p class="mt-1 text-zinc-400">Preencha os dados e envie a capa para adicionar ao catálogo.</p>
    </div>

    <form wire:submit="save" class="space-y-6 rounded-3xl bg-zinc-900/60 p-6 ring-1 ring-white/10 sm:p-8">
        <div class="space-y-2">
            <label for="title" class="text-sm font-medium">Título</label>
            <input type="text" id="title" wire:model="form.title" placeholder="Ex.: Interestelar"
                @class([
                    'w-full rounded-xl bg-zinc-950 px-4 py-3 outline-none ring-1 transition placeholder:text-zinc-600 focus:ring-2',
                    'ring-red-500 focus:ring-red-500' => $errors->has('form.title'),
                    'ring-white/10 focus:ring-red-600' => !$errors->has('form.title'),
                ])>
            @error('form.title')
                <p class="text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <label for="summary" class="text-sm font-medium">Resumo</label>
            <textarea id="summary" rows="5" wire:model="form.summary" placeholder="Sobre o que é o filme?"
                @class([
                    'w-full resize-none rounded-xl bg-zinc-950 px-4 py-3 outline-none ring-1 transition placeholder:text-zinc-600 focus:ring-2',
                    'ring-red-500 focus:ring-red-500' => $errors->has('form.summary'),
                    'ring-white/10 focus:ring-red-600' => !$errors->has('form.summary'),
                ])></textarea>
            @error('form.summary')
                <p class="text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <div class="space-y-2">
            <span class="text-sm font-medium">Capa</span>
            <label for="cover"
                class="flex cursor-pointer items-center gap-5 rounded-2xl border border-dashed border-white/15 p-4 transition-colors hover:border-white/30 hover:bg-white/[0.02]">
                <div class="flex aspect-[2/3] w-20 shrink-0 items-center justify-center overflow-hidden rounded-xl bg-zinc-950 ring-1 ring-white/10">
                    @if ($form->cover?->isPreviewable())
                        <img src="{{ $form->cover->temporaryUrl() }}" alt="Prévia da capa" class="h-full w-full object-cover">
                    @else
                        <svg class="h-6 w-6 text-zinc-600" fill="none" viewBox="0 0 24 24" stroke-width="1.5" stroke="currentColor" aria-hidden="true">
                            <path stroke-linecap="round" stroke-linejoin="round" d="m2.25 15.75 5.159-5.159a2.25 2.25 0 0 1 3.182 0l5.159 5.159m-1.5-1.5 1.409-1.409a2.25 2.25 0 0 1 3.182 0l2.909 2.909M3.75 21h16.5A1.5 1.5 0 0 0 21.75 19.5V4.5A1.5 1.5 0 0 0 20.25 3H3.75A1.5 1.5 0 0 0 2.25 4.5v15A1.5 1.5 0 0 0 3.75 21Z" />
                        </svg>
                    @endif
                </div>
                <div class="text-sm">
                    <p class="font-medium">
                        <span wire:loading.remove wire:target="form.cover">
                            {{ $form->cover ? 'Trocar imagem' : 'Escolher imagem' }}
                        </span>
                        <span wire:loading wire:target="form.cover">Enviando imagem…</span>
                    </p>
                    <p class="mt-0.5 text-zinc-500">PNG ou JPG, até 2 MB. Formato pôster fica melhor.</p>
                </div>
                <input type="file" id="cover" accept="image/*" wire:model="form.cover" class="sr-only">
            </label>
            @error('form.cover')
                <p class="text-sm text-red-400">{{ $message }}</p>
            @enderror
        </div>

        <button type="submit" wire:loading.attr="disabled" wire:target="save, form.cover"
            class="w-full rounded-full bg-red-600 px-4 py-3 font-medium text-white transition-colors hover:bg-red-500 disabled:opacity-50">
            <span wire:loading.remove wire:target="save">Salvar filme</span>
            <span wire:loading wire:target="save">Salvando…</span>
        </button>
    </form>
</div>
