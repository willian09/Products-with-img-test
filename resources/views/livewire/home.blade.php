<div class="container">

    <div class="text-center p-1"
        style="background-size: cover; height:500px; background-image: url('img/Untitled.png'); margin-bottom: 5px">
        <p class="fs-1">Homeeee!!</p>
    </div>

    <div class="text-center mt-5">
        <h1>Products</h1>
    </div>

    <div class="row justify-content-center p-4">

        @foreach ($products as $product)
            <div class="col-md-3">
                <div class="card m-3 p-2" style="width: 13rem;">
                    @php
                        $firstImage = $product->productImages->first();
                    @endphp
                    @if ($firstImage)
                        <img height="150px" src="{{ asset('uploads/all/' . $firstImage->image) }}" class="card-img-top"
                            alt="Product Image">
                    @else
                        <img height="150px" src="{{ asset('placeholder-image.jpg') }}" class="card-img-top"
                            alt="Placeholder Image">
                    @endif
                    <div class="card-body">
                        <h4 class="card-title">{{ $product->name }}</h4>
                        <h5 class="card-subtitle">{{ number_format($product->price, 2, ',', '.') }} €</h5>
                        <p class="card-text">{{ $product->short_description }}</p>
                        <div class="text-center">
                            <a href="{{ route('viewProducts', ['id' => $product->id]) }}"
                                class="btn btn-primary btn-sm">View Details</a>
                        </div>
                    </div>
                </div>
            </div>
        @endforeach

    </div>
</div>
