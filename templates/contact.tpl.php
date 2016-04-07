<?php

//$title       = 'Contact Us';
//$description = "Send a message to us here at Life\'s a Stitch and let us know how we can serve you.";
//$keywords    = "Where to get custom embroidery, looking for custom apparel, contact Life's a Stitch, embroidery order inquiries, custom embroidery, screen printing, heat transfer printing, custom apparel, printing, embroidery, sewing, logo t-shirts, logo caps";
//$scripts     = array('plugins/validate/jquery.validate.min.js', 'plugins/validate/additional-methods.min.js', 'js/validate.js');
//$jQueryUi    = false;

?>

<?php// include 'header.php'; ?>

<!--<main>
  <section class="container container-condensed">
    <h1>Contact Us</h1>
    <p class="tagline">Drop us a line and let us know how we can help you.</p>-->

    <form role="form" id="contact-form" action="" method="post" novalidate="novalidate">

      <div class="row">
        <div class="six columns">
          <?php echo $name->render(); ?>
        </div>
        <div
             class="six columns">
          <?php echo $email->render(); ?>
        </div
          >
      </div>
      <div class="row">
        <div class="twelve columns">
          <?php echo $message->render(); ?>
        </div>
      </div>
      <?php echo $antispam->render(); ?>

      <input type="submit" value="Submit" class="button button-submit" />
      <button type="button" class="button button-default" id="clear">Clear</button>
    </form>
<!--
  </section>
</main>
-->

<?php //include 'footer.php'; ?>

