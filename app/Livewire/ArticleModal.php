<?php

namespace App\Livewire;

use App\Livewire\Modal;
use Livewire\Component;
class ArticleModal extends Modal
{
    public function render()
    {
        return view('livewire.article-modal');
    }
}
