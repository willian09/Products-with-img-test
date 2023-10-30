<?php

namespace App\Livewire\Product;

use App\Models\Product;
use Livewire\Component;

class ViewProductComponent extends Component
{
    public $product;

    public function mount($id)
    {
        $this->product = Product::with('productImages')->find($id);
    }

    public function render()
    {
        return view('livewire.product.view-product-component');
    }
}
