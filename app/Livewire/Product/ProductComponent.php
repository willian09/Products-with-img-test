<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImages;
use Livewire\Component;

class ProductComponent extends Component
{
    public function deleteProduct($id)
    {
        $product = Product::where('id', $id)->first();
        $product->delete();

        $images = ProductImages::where('product_id', $id)->get();
        foreach ($images as $image) {
            $image->delete();
        }

        session()->flash('message', 'Product has been deleted Successfully');
        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        $products = Product::get();
        return view('livewire.product.product-component', ['products' => $products]);
    }
}
