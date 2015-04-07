<?php 
	/** 
	* Classe para criação de Graficos com GoogleCharts
	* @author Gabriel A. Barbosa <tx.gabrielbarbosa@gmail.com> 
	* @version 0.1 
	*/ 
	class GoogleCharts { 
	
		/** 
		* Retorna string para iniciar Biblioteca Javascript GoogleCharts
		* @access public 
		* @return void
		*/ 
		public function initGoogleJs() {
			echo '<script type="text/javascript" src="https://www.google.com/jsapi"></script>';
		}
		
		/** 
		* Retorna numero randomico
		* @access public 
		* @return integer
		*/ 
		public function getRandomNumber() {
			$tmp = rand(10000000000,99999999999);
			return $tmp;
		}
		
	}