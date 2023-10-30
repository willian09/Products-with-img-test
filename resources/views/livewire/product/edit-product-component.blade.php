<div class="container">
    <div class="row justify-content-center mt-5">
        <div class="col-md-5">
            <div class="card">
                <div class="card-header text-center fs-5">
                    <b>Edit Product</b>
                </div>
                <div class="card-body">
                    @if (session()->has('message'))
                        <div class="alert alert-success text-center">
                            {{ session('message') }}
                        </div>
                    @endif

                    <form wire:submit='updateProduct'>
                        <div class="form-group">
                            <label for=""><b>Name</b></label>
                            <input type="text" class="form-control" placeholder="Enter name of product"
                                wire:model='name' />
                            @error('name')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for=""><b>Price</b></label>
                            <input type="text" class="form-control" placeholder="Enter price of product"
                                wire:model='price' />
                            @error('price')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for=""><b>Short Description</b></label>
                            <input type="text" class="form-control" placeholder="Enter a short description"
                                wire:model='short_description' />
                            @error('short_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for=""><b>Long Description</b></label>
                            <textarea type="text" class="form-control" placeholder="Enter a long Description" wire:model='long_description'></textarea>
                            @error('long_description')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div>

                        <div class="form-group mt-2">
                            <label for=""><b>Images</b></label>
                            <input type="file" class="form-control" name="images" wire:model='images' multiple />
                            @error('images')
                                <span class="text-danger">{{ $message }}</span>
                            @enderror
                        </div><br>
                        
                        <div class="text-center">
                            @foreach ($productImages as $productImage)
                                <img style="margin: 5px" src="{{ asset('uploads/all') }}/{{ $productImage->image }}" height="70px"
                                    width="70px" alt="">
                                <a href="#" wire:click.prevente='deleteImage({{ $productImage->id }})'><i
                                        class="fa fa-times text-danger mr-2"></i></a>
                            @endforeach
                        </div>

                        <div class="form-group text-center mt-2">
                            <a href="{{ route('allProducts') }}" class="btn btn-sm btn-secondary"
                                style="">Back</a>
                            <button class="btn btn-sm btn-primary">Confirm</button>
                        </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>
