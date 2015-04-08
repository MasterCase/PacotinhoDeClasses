(function ( $ ) {
	
	/**
	*	Plugin Jquery para selecionar multiplos checkboxs
	*   Graças a Jesus Cristo
	*	@author Gabriel A. Barbosa <tx.gabrielbarbosa@gmail.com>
	*	@version 1.0.0
	*/
    $.fn.checkAllBox = function( options ) {
		
		/**
		*	Settings Default
		*/
		var settings = $.extend({
			forceChecked: null,
			debug: false,
			eventChecked: function() {
					debugx("Event: eventChecked Iniciado..!");
			},
			eventUnChecked: function() { 
					debugx("Event: eventUnChecked Iniciado..!");
			}
		}, options);
		
		/**
		*	Function para escrever no console.log
		*/
		debugx = function(text) { 
			if(settings.debug) { 
				console.log(text);
			}
		}
		debugx("========= checkAllBox ========= init()");

		/**
		*	Verifica se existe algum checkbox selecionado
		*	Caso exista retorna: True
		*   Caso não exista retorna: False
		*/
		isChecked = function(obj) {
			var resultado = false;
			$(obj).each(function(){ 
				var temp = $(this).is(":checked");
				if(temp) { resultado = true; }
			});
			debugx("isChecked(): " + resultado);
			return resultado;
		};

		/**
		*	Seta valor de todos checkbox (True or False)
		*/
		setAllCheckBox = function (obj, valor) { 
			if(valor) { 
				$(obj).each(function(){ $(obj).attr("Checked", valor); });
			} else { 
				$(obj).each(function(){ $(obj).removeAttr("Checked"); });
			}
		}
		
		/**
		*	Init das operações
		*/
		if(settings.forceChecked != null) { 
			if(settings.forceChecked) { 
				setAllCheckBox(this, true);
				settings.eventChecked();
			} else { 
				setAllCheckBox(this, false);
				settings.eventUnChecked();
			}
		} else if(!isChecked(this)) { 
			setAllCheckBox(this, true);
			settings.eventChecked();
		} else { 
			setAllCheckBox(this, false);
			settings.eventUnChecked();
		}
	
	};

}( jQuery ));