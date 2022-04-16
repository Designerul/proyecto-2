<?php

namespace App\Http\Livewire\Admin;

use Livewire\Component;
use App\Models\Publication;
use Livewire\WithPagination;

class PostsIndex extends Component
{
    use WithPagination;

    public function render()
    {
        $publication = Publication::where('user_id', auth()->user()->id)->paginate();

        return view('livewire.admin.posts-index', compact('publication'));
    }
}
