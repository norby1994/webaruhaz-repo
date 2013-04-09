<?php
	class Felhasznalo
	{
		private $_email;
		private $_jelszo;
		private $_felhasznaloNev;
		private $_szulIdo;
		private $_nem;
		private $_telefon;
		private $_egyenleg;
		private $_regDatum;
		private $_torzsvasarlo;
		
		public function __construct($email, $jelszo, $felhasznaloNev, $ev, $honap, $nap, $nem, $telefon)
		{
			$this->_email = $email;
			$this->_jelszo = $jelszo;
			$this->_felhasznaloNev = $felhasznaloNev;
			$this->_szulIdo = $ev . '. ' . $honap . ' ' . $nap . '.';
			$this->_nem = $nem;
			$this->_telefon = $telefon;
		}
		
		public function regisztracio()
		{			
			require_once '../connection.php';
			$connect = new Connection();
			
			$stid = oci_parse($connect, "INSERT INTO felhasznalo(email, jelszo, felhasznalo_nev, szul_ido, nem, telefon) 
					VALUES ('$this->_email', '$this->_jelszo', '$this->_felhasznaloNev', '$this->_szulIdo', 
					'this->_nem', '$this->_telefon')");
			oci_execute($stid);
		}
		
		/**
		 * Getterek És Setterek
		 */
		
		public function getEmail()
		{
			return $this->_email;
		}
		
		public function setEmail($email)
		{
			$this->_email = $email;
		}
		
		public function getJelszo()
		{
			return $this->_jelszo;
		}
		
		public function setJelszo($jelszo)
		{
			$this->_jelszo = $jelszo;
		}
		
		public function getFelhasznaloNev()
		{
			return $this->_felhasznaloNev;
		}
		
		public function setFelhasznaloNev($felhasznaloNev)
		{
			$this->_felhasznaloNev = $felhasznaloNev;
		}
		
		public function getSzulIdo()
		{
			return $this->_szulIdo;
		}
		
		public function setSzulIdo($szulIdo)
		{
			$this->_szulIdo = $szulIdo;
		}
		
		public function getNem()
		{
			return $this->_nem;
		}
		
		public function setNem($nem)
		{
			$this->_nem = $nem;
		}
		
		public function getTelefon()
		{
			return $this->_telefon;
		}
		
		public function setTelefon($telefon)
		{
			$this->_telefon = $telefon;
		}
		
		public function getEgyenleg()
		{
			return $this->_egyenleg;
		}
		
		public function setEgyenleg($egyenleg)
		{
			$this->_egyenleg = $egyenleg;
		}
		
		public function getRegDatum()
		{
			return $this->_regDatum;
		}
		
		public function setRegDatum($regDatum)
		{
			$this->_regDatum = $regDatum;
		}
	}