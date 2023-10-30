<?php

namespace App\Livewire\Product;

use App\Models\Product;
use App\Models\ProductImages;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Livewire\Component;
use Livewire\WithFileUploads;

class EditProductComponent extends Component
{

    use WithFileUploads;

    public $name;
    public $price;
    public $short_description;
    public $long_description;
    public $images = [];
    public $product_id;

    public function mount($id)
    {
        $product = Product::where('id', $id)->first();

        if (auth()->user()->id !== $product->user_id) {
            session()->flash('error', 'You do not have access to edit this product.');
            return redirect()->route('allProducts');
        }    

        $this->product_id = $product->id;
        $this->name = $product->name;
        $this->price = $product->price;
        $this->short_description = $product->short_description;
        $this->long_description = $product->long_description;
    }

    public function deleteImage($id)
    {
        $image = ProductImages::where('id', $id)->first();
        $image->delete();

        session()->flash('message', 'Product image deleted successfully');
    }
    
    public function updated($fields)
    {
        $this->validateOnly($fields, [
            'name' => 'required|max:255',
            'price' => 'required',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
        ]);
    }

    public function updateProduct()
    {
        $user_id = auth()->user()->id;

        $this->validate([
            'name' => 'required|max:255',
            'price' => 'required',
            'short_description' => 'required|max:255',
            'long_description' => 'required',
        ]);
        
        $product = Product::where('id', $this->product_id)->first();
        
        if ($user_id !== $product->user_id) {
            // O usuário logado não é o proprietário do produto, redirecione ou exiba uma mensagem de erro.
            return redirect()->route('allProducts');
        }

        $product->name = $this->name;
        $product->price = $this->price;
        $product->short_description = $this->short_description;
        $product->long_description = $this->long_description;
        $product->user_id = $user_id;

        $product->save();
        $productID = $product->id;

        if($this->images!=''){
            foreach ($this->images as $key => $image) {
                $productImage = new ProductImages();
                $productImage->product_id = $productID;
    
                $imageName = Carbon::now()->timestamp . $key . '.' . $this->images[$key]->Extension();
                $this->images[$key]->storeAs('all', $imageName);
    
                $productImage->image = $imageName;
                $productImage->save();
            }
        }

        session()->flash('message', 'Product updated successfully');
        return $this->redirect('/products', navigate: true);
    }

    public function render()
    {
        $productImages = ProductImages::where('product_id', $this->product_id)->get();
        return view('livewire.product.edit-product-component', ['productImages'=>$productImages]);
    }
}

