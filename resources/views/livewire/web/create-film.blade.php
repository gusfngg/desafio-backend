<div>
    <div class="max-w-screen-lg mx-auto px-4 py-8">
        <form wire:submit="save" class="w-full px-4 py-8 bg-zinc-100 text-zinc-950 rounded-lg space-y-4">
            <h1 class="text-2xl font-bold text-center font-film">
                Cadastrar Filme
            </h1>

            <div class="flex flex-col gap-2 !mt-8">
                <label for="title" class="font-semibold">
                    Título
                </label>
                <input type="text" id="title" wire:model="form.title" class="rounded-lg border border-zinc-950 p-2">
                @error('form.title')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="summary" class="font-semibold">
                    Resumo
                </label>
                <textarea id="summary" rows="6" wire:model="form.summary" class="rounded-lg border border-zinc-950 p-2"></textarea>
                @error('form.summary')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <div class="flex flex-col gap-2">
                <label for="cover" class="font-semibold">
                    Capa
                </label>
                <input type="file" id="cover" accept="image/*" wire:model="form.cover" class="rounded-lg border border-zinc-950 p-2">
                <span wire:loading wire:target="form.cover" class="text-sm text-zinc-600">Enviando imagem...</span>
                @error('form.cover')
                    <span class="text-sm text-red-600">{{ $message }}</span>
                @enderror
            </div>

            <button type="submit" wire:loading.attr="disabled"
                class="bg-red-600 text-zinc-100 w-full font-mono font-semibold text-center px-4 py-2 rounded-lg disabled:opacity-50">
                Enviar
            </button>
        </form>
    </div>
</div>
