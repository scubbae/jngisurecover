<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Welcome</title>
    <script src="https://unpkg.com/@lottiefiles/lottie-player@latest/dist/lottie-player.js"></script>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-9ndCyUaIbzAi2FUVXJi0CjmCapSmO7SnpJef0486qhLnuZ2cdeRhO02iuK6FUUVM" crossorigin="anonymous">
    @livewireStyles
  </head>
  <body>
<header class="bg-light py-5">
    <div class="container">
        <div class="text-center">
            <img width="150px" src="https://www.jngijamaica.com/wp-content/uploads/2019/07/cropped-cropped-JNGI-Logo.png">
            <h1>Document Portal</h1>
        </div>
    </div>
</header>
<section class="py-5">
    <div class="container col-md-3">
        <x-alerts />
        <livewire:register />
    </div>
</section>

    @livewireScripts

    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>
