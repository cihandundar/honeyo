<section class="why-us">
    <div class="background">
        <div class="container">
            <img class="why-us-left-bee" src="{{ setting('anasayfa-neden-biz-sol-ust-ari') }}" alt="">
            <img class="why-us-top-bee" src="{{ setting('hero-sol-ust-ari') }}" alt="">
            <div class="row">
                <div class="col-lg-12">
                    <div class="text-center">
                        <div class="title">
                            {{ setting('anasayfa-neden-biz-baslik') }}
                        </div>
                    </div>
                </div>
            </div>
            <img class="why-us-right-bee" src="{{ setting('hero-sol-alt-ari') }}" alt="">
            <div class="wrapper">
                <div class="row">
                    @foreach (getDatas('hakkimizda') as $item)
                        <div class="col-lg-4">
                            <div class="why-us-img">
                                <a href="{{ $item->get('gorsel') }}" class="glightbox" data-gallery="gallery">
                                    <img src="{{ $item->get('gorsel') }}" alt="whyUsImage">
                                </a>
                            </div>
                        </div>
                    @endforeach
                </div>
            </div>
        </div>
    </div>
</section>

<script>
    document.addEventListener('DOMContentLoaded', function() {
        const lightbox = GLightbox({
            touchNavigation: true,
            loop: true,
            autoplayVideos: true
        });
    });
</script>
