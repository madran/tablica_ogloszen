<?php

class NoticeMapper extends Mpf\Db\Model\Mapper
{
  protected $_tableModelName = 'NoticeTable';
  protected $_tableName = 'notice';

  public function find($id)
  {
    $table = $this->getTable()->getAdapter()->getDbHandler();
    $stmt = $table->prepare(
        'SELECT notice.*, notice_type.color
         FROM notice, notice_type
         WHERE notice.notice_type_id = notice_type.id AND notice.id = :id
         ORDER BY notice.add_date DESC'
    );
    $stmt->bindValue(':id', $id, PDO::PARAM_INT);
    $stmt->execute();

    $stmtResult = $stmt->fetch(PDO::FETCH_ASSOC);

    $result = [];
    if (!empty($stmtResult)) {
      $result = new Notice();
      $result->setId($stmtResult['id']);
      $result->setTitle($stmtResult['title']);
      $result->setContent($stmtResult['content']);
      $result->setAddDate($stmtResult['add_date']);
      $result->setColor($stmtResult['color']);
      $result->setUserId($stmtResult['user_id']);
      $result->setNoticeTypeId($stmtResult['notice_type_id']);
    }

    return $result;
  }

  public function getAll()
  {
    $table = $this->getTable()->getAdapter()->getDbHandler();
    $stmt = $table->query(
        'SELECT notice.*, notice_type.color
         FROM notice, notice_type
         WHERE notice.notice_type_id = notice_type.id
         ORDER BY notice.add_date DESC'
    );
    $stmt->execute();

    $stmtResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resultSize = sizeof($stmtResult);

    $result = [];
    if ($resultSize) {
      for ($i = 0; $i < $resultSize; $i++) {
        $result[$i] = new Notice();
        $result[$i]->setId($stmtResult[$i]['id']);
        $result[$i]->setTitle($stmtResult[$i]['title']);
        $result[$i]->setContent($stmtResult[$i]['content']);
        $result[$i]->setAddDate($stmtResult[$i]['add_date']);
        $result[$i]->setColor($stmtResult[$i]['color']);
        $result[$i]->setUserId($stmtResult[$i]['user_id']);
        $result[$i]->setNoticeTypeId($stmtResult[$i]['notice_type_id']);
      }
    }

    return $result;
  }

  public function getAllByType($type)
  {
    $table = $this->getTable()->getAdapter()->getDbHandler();;

    $stmt = $table->prepare(
        'SELECT notice.*, notice_type.type_name, notice_type.color
         FROM notice, notice_type
         WHERE notice_type.type_name = :type and notice.notice_type_id = notice_type.id'
    );
    $stmt->bindValue(':type', $type, PDO::PARAM_STR);
    $stmt->execute();

    $stmtResult = $stmt->fetchAll(PDO::FETCH_ASSOC);
    $resultSize = sizeof($stmtResult);

    $result = [];
    if ($resultSize) {
      for ($i = 0; $i < $resultSize; $i++) {
        $result[$i] = new Notice();
        $result[$i]->setId($stmtResult[$i]['id']);
        $result[$i]->setTitle($stmtResult[$i]['title']);
        $result[$i]->setContent($stmtResult[$i]['content']);
        $result[$i]->setAddDate($stmtResult[$i]['add_date']);
        $result[$i]->setUserId($stmtResult[$i]['user_id']);
        $result[$i]->setNoticeTypeId($stmtResult[$i]['notice_type_id']);
      }
    }

    return $result;
  }
}
