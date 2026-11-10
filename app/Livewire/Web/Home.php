<?php

namespace App\Livewire\Web;

use App\Models\Film;
use Livewire\Attributes\Title;
use Livewire\Component;
use Livewire\WithPagination;

#[Title('Filmes')]
class Home extends Component
{
    use WithPagination;

    public function render()
    {
        return view('livewire.web.home', [
            'films' => Film::latest()->paginate(12),
        ]);
    }
}
