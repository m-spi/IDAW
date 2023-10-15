<?php
  require_once("template_header.php");
  require_once("template_menu.php");

  $currentPageId = 'accueil';
  if(isset($_GET['page']))
    $currentPageId = $_GET['page'];
  $currentLang = 'fr';
  if(isset($_GET['lang']))
    $currentLang = $_GET['lang'];


  if($currentLang == 'fr'){
    $map = array(
      'accueil' => 'Accueil',
      'cv' => 'CV',
      'hobbies' => 'Hobbies',
      'projets' => 'Mes projets'
    );
  }else{
    $map = array(
      'accueil' => 'Home page',
      'cv' => 'CV',
      'hobbies' => 'Hobbies',
      'projets' => 'My projects'
    );
  }

  renderHeaderToHTML($currentPageId, $currentLang, $map);
  renderMenuToHTML($currentPageId, $currentLang, $map);

  $pageToInclude = $currentLang . "/" . $currentPageId . ".php";
  if(is_readable($pageToInclude))
    require_once($pageToInclude);
  else
    require_once("error.php");

  require_once("template_footer.php");
?>
