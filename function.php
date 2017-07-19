<?
error_reporting(E_ALL);
require_once("class_connect.php");
class oopFunction extends connect{
	private $count = 0;
	public $sqlCommand = null;
	public $stmt = null;
	
	public function oncedata($sql){
		$this->sqlCommand = $sql;
		$this->stmt = null;
		$this->stmt = OCIParse($this->dbConnect,$this->sqlCommand);
		OCIExecute($this->stmt,OCI_DEFAULT);
		while (OCIFetch($this->stmt)) 	{
			$this->count = OCIResult($this->stmt,1);	
		}
	return $this->count;
	}
}
//$obj = new oopFunction;
//$obj->connection("saleforce","DigitalSales");
//echo $obj->oncedata("select count(*) from orders");// count or maxid
?>