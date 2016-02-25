<form action="index.php?controller=user&action=edit" method="post">
  <div id="user-add-form-username">
    <label for="username">Username:</label>
    <br>
    <input type="text" name="username" id="username" <?php echo 'value="'.$this->user->getUsername().'"'; ?>>
  </div>

  <div id="user-add-form-email" class="input-margin">
    <label for="email">e-mail:</label>
    <br>
    <input type="email" name="email" id="email" <?php echo 'value="'.$this->user->getEmail().'"'; ?>>
  </div>

  <div id="user-add-form-type" class="input-margin">
    <label for="type">User type:</label>
    <br>
    <select name="type" id="type">
      <option <?php if ($this->user->getType() == 'user') echo 'selected'; ?>>user</option>
      <option <?php if ($this->user->getType() == 'admin') echo 'selected'; ?>>admin</option>
    </select>
  </div>

  <input type="hidden" name="id" <?php echo 'value="'.$this->user->getId().'"'; ?>>

  <div id="add-form-submit" class="input-margin">
    <input type="submit" value="subit">
  </div>
</form>
