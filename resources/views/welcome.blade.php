<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    @livewireStyles
  </head>
  <body>

    <header class="bg-light py-5">
        <div class="container">
            <div class="text-center">
                <img class="img-fluid" src="https://www.jngijamaica.com/wp-content/uploads/2019/07/cropped-cropped-JNGI-Logo.png" alt="logo" width="150px">
                <h1>Document Portal</h1>
                <p>Lorem ipsum, dolor sit amet consectetur adipisicing elit. <br> Qui amet iure illum pariatur quo deleniti aperiam sapiente doloremque modi laboriosam.</p>
            </div>
        </div>
    </header>

    <section class="py-5">

        <div class="container col-md-6">
            <div class="row">
                <div class="col">
                    <livewire:sales.login />
                </div>
                <div class="col border-start">
                    <livewire:agents.login>
                </div>
            </div>
        </div>

    </section>



    <!-- Compiled and minified JavaScript -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    @livewireScripts
  </body>
</html>
