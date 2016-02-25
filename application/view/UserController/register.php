<form action="index.php?controller=user&action=register" method="post">
  <div id="user-add-form-username">
    <label for="username">Username:</label>
    <br>
    <input type="text" name="username" id="username">
  </div>

  <div id="user-add-form-email" class="input-margin">
    <label for="email">e-mail:</label>
    <br>
    <input type="email" name="email" id="email">
  </div>

  <div id="user-add-form-password" class="input-margin">
    <label for="password">Password:</label>
    <br>
    <input type="password" name="password" id="password">
  </div>

  <div id="user-add-form-password2" class="input-margin">
    <label for="password2">Password:</label>
    <br>
    <input type="password" name="password2" id="password2">
  </div>

  <div id="user-add-form-type" class="input-margin">
    <input type="hidden" name="type" id="type" value='user'>
  </div>

  <div id="add-form-submit" class="input-margin">
    <input type="submit" value="subit">
  </div>
</form>
