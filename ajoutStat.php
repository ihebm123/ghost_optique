<?PHP
include "stat.php";
include "statC.php";

if (isset($_POST['id']) and isset($_POST['year']) and isset($_POST['purchase']) and isset($_POST['sale']) and isset($_POST['profit'])){
$stat1=new stat($_POST['id'],$_POST['year'],$_POST['purchase'],$_POST['sale'],$_POST['profit']);
//Partie2
/*
var_dump($employe1);
}
*/
//Partie3
$stat1C=new StatC();
$stat1C->ajouterStat($stat1);
header('Location: afficherStat.php');
	
}else{
	echo "vérifier les champs";
}
//*/

?>