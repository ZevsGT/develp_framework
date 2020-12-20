<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ site_path }}/style/bootstrap.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ site_path }}/style/main.css">
    <link rel="stylesheet" type="text/css" href="{{ site_path }}/style/owl.carousel.min.css">
    <!-- icons CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   

    <script src="{{ site_path }}/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ site_path }}/js/bootstrap.min.js"></script>
    <!--<script type="text/javascript" src="{{ site_path }}/js/owl.carousel.min.js"></script>-->
    <title></title>
   
  </head>
  <body>

   <nav class="indent navbar navbar-expand-lg navbar-theme bg-theme sticky-top">
      <span>Админ Панель</span>
      <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNav" aria-controls="navbarNav" aria-expanded="false" aria-label="Toggle navigation">
        <i class="fas fa-bars"></i>
      </button>
      <div class="collapse navbar-collapse" id="navbarNav">
        <ul class="navbar-nav ml-md-auto">
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-search"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-th"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="#"><i class="fas fa-align-right"></i></a>
          </li>
          <li class="nav-item">
            <a class="nav-link" href="{{http_url}}/admin/exit"><i class="fas fa-power-off"></i></a>
          </li>
        </ul>
      </div>
    </nav>

    <div class="indent menu-list sticky-top fixed sticky-top">
      <section id='menu' style="display: block;">
        <span class="tittle">Меню</span>
        <ul class="side-bar-menu nav flex-column">
          <li>
            <a href="{{http_url}}/" target="_blank"><i class="fas fa-home"></i> Просмотреть сайт </a>
          </li>
          <li>
            <a href="{{http_url}}/admin"><i class="fas fa-project-diagram"></i> Dashboard </a>
          </li>
          <li>
            <a href="#pizzaList" data-toggle="collapse" class="menu-item"><i class="fas fa-box"></i> Продукт</a>

            <ul class="collapse submenu" id="pizzaList">
              <li><a href="{{http_url}}/admin/product/all" class="submenu-item"><small><i class="far fa-circle"></i> Показать все</small></a></li>
              <li><a href="{{http_url}}/admin/product/add" class="submenu-item"><small><i class="fas fa-plus"></i> Добавть</small></a></li>
            </ul>

          </li>
          <li>
            <a href="{{http_url}}/admin/orders/all" class="menu-item"><i class="fas fa-folder"></i> Заказы</a>
          </li>
          <li>
            <a href="#" class="menu-item">элемент 3</a>
          </li>
          <li>
            <a href="#" class="menu-item">элемент 4</a>
          </li>
        </ul>
      </section>
      <section id='chat'>
        чат
      </section>
    </div>

    <nav class="fixed-bottom nav-panel">
      <a class="nav-btn" href="#"><i class="fas fa-bars fa-2x"></i></a>
      <div class="mt-5 nav-tabs-btn">
        <a class="nav-bt-item tab-on" href="#menu"><i class="fas fa-inbox"></i></a>
        <a class="nav-bt-item" href="#"><i class="fas fa-plus"></i></a>
        <a class="nav-bt-item" href="#"><i class="far fa-lightbulb"></i></a>
        <a class="nav-bt-item tab-on" href="#chat"><i class="fas fa-comment-alt"></i></a>
        <a class="nav-bt-item" href="#"><i class="fas fa-cogs"></i></a>
      </div>
    </nav>


  <div class="indent p-3">
    {% autoescape false %}
    {{content}}
    {% endautoescape %}
  </div>

  
  <footer class="indent mt-5">
    
  </footer>

  <script type="text/javascript" src="{{ site_path }}/js/scrollfunction.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/shop-cart.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/start.popover.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/menu.tab.js"></script>
  <!--<script type="text/javascript" src="{{ site_path }}/js/form.js"></script>-->
  <script type="text/javascript" src="{{ site_path }}/js/list-product.js"></script>
  
  </body>
</html>