<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Mini-CRM</title>

    @vite(['resources/scss/app.scss', 'resources/js/app.js'])

</head>

<body>
    <div class="toast-container position-fixed top-0 end-0">
        @if (session('success'))
            <div class="toast align-items-center text-bg-success border-0 m-3 show" role="alert">
                <div class="d-flex">
                    <div class="toast-body">
                        {{ session('success') }}
                    </div>
                </div>
            </div>
        @endif
    </div>

    <header>
        <nav class="navbar navbar-expand-lg">
            <div class="container">
                <a class="navbar-brand" href="{{ route('welcome') }}">Mini-CRM</a>
                <div class="collapse navbar-collapse" id="navbarSupportedContent">
                    <ul class="navbar-nav ms-auto">
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('customers.index') }}">
                                Alle Kundeneinträge
                            </a>
                        </li>
                        <li class="nav-item">
                            <a class="nav-link" href=" {{ route('customers.create') }}">
                                Neuen Eintrag erstellen
                            </a>
                        </li>
                </div>
            </div>
        </nav>
    </header>

    <main class="container">
        <div class="row">
            <div class="col-12">
                {{ $slot }}
            </div>
        </div>
    </main>
</body>

</html>