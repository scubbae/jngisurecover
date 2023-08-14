<!doctype html>
<html lang="en">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>Password Reset</title>
        <!-- UIkit CSS -->
        <link rel="stylesheet" href="https://bootswatch.com/5/lux/bootstrap.min.css" />
    @livewireStyles
  </head>
  <body>
<section class="py-5 vh-100 d-flex align-items-center">
    <div class="container col-md-4">
        <x-alerts />
        <livewire:new-password />
    </div>
</section>

    @livewireScripts
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>

</body>
</html>
