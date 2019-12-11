<?PHP
include "config.php";
class StatC {
function afficherStat ($stat){
		echo "Id: ".$stat->getId()."<br>";
		echo "year: ".$stat->getYear()."<br>";
		echo "Purchase: ".$stat->getPurchase()."<br>";
		echo "Sale: ".$stat->getSale()."<br>";
		echo "Profit: ".$stat->getProfit()."<br>";
	}
	


	function ajouterStat($stat){
		$sql="insert into stat (id,year,purchase,sale,profit) values (:id, :year,:purchase,:sale,:profit)";
		$db = config::getConnexion();
		try{
        $req=$db->prepare($sql);
		
        $id=$stat->getId();
        $year=$stat->getYear();
        $purchase=$stat->getPurchase();
        $sale=$stat->getSale();
        $profit=$stat->getProfit();

		$req->bindValue(':id',$id);
		$req->bindValue(':year',$year);
		$req->bindValue(':purchase',$purchase);
		$req->bindValue(':sale',$sale);
		$req->bindValue(':profit',$profit);
		
            $req->execute();
           
        }
        catch (Exception $e){
            echo 'Erreur: '.$e->getMessage();
        }
		
	}
	
	function afficherStats(){
		//$sql="SElECT * From employe e inner join formationphp.employe a on e.cin= a.cin";
		$sql="SElECT * From stat";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }	
	}
	function supprimerStat($id){
		$sql="DELETE FROM stat where id= :id";
		$db = config::getConnexion();
        $req=$db->prepare($sql);
		$req->bindValue(':id',$id);
		try{
            $req->execute();
           // header('Location: index.php');
        }
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	function modifierStat($stat,$id){
		$sql="UPDATE stat SET id=:idd, year=:year,purchase=:purchase,sale=:sale,profit=:profit WHERE id=:id";
		
		$db = config::getConnexion();
		//$db->setAttribute(PDO::ATTR_EMULATE_PREPARES,false);
try{		
        $req=$db->prepare($sql);
		$idd=$stat->getId();
        $year=$stat->getYear();
        $purchase=$stat->getPurchase();
        $sale=$stat->getSale();
        $profit=$stat->getProfit();
		$datas = array(':idd'=>$idd, ':id'=>$id, ':year'=>$year,':purchase'=>$purchase,':sale'=>$sale,':profit'=>$profit);
		$req->bindValue(':idd',$idd);
		$req->bindValue(':id',$id);
		$req->bindValue(':year',$year);
		$req->bindValue(':purchase',$purchase);
		$req->bindValue(':sale',$sale);
		$req->bindValue(':profit',$profit);
		
		
            $s=$req->execute();
			
           // header('Location: index.php');
        }
        catch (Exception $e){
            echo " Erreur ! ".$e->getMessage();
   echo " Les datas : " ;
  print_r($datas);
        }
		
	}
	function recupererStat($id){
		$sql="SELECT * from stat where id=$id";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
	
	function rechercherListeEmployes($tarif){
		$sql="SELECT * from employe where tarifHoraire=$tarif";
		$db = config::getConnexion();
		try{
		$liste=$db->query($sql);
		return $liste;
		}
        catch (Exception $e){
            die('Erreur: '.$e->getMessage());
        }
	}
}

?>