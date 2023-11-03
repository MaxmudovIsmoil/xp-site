<footer class="footer mt-5xl">
    <div class="container py-4 py-md-5 px-4 px-md-3 text-body-secondary">
        <div class="row justify-content-around">
            <div class="col-auto mb-3">
                <h4>About us</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="{{ route('product') }}">Products</a></li>
                    <li class="mb-2"><a href="{{ route('news') }}">News</a></li>
                    <li class="mb-2"><a href="{{ route('product') }}">Download</a></li>
                    <li class="mb-2"><a href="{{ route('about') }}">About us</a></li>
                    <li class="mb-2"><a href="{{ route('contact') }}">Contact us</a></li>
                </ul>
            </div>
            <div class="col-auto mb-3">
                <h4>Contact us</h4>
                <ul class="list-unstyled">
                    <li class="mb-2"><a href="/docs/5.3/getting-started/">Getting started</a></li>
                    <li class="mb-2"><a href="/docs/5.3/examples/starter-template/">Starter template</a></li>
                    <li class="mb-2"><a href="/docs/5.3/getting-started/webpack/">Webpack</a></li>
                    <li class="mb-2"><a href="/docs/5.3/getting-started/parcel/">Parcel</a></li>
                    <li class="mb-2"><a href="/docs/5.3/getting-started/vite/">Vite</a></li>
                </ul>
            </div>
            <div class="col-sm-6 col-md-4 col-lg-4 col-xl-3 col-xxl-3 mb-3 footer__message">
                <form>
                    <h4 for="" class="form-label text-center mb-3">Leave us a message</h4>
                    <div class="mb-2">
                        <input type="email" class="form-control" placeholder="Email address">
                    </div>
                    <div class="mb-2">
                        <input type="password" placeholder="Password" class="form-control">
                    </div>
                    <div class="mb-2">
                        <textarea class="form-control" placeholder="Content"></textarea>
                    </div>
                    <button type="submit" class="btn btn-primary btn-block w-100">Submit</button>
                </form>
            </div>
        </div>
    </div>
    <div class="footer__copyright">
        <div class="d-flex justify-content-evenly">
            <p class="text-center">Copyright © 2023 Xprinter | All Rights Reserved</p>
            <div class="footer__socials">
                @if(env('TELEGRAM_LINK') != '')
                    <a href="{{ env('TELEGRAM_LINK') }}"><i class="fa-brands fa-telegram me-2"></i></a>
                @endif
                @if(env('INSTAGRAM_LINK') != '')
                    <a href="{{ env('INSTAGRAM_LINK') }}"><i class="fa-brands fa-instagram me-2"></i></a>
                @endif
                @if(env('FACEBOOK_LINK') != '')
                    <a href="{{ env('FACEBOOK_LINK') }}"><i class="fa-brands fa-facebook"></i></a>
                @endif
            </div>
        </div>
    </div>
</footer>
