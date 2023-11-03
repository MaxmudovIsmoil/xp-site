@if(isset($services) and $services->count() > 0)
    <section class="services-component mt-5xl">
        <h1>Our Services</h1>
        <div class="row">
            @foreach ($services as $service)
                <div class="service">
                    {!! $service->icon !!}
                    <h2>{{ $service->language[0]->name }}</h2>
                    <p>{{ $service->language[0]->description }}</p>
                </div>
            @endforeach
        </div>
    </section>
@endif
