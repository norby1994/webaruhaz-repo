<?php
	class Connection
	{
		private $FELHASZNALONEV = 'h070183';
		private $JELSZO = 'qwerty';
		private $HOST = 'xe';
		private $_connect;
		
		public function __construct()
		{
			$this->connect = oci_connect($this->FELHASZNALONEV, $this->JELSZO, $this->HOST);
			
			if (!$this->connect) {
				$e = oci_error();
				trigger_error(htmlentities($e['message'], ENT_QUOTES), E_USER_ERROR);
			}
		}
		
		public function __destruct()
		{
			oci_close($this->connect);
		}
	}