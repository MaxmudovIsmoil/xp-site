<!doctype html>
<html lang="en">
<head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">

    <!-- Styles -->
    <link rel="stylesheet" href="{{ asset('admin/css/style.css') }}">
    <link rel="stylesheet" href="{{ asset('admin/icons-css/all.css') }}">
</head>
<body>

    <div class="c-app flex-row align-items-center">
        <div class="container">

            <div class="row justify-content-center">
                <div class="col-lg-4 col-md-6 col-10">
                    <div class="card p-2">
                        <div class="card-body">
                            <form action="{{ route('login') }}" method="POST">
                                <h1 class="text-center mb-3">{{ __('Kirish oynasi') }}</h1>
                                @if($errors->any())
                                    <p class="p-0 mt-1 mb-1 text-center text-danger font-weight-bold">{{ $errors->first() }}</p>
                                @endif
                                @csrf

                                <div role="group" class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-user') }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="text" name="username" class="form-control @error('username') is-invalid @enderror" placeholder="Login">
                                    </div>

                                </div>

                                <div role="group" class="form-group">
                                    <div class="input-group mb-3">
                                        <div class="input-group-prepend">
                                            <span class="input-group-text">
                                                <svg class="c-icon">
                                                    <use xlink:href="{{ asset('admin/icons/sprites/free.svg#cil-lock-locked') }}"></use>
                                                </svg>
                                            </span>
                                        </div>
                                        <input type="password" class="form-control @error('email') is-invalid @enderror" name="password" placeholder="Parol">
                                    </div>
                                </div>

                                <div class="row">
                                    <div class="text-right col-12">
                                        <button type="submit" class="btn px-4 btn-block btn-primary">{{ __('Kirish') }}</button>
                                    </div>
                                </div>
                            </form>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>

    <script src="{{ asset('admin/js/jQurey.js') }}"></script>
    <script src="{{ asset('admin/js/form-validation.js') }}"></script>
    <script src="{{ asset('admin/js/function_validate.js') }}"></script>
</body>

