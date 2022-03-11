<a class="fs-feature-callout" href="#feature-grid">
  SEE ALL FEATURES <em>&#9660;</em>
</a>

<div id="feature-grid"></div>
<div class="fs-feature-grid-full">

  <div class="fs-feature-grid-header">
    <div></div>
    <div>Personal</div>
    <div>Standard</div>
    <div>Professional</div>
    <div>Enterprise</div>
  </div>

  <div class="fs-feature-grid-content">

  <div class="fs-feature-grid-features">
  <?php foreach($features as $feature): ?>
    <div class="fs-feature-name">
      <?php echo $feature; ?>
    </div>
  <?php endforeach; ?>
  </div>

  <?php foreach($plans as $key=>$plan) : ?>

  <?php $unchecked_count = count($features) - $plan["checks"] - 1; ?>
  <div class="fs-feature-grid-<?php echo $key; ?>">
    <div class="fs-feature-check users-count">
      <?php echo $plan["users"]; ?>
    </div>

     <?php for ($x = 0; $x < $plan["checks"]; $x++) : ?>
        <div class="fs-feature-check">
          <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . "images/checkmark.png"; ?>"
               alt="Included in the <?php echo $key; ?> plan"
               title="Included in the <?php echo $key; ?> plan" 
               class="checkmark" />
        </div>
     <?php endfor; ?>

     <?php for ($x = 0; $x < $unchecked_count; $x++) : ?>
        <div class="fs-feature-check">
          <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . "images/x-mark.png"; ?>"
               alt="Not included in the <?php echo $key; ?> plan"
               title="Not included in the <?php echo $key; ?> plan" 
               class="xmark" />
        </div>
     <?php endfor; ?>
     
  </div>
  <?php endforeach;?>

  </div><!-- end fs-feature-grid-content-->

</div><!-- end fs-feature-grid-full-->
