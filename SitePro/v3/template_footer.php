    </div>
    <div id="footer">
      <?php
        echo "<p class=\"text\"><b>Contact : </b>";
        if(isset($_GET['page'])){
          if(substr($_GET['page'], 0, 2) == 'en')
            echo "Find me on LinkedIn using <b><a href=\"https://www.linkedin.com/in/matis-spinelli-240836228/\">this link";
          else
            echo "Retrouvez moi sur LinkedIn en cliquant sur <b><a href=\"https://www.linkedin.com/in/matis-spinelli-240836228/\">ce lien";
        }else
          echo "Retrouvez moi sur LinkedIn en cliquant sur <b><a href=\"https://www.linkedin.com/in/matis-spinelli-240836228/\">ce lien";
        echo "</a></b>.</p>";
      ?>
    </div>
  </body>
</html>
