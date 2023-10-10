<?php
  function renderMenuToHTML($currentPageId, $menuMap) {

    echo "<nav class=\"menu\"> <ul>";
    foreach($menuMap as $pageId => $pageParameters) {
      $out = "<li><b><a ";
      if($currentPageId == $pageId) $out .= "id=\"currentpage\" ";
      $out .= "href=\"index.php?page={$pageId}\">{$pageParameters}</a></b></li>";
      echo $out;
    }
    echo "</ul> </nav>";
  }
?>
