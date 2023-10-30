<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Carbon;
use Livewire\Component;
use Livewire\Features\SupportFileUploads\WithFileUploads;


class AddProductComponent extends Component
{
    use WithFileUploads;

    public $name, $price, $short_description, $long_description, $images = [];

    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|max:255',
            'price' => 'required',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
        ]);

        if (empty($this->images)) {
            $this->addError('images', 'Please select at least one image.');
            return;
        }
    
        $this->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);
    }

    public function storeProduct()
    {
        $user_id = auth()->user()->id;

        $this->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
        ]);

        if (empty($this->images)) {
            $this->addError('images', 'Please select at least one image.');
            return;
        }
    
        $this->validate([
            'images.*' => 'image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $product = new Product();
        $product->name = $this->name;
        $product->price = $this->price;
        $product->short_description = $this->short_description;
        $product->long_description = $this->long_description;
        $product->user_id = $user_id;

        $product->save();

        $productID = $product->id;

        foreach ($this->images as $key => $image) {
            $productImage = new ProductImages();
            $productImage->product_id = $productID;

            $imageName = Carbon::now()->timestamp . $key . '.' . $image->getClientOriginalExtension();
            $image->storeAs('all', $imageName);

            $productImage->image = $imageName;
            $productImage->save();
        }

        session()->flash('message', 'Product added successfully');
        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        return view('livewire.product.add-product-component');
    }
}
