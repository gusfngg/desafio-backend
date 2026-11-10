<?php

namespace App\Livewire\Web;

use App\Models\Film;
use Livewire\Component;

class ViewFilm extends Component
{
    public Film $film;

    public function render()
    {
        return view('livewire.web.view-film')->title($this->film->title);
    }
}
