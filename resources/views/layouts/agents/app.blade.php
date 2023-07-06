@if (session()->has('agents_id'))
<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>@yield('title')</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    <link href="https://bootswatch.com/5/litera/bootstrap.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.10.5/font/bootstrap-icons.css">
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/hover.css/2.3.1/css/hover-min.css" integrity="sha512-csw0Ma4oXCAgd/d4nTcpoEoz4nYvvnk21a8VA2h2dzhPAvjbUIK6V3si7/g/HehwdunqqW18RwCJKpD7rL67Xg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="assets/js/app.jss"></script>
    <link rel="stylesheet" href="assets/css/app.css">

    @livewireStyles
  </head>
  <body>

     <div class="container-fluid bg-light" style="min-height:100vh;">
         <header class="py-2 sticky-top">
            <nav class="navbar bg-body-tertiary">
              <div class="container-fluid">
                <a class="navbar-brand">Document Portal</a>

                <x-top-nav />


                <div class="btn-group">
                  <a href="#" class="btn btn-outline-secondary">
                    <i class="bi bi-person-fill-gear" style="font-size:1rem;"></i> Profile
                  </a>

                  <a href="/logout" class="btn btn-outline-secondary">
                    <i class="bi bi-person-fill-x" style="font-size:1rem;"></i> Logout
                  </a>
                </div>

              </div>
            </nav>
         </header>
         <div class="content pt-5">

                <x-alerts />

                @yield('content')

         </div>
     </div>

     @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
    <script>
        const tooltipTriggerList = document.querySelectorAll('[data-bs-toggle="tooltip"]')
        const tooltipList = [...tooltipTriggerList].map(tooltipTriggerEl => new bootstrap.Tooltip(tooltipTriggerEl))
    </script>
  </body>
</html>
@else
    <script>
        window.location.href = "/";
    </script>
@endif
