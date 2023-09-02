<?php

namespace App\Livewire;

use App\Models\Article;
use App\Models\Event;
use Livewire\Component;

class ViewEvent extends Component
{
    public $eventArticles = [];
    public $filteredEventArticles = [];
    public $selectedArticles = [];
    public $focusArticle = null;

    public $categories = [];
    public $selectedCategories = [];
    public $eventCategories = [];

    public Event $event;

    public function mount(String $slug)
    {
        $this->event = Event::where('slug', $slug)->firstOrFail()->load('articles', 'categories');
        $this->eventArticles = $this->event->articles;
        $this->filteredEventArticles = $this->eventArticles;

        $this->eventArticles->load('category');
        $this->eventCategories = $this->eventArticles->pluck('category')->unique('id')->values();

        $this->dispatch( 'show')->to(ArticleModal::class);
    }

    public function filterArticles()
    {
        if(empty($this->selectedCategories)){
            $this->filteredEventArticles = $this->eventArticles;
            return;
        }
        foreach ($this->eventArticles as $article) {

            if (in_array($article->category->id, $this->selectedCategories)) {
                $filteredEventArticles[] = $article;
                $this->filteredEventArticles = collect($filteredEventArticles);
            }

        }
    }


    public function addToCart(int $article)
    {
        $selectedArticles = $this->selectedArticles;
        if (in_array($article, $selectedArticles)) {
            unset($selectedArticles[array_search($article, $selectedArticles)]);
        } else {
            $selectedArticles[] = $article;
        }
        $this->selectedArticles = $selectedArticles;
    }

    public function checkout()
    {
        dd($this->selectedArticles);
    }


    public function toggleCategory(int $category)
    {
        $selectedCategories = $this->selectedCategories;
        if (in_array($category, $selectedCategories)) {
            unset($selectedCategories[array_search($category, $selectedCategories)]);
        } else {
            $selectedCategories[] = $category;
        }
        $this->selectedCategories = $selectedCategories;
        $this->filterArticles();
    }



    public function clearCategories()
    {
        $this->filteredEventArticles = $this->eventArticles;
        $this->reset('selectedCategories');
    }

    public function render()
    {
        return view('livewire.view-event');
    }
}
