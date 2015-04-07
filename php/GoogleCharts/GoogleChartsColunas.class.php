<?php 
	/** 
	* Classe para criação de Graficos com GoogleCharts (Tipo: Colunas)
	* @author Gabriel A. Barbosa <tx.gabrielbarbosa@gmail.com> 
	* @version 0.1 
	*/ 
	
	require "GoogleCharts.class.php";

	class GoogleChartsColunas extends GoogleCharts { 

		var $options = "";
		var $colunas = "";
		var $colunasView = "";
		
		/** 
		* Inicia Aplicação
		* @access public 
		* @param string $divId 
		* @return void
		*/ 
		public function runScript($divId) {
			
			if(!$this->getColunas()) { echo("Erro: Grafico [#".$divId."] sem Colunas."); }
			if(!$this->getOptions()) { echo("Erro: Grafico [#".$divId."] sem Options."); }
		
			echo "<script type='text/javascript'>";
				echo $this->loadAndCallBacks($divId);
				echo $this->generateDrawBasic($divId);
			echo "</script>";
			
			$this->clear();
			
		}
		
		/** 
		* Limpa Vars
		* @access public 
		* @return void
		*/ 
		function clear() { 
		
			$this->options = "";
			$this->colunas = "";
			$this->colunasView = "";
			
		}
		
		/** 
		* Retorna script load do GoogleCharts
		* @access public 
		* @param string $divId 
		* @return string
		*/
		public function loadAndCallBacks($divId) {
			
			$_divs = 'google.load("visualization", "1", {packages: ["corechart"], callback: drawBasic_'.$divId.'});
					  google.setOnLoadCallback(drawBasic_'.$divId.');';
			return $_divs;
		
		}
		
		/** 
		* Retorna função em Javascript
		* @access public 
		* @param string $divId 
		* @return string
		*/
		public function generateDrawBasic($divId) {
			
			$i = $this->getRandomNumber();
			$_functions = '
				function drawBasic_'.$divId.'() {
					var data_'.$i.' = google.visualization.arrayToDataTable('.$this->colunas.');';
   
			if($this->getColunasView()) {	   
				$_functions .= '
					var data_'.$i.' = new google.visualization.DataView(data_'.$i.');
					data_'.$i.'.setColumns('.$this->colunasView.');';
			}
				
			$_functions .=	'
					var options_'.$i.' = { '.$this->options.' };
					var chart_'.$i.' = new google.visualization.ColumnChart(document.getElementById("'.$divId.'"));
					chart_'.$i.'.draw(data_'.$i.', options_'.$i.');
			}';
			return $_functions;
		
		}
		
		/**
		 * @return null
		 */
		public function getColunas()
		{
			return $this->colunas;
		}

		/**
		 * @param null $colunas
		 */
		public function setColunas($colunas)
		{
			$this->colunas = $colunas;
		}

		/**
		 * @return null
		 */
		public function getColunasView()
		{
			return $this->colunasView;
		}

		/**
		 * @param null $colunas
		 */
		public function setColunasView($colunas)
		{
			$this->colunasView = $colunas;
		}

		/**
		 * @return null
		 */
		public function getOptions()
		{
			return $this->options;
		}

		/**
		 * @param null $options
		 */
		public function setOptions($options)
		{
			$this->options = $options;
		}
		
	}