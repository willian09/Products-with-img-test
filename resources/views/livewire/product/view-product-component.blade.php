<div class="container">
    <div class="card d-flex justify-content-center m-auto mt-5 p-2" style="width: 25rem;">
        <div id="productCarousel" class="carousel carousel-dark slide" data-bs-ride="carousel">
            <div class="carousel-inner">
                @foreach ($product->productImages as $key => $image)
                    <div class="carousel-item {{ $key === 0 ? 'active' : '' }}">
                        <img src="{{ asset('uploads/all/' . $image->image) }}" style="width: 400px; height: 400px; object-fit: contain" class="d-block w-100" alt="Product Image">
                    </div>
                @endforeach
            </div>
            <a class="carousel-control-prev" href="#productCarousel" role="button" data-bs-slide="prev">
                <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Previous</span>
            </a>
            <a class="carousel-control-next" href="#productCarousel" role="button" data-bs-slide="next">
                <span class="carousel-control-next-icon" aria-hidden="true"></span>
                <span class="visually-hidden">Next</span>
            </a>
        </div>
        <div class="card-body">
            <h5 class="card-title">{{ $product->name }}</h5>
            <p class="card-text">{{ number_format($product->price, 2, ',', '.') }} €</p>
            <p class="card-text">{{ $product->short_description }}</p>
            <p class="card-text">{{ $product->long_description }}</p>
            <a style="display: flex; justify-content: center; align-items: center; margin:auto; width:30%"
                href="{{ route('home') }}" class="btn btn-secondary">Back</a>
        </div>
    </div>
</div>