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
  <style>
    .divider span{
    padding: 1rem;
    background: #fff
    }
    .divider{
        position: relative;
        margin-top: 3rem;
        margin-bottom: 3rem;
        text-align: center;
        z-index: 1;
    }
    .divider:before {
        position: absolute;
        width: 100%;
        height: 1px;
        content: " ";
        display: block;
        background: #333;
        top: 0;
        bottom: 0;
        margin-top: auto;
        margin-bottom: auto;
        z-index: -1;
        
    }
  </style>    
      
      
      
    <section class="d-flex justify-content-center align-items-center py-5">
        <div class="container">
            <x-alerts />
            <div class="row">
                <div class="col-md-8 d-none d-md-block">
<lottie-player src="https://assets8.lottiefiles.com/private_files/lf30_fw6h59eu.json"  background="transparent"  speed="1"  style="width: 100%; height: 100%;"    autoplay></lottie-player>                
                </div>
                <div class="col-md-4">

                    <livewire:sales.login /> 
                                        <div class="mb-3"></div>
                     <p class="text-center">Sign up for a new <a href="/register">account</a></p>

                    <div class="divider"><span>OR</span></div>
                    
                    <livewire:agents.login /> 
                    <div class="mb-3"></div>
                     <p class="text-center">Sign up for a new <a href="/register">account</a></p>
                </div>
            </div>
        </div>
    </section>
    

    
    @livewireScripts
    
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-geWF76RCwLtnZ8qwWowPQNguL3RmwHVBC9FhGdlKrxdiJJigb/j/68SIy3Te4Bkz" crossorigin="anonymous"></script>
  </body>
</html>