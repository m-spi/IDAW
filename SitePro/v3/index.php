<?php
  require_once("template_header.php");
  require_once("template_menu.php");

  $currentPageId = 'accueil';
  if(isset($_GET['page'])) {
    $currentPageId = $_GET['page'];
  }

  $map = array(
    'accueil' => 'Accueil',
    'cv' => 'CV',
    'hobbies' => 'Hobbies'
  );

  renderHeaderToHTML($currentPageId, $map);
  renderMenuToHTML($currentPageId, $map);

  $pageToInclude = $currentPageId . ".php";
  if(is_readable($pageToInclude))
    require_once($pageToInclude);
  else
    require_once("error.php");

  require_once("template_footer.php");
?>
