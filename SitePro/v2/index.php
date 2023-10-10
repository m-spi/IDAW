<?php require_once('template_header.php');?>
  <h1>Bienvenue !</h1>
  <div id="page">
    <?php
      require_once('template_menu.php');
      renderMenuToHTML('index');
    ?>
    <div class="text">
      <h2>Bienvenue sur mon site Portfolio !</h2>
      <p>Découvrez mon CV et mes hobbies.</p>
    </div>
  </div>
<?php require_once('template_footer.php');?>
