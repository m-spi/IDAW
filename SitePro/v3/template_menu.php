<?php
  function renderMenuToHTML($currentPageId, $menuMap) {

    echo "<nav class=\"menu\"> <ul>";
    foreach($menuMap as $pageId => $pageParameters) {
      $out = "<li><a ";
      if($currentPageId == $pageId) $out .= "id=\"currentpage\" ";
      $out .= "href=\"index.php?page={$pageId}\">{$pageParameters}</a></li>";
      echo $out;
    }
    echo "</ul> </nav>";
  }
?>
