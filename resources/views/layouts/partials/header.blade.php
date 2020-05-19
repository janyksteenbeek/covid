<nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
    <a class="navbar-brand" href="{{ route('home') }}"><span>&#x1F637;</span> COVID tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <div class="navbar-nav mr-auto">
            <country-switcher></country-switcher>
        </div>
        <div class="my-2 my-lg-0">
            @yield('header-button')

        </div>
    </div>
</nav>
