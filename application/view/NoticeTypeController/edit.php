<form action="index.php?controller=noticeType&action=edit" method="post">
  <div id="noticeType-form-name-add">
    <label for="type_name">Nazwa typu:</label>
    <br>
    <input type="text" name="type_name" id="type_name" <?php echo 'value="'.$this->noticeType->getTypeName().'"'; ?>><br>
  </div>

  <div id="noticeType-form-color-add">
    <label for="color">Kolor:</label>
    <br>
    <input type="text" name="color" id="color" <?php echo 'value="'.$this->noticeType->getColor().'"'; ?>>
  </div>

  <input type="hidden" name="id" <?php echo 'value="'.$this->noticeType->getId().'"'; ?>>

  <div id="add-form-submit">
    <input type="submit" value="Submit">
  </div>
</form>
