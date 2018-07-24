<div class="container">
    <? if (isset($errors) && is_array($errors)): ?>
      <ul>
        <? foreach ($errors as $error): ?>
          <li><?=$error?></li>
        <? endforeach; ?>
      </ul>
    <? endif ?>

    <div class="col-md-6 col-md-offset-3">
      <form class="form-signin" method="post" action="/UserController/Submit">
        <h2 class="form-signin-heading">Please sign up</h2>

        <div class="form-group">
          <label for="inputFirstName" class="sr-only">FirstName</label>
          <input type="text" id="inputFirstName" class="form-control" placeholder="FirstName" required name="firstname" autofocus>
        </div>

        <div class="form-group">
          <label for="inputLastName" class="sr-only">LastName</label>
          <input type="text" id="inputLastName" class="form-control" placeholder="LastName" required name="lastname">
        </div>

        <div class="form-group">
          <label for="inputEmail" class="sr-only">Email address</label>
          <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
        </div>

        <div class="form-group">
          <label for="inputPassword" class="sr-only">Password</label>
          <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">
        </div>

        <div class="form-group">
          <label for="inputRepeatPassword" class="sr-only">Repeat Password</label>
          <input type="password" id="inputRepeatPassword" class="form-control" placeholder="Repeat Password" required name="passwordrepeat">
        </div>

        <div class="form-group">
          <select name="gender" id="inputGender" class="form-control">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="not specified">Not specified</option>
          </select>
        </div>

        <div class="form-group">
          <label for="inputDateBirthDay" class="sr-only">DateBirthDay</label>
          <input type="date" id="inputDateBirthDay" class="form-control" placeholder="DateBirthDay" name="datebirthday">
        </div>

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
      </form>
      <br><br>
      <div class="col-md-12 text-center">
        <a href="/UserController/Login" class="btn btn-default">Я уже зарегистрирован</a>
      </div>
    </div>
</div>
