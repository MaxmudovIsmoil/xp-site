<section class="news-component mt-5xl">
    <div class="text-center font-500 mb-4">
        <h1>News</h1>
        <p>Keep an eye on our latest news</p>
    </div>
    <div class="swiper newsSlider">
        <div class="swiper-wrapper">

            @foreach ($news as $new)
                <div class="swiper-slide">
                    <a href="{{ route('new_one', [Session::get('locale'), $new->id]) }}">
                        <div class="news-card">
                            <div class="news-card-img position-relative overflow-hidden">
                                <img src="{{ asset('file_uploaded/new/'.$new->file) }}" class="card-img-top" alt="Image not found">
                            </div>
                            <div class="title">
                                {{ $new->language[0]->name }}
                                <div class="text-primary">{{ $new->date }}</div>
                            </div>
                            <div class="description">
                               {{ substr($new->language[0]->description, 0, 180) }}
                               @if(strlen($new->language[0]->description) > 180) ...@endif
                            </div>
                        </div>
                    </a>
                </div>
            @endforeach

        </div>
    </div>
</section>
