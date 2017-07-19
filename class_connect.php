<?php
error_reporting(E_ALL);
class connect{
	private $pass;
	private $hostName;
	public $dbConnect;
	private $dbUser;
	public function connection($DbUser,$DbName){
    	 $this->dbUser = $DbUser;
    	 $this->getDbPass($DbUser);
    	 $this->getDbHost($DbName);
		$this->dbConnect = ocilogon($this->dbUser,$this->pass,$this->hostName) or die("can't connect");
   		return $this->dbConnect;
    }
    public function disconnection(){
    	ocilogoff($this->dbConnect);
    	echo "<br/>Goodbye";
    	}
}
?>