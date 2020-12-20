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
    <link rel="stylesheet" href="{{ site_path }}/style/orders.css">
    <!-- icons CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   

    <script src="{{ site_path }}/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ site_path }}/js/bootstrap.min.js"></script>
    <script type="text/javascript" src="{{ site_path }}/js/owl.carousel.min.js"></script>
    <title>{{s_tittle}}</title>
   
  </head>
  <body>

<div class="container pt-4">
  <div class="row">
    <div class="col-12 col-lg-1"><a class="logo text-dark"  href="/">Pizza</a></div>
    <div class="col-12 col-lg-11 pt-2">
      <ul class="row stage">
        <li class="col-4 col-auto text-center stage_active">
          <span class="stage_num">1</span>
          <p class="stage_name">Корзина</p>
        </li>
        <li class="col-4 col-auto text-center">
          <span class="stage_num">2</span>
          <p class="stage_name">Оформление заказа</p>
        </li>
        <li class="col-4 col-auto text-center">
          <span class="stage_num">3</span>
          <p class="stage_name">Заказ принят</p>
        </li>
      </ul>
    </div>
  </div>
</div>

<hr>

<div class="pjax-container">
  {% autoescape false %}
  {{ content }}
  {% endautoescape %}
</div>

{% include 'themeDefoult/footer.tpl' %}
   
  
  <script type="text/javascript" src="{{ site_path }}/js/jquery.pjax.min.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/scrollfunction.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/orders.js"></script>
  </body>
</html>