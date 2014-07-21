<?php if (!defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed'); ?>

<fieldset class="project_form">
  <legend>
    <span class="project_add"><?php echo $resx["project_legend_add"]; ?></span>
    <span class="project_edit"><?php echo $resx["project_legend_edit"]; ?></span>
  </legend>
  <ol class="add-new-p">
    <li>
      <label><?php echo $resx["project_name"]; ?></label>
      <input name="project_name" type="text" />
    </li>
    <li>
      <label><?php echo $resx["project_num"]; ?></label>
      <input name="project_num" type="text" />
    </li>
    <li>
      <label><?php echo $resx["project_desc"]; ?></label>
      <input name="project_desc" type="text" />
    </li>
<!--    <li>
      <label><?php echo $resx["project_active_flag"]; ?></label>
      <input name="project_active_flag" type="checkbox" />
    </li>
    <li>
      <label><?php echo $resx["project_visible_flag"]; ?></label>
      <input name="project_visible_flag" type="checkbox"/>
    </li>-->
  </ol>
</fieldset>
<input type="button" id="btn_add_project" class="project_add" value="<?php echo $resx["project_button_add"]; ?>" />
<input type="button" id="btn_edit_project" class="project_edit" value="<?php echo $resx["project_button_edit"]; ?>" />
