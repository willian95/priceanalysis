<!DOCTYPE html>
<html lang="en">

<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="X-UA-Compatible" content="ie=edge">
  <title>Commerce price </title>
  <link rel="stylesheet" href="{{ url('landing/css/bootstrap.min.css') }}">
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/3.1.0/css/font-awesome.css">
  <link rel="stylesheet" href="{{ url('landing/css/style.css') }}">
</head>

<body>

  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="index.html">Commerce price</a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="index.html">Inicio</a></li>
              <li class="nav-item "><a class="nav-link" href="#about">Quienes somos</a></li>
              <li class="nav-item "><a class="nav-link" href="#blog">Blog</a></li>
              <li class="nav-item "><a class="nav-link" href="#fqa">Preguntas frecuentes</a></li>
              <li class="nav-item "><a class="nav-link" href="{{ url('/login') }}">Iniciar sesión</a></li>
            </ul>
          </div>
        </div>
      </nav>
    </div>
  </header>


  <main class="site-main">


    <section class="hero-banner">
      <div class="container">
        <div class="row no-gutters align-items-center pt-60px">
          <div class="col-5 d-none d-sm-block">
            <div class="hero-banner__img">
              <img class="img-fluid"
                src="https://images.unsplash.com/photo-1525540810550-5032f5d191b1?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=751&q=80"
                alt="">
            </div>
          </div>
          <div class="col-sm-7 col-lg-6 offset-lg-1 pl-4 pl-md-5 pl-lg-0">
            <div class="hero-banner__content">
              <h4>Lorem ipsum</h4>
              <h1>Lorem ipsum dolor sit amet</h1>
              <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
              <a class="button button-hero" href="#">Ver más</a>
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-margin mt-5 " id="about">
      <div class="section-intro pb-60px container">
        <p>Nuestros valores</p>
        <h2>Nuestros <span class="section-intro__style">valores</span></h2>
      </div>
      <div class="container flex-valores">
        <div class="hero-carousel__slide">
          <img
            src="https://images.unsplash.com/photo-1532009877282-3340270e0529?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img
            src="https://images.unsplash.com/photo-1474631245212-32dc3c8310c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=624&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          </a>
        </div>
        <div class="hero-carousel__slide">
          <img
            src="https://images.unsplash.com/photo-1532911557891-d12f6b98dddc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=411&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Lorem ipsum</h3>
            <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit</p>
          </a>
        </div>
      </div>
    </section>

    <section class="container mt6 fqa mb-5" id="fqa">
      <div class="section-intro pb-60px">
        <p>lo más frecuente</p>
        <h2>Preguntas <span class="section-intro__style">frecuentes</span></h2>
      </div>

      <!-- content -->
      <div class="container">
        <div class="row mt-50">
          <div class="col-md-6">
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>La inversión publicitaria es el recurso que se utiliza para lograr visibilidad y audiencia en el
                  corto plazo, a través de los distintos… canales digitales como Facebook, Google o LinkedIn Ads.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.</p>
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Al ser parte de nuestra familia, se asigna un ejecutivo comercial y un jefe de proyectos para que
                  estén en constante comunicación…</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Lorem ipsum dolor sit amet, consectetur adipisicing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua. Ut enim ad minim veniam, quis nostrud exercitation ullamco laboris nisi ut
                  aliquip ex ea commodo consequat.</p>
              </div>
            </div>

          </div>
        </div>

      </div>
    </section>

    <section class="blog" id="blog">
      <div class="container">
        <div class="section-intro pb-60px">
          <p>ùltimas noticias</p>
          <h2><span class="section-intro__style">Blog</span></h2>
        </div>

        <div class="row">
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0"
                  src="https://images.unsplash.com/photo-1593438490544-eda74ecf8328?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=750&q=80"
                  alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">Admin</a></li>
                </ul>
                <h4 class="card-blog__title">
                  <a href="single-blog.html">Lorem ipsum dolor sit amet</a>
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </p>
                <a class="card-blog__link" href="#">Leer más <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0"
                  src="https://images.unsplash.com/photo-1587875097944-f3c84936ffdf?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=701&q=80"
                  alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">Admin</a></li>
                </ul>
                <h4 class="card-blog__title">
                  <a href="single-blog.html">Lorem ipsum dolor sit amet</a>
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </p>
                <a class="card-blog__link" href="#">Leer más <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>
          <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
            <div class="card card-blog">
              <div class="card-blog__img">
                <img class="card-img rounded-0"
                  src="https://images.unsplash.com/photo-1605727450884-4b0e32a129af?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=752&q=80"
                  alt="">
              </div>
              <div class="card-body">
                <ul class="card-blog__info">
                  <li><a href="#">Admin</a></li>
                </ul>
                <h4 class="card-blog__title">
                  <a href="single-blog.html">Lorem ipsum dolor sit amet</a>
                </h4>
                <p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore
                  et dolore magna aliqua.
                </p>
                <a class="card-blog__link" href="#">Leer más <i class="ti-arrow-right"></i></a>
              </div>
            </div>
          </div>



        </div>
      </div>
    </section>
    <!-----------Suscribir (por si acaso)---------->
    <!---------<section class="subscribe-position">
      <div class="container">
        <div class="subscribe text-center">
          <h3 class="subscribe__title">Suscribete a nuestro blog</h3>
          <p>Lorem ipsum dolor sit amet</p>
          <div id="mc_embed_signup">
            <form target="_blank" class="subscribe-form form-inline mt-5 pt-1">
              <div class="form-group ml-sm-auto">
                <input class="form-control mb-1" type="email" name="EMAIL" placeholder="Email">
                <div class="info"></div>
              </div>
              <button class="button button-subscribe mr-auto mb-1" type="submit">Subscribir</button>


            </form>
          </div>

        </div>
      </div>
    </section>--->

  </main>
  <footer class="footer">


    <div class="footer-bottom">
      <div class="container">
        <div class="row d-flex">
          <p class="col-lg-12 footer-text text-center">

            Copyright &copy;<script>
              document.write(new Date().getFullYear());
            </script> Todos los derechos reservados
          </p>
        </div>
      </div>
    </div>
  </footer>
  <script src="{{ url('landing/js/jquery-3.2.1.min.js') }}"></script>
  <script src="{{ url('landing/js/main.js') }}"></script>

  <script>
    function initCollapsibleWithjQuery() {
      var collapsibleButtons$ = $(".collapsible");
      collapsibleButtons$.each(function (index, ele) {
        var collapsible$ = $(ele),
          content$ = collapsible$.next();
        collapsible$.click(function () {
          collapsible$.toggleClass("active");
          if (!collapsible$.hasClass("active")) {
            content$.css("maxHeight", "0px");
          } else {
            content$.css("maxHeight", content$.prop("scrollHeight") + "px");
          }
        });
      });
    }

    /**clickclick */
    function initializeCollapsible(collapsibles$) {
      if (collapsibles$ === null) {
        var collapsibles$ = $(".collapsible");
      }

      collapsibles$.each(function (index, ele) {
        var collapsible$ = $(ele),
          content$ = collapsible$.next();
        collapsible$.click(function () {
          collapsible$.toggleClass("active");
          if (collapsible$.hasClass("active")) {
            content$.css("maxHeight", content$.prop("scrollHeight") + "px");
          } else {
            content$.css("maxHeight", "0px");
          }
        });
      });
    }

    function initCollapsibleWithVanillaJs() {
      var coll = document.getElementsByClassName("collapsible");
      var i;

      for (i = 0; i < coll.length; i++) {
        coll[i].addEventListener("click", function () {
          this.classList.toggle("active");
          var content = this.nextElementSibling;
          if (content.style.maxHeight) {
            content.style.maxHeight = null;
          } else {
            content.style.maxHeight = content.scrollHeight + "px";
          }
        });
      }

    }

    initCollapsibleWithjQuery();
    // initCollapsibleWithVanillaJs();
  </script>
</body>

</html>