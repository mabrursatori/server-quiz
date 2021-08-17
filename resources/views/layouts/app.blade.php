<!doctype html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">

<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>{{ config('app.name', 'Laravel') }}</title>

    <!-- Scripts -->
    <script src="{{ asset('js/app.js') }}" defer></script>

    <!-- Fonts -->
    <link rel="dns-prefetch" href="//fonts.gstatic.com">
    <link href="https://fonts.googleapis.com/css?family=Nunito" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.0/dist/css/bootstrap.min.css" rel="stylesheet"
        integrity="sha384-KyZXEAg3QhqLMpG8r+8fhAXLRk2vvoC2f3B09zVXn8CA5QIVfZOJ3BCsw2P0p/We" crossorigin="anonymous">

    <!-- Styles -->
    <link href="{{ asset('css/app.css') }}" rel="stylesheet">
</head>

<body>
    <div id="app">
        <nav class="navbar navbar-expand-md navbar-light bg-white shadow-sm">
            <div class="container">
                <a class="navbar-brand" href="{{ url('/') }}">
                    {{ config('app.name', 'Laravel') }}
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse"
                    data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false"
                    aria-label="{{ __('Toggle navigation') }}">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <ul class="navbar-nav ">

                    </ul>
                    <div class="d-inline-block" style="width: 1100px"></div>
                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <!-- Authentication Links -->
                        @guest
                            @if (Route::has('login'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('login') }}">{{ __('Login') }}</a>
                                </li>
                            @endif

                            @if (Route::has('register'))
                                <li class="nav-item">
                                    <a class="nav-link" href="{{ route('register') }}">{{ __('Register') }}</a>
                                </li>
                            @endif
                        @else
                            <li class="nav-item dropdown ml-3">
                                <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button"
                                    data-toggle="dropdown" aria-haspopup="true" aria-expanded="false" v-pre>
                                    {{ Auth::user()->name }}
                                </a>

                                <div class="dropdown-menu dropdown-menu-right" aria-labelledby="navbarDropdown">
                                    <a class="dropdown-item" href="{{ route('logout') }}"
                                        onclick="event.preventDefault();
                                                                                                                                                                                                                                                                                                                                                         document.getElementById('logout-form').submit();">
                                        {{ __('Logout') }}
                                    </a>

                                    <form id="logout-form" action="{{ route('logout') }}" method="POST" class="d-none">
                                        @csrf
                                    </form>
                                </div>
                            </li>
                        @endguest
                    </ul>
                </div>
            </div>
        </nav>

        <main class="py-4">
            @yield('content')
        </main>
    </div>
</body>
<script src="https://code.jquery.com/jquery-3.6.0.min.js"
integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js"
integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
<script src="https://kit.fontawesome.com/09caad5936.js" crossorigin="anonymous"></script>
<script>
    let baseUrl;
    $(window).on('load', function() {
        baseUrl = $('.base-url').val()
        var error = $('#error').val();
        if (error == "error") {
            $('#createModal').modal('show');
        } else if (error == "update error") {
            $('#editModal').modal('show');
            let urlAction = ($('#edit-url-error').val());
            $('.form-edit').attr('action', urlAction);
        }
    });

    $('.close').click(function() {
        $('.form-control').removeClass("is-invalid");
    })

    $('.btn-create').click(function() {
        $('input').val();
    })



    $('.edit').click(function() {
        var id = $(this).data('id')
        $('.form-edit').attr('action', `${baseUrl}/questions/${id}`);
        $('#edit-url').val(`${baseUrl}/questions/${id}`);
        $.ajax({
            type: "GET",
            url: `${baseUrl}/questions/` + id,
            cache: false,
            success: function(response) {
                $('#edit-title').val(response.title);
                $('#edit-question').val(response.question);
                $('#edit-trueAnswer').val(response.trueAnswer);
                $('#edit-falseAnswer1').val(response.falseAnswer1);
                $('#edit-falseAnswer2').val(response.falseAnswer2);
                $('#edit-falseAnswer3').val(response.falseAnswer3);
                $('#edit-description').val(response.description);
                $('#edit-quran').val(response.quran);
                $('#edit-quranTranslate').val(response.quranTranslate);
                $('#edit-hadits').val(response.hadits);
                $('#edit-haditsTranslate').val(response.haditsTranslate);
                $('#edit-kitab').val(response.kitab);
                $('#edit-kitabTranslate').val(response.kitabTranslate);
                $('#edit-mode').val(response.mode);
                $('#edit-type').val(response.type);
                $('#edit-oldAsset').val(response.asset);
            }
        });
    })


    $('.detail').click(function() {
        $.ajax({
            type: "GET",
            url: `${baseUrl}/questions/` + $(this).data('id'),
            cache: false,
            success: function(response) {
                $(".detail-title").text(response.title);
                $(".detail-question").text(response.question);
                $(".detail-trueAnswer").text(response.trueAnswer);
                $(".detail-falseAnswer1").text(response.falseAnswer1);
                $(".detail-falseAnswer2").text(response.falseAnswer2);
                $(".detail-falseAnswer3").text(response.falseAnswer3);
                $(".detail-description").text(response.description);
                $(".detail-quran").text(response.quran);
                $(".detail-quranTranslate").text(response.quranTranslate);
                $(".detail-hadits").text(response.hadits);
                $(".detail-haditsTranslate").text(response.haditsTranslate);
                $(".detail-kitab").text(response.kitab);
                $(".detail-kitabTranslate").text(response.kitabTranslate);
                $(".detail-type").text(response.type);
                $(".detail-mode").text(response.mode);
            }
        });
    });
</script>

</html>
