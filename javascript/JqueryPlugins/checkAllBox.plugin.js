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
         *	Pega status do botão principal
        */
        var isChecked = $(this).prop("checked");
        debugx("this.prop(checked) =  " + isChecked);
        if(isChecked) {
            isChecked = true;
        } else {
            isChecked = false;
        }
        debugx("var isChecked = "+isChecked);


        /**
         *	Seta valor de todos checkbox (True or False)
         */
        setAllCheckBox = function (obj, valor) {
            debugx("function setAllCheckBox(this, " + valor + ");");
            if(valor) {
                $(obj).each(function(){ $(this).prop("checked", valor); });
            } else {
                $(obj).each(function(){  $(this).prop("checked", valor);  });
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
        } else if(isChecked) {
            setAllCheckBox(this, true);
            settings.eventChecked();
        } else {
            setAllCheckBox(this, false);
            settings.eventUnChecked();
        }

    };

}( jQuery ));