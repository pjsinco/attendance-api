<?php

namespace App;

/**
 * Persist a model to the database.
 *
 */
abstract class DBInsert
{

  protected $tableName;

  /**
   * Insert a row into the database.
   *
   * @param array $row The row to insert
   * @return boolean Whether the row was inserted successfully
   */
  abstract public function save($row);

}
