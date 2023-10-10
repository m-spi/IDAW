<?php
  function renderMenuToHTML($currentPageId) {
    // un tableau qui d\'efinit la structure du site
    $mymenu = array(
      // idPage titre
      'index' => 'Accueil',
      'cv' => 'Cv',
      'hobbies' => 'Hobbies'
    );

    echo "<nav class=\"menu\"> <ul>";
    foreach($mymenu as $pageId => $pageParameters) {
      $out = "<li><a ";
      if($currentPageId == $pageId) $out .= "id=\"currentpage\" ";
      $out .= "href=\"{$pageId}.php\">{$pageParameters}</a></li>";
      echo $out;
    }
    echo "</ul> </nav>";
  }
?>
