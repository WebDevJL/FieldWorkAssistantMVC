<?php if (!defined('__EXECUTION_ACCESS_RESTRICTION__')) exit('No direct script access allowed'); ?>
<section class="right-aside main col-lg-9 col-md-9">

  <section class="project_list <?php echo $display_project_list ?>">
    <h3><?php echo $resx["project_list_all_header"]; ?></h3>
    <h4><?php echo $resx["h3_projects_active"]; ?></h4>
    <select multiple id="project-data-active" class="form-control"></select>
    <h4><?php echo $resx["h3_projects_inactive"]; ?></h4>
    <select multiple id="project-data-inactive" class="form-control"></select>
  </section>

</section>
</div><!-- END ROW DIV -->
</div><!-- END CONTENT CONTAINER -->