<?php
namespace Applications\PMTool\Models\Dao;if ( ! defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed');
class Field_sample_matrix extends \Library\Entity{  public     $task_id,    $field_analyte_id,    $location_id;
  const     TASK_ID_ERR = 0,    FIELD_ANALYTE_ID_ERR = 1,    LOCATION_ID_ERR = 2;
  // SETTERS //  public function setTask_id($task_id) {    if (empty($task_id)) {      $this->erreurs[] = self::TASK_ID_ERR;    } else {      $this->task_id = $task_id;    }  }
  public function setField_analyte_id($field_analyte_id) {    if (empty($field_analyte_id)) {      $this->erreurs[] = self::FIELD_ANALYTE_ID_ERR;    } else {      $this->field_analyte_id = $field_analyte_id;    }  }
  public function setLocation_id($location_id) {    if (empty($location_id)) {      $this->erreurs[] = self::LOCATION_ID_ERR;    } else {      $this->location_id = $location_id;    }  }
  // GETTERS //  public function task_id() {    return $this->task_id;  }
  public function field_analyte_id() {    return $this->field_analyte_id;  }
  public function location_id() {    return $this->location_id;  }
}