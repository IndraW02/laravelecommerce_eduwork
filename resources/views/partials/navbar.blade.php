<nav class="navbar navbar-expand-lg navbar-light bg-light mb-4">
    <div class="container">
        <a class="navbar-brand" href="{{ url('/') }}">MyShop</a>
        <div class="collapse navbar-collapse">
            <ul class="navbar-nav ms-auto">
                <li class="nav-item"><a class="nav-link" href="{{ route('home') }}">Beranda</a></li>
                <li class="nav-item"><a class="nav-link" href="{{ route('product.index') }}">Produk</a></li>
                <a class="nav-link" href="{{ route('cart.index') }}">Keranjang</a>
            </ul>
        </div>
    </div>
</nav>
