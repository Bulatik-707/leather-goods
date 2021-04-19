<!DOCTYPE html>
<html lang="ru">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="/public/admin/dist/css/bootstrap.min.css">
    <title>@yield('title')</title>

</head>
<body>

    <nav class="navbar navbar-expand-md navbar-light bg-light pb-3">
      <div class="container">
        <a class="navbar-brand font-weight-bold" href="{{route('home')}}">Leather goods</a>
        <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarText" aria-controls="navbarText" aria-expanded="false" aria-label="Переключатель навигации">
            <span class="navbar-toggler-icon"></span>
        </button>
        <div class="collapse navbar-collapse" id="navbarText">
            <ul class="navbar-nav mr-auto">
                <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('categories')}}">Каталог</a></li>
                <li class="nav-item"><a class="nav-link font-weight-bold" href="{{route('products')}}">Изделия</a></li>
                <!-- <li class="nav-item"><a class="nav-link" href="#"></a></li>
                <li class="nav-item"><a class="nav-link" href="#"></a></li> -->
            </ul>

            <ul class="navbar-nav mr-auto">
                <li class="nav-item dropdown">
                    <a href="{{route('basket')}}">
                        <svg xmlns="http://www.w3.org/2000/svg" width="40" height="40" fill="currentColor" class="bi bi-cart3 navbar-brand" viewBox="0 0 16 16">
                            <path d="M0 1.5A.5.5 0 0 1 .5 1H2a.5.5 0 0 1 .485.379L2.89 3H14.5a.5.5 0 0 1 .49.598l-1 5a.5.5 0 0 1-.465.401l-9.397.472L4.415 11H13a.5.5 0 0 1 0 1H4a.5.5 0 0 1-.491-.408L2.01 3.607 1.61 2H.5a.5.5 0 0 1-.5-.5zM3.102 4l.84 4.479 9.144-.459L13.89 4H3.102zM5 12a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm7 0a2 2 0 1 0 0 4 2 2 0 0 0 0-4zm-7 1a1 1 0 1 1 0 2 1 1 0 0 1 0-2zm7 0a1 1 0 1 1 0 2 1 1 0 0 1 0-2z"/>
                        </svg>
                            <!-- <span class="badge badge-info navbar-badge basket-kol">{\Cart::session($_COOKIE['order_id'])->getTotalQuantity()}}</span> -->
                       <!-- <span class="badge badge-info navbar-badge basket-kol">{\Cart::session($_COOKIE['basket_id'])->getTotalQuantity()}}</span>
                            <div>Cart (<span class="basket-qty">{\Cart::session($_COOKIE['basket_id'])->getTotalQuantity()}}</span>)</div>
                                 -->
                    </a>
                </li>
            </ul>
        </div>
      </div>

    </nav>

    <main role="main" class="pt-5">
      <div class="content-wrapper">
      @yield('content')
      </div>

    </main>

  <footer class="text-muted">
      <div class="container">
          <p class="float-right">
              <a href="#">
                  <svg xmlns="http://www.w3.org/2000/svg" width="56" height="50" fill="currentColor" class="bi bi-arrow-up-circle" viewBox="0 0 16 16">
                      <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-7.5 3.5a.5.5 0 0 1-1 0V5.707L5.354 7.854a.5.5 0 1 1-.708-.708l3-3a.5.5 0 0 1 .708 0l3 3a.5.5 0 0 1-.708.708L8.5 5.707V11.5z"/>
                  </svg>
              </a>
          </p>
      </div>
      <div class="py-3 mt-5 bg-light">
    <div class="container">

    <div class="row">
        <div class="col-12">
        <p>Leather goods &copy; Все права !защищены</p>     
        </div>
    </div>
</div>
  </footer>

<style>
img{
    max-width: 100%;
    height: auto;
}

/* col- */
@media (max-width: 320px) {
    .card-body h4{
        font-size: 12px;
    }
    .card-body p{
        font-size: 12px;
    }
    .card img{
    max-width: 100%;
    height: 50%;
}

 }
 /* col- */
@media (max-width: 480px) {
    .card-body h4{
        font-size: 14px;
    }
    .card-body p{
        font-size: 16px;
    }
    .card img{
    max-width: 100%;
    height: 200px;
    
 }
}
/* col-sm */
@media (min-width: 576px) and (max-width: 767px) {
    .card-body h4{
        font-size: 14px;
    }
    .card-body p{
        font-size: 16px;
    }
    .card img{
    max-width: 100%;
    height: 250px;
}
}
/* col-md */
@media (min-width: 768px) and (max-width: 992px) {
    .card-body h4{
        font-size: 20px;
    }
    .card-body p{
        font-size: 18px;
    }
    .card img{
    max-width: 100%;
    height: 250px;
}
}
/* col-lg */
@media (min-width: 1024px) and (max-width: 1279px) {
    /* .card{
        height: 350px;
    } */
    .card-body h4{
        font-size: 24px;
    }
    .card-body p{
        font-size: 22px;
    }
    .card img{
    max-width: 100%;
    height: 250px;
    
}
}
/* col-xl */
@media (min-width: 1280px) { 
   p{
        font-size: 16px;
    }
    
}
</style>

<script src="https://code.jquery.com/jquery-3.5.1.slim.min.js" integrity="sha384-DfXdz2htPH0lsSSs5nCTpuj/zy4C+OGpamoFVy38MVBnE+IbbVYUew+OrCXaRkfj" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/popper.js@1.16.1/dist/umd/popper.min.js" integrity="sha384-9/reFTGAW83EW2RDu2S0VKaIzap3H66lZH81PoYlFhbGU+6BZp6G7niu735Sk7lN" crossorigin="anonymous"></script>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.min.js" integrity="sha384-+YQ4JLhjyBLPDQt//I+STsc9iw4uQqACwlvpslubQzn4u2UU2UFM80nGisd026JF" crossorigin="anonymous"></script>
<style src="/public/admin/dist/js/bootstrap.bundle.js"></style>
<script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>

</body>
</html>
