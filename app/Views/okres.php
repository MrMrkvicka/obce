<?= $this->extend("layout/template") ?>
<?= $this->section("content") ?>








<?php

$table = new \CodeIgniter\View\Table();

$table->setHeading("pořadí obce","název obce","počet adres");


foreach($obec as $key => $row){
    $poradi = ($pager->getCurrentPage()-1)*$perPage+$key+1;
    $table->addRow($poradi, $row->nazev, $row->pocet);
}

$template = array(
    'table_open'=> '<table class="table table-bordered">',
    'thead_open'=> '<thead>',
    'thead_close'=> '</thead>',
    'heading_row_start'=> '<tr>',
    'heading_row_end'=>' </tr>',
    'heading_cell_start'=> '<th>',
    'heading_cell_end' => '</th>',
    'tbody_open' => '<tbody>',
    'tbody_close' => '</tbody>',
    'row_start' => '<tr>',
    'row_end'  => '</tr>',
    'cell_start' => '<td>',
    'cell_end' => '</td>',
    'row_alt_start' => '<tr>',
    'row_alt_end' => '</tr>',
    'cell_alt_start' => '<td>',
    'cell_alt_end' => '</td>',
    'table_close' => '</table>'
    );
    
    $table->setTemplate($template);

echo $table->generate();

echo $pager->links();
// var_dump($hraci);

?>




<?= $this->endSection() ?>