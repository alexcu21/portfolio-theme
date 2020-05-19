<section class="me mt-5 container">
  <h2 class="text-center mb-5 separator">Services</h2>
  <div class="row justify-content-center">
    <?php $services = get_post_meta( get_the_ID(), 'ap_group_me_services', true);

      foreach($services as $service) : ;?>

      <div class="col-md-4 text-center information">
        <img src="<?php echo $service["image_service"]; ?>" alt="<?php echo $service["title_service"]; ?>" class="img-fluid mb-3">
        <h3><?php echo $service["title_service"]; ?></h3>
        <p><?php echo $service["description_service"]; ?></p>
      </div>

    <?php endforeach; ?>


  </div>

  <h2 class="text-center mb-5 separator">Skills</h2>
  <div class="row justify-content-center">
    <?php $skills = get_post_meta( get_the_ID(), 'ap_group_me_skills', true);

      foreach($skills as $skill) : ;?>

      <div class="col-md-4 text-center information">
        <img src="<?php echo $skill["image_skill"]; ?>" alt="<?php echo $skill["title_skill"]; ?>" class="img-fluid mb-3">
        <h3><?php echo $skill["title_skill"]; ?></h3>
        <p><?php echo $skill["description_skill"]; ?></p>
      </div>

    <?php endforeach; ?>
  </div>
</section>
