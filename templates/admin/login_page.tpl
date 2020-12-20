<!doctype html>
<html lang="ru">
  <head>
    <!-- Required meta tags -->
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <!-- Bootstrap CSS -->
    <link rel="stylesheet" href="{{ site_path }}/style/bootstrap.css">
    <!-- Main CSS -->
    <link rel="stylesheet" href="{{ site_path }}/style/loginPage.css">
    <link rel="stylesheet" type="text/css" href="{{ site_path }}/style/owl.carousel.min.css">
    <!-- icons CSS -->
    <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.3.1/css/all.css" integrity="sha384-mzrmE5qonljUremFsqc01SB46JvROS7bZs3IO2EmfFsd15uHvIt+Y8vEf7N7fWAU" crossorigin="anonymous">
   
    <title>{{s_tittle}}</title>
   
  </head>
  <body>

    <div class="container">
      <h3>Авторизация</h3>
      <div class="row justify-content-center align-items-center">
        <div class="col-11 col-sm-11 col-md-4 col-lg-4 col-xl-4 card">

          <form action="" method="post">
            <div class="form-group">
              <label for="exampleInputEmail1">Email</label>
              <input type="email" name="email" class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp" placeholder="Enter email" value="{{data.email}}">
            </div>
            <div class="form-group">
              <label for="exampleInputPassword1">Password</label>
              <input type="password" name="password" class="form-control" id="exampleInputPassword1" placeholder="Password">
            </div>
            <input type="submit" name="submit" class="btn btn-primary col-4 col-sm-6 col-lg-6 col-xl-6" value="Войти"/>
            <a class="col-8 col-sm-6 col-lg-6 col-xl-6" href="#">Забыли пароль?</a>
            <div class="text-center">{{data.error}}</div>
          </form>
        </div>
      </div>
    </div>

    <script src="{{ site_path }}/js/jquery-3.3.1.min.js"></script>
    <script type="text/javascript" src="{{ site_path }}/js/bootstrap.min.js"></script>
  </body>
</html>