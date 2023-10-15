<?php
  function renderMenuToHTML($currentPageId, $currentLang, $menuMap) {
    echo "<nav class=\"menu\"> <ul>";

    foreach($menuMap as $key => $value) {
      $out = "<li><b><a ";
      if($currentPageId == $key) $out .= "id=\"currentpage\" ";
      $out .= "href=\"index.php?page={$key}&lang={$currentLang}\">{$value}</a></b></li>";

      echo $out;
    }
    
    echo "</ul> </nav>";
  }
?>
