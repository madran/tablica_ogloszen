<form id="notice-form-add" action="index.php?controller=notice&action=add" method="post">
  <div id="notice-form-title-add">
    <label for="title">Tytuł:</label>
    <br>
    <input type="text" name="title" id="title" size=78>
  </div>

  <div id="notice-form-content-add">
    <label for="content">Treść:</label>
    <br>
    <textarea name="content" id="content" cols=90 rows=10></textarea>
  </div>

  <div id="notice-form-type-add">
    <label for="notice_type_id">Rodzaj:</label>
    <br>
    <select name="notice_type_id" id="notice_type_id">
      <?php foreach ($this->types as $type) echo '<option value='.$type->getId().'>'.$type->getTypeName().'</option>'; ?>
    </select>
  </div>

  <input type="hidden" name="user_id" value="<?php echo $this->user['id']; ?>">

  <div id="add-form-submit">
    <input type="submit" value="Zapisz">
  </div>
</form>
