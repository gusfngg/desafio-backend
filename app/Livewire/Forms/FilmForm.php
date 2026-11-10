<?php

namespace App\Livewire\Forms;

use App\Models\Film;
use Livewire\Attributes\Validate;
use Livewire\Form;

class FilmForm extends Form
{
    #[Validate('required', message: 'Informe o título do filme.')]
    #[Validate('max:255', message: 'O título pode ter no máximo 255 caracteres.')]
    public string $title = '';

    #[Validate('required', message: 'Informe o resumo do filme.')]
    #[Validate('min:10', message: 'O resumo precisa ter pelo menos 10 caracteres.')]
    public string $summary = '';

    #[Validate('required', message: 'Envie a capa do filme.')]
    #[Validate('image', message: 'A capa precisa ser uma imagem.')]
    #[Validate('max:2048', message: 'A capa pode ter no máximo 2 MB.')]
    public $cover;

    public function store(): Film
    {
        $this->validate();

        $film = Film::create([
            ...$this->only(['title', 'summary']),
            'cover' => $this->cover->store('covers', 'public'),
        ]);

        $this->reset();

        return $film;
    }
}
