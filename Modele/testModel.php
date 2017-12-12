<?php 

require_once (File::build_path(["Modele","ModelProduit.php"]));

echo 'pd';

$v_nom = ModelProduit::getNomById(2);

echo "$v_nom";

?>
