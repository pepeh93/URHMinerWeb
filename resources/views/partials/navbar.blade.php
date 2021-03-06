<nav class="navbar navbar-expand-lg bg-secondary fixed-top text-uppercase" id="mainNav">
    <div class="container">
        <a class="navbar-brand js-scroll-trigger" href="/">URH Miner</a>
        <button class="navbar-toggler navbar-toggler-right text-uppercase bg-primary text-white rounded" type="button"
                data-toggle="collapse" data-target="#navbarResponsive" aria-controls="navbarResponsive"
                aria-expanded="false" aria-label="Toggle navigation">
            Menu
            <i class="fas fa-bars"></i>
        </button>
        <div class="collapse navbar-collapse" id="navbarResponsive">
            <ul class="navbar-nav ml-auto">
                @auth
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger
{{ (\Request::route()->getName() == 'descargas') ? 'activeNavLink' : '' }}" href="{{route('descargas')}}">Descargas</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 rounded js-scroll-trigger {{ (\Request::route()->getName() == 'valores') ? 'activeNavLink' : '' }}"
                           href="{{route('valores')}}">Valores</a>
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 rounded js-scroll-trigger {{ (\Request::route()->getName() == 'pools') ? 'activeNavLink' : '' }}"
                           href="{{route('pools')}}">Pools</a>
                    </li>
                    <li class="nav-item mx-lg-1">
                        <a class="nav-link py-3  rounded js-scroll-trigger {{ (\Request::route()->getName() == 'faq') ? 'activeNavLink' : '' }}"
                           href="{{route('faq')}}">Preguntas
                            frecuentes</a>
                    </li>
                    @cannot('administrar')
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger {{ (\Request::route()->getName() == 'contacto') ? 'activeNavLink' : '' }}"
                               href="{{route('contacto')}}">Contacto</a>
                        </li>
                    @endcannot
                    @can('administrar')
                        <li class="nav-item mx-0 mx-lg-1">
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger {{ (\Request::route()->getName() == 'administrar') ? 'activeNavLink' : '' }}"
                               href="{{route('administrar')}}">Administrar</a>
                        </li>
                    @endcan
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger" href="{{route('logout')}}">Cerrar
                            sesión</a>
                    </li>
                @else
                    <li class="nav-item mx-0 mx-lg-1">
                        @if (\Request::route()->getName() == 'login')
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger activeNavLink" style="cursor:pointer"
                           onclick="$('#about').fadeOut()">Ingresar</a>
                            @else
                            <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger"
                               href="{{route('login')}}">Ingresar</a>
                        @endif
                    </li>
                    <li class="nav-item mx-0 mx-lg-1">
                        <a class="nav-link py-3 px-0 px-lg-3 rounded js-scroll-trigger {{ (\Request::route()->getName() == 'contacto') ? 'activeNavLink' : '' }}"
                           href="{{route('contacto')}}">Contacto</a>
                    </li>
                @endauth
            </ul>
        </div>
    </div>
</nav>