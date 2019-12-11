<?PHP
class Stat{
	private $id;
	private $year;
	private $purchase;
	private $sale;
	private $profit;

	function __construct($id,$year,$purchase,$sale,$profit){
		$this->id=$id;
		$this->year=$year;
		$this->purchase=$purchase;
		$this->sale=$sale;
		$this->profit=$profit;
	}
	
	function getId(){
		return $this->id;
	}
	function getYear(){
		return $this->year;
	}
	function getPurchase(){
		return $this->purchase;
	}
	function getSale(){
		return $this->sale;
	}
	function getProfit(){
		return $this->profit;
	}

	


	function setId($id){
		$this->id=$id;
	}
	function setYear($year){
		$this->year=$year;
	}
	function setPurchase($purchase){
		$this->purchase=$purchase;
	}
	function setSale($sale){
		$this->sale=$sale;
	}
	function setProfit($profit){
		$this->profit=$profit;
	}
	
}

?>