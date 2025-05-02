    <header>
        <nav class="navbar navbar-expand-lg bg-body-tertiary">
            <div class="container">
                <a class="navbar-brand" href="{{ route('principal') }}">
                    <img src="{{ asset('build/assets/img/webcoder.svg') }}" alt="Logo" width="100">
                </a>
                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarText"
                    aria-controls="navbarText" aria-expanded="false" aria-label="Toggle navigation">
                    <span class="navbar-toggler-icon"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarText">
                    <ul class="navbar-nav ms-auto mb-2 mb-lg-0">
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('principal') }}">Principal</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link active" aria-current="page" href="{{ route('sobre-nos') }}">Sobre Nós</a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href="{{ route('contato') }}">Contato</a>
                        </li>
                    </ul>
                </div>
            </div>
        </nav>
    </header>
