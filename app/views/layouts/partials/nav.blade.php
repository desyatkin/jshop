<style>
body{
padding-top: 40px;
font-family: 'Ubuntu', sans-serif;
}
</style>

<nav class="navbar navbar-default navbar-inverse navbar-fixed-top" role="navigation">
  <div class="container-fluid">
    <!-- Brand and toggle get grouped for better mobile display -->
    <div class="navbar-header">
      <a class="navbar-brand" href="/" style="color: #fff; font-family: 'Lobster', cursive; font-size: 25pt;">JShop</a>
    </div>

    <!-- Collect the nav links, forms, and other content for toggling -->
    <div class="collapse navbar-collapse" id="bs-example-navbar-collapse-1">
      <ul class="nav navbar-nav">
        <li class="active">
            <a href="/items">Покупки</a>
        </li>
        <li>
        <a href="/items/create" >
                <span class="glyphicon glyphicon-plus"></span>
                Создать покупку
            </a>
        </li>

      </ul>


      <ul class="nav navbar-nav navbar-right">
              @if(Auth::check())
                  <li class="dropdown">
                    <a href="#" class="dropdown-toggle" data-toggle="dropdown">
                        <span class="glyphicon glyphicon-user"></span>
                        {{ Auth::user()->email }}
                        <span class="caret"></span>
                        </a>
                    <ul class="dropdown-menu" role="menu">
                      <li><a href="/cabinet/payment">Кабинет</a></li>
                      <li><a href="/logout">Выйти</a></li>
                    </ul>
                  </li>
                  <li><a href="/cabinet/payment">
                                <span class="glyphicon glyphicon-shopping-cart"></span>
                                  {{ number_format(Auth::user()->money, 2, ',', ' ') }} руб.

                                </a></li>
              @else
                  <li><a href="/signup">Регистрация</a></li>
                  <li><a href="/signin">Войти</a></li>
              @endif

      </ul>




      <form class="navbar-form navbar-right" role="search">
        <div class="form-group">

          <input type="text" class="form-control" placeholder="Поиск">
        </div>
        <button type="submit" class="btn btn-default">Найти</button>
        &nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;&nbsp;
      </form>

    </div><!-- /.navbar-collapse -->
  </div><!-- /.container-fluid -->
</nav>