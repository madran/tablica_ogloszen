<div class="std-container">
  <div id="add-index">
    <a href="index.php?controller=notice&action=add">Dodaj nowe ogłoszenie</a>
  </div>
  <?php foreach ($this->notices as $notice) { ?>
    <div class="notice-index" style="background-color: #<?php echo $notice->getcolor(); ?>;">
      <div class="notice-header-index">
        <div class="notice-title-index">
          <?php
            foreach ($this->noticeTypes as $type) {
              if ($type->getId() == $notice->getNoticeTypeId()) {
                echo $type->getTypeName();
              }
            }
          ?>
        </div>
        <div class="notice-delete-index">
          <a href="index.php?controller=notice&action=delete&id=<?php echo $notice->getId(); ?>">X</a>
        </div>
      </div>
      <div class="notice-content-index">
        <p><a href="index.php?controller=notice&action=show&id=<?php echo $notice->getId(); ?>"><?php echo $notice->getTitle(); ?></a></p>
      </div>
    </div>
  <?php } ?>
</div>
