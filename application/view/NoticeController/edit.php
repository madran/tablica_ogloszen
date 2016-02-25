<form id="notice-form-add" action="index.php?controller=notice&action=edit" method="post">
  <div id="notice-form-title-add">
    <label for="title">Tytuł:</label>
    <br>
    <input type="text" name="title" id="title" size=78 <?php echo 'value="'.$this->notice->getTitle().'"'; ?>>
  </div>

  <div id="notice-form-content-add">
    <label for="content">Treść</label>
    <br>
    <textarea name="content" id="content" cols=90 rows=10><?php echo $this->notice->getContent(); ?></textarea>
  </div>

  <div id="notice-form-type-add">
    <label for="notice_type_id">Rodzaj:</label>
    <br>
    <select name="notice_type_id" id="notice_type_id" <?php echo 'value="'.$this->notice->getNoticeTypeId().'"'; ?>>
      <?php foreach ($this->types as $type) {
        if ($type->getId() == $this->notice->getNoticeTypeId()) {
          echo '<option selected value='.$type->getId().'>'.$type->getTypeName().'</option>';
        } else {
          echo '<option value='.$type->getId().'>'.$type->getTypeName().'</option>';
        }
      } ?>
    </select>
  </div>

  <input type="hidden" name="id" <?php echo 'value="'.$this->notice->getId().'"'; ?>>

  <div id="add-form-submit">
    <input type="submit" value="Zapisz">
  </div>
</form>
