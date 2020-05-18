<nav class="navbar navbar-expand-lg navbar-light bg-light my-4">
    <a class="navbar-brand" href="{{ route('home') }}"><span>&#x1F637;</span> COVID tracker</a>
    <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
        <span class="navbar-toggler-icon"></span>
    </button>

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
        <ul class="navbar-nav mr-auto">
            <country-switcher></country-switcher>
        </ul>
        <form class="form-inline my-2 my-lg-0">

            <a href="" class="btn btn-outline-success my-2 my-sm-0" type="submit">Subscribe to updates</a>
        </form>
    </div>
</nav>
