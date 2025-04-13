<section class="types">
    <img class="types-dashed" src="{{ setting('anasayfa-cesitler-sol-cizgi') }}" alt="">
    <div class="container">
        <img class="types-right-bee" src="{{ setting('anasayfa-urunler-sag-ari') }}" alt="">
        <div class="row">
            <div class="col-lg-12">
                <div class="text-center">
                    <div class="title">
                        {{ setting('anasayfa-cesitler-baslik') }}
                    </div>
                </div>
            </div>
            @foreach (getDatas('cesitler') as $item)
                <div class="col-lg-4">
                    <div class="types-box">
                        <img src="{{ $item->get('gorsel') }}" alt="{{ $item->get('gorsel') }}">
                        <div class="types-box-title">
                            {{ $item->get('title') }}
                        </div>
                        <div class="types-box-desc">
                            {{ $item->get('aciklama') }}
                        </div>
                        <a href="#" class="link">
                            Learn More
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
        <img class="types-bottom-bee" src="{{ setting('hero-sol-alt-ari') }}" alt="">
    </div>
</section>
