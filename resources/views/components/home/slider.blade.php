<div class="swiper homeSlider">
    <div class="swiper-wrapper text-center">

        @foreach ($carousel as $c)
            <div class="swiper-slide"><img class="" src="{{ asset('/file_uploaded/carousel/'.$c->file) }}" alt="Image not found"></div>
        @endforeach

    </div>
    <div class="swiper-pagination"></div>
    <div class="swiper-button-prev"></div>
    <div class="swiper-button-next"></div>
</div>
