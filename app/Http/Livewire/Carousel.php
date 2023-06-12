<?php

namespace App\Http\Livewire;

use App\Models\Photo;
use Livewire\Component;

class Carousel extends Component
{
    public function render()
    {
        $photos = Photo::all();
        return view('livewire.carousel');
    }
}
