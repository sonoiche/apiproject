<!DOCTYPE html>
<html lang="en">
    <head>
        <meta charset="utf-8" />
        <meta http-equiv="X-UA-Compatible" content="IE=edge" />
        <meta http-equiv="Content-Language" content="en" />
        <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
        <title>Register - Kero HTML Bootstrap 4 Dashboard Template</title>
        <meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1, user-scalable=no, shrink-to-fit=no" />
        <meta name="description" content="Kero HTML Bootstrap 4 Dashboard Template" />

        <meta name="msapplication-tap-highlight" content="no" />
        <link href="{{ url('main.07a59de7b920cd76b874.css') }}" rel="stylesheet" />
    </head>

    <body>
        <div class="app-container app-theme-white body-tabs-shadow">
            <div class="app-container">
                <div class="h-100">
                    <div class="h-100 no-gutters row">
                        <div class="h-100 d-md-flex d-sm-block bg-white justify-content-center align-items-center col-md-12 col-lg-7">
                            <div class="mx-auto app-login-box col-sm-12 col-md-10 col-lg-9">
                                <h3>{{ config('app.name') }}</h3>
                                <h4 class="mt-3">
                                    <div>Welcome,</div>
                                    <span>It only takes a <span class="text-success">few seconds</span> to create your account</span>
                                </h4>
                                <div>
                                    <form method="POST" action="{{ route('register') }}" class>
                                        @csrf
                                        <div class="form-row">
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="email" class><span class="text-danger">*</span> Email</label>
                                                    <input name="email" id="email" placeholder="Email here..." type="email" class="form-control @error('email') is-invalid @enderror" />
                                                    @error('email')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="user-name" class>Name</label>
                                                    <input name="text" id="user-name" placeholder="Name here..." type="text" class="form-control @error('name') is-invalid @enderror" />
                                                    @error('name')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="password" class><span class="text-danger">*</span> Password</label>
                                                    <input name="password" id="password" placeholder="Password here..." type="password" class="form-control @error('password') is-invalid @enderror" />
                                                    @error('password')
                                                        <span class="invalid-feedback" role="alert">
                                                            <strong>{{ $message }}</strong>
                                                        </span>
                                                    @enderror
                                                </div>
                                            </div>
                                            <div class="col-md-6">
                                                <div class="position-relative form-group">
                                                    <label for="password_confirmation" class><span class="text-danger">*</span> Repeat Password</label>
                                                    <input name="password_confirmation" id="password_confirmation" placeholder="Repeat Password here..." type="password" class="form-control" />
                                                </div>
                                            </div>
                                        </div>
                                        {{-- <div class="mt-3 position-relative form-check">
                                            <input name="check" id="exampleCheck" type="checkbox" class="form-check-input" />
                                            <label for="exampleCheck" class="form-check-label">Accept our <a href="javascript:void(0);">Terms and Conditions</a>.</label>
                                        </div> --}}
                                        <div class="mt-4 d-flex align-items-center">
                                            <h5 class="mb-0">Already have an account? <a href="{{ url('login') }}" class="text-primary">Sign in</a></h5>
                                            <div class="ml-auto">
                                                <button class="btn-wide btn-pill btn-shadow btn-hover-shine btn btn-primary btn-lg" type="submit">Create Account</button>
                                            </div>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="d-lg-flex d-xs-none col-lg-5">
                            <div class="slider-light">
                                <div class="slick-slider slick-initialized">
                                    <div>
                                        <div class="h-100 d-flex justify-content-center align-items-center bg-premium-dark" tabindex="-1">
                                            <div class="slide-img-bg" style="background-image: url('{{ url('assets/images/originals/citynights.jpg') }}');"></div>
                                            <div class="slider-content">
                                                <h3>Scalable, Modular, Consistent</h3>
                                                <p>Easily exclude the components you don't require. Lightweight, consistent Bootstrap based styles across all elements and components</p>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <script type="text/javascript" src="{{ url('assets/scripts/main.07a59de7b920cd76b874.js') }}"></script>
    </body>
</html>