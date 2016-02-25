<div class="std-container">
  <div id="add-index">
    <a href="index.php?controller=noticeType&action=add">Dodaj nowy typ ogłoszenia</a>
  </div>
  <table id="table-users">
    <tr>
      <th>Typ</th>
      <th></th>
    </tr>
  <?php foreach ($this->types as $type) { ?>
    <tr>
      <td>
        <a href="index.php?controller=noticeType&action=show&id=<?php echo $type->getId(); ?>"><?php echo $type->getTypeName(); ?></a>
      </td>
      <td>
        <a href="index.php?controller=noticeType&action=edit&id=<?php echo $type->getId(); ?>">Edytuj</a>
      </td>
      <td>
        <a href="index.php?controller=noticeType&action=delete&id=<?php echo $type->getId(); ?>">Delete</a><br>
      </td>
    </tr>
  <?php } ?>
  <table>

</div>
