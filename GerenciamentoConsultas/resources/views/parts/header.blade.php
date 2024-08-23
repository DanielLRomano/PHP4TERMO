<header>
    <nav class="navbar navbar-expand-lg navbar-light bg-light">
        <div class="container-fluid">
            <!-- Nome da loja -->
            <a class="navbar-brand" href="{{ route('home') }}">Home</a>


            <!-- Botão para alternar o menu em telas menores -->
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarNav"
                aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>

            <!-- Menu de navegação -->
            <div class="collapse navbar-collapse" id="navbarNav">
                <ul class="navbar-nav me-auto mb-2 mb-lg-0">

                    <!-- Exibe opções de consultas para médicos -->
                    @if(Auth::check() && Auth::user()->tipo_usuario == 'medico')
                        <li class="nav-item">
                            <a class="nav-link" href="/consultas">Consultas</a>
                        </li>
                    @endif

                    <!-- Exibe "Meus Agendamentos" para usuários autenticados -->
                    @if(Auth::check())
                        <li class="nav-item">
                            <a class="nav-link" href="/meus-agendamentos">Meus Agendamentos</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('dashboard') }}">Dashboard</a>
                        </li>
                    @endif
                </ul>

                <!-- Alinhamento dos itens à direita -->
                <ul class="navbar-nav ms-auto">
                    @if (Auth::check())
                        <li class="nav-item">
                            <span class="navbar-text"> <!-- ucfirst() transforma a primeira letra da string em maiúscula -->
                                {{{ ucfirst(Auth::user()->name) }}} ({{ ucfirst(Auth::user()->tipo_usuario) }})
                            </span>
                        </li>
                        <li class="nav-item">
                            <form action="{{ route('user.logout') }}" method="post" class="d-inline">
                                @csrf
                                <button type="submit" class="btn btn-logout">Sair</button>
                            </form>
                        </li>
                    @else
                        <!-- Exibe opções de login e registro para usuários não autenticados -->
                        <li class="nav-item">
                            <a class="nav-link btn-login" href="/login">Login</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link btn-register" href="/registro">Registrar-se</a>
                        </li>
                    @endif
                </ul>
            </div>
        </div>
    </nav>
</header>