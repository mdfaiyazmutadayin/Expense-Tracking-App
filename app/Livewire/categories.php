<?php

namespace App\Livewire;

use Livewire\Component;
use Illuminate\View\View;
use App\Models\Category;
use Livewire\Attributes\Computed;

class Categories extends Component
{
    public $name = "";
public $color = "#3B82F6";
public $icon = "";
public $editingId = null;
public $isEditing = false;

public $colors = [

"#EF4444", // Red
"#F97316", // Orange
"#F59E0B", // Amber
"#EAB308", // Yellow
"#84CC16", // Lime
"#22C55E", // Green
"#10B981", // Emerald
"#14B8A6", // Teal
"#06B6D4", // Cyan
"#0EA5E9", // Sky
"#3B82F6", // Blue
"#6366F1", // Indigo
"#8B5CF6", // Violet
"#A855F7", // Purple
"#D946EF", // Fuchsia
"#EC4899", // Pink
"#F43F5E", // Rose
];

#[Computed]
public function categories()
{
    return Category::withCount('expenses')
        ->where('user_id', auth()->id)
        ->orderBy('name')
        ->get();
}
   public function render(): View
{
    return view(
        view: 'livewire.categories',
        data: [
            'categories' => $this->categories,
        ]
    );
}
}
