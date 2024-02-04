@php
    use \Illuminate\Support\Facades\Route;
@endphp

<div class="navigation pt-2">
    <div class="navbar-wrapper">
        <div class="container">
            <div class="row">
                <div class="col-6 col-lg-4">
                    <div class="logo float-start h-100 d-flex justify-content-center align-items-center">
                        <a class="logo-link text-secondary" href="{{ route('home.page') }}">C<span
                                class="text-light">.</span>Rovers</a>
                    </div>
                </div>
                <div class="col-6 col-lg-8">
                    <div class="float-end h-100 d-flex justify-content-center align-items-center">
                        @include('partials.menu-btn')
                        <div class="navbar-items d-none d-md-flex gap-4">
                            {{-- First Button --}}
                            <a class="nav-link link {{ Route::currentRouteName() === 'experiences.page' ? 'active' : '' }}" href="{{ route('experiences.page') }}">Ervaringen</a>


                            {{-- Last Button --}}
                            <a class="contact-btn" href="#contact">Contact</a>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="navigation-divider"></div>
</div>
<div class="overlay-menu d-flex d-md-none">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <div class="menu-items">
                    {{-- First button --}}
                    <a class="nav-link text-light link {{ Route::currentRouteName() === 'experiences.page' ? 'active' : '' }}" href="{{ route('experiences.page') }}">Ervaringen</a>

                    {{-- Last button --}}
                    <a href="" class="contact-btn nav-link text-light link">Contact</a>
                </div>
            </div>
        </div>
    </div>
</div>
