<div id="notice-show" style="background-color: #<?php echo $this->notice->getColor(); ?>;">
  <h2><?php echo $this->notice->getTitle(); ?></h2>
  <p id="notice-content">
    <?php echo $this->notice->getContent(); ?>
  </p>
</div>
<div id="notice-show-actions">
  <div id="notice-edit-show"><a href="index.php?controller=notice&action=edit&id=<?php echo $this->notice->getId(); ?>">Edytuj</a></div>
  <div id="notice-delete-show"><a href="index.php?controller=notice&action=delete&id=<?php echo $this->notice->getId(); ?>">Usuń</a></div>
</p>
