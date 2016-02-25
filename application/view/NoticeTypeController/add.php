<form action="index.php?controller=noticeType&action=add" method="post">
  <div id="noticeType-form-name-add">
    <label for="type_name">Nazwa typu:</label>
    <br>
    <input type="text" name="type_name" id="type_name">
  </div>

  <div id="noticeType-form-color-add">
    <label for="color">Kolor:</label>
    <br>
    <input type="text" name="color" id="color" maxlength="6">
  </div>

  <div id="add-form-submit">
    <input type="submit" value="Zapisz">
  </div>
</form>
