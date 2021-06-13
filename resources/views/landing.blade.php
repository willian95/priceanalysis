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

  <!-- Modal -->
  <div class="modal fade" id="mantra" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">¿Qué es Commerceprice?</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">“Menos Tiempo más Dinero”</h3>
          <h6 class="text-center">"Less Time More Money"</h6>
          <p>
            Commerceprice es la herramienta que permite una comparación eficiente, en tiempo breve, de los distintos precios que se visualizan en el mercado, de uno o varios productos en particular.
          </p>
          <p>
          A través del uso de la herramienta, puedes solicitar a una red de empresas registradas en la plataforma una cotización o presupuesto -de uno o varios productos- y con un simple Clic, analizar rápidamente la mejor oferta en cuanto a precios, seleccionando el contacto que deseas establecer, evitando, el uso de tiempo innecesario en llamadas, correos y contactos que finalmente no ofrecen lo que buscas en los tiempos requeridos.  
          </p>
          <p>
          Entonces ¿Tienes un proyecto y necesitas productos para ejecutarlo? ¿Debes invertir una cantidad de tiempo considerable buscando las mejores opciones de precios? ¿Necesitas optimizar tus costos o gastos? Entre tus responsabilidades, el proyecto, la necesidad de darle un respiro a tu mente y tu cuerpo ¿Crees que tengas el tiempo necesario para movilizarte a ejecutar la búsqueda de precios? Seguramente la respuesta es “NO”, por eso, Nuestra solución es simple, indica los productos que necesitas, envía esa necesidad a la red de empresas registradas (Según sea tu Criterio), espera sus propuestas de precios, compara con un clic y contacta a la mejor o las mejores propuestas. Ah, te acotamos que el servicio es gratis.
          </p>
          <p>
            Finalmente, si ya no es necesario invertir tanto tiempo buscando precios, comparando las opciones, buscando minimizar los costos y gastos, quiere decir que ya puedes invertir más tiempo que las cosas que realmente son importantes para ti.
          </p>

        </div>
      </div>
    </div>
  </div>

  <!-- Modal -->
  <div class="modal fade" id="valores" tabindex="-1" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
      <div class="modal-content">
        <div class="modal-header">
          <h5 class="modal-title" id="exampleModalLabel">Valores</h5>
          <button type="button" class="close" data-dismiss="modal" aria-label="Close">
            <span aria-hidden="true">&times;</span>
          </button>
        </div>
        <div class="modal-body">
          <h3 class="text-center">“Trasparencia, Bienestar, Evolución, Respeto y Servicio”</h3>
          
          <p><strong>Transparencia:</strong> La información cualitativa y cuantitativa tiene un impacto en la toma de decisiones, por eso nuestro objetivo es brindar información confiable que permita tomar decisiones asertivas.</p>

          <p><strong>Bienestar:</strong> Nuestros empleados, clientes, aleados comerciales y el entorno donde hacemos vida son nuestro norte.</p>

          <p><strong>Evolución:</strong> Buscar constantemente el crecimiento, las mejoras y nuevas metodologías que nos permitan mantenernos a la vanguardia en nuestras áreas.</p>

          <p><strong>Respeto:</strong> La diversidad es un don para nosotros, por lo cual la valoramos y la catalogamos como pilar fundamental para la obtención de nuestros objetivos.
          </p>

          <p><strong>Servicio:</strong> La calidad del servicio, la atención, la empatía, son cualidades que nos deben definir como organización.</p>

        </div>
      </div>
    </div>
  </div>


  <header class="header_area">
    <div class="main_menu">
      <nav class="navbar navbar-expand-lg navbar-light">
        <div class="container">
          <a class="navbar-brand logo_h" href="{{ url('/') }}"><img src="{{ asset('/img/logo-original.png') }}" style="width: 150px;" alt=""></a>
          <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent"
            aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
            <span class="icon-bar"></span>
          </button>
          <div class="collapse navbar-collapse offset" id="navbarSupportedContent">
            <ul class="nav navbar-nav menu_nav ml-auto mr-auto">
              <li class="nav-item active"><a class="nav-link" href="{{ url('/') }}">Inicio</a></li>
              <li class="nav-item "><a class="nav-link" href="#about">Quienes somos</a></li>
              <li class="nav-item "><a class="nav-link" href="#fqa">Preguntas frecuentes</a></li>
              <li class="nav-item "><a class="nav-link" href="#blog">Blog</a></li>
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
              
              <h1>CommercePrice</h1>
              <h4>"Menos tiempo, más dinero"</h4>

              <div class="container">
                <div class="row">

                  <div class="col-lg-12">
                    <div class="card" style="cursor:pointer;" onclick="goToNew('https://www.elnacional.com/opinion/la-capacidad-ociosa-y-la-recuperacion-de-la-economia-venezolana/')">
                      <div class="card-body" style="height: 70px;">
                        <p >La recuperación de la economía venezolana</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12 mt-1">
                    <div class="card" style="cursor:pointer;" onclick="goToNew('https://www.bancaynegocios.com/cinco-recomendaciones-para-fijar-precios-segun-asdrubal-oliveros/')">
                      <div class="card-body" style="height: 70px;" >
                        <p >Cinco recomendaciones para fijar precios</p>
                      </div>
                    </div>
                  </div>

                  <div class="col-lg-12 mt-1">
                    <div class="card" style="cursor:pointer;" onclick="goToNew('https://www.diariodelexportador.com/2020/03/el-dumping-y-su-impacto-en-el-comercio.html')">
                      <div class="card-body" style="height: 70px;">
                        <p >El dumping y su impacto en el comercio</p>
                      </div>
                    </div>
                  </div>


                </div>
              </div>

              <!--<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit, sed do eiusmod tempor incididunt ut labore et
                dolore magna aliqua.</p>
              <a class="button button-hero" href="#">Ver más</a>-->
            </div>
          </div>
        </div>
      </div>
    </section>

    <section class="section-margin mt-5 " id="about">
      <div class="section-intro pb-60px container">
        <p>Nuestros valores</p>
        <h2>Nosotros</h2>
      </div>
      <div class="container flex-valores">
        <div class="hero-carousel__slide" style="cursor: pointer;" data-toggle="modal" data-target="#mantra">
          <img
            src="https://images.unsplash.com/photo-1532009877282-3340270e0529?ixlib=rb-1.2.1&ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&auto=format&fit=crop&w=750&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>¿Qué es Commerceprice?</h3>
          </a>
        </div>
        <div class="hero-carousel__slide" style="cursor: pointer;" data-toggle="modal" data-target="#valores">
          <img
            src="https://images.unsplash.com/photo-1474631245212-32dc3c8310c6?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=624&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Nuestros valores</h3>
          </a>
        </div>
        <div class="hero-carousel__slide" style="cursor: pointer;" data-toggle="modal" data-target="#valores">
          <img
            src="https://images.unsplash.com/photo-1532911557891-d12f6b98dddc?ixid=MXwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHw%3D&ixlib=rb-1.2.1&auto=format&fit=crop&w=411&q=80"
            alt="" class="img-fluid">
          <a href="#" class="hero-carousel__slideOverlay">
            <h3>Equipo</h3>

          </a>
        </div>
      </div>
    </section>

    <section class="container mt6 fqa mb-5" id="tutorial">
      <div class="section-intro pb-60px">
        <h2>¿Cómo <span class="section-intro__style">ingresar</span>?</h2>
      </div>
      <video controls class="w-100">
        <source src="{{ asset('tutorial.mp4') }}" type="video/mp4">
      </video>
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
              <button class="collapsible">¿Qué puedo hacer en Commerceprice?</button>
              <div class="collapsibleContent">
                <p>Obtener los precios de los productos que estoy buscando a través de las empresas y/o personas registradas.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Puedo Comprar productos a través de la página?</button>
              <div class="collapsibleContent">
                <p>Inicialmente, “NO”. Nuestro objetivo es enlazar compradores y vendedores, minimizar los tiempos para búsquedas de precios y los costos para los compradores.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Commerceprice tiene alguna responsabilidad en la negociación entre comprador-vendedor?</button>
              <div class="collapsibleContent">
                <p><strong>NO.</strong> Commerceprice solo enlaza, el requerimiento del comprador con la mejor(es) propuesta(s) del Vendedor(es). Luego es decisión del comprador llamar al vendedor elegido y establecer la negociación entre ambas partes, con los acuerdos que ellos consideren según las políticas internas de cada uno.</p>
              </div>
            </div>

          </div>
          <div class="col-md-6">
            <div class="main-collapse">
              <button class="collapsible">¿Qué pasa si la negociación no salió según lo acordado y una de las partes se vio afectada?</button>
              <div class="collapsibleContent">
                <p>Recomendamos tomar las siguientes previsiones para concretar las negociaciones:</p>
                <ul>
                  <li>1.- Nunca realizar ningún pago por adelantado, si no conoce o tiene certeza de la procedencia del proveedor.</li>
                  <li>2.- Nunca acceder a negociaciones que estipulen quebrantamiento de las leyes vigentes. Por Ejemplo, recibir alimentos en otra dirección diferente a la registrada en el portal SICA (Sunagro).</li>
                  <li>3.- Solventar las dudas que pueda tener respecto a los productos, su naturaleza, composición, precio, flete, formas y condiciones de pagos, tiempos de despacho.</li>
                  <li>4.- Siempre estar atentos a ofertas que se salen -considerablemente- del rango de precios de la mayoría de los ofertantes. </li>
                </ul>
                <p>Vendedores:</p>
                <ul>
                  <li>1.- Validar que la mercancía sea entregada en la dirección establecida en los documentos legales y al negocio correspondiente.</li>
                  <li>2.- Solicitar las referencias comerciales, bancarias necesarias para verificar la capacidad de pago del comprador cuando la mercancía no sea negociada con pago inmediato.</li>
                  <li>
                  3.- Solventar las dudas que el cliente pueda tener respecto a los productos, su naturaleza, composición, precio, flete, formas y condiciones de pagos, tiempos de despacho.
                  </li>
                </ul>
                <p><strong>De igual forma, nuestro portal dará opciones para calificar a las partes involucradas.</strong></p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Cómo saben que los datos suministrados son reales?</button>
              <div class="collapsibleContent">
                <p>Los datos suministrados por las empresas o personas registradas en la página, son validados a través del portal fiscal (SENIAT) o en su defecto si es persona natural y no aporta RIF, sino solo cedula, es validado a través del portal del CNE, esto solo con la finalidad de validar que efectivamente son empresas o individuos con capacidad para involucrarse en el comercio.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Que necesitas saber?</button>
              <div class="collapsibleContent">
                <p>Los datos suministrados por las empresas o personas registradas en la página, son validados a través del portal fiscal (SENIAT) o en su defecto si es persona natural y no aporta RIF, sino solo cedula, es validado a través del portal del CNE, esto solo con la finalidad de validar que efectivamente son empresas o individuos con capacidad para involucrarse en el comercio.</p>
              </div>
            </div>
            <div class="main-collapse">
              <button class="collapsible">¿Cómo hago si el producto que deseo no aparece en el listado disponible?</button>
              <div class="collapsibleContent">
                <p>Coloca la descripción del producto, indica la cantidad de unidades por bulto y selecciona agregar. Nuestro personal se encargará de validar la naturaleza del mismo, su descripción y entonces se formalizará su anexo a la lista disponible. Ejemplo: <strong>Sardina en lata Rey del Mar 24unidX1 130 Grs.</strong></p>
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
          <div class="col-md-12 mb-5">
            <h3 class="text-center mt-3 mb-5">Proximamente</h3>
          </div>
          {{--<div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
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
          </div>--}}



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
  <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.6.0/dist/js/bootstrap.bundle.min.js" integrity="sha384-Piv4xVNRyMGpqkS2by6br4gNJ7DXjqk09RmUpJ8jgGtD7zP9yug3goQfGII0yAns" crossorigin="anonymous"></script>
  <script src="{{ url('landing/js/main.js') }}"></script>

  <script>

    function goToNew(url){

      window.open(url)

    }

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