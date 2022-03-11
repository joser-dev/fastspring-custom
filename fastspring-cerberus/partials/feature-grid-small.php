<div class="fs-feature-grid-small">

  <?php foreach($plans as $key=>$plan) :?>

  <?php $unchecked_count = count($features) - $plan["checks"] - 1; ?>

  <div class="fs-feature-grid-plan">

    <h3 class="fs-plan-features-small"><?php echo $key; ?></h3>

    <div class="fs-plan-features">

      <?php if ($plan["users"] === "Unlimited") :?>
          <div class="fs-feature-check">
            <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . "images/checkmark.png"; ?>"
                 alt="Included in the <?php echo $key; ?> plan"
                 title="Included in the <?php echo $key; ?> plan" 
                 class="checkmark" />
            Unlimited Concurrent Users
          </div>
      <?php else : ?>
        <div class="fs-feature-check">
          <span class="users-count">
            <?php echo $plan["users"]; ?> 
          </span>
          Concurrent Users
        </div>
      <?php endif; ?>

       <?php for ($x = 0; $x < $plan["checks"]; $x++) : ?>
          <div class="fs-feature-check">
            <img src="<?php echo plugin_dir_url(dirname(__FILE__)) . "images/checkmark.png"; ?>"
                 alt="Included in the <?php echo $key; ?> plan"
                 title="Included in the <?php echo $key; ?> plan" 
                 class="checkmark" />
            <?php echo $features[$x + 1]; ?>
          </div>
      
       <?php endfor; ?>

    </div><!--end fs-plan-features -->

  </div>

  <?php endforeach; // end for each plan ?>

</div><!-- end fs-feature-grid-small-->
