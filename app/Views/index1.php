<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>


<?php
        foreach($okres as $row) {
            echo "<li class='nav-item'>";
            echo "<a class='nav-link' href='" .$row->kod .$row->nazev . "'>";
            echo "</li>";
                       
    }?>

<?= $this->endSection() ?>