<div class="container">
    <? if (isset($errors) && is_array($errors)): ?>
      <ul>
        <? foreach ($errors as $error): ?>
          <li><?=$error?></li>
        <? endforeach; ?>
      </ul>
    <? endif ?>

    <div class="col-md-6 col-md-offset-3">
      <form class="form-signin" method="post" action="/SignupController/Submit">
        <h2 class="form-signin-heading">Please sign up</h2>

        <label for="inputFirstName" class="sr-only">FirstName</label>
        <input type="text" id="inputFirstName" class="form-control" placeholder="FirstName" required name="firstname" autofocus>

        <label for="inputLastName" class="sr-only">LastName</label>
        <input type="text" id="inputLastName" class="form-control" placeholder="LastName" required name="lastname">

        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">

        <label for="inputPassword" class="sr-only">Password</label>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="password">

        <label for="inputRepeatPassword" class="sr-only">Repeat Password</label>
        <input type="password" id="inputRepeatPassword" class="form-control" placeholder="Repeat Password" required name="passwordrepeat">

        <input type="text" id="inputGender" class="sr-only" placeholder="Gender">
        <select name="gender" id="inputGender">
            <option value="male">Male</option>
            <option value="female">Female</option>
            <option value="not specified">Not specified</option>
        </select>

        <label for="inputDateBirthDay" class="sr-only">DateBirthDay</label>
        <input type="date" id="inputDateBirthDay" class="form-control" placeholder="DateBirthDay" name="datebirthday">

        <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Sign up</button>
      </form>
      <br><br>
      <div class="col-md-12 text-center">
        <a href="/SignupController/Login" class="btn btn-default">Я уже зарегистрирован</a>
      </div>
    </div>
</div>
