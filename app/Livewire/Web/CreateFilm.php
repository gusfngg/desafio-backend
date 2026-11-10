<?php

namespace App\Livewire\Web;

use App\Livewire\Forms\FilmForm;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithFileUploads;

#[Title('Cadastrar filme')]
class CreateFilm extends Component
{
    use WithFileUploads;

    public FilmForm $form;

    public function save(): void
    {
        $film = $this->form->store();

        $this->redirectRoute('see', ['film' => $film], navigate: true);
    }

    public function render()
    {
        return view('livewire.web.create-film');
    }
}
