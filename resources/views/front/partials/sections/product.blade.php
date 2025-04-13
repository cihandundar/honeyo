<section class="product">
    <div class="background">
        <div class="container">
            <img class="product-top-bee" src="{{ setting('anasayfa-urunler-sol-ust-ari') }}" alt="">
            <img class="product-left-bee" src="{{ setting('hero-sol-alt-ari') }}" alt="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title">
                            {{ setting('anasayfa-urunler-baslik') }}
                        </div>
                    </div>
                </div>
                @foreach (getDatas('urunler') as $item)
                    <div class="col-lg-4">
                        <a href="#" class="product-box">
                            <div class="image-wrapper">
                                <img src="{{ $item->get('gorsel') }}" alt="{{ $item->get('gorsel') }}">
                            </div>
                            <div class="product-box-bottom">
                                <div class="wrapper">
                                    <span class="product-title">{{ $item->get('title') }}</span>
                                    <span class="price">${{ $item->get('fiyat') }}.00</span>
                                </div>
                                <button>
                                    <i class="fa-solid fa-bag-shopping"></i>
                                </button>
                            </div>
                        </a>
                    </div>
                @endforeach
            </div>
            <img class="product-right-bee" src="{{ setting('anasayfa-urunler-sag-ari') }}" alt="">
        </div>
    </div>
</section>
