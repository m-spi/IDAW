<?php
  require_once("template_header.php");
  require_once("template_menu.php");

  $currentPageId = 'fr/accueil';
  if(isset($_GET['page']))
    $currentPageId = $_GET['page'];

  if(substr($currentPageId, 0, 2) == 'fr'){
    $map = array(
      'fr/accueil' => 'Accueil',
      'fr/cv' => 'CV',
      'fr/hobbies' => 'Hobbies',
      'fr/projets' => 'Mes projets'
    );
  }else{
    $map = array(
      'en/accueil' => 'Home page',
      'en/cv' => 'CV',
      'en/hobbies' => 'Hobbies',
      'en/projets' => 'My projects'
    );
  }

  renderHeaderToHTML($currentPageId, $map);
  renderMenuToHTML($currentPageId, $map);

  $pageToInclude = $currentPageId . ".php";
  if(is_readable($pageToInclude))
    require_once($pageToInclude);
  else
    require_once("error.php");

  require_once("template_footer.php");
?>
