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
    <script type="text/javascript" src="{{ site_path }}/js/owl.carousel.min.js"></script>
    <title>{{s_tittle}}</title>
   
  </head>
  <body>


{% include 'themeDefoult/shoppingcart.tpl' %}
{% include 'themeDefoult/nav_bar.tpl' %}
{% include 'themeDefoult/slider.tpl' %}

<div class="pjax-container">
  {% autoescape false %}
  {{ content }}
  {% endautoescape %}
</div>

{% include 'themeDefoult/footer.tpl' %}
   
  
  <script type="text/javascript" src="{{ site_path }}/js/jquery.pjax.min.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/start.carousel.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/bootstrap.bundle.min.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/scrollfunction.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/shop-cart.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/start.popover.js"></script>
  <script type="text/javascript" src="{{ site_path }}/js/start.pjax.js"></script>
  
  </body>
</html>