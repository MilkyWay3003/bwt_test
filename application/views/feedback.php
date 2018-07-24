<div class="container">
<? if (isset($errors) && is_array($errors)): ?>
      <ul>
        <? foreach ($errors as $error): ?>
          <li><?=$error?></li>
        <? endforeach; ?>
      </ul>
    <? endif ?>
  <div class="col-md-6 col-md-offset-3">
    <form class="form-signin" method="post" action="/FeedbackController/Submit">
      <h2 class="form-signin-heading">Feedback</h2>

      <div class="form-group">
        <label for="inputFirstName" class="sr-only">FirstName</label>
        <input type="text" id="inputFirstName" class="form-control" placeholder="FirstName" required name="firstname" autofocus>
      </div>
      
      <div class="form-group">
        <label for="inputEmail" class="sr-only">Email address</label>
        <input type="email" id="inputEmail" class="form-control" placeholder="Email address" required name="email">
      </div>
    
      <div class="form-group">
        <label for="inputMessage" class="sr-only">Message</label>
        <textarea id="message" cols="72" rows="4" class="form-control" placeholder="Enter your message from 20 to 255 signs" required name="message"></textarea>
      </div>

      <div class="g-recaptcha" data-sitekey="6Lfh6GQUAAAAAOCko5u1lk0pwUm4hY41E-jvDgDS"></div>

      <br/>

      <button class="btn btn-lg btn-primary btn-block" type="submit" name="submit">Submit</button>
      </form>
  </div> 
</div>

