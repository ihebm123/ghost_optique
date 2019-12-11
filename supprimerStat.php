<?PHP
include "statC.php";
$statC=new StatC();
if (isset($_POST["id"])){
	$statC->supprimerStat($_POST["id"]);
	header('Location: afficherStat.php');
}

?>