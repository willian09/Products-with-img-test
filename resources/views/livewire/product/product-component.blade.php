<div>
    <div class="container">
        <div class="row justify-content-center mt-5">
            <div class="col-md-11">
                <div class="card">
                    <div class="card-header">
                        <h3 class="card-title" style="float:left; margin-bottom:0">My Products</h3>
                        <a href="{{ route('addProducts') }}" class="btn btn-sm btn-success" style="float: right">Add New
                            Product</a>
                    </div>

                    <div class="card-body">
                        <div class="row">
                            <div class="col-md-12">
                                @if (session()->has('message'))
                                    <div class="alert alert-success text-center">{{ session('message') }}</div>
                                @endif
                            </div>
                        </div>

                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th class="text-center" scope="col">Product ID</th>
                                    <th class="text-center" scope="col">Name</th>
                                    <th class="text-center" scope="col">Price</th>
                                    <th class="text-center" scope="col">Images</th>
                                    <th class="text-center" scope="col">Actions</th>
                                </tr>
                            </thead>
                            <tbody>
                                @if (auth()->user()->products->count() > 0)
                                    @foreach (auth()->user()->products as $product)
                                        <tr class="text-center align-middle">
                                            <td>{{ $product->id }}</td>
                                            <td>{{ $product->name }}</td>
                                            <td>{{ $product->price }} €</td>
                                            <td>
                                                @php
                                                    $images = App\Models\ProductImages::where('product_id', $product->id)->get();
                                                @endphp
                            
                                                @if ($images->count() > 0)
                                                    @foreach ($images as $item)
                                                        <img src="{{ asset('uploads/all') }}/{{ $item->image }}"
                                                            style="height: 50px; width:50px" alt="">
                                                    @endforeach
                                                @endif
                                            </td>
                                            <td class="text-center">
                                                <button wire:navigate
                                                    href="{{ route('viewProducts', ['id' => $product->id]) }}"
                                                    class="btn btn-success btn-sm"><ion-icon
                                                        name="eye-outline"></ion-icon></button>
                                                <button wire:navigate
                                                    href="{{ route('editProducts', ['id' => $product->id]) }}"
                                                    class="btn btn-warning btn-sm"><ion-icon
                                                        name="create-outline"></ion-icon></button>
                                                <a href="javascript:void(0)"
                                                    wire:click.prevent="deleteProduct({{ $product->id }})"
                                                    class="btn btn-danger btn-sm"><ion-icon
                                                        name="trash-outline"></ion-icon></a>
                                            </td>
                                        </tr>
                                    @endforeach
                                @else
                                    <tr>
                                        <td colspan="5" style="text-align: center">You don't have any products!</td>
                                    </tr>
                                @endif
                            </tbody>
                            
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
