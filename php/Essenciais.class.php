<?php 
		
	/** 
	* Classe com funções Essenciais
	* @author Gabriel A. Barbosa <tx.gabrielbarbosa@gmail.com> 
	* @version 0.1 
	*/ 
	
	class Essenciais {
		
		/** 
		* Função para configurar codificação da página
		* @access public 
		* @param string $tipo 
		* @return void
		*/ 
		public function setHeader($tipo) {
			switch ($tipo) {
				case "UTF-8":
					header('Content-type: text/html; charset=UTF-8');
				break;
				case "ISO":
					header('Content-type: text/html; charset=ISO-8859-1');
				break;
				default:
					echo "set_header: Tipo: '$tipo' não existe! Escolha: (UTF-8 ou ISO) ";
				break;
			}
		}
		
	}