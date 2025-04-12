<section class="services">
    <div class="container">
        <div class="row">
            <div class="col-lg-5">
                <div class="services-left">
                    <div class="top-title">
                        {{ setting('anasayfa-hizmetlerimiz-ust-baslik') }}
                    </div>
                    <div class="bottom-title">
                        {{ setting('anasayfa-hizmetlerimiz-alt-baslik') }}
                    </div>
                    <div class="desc">
                        {{ setting('anasayfa-hizmetlerimiz-aciklama') }}
                    </div>
                    <a href="#" class="button">View More</a>
                </div>
            </div>
            <div class="col-lg-7">
                <div class="row">
                    <div class="services-right">
                        @foreach (getDatas('hizmetlerimiz') as $item)
                            <div class="col-lg-12">
                                <div class="services-box">
                                    <div class="services-box-top">
                                        <div class="services-box-top-left">
                                            <span class="step">0{{ $item->get('id') }}</span>
                                            <span class="title">{{ $item->get('title') }}</span>
                                        </div>
                                        <i class="fa-solid fa-arrow-right"></i>
                                    </div>
                                    <div class="services-box-bottom">
                                        <div class="wrapper">
                                            <img src="{{ $item->get('gorsel') }}" alt="{{ $item->get('title') }}">
                                            <span>
                                                {{ $item->get('aciklama') }}
                                            </span>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
