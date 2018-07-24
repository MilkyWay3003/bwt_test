<div class="container">
 <? if (isset($errors) && is_array($errors)): ?>
      <ul>
        <? foreach ($errors as $error): ?>
          <li><?=$error?></li>
        <? endforeach; ?>
      </ul>
    <? endif ?>
    <div class="col-md-6 col-md-offset-3">
      <form class="form-signin" method="post" action="/UserController/Login">
        <h2 class="form-signin-heading">Please sign in</h2>

        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
        </div>

        <div class="form-group">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign in</button>
      </form>
    </div>
</div>