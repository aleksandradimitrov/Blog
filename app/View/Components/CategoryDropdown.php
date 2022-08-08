<?php

namespace App\View\Components;

use Illuminate\View\Component;
use App\Models\Category;

class CategoryDropdown extends Component
{

    /**
     * Get the view / contents that represent the component.
     *
     */
    public function render()
    {
        $categories = Category::all();
        return view(
            'components.category-dropdown',
            [
                'categories' => $categories,
                'currentCategory' => $categories->firstWhere('slug', request('category'))
            ]
        );
    }
}
