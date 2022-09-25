

<form class="form-signin" method="post">
  <div class="text-center mb-4">

    <p>Укажите свой login и пароль</p></p>
  </div>

  <div class="form-label-group">
    <input type="text" id="inputEmail" name="login" class="form-control" placeholder="login" required autofocus autocomplete="off" >
    <label for="inputEmail">Login</label>
  </div>

  <div class="form-label-group">
    <input type="password" id="inputPassword" name="passwd" class="form-control" placeholder="Password" required>
    <label for="inputPassword">Пароль</label>
  </div>
    <input type="hidden" name="signin">

  <div class="checkbox mb-3">
    <label>
      <input type="checkbox" value="remember-me">Запомнить меня
    </label>
  </div>
  <button class="btn btn-lg btn-primary btn-block" type="submit">Войти</button>

</form>

