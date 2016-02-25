<div class="std-container">
  <div id="add-index">
    <a href="index.php?controller=user&action=add">Dodaj użytkownika</a>
  </div>
  <table id="table-users">
    <tr>
      <th>Username</th>
      <th></th>
    </tr>
  <?php foreach ($this->users as $user) { ?>
    <tr>
      <td>
        <a href="index.php?controller=user&action=show&id=<?php echo $user->getId(); ?>"><?php echo $user->getUsername(); ?></a>
      </td>
      <td>
        <a href="index.php?controller=user&action=edit&id=<?php echo $user->getId(); ?>">Edytuj</a>
      </td>
      <td>
        <a href="index.php?controller=user&action=delete&id=<?php echo $user->getId(); ?>">Delete</a><br>
      </td>
    </tr>
  <?php } ?>
  <table>
</div>
