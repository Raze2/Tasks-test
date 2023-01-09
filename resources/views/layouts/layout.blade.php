<!DOCTYPE html>
<html lang="en">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, shrink-to-fit=no">
    <meta name="csrf-token" content="{{ csrf_token() }}">
    <title>Tasks Project</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@4.1.3/dist/css/bootstrap.min.css" rel="stylesheet" />   
    @yield('styles')
</head>

<body class="app header-fixed sidebar-fixed aside-menu-fixed sidebar-lg-show">
    <header>
        <nav class="navbar navbar-expand-lg navbar-light bg-light">
            <a class="navbar-brand" href="#">Tasks Project</a>
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavAltMarkup" aria-controls="navbarNavAltMarkup" aria-expanded="false" aria-label="Toggle navigation">
                <span class="navbar-toggler-icon"></span>
            </button>
            <div class="collapse navbar-collapse" id="navbarNavAltMarkup">
                <div class="navbar-nav">
                    <a class="nav-item nav-link" href="{{ route('tasks.index') }}">Tasks</a>
                    <a class="nav-item nav-link" href="{{ route('tasks.create') }}">Create Task</a>
                    <a class="nav-item nav-link" href="{{ route('tasks.sortView') }}">Sort Tasks</a>
                    <a class="nav-item nav-link" href="{{ route('projects.index') }}">Projects</a>
                    <a class="nav-item nav-link" href="{{ route('projects.create') }}">Create Project</a>
                </div>
            </div>
        </nav>
    </header>
    <div id="app">
        <div class="app-body">
            <main class="main pt-3">
                <div class="container">
                    @if ($errors->any())
                        @foreach ($errors->all() as $error)
                            <div>{{$error}}</div>
                        @endforeach
                    @endif
                    @if (session('error'))
                        <div>{{ session('error') }}</div>
                    @endif
                    @yield('content')
                </div>
            </main>
        </div>
    </div>

    <script src="https://unpkg.com/jquery@2.2.4/dist/jquery.js"></script>
    <script src="https://code.jquery.com/ui/1.11.4/jquery-ui.min.js"></script>
    <link href="https://code.jquery.com/ui/1.11.3/themes/smoothness/jquery-ui.css"/>
    @yield('script')
</body>