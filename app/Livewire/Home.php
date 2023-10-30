<?php

namespace App\Livewire;

use App\Models\Product;
use Livewire\Component;

class Home extends Component
{
    public function render()
    {
        // Carregue todos os produtos com suas imagens associadas
        $products = Product::with('productImages')->get();

        return view('livewire.home', compact('products'));
    }
}