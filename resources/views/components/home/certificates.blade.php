<div class="certificates-component mt-5xl">
    <div class="row">
        @isset($certificate->files[0])
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
                <div class="lg-img">
                    <div class="lg-img-div">
                        <img class="img" alt="lg-img" src="{{ asset('file_uploaded/certificate/'.$certificate->files[0]->file) }}">
                        <h3 class="lg-img-title">{{ $certificate->files[0]->name }}</h3>
                    </div>
                </div>
            </div>
            <div class="col-sm-12 col-md-12 col-lg-6 col-xl-6 col-xxl-6">
            <div class="p-4">
                <h2 class="title mt-5xl">{{ $certificate->name }}</h2>
                <div class="description">

                    {{ $certificate->description }}

                </div>
                <div class="cert-width">
                    <div class="img-group">
                        @foreach ($certificate->files as $c)
                        <div class="img-list">
                            <a class="img-block" href="{{ asset('file_uploaded/certificate/'.$c->file) }}" data-fancybox="images" data-width="" data-height="">
                                <img class="img-thumbnail" alt="{{ $c->name }}" src="{{ asset('file_uploaded/certificate/'.$c->file) }}" />
                            </a>
                        </div>
                        @endforeach
                    </div>
                </div>
            </div>
        </div>
        @endisset
    </div>
</div>
