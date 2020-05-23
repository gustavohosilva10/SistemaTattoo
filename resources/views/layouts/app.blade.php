<!DOCTYPE html>
<html lang="{{ app()->getLocale() }}">
<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

    <!-- CSRF Token -->
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>@yield('title')</title>

    <!-- Styles -->
    <link href="{{ asset('css/app.min.css') }}" rel="stylesheet">

    <!-- Scripts -->
    <script src="{{ asset('js/app.min.js') }}"></script>

    <script type="text/javascript">
        $(function () {
            $('[data-toggle="tooltip"]').tooltip()
        })
    </script>
</head>
<body>
    <div id="app">
        <!-- Authentication Links -->
        @guest
        @else
            <nav class="navbar navbar-expand-lg navbar-dark bg-primary sticky-top shadow-lg py-0">
                <a class="navbar-brand" href="{{ url('/sistema/painel') }}">
                    <img src="{{ asset('images/logo-trusttattoo-line.png') }}" alt="Trust Tattoo" width="230" height="61.63" />
                </a>
                <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>

                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <!-- Left Side Of Navbar -->
                    <div class="navbar-nav mr-auto w-auto ui-widget">
                        {!! Form::open([
                            'method' => 'get',
                            'route' => 'admin.contacts.autocomplete.index',
                            'id' => 'searchform',
                            'class' => 'w-100 mb-0'
                        ]) !!}
                            {!! Form::text('search', false, [
                                'class' => 'form-control form-control-dark',
                                'id' => 'search',
                                'placeholder' => 'Pesquisar',
                                'aria-label' => 'Search'
                            ]) !!}
                        {!! Form::close() !!}
                    </div>

                    <!-- Right Side Of Navbar -->
                    <ul class="navbar-nav ml-auto">
                        <li class="nav-item dropdown">
                            <a id="navbarDropdown" class="nav-link dropdown-toggle" href="#" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
                                Contatos
                            </a>
                            <div class="dropdown-menu bg-light" aria-labelledby="navbarDropdown">
                                <a class="dropdown-item" href="{{ route('admin.contacts.index') }}">Contatos</a>
                                <a class="dropdown-item" href="{{ route('admin.contacts.create') }}">Novo</a>
                                <div class="dropdown-divider"></div>
                                <a class="dropdown-item" href="{{ route('admin.contacts.file') }}">Importar</a>
                            </div>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('logout') }}" onclick="event.preventDefault();document.getElementById('logout-form').submit();" data-toggle="tooltip" data-placement="bottom" title="Clique para sair">
                                Olá, {{ Auth::user()->name }} <i class="fas fa-sign-out-alt"></i>
                            </a>

                            <form id="logout-form" action="{{ route('logout') }}" method="POST" style="display: none;">
                                @csrf
                            </form>
                        </li>
                    </ul>
                </div>
            </nav>
        @endguest

        <main class="py-4">
            @yield('content')
        </main>
    </div>

    <script type="text/javascript">
        $('#search').autocomplete({
            source : '{{ route('admin.contacts.autocomplete.search') }}',
            minlenght: 2,
            autoFocus: true,
            select: function(e,ui){
                $('#search').val(ui.item.id);
                $('#searchform').submit();
            }
        });
    </script>
</body>
</html>
