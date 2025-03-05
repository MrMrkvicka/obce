
<nav class="navbar navbar-expand-sm bg-dark navbar-dark">
  <div class="container-fluid">
    <ul class="navbar-nav me-auto">
    <?php
        foreach($okres as $row) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='".base_url("okres/".$row->kod)."'>".$row->nazev."</a>";
            echo "</li>";
                       
        }?>
    </ul>
  </div>
</nav>