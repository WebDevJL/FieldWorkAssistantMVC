<?php if (!defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed'); ?>

<div class="content-container container-fluid">
  <div class="row">
    <div  class="col-lg-5 col-md-5">
      <h4><?php echo $resx["h4_project_analytes"]; ?></h4>
      <?php require $form_modules[Applications\PMTool\Resources\Enums\ViewVariables\Analyte::project_field_analyte_list]; ?>
    </div>
    <div class="col-lg-2 col-md-2">
      <div class="buttons">
        <?php require $form_modules[Applications\PMTool\Resources\Enums\ViewVariables\Analyte::field_analyte_buttons]; ?>
      </div>
    </div>
    <div  class="col-lg-5 col-md-5">
      <h4><?php echo $resx["h4_field_analytes"]; ?></h4>
      <?php require $form_modules[Applications\PMTool\Resources\Enums\ViewVariables\Analyte::field_analyte_list]; ?>
    </div>
  </div>
</div>
