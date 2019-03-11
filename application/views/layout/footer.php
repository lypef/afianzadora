<!--Script metro
    <script src="../../../metro/js/jquery-3.3.1.min.js"></script>
-->
<script src="../../../metro/js/jquery-1.9.1.min.js"></script>

<script src="../../../metro/js/metro.js"></script>

	<script>
        function getUrlVars() {
      		var vars = {};
      		var parts = window.location.href.replace(/[?&]+([^=&]+)=([^&]*)/gi, function(m,key,value) {
      		vars[key] = value;
      		});
      		return vars;
      	}
      	
      	if (getUrlVars()["nosession"])
        {
            Metro.notify.create("Verifique nombre de usuario y contraseña", "<span class='mif-cross'></span> Error", {cls: "alert"});
        }

        if (getUrlVars()["yessession"])
        {
            Metro.notify.create("Sesión iniciada correctamente", "<span class='mif-checkmark'></span> Bienvenido", {cls: "info"});
        }

        if (getUrlVars()["bye"])
        {
            Metro.notify.create("Sesión cerrada correctamente", "Hasta pronto", {cls: "info"});
        }

        if (getUrlVars()["requiredsession"])
        {
            Metro.notify.create("Es necesario que inicie sesion", "<span class='mif-checkmark'></span> Requerido", {cls: "warning"});
        }

        if (getUrlVars()["fiadoraddtrue"])
        {
            Metro.notify.create("Fiador agregado con exito", "<span class='mif-checkmark'></span> CORRECTO", {cls: "success"});
        }

        if (getUrlVars()["fiadoraddfalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> INCORRECTO", {cls: "alert"});
        }

        if (getUrlVars()["fiadoraupdatetrue"])
        {
            Metro.notify.create("Fiador actualizado con exito", "<span class='mif-checkmark'></span> CORRECTO", {cls: "success"});
        }

        if (getUrlVars()["fiadorupdatefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> INCORRECTO", {cls: "alert"});
        }

        if (getUrlVars()["fiadoradeletetrue"])
        {
            Metro.notify.create("Fiador eliminado con exito", "<span class='mif-checkmark'></span> CORRECTO", {cls: "success"});
        }

        if (getUrlVars()["fiadordeletefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> INCORRECTO", {cls: "alert"});
        }
        if (getUrlVars()["afiador_tipo_aupdatetrue"])
        {
            Metro.notify.create("Tipo afianza actualizado con exito", "<span class='mif-checkmark'></span> ACTUALIZADO", {cls: "success"});
        }

        if (getUrlVars()["afiador_tipo_aupdatefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> INCORRECTO", {cls: "alert"});
        }
        if (getUrlVars()["afiador_tipo_deletetrue"])
        {
            Metro.notify.create("Tipo afianza eliminado con exito", "<span class='mif-checkmark'></span> ELIMINADO", {cls: "success"});
        }

        if (getUrlVars()["afiador_tipo_deletefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> INCORRECTO", {cls: "alert"});
        }
        if (getUrlVars()["afianzadora_aupdatetrue"])
        {
            Metro.notify.create("Afianzadora actualizado con exito", "<span class='mif-checkmark'></span> ACTUALIZADO", {cls: "success"});
        }

        if (getUrlVars()["afianzadora_aupdatefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> NO ACTUALIZADO", {cls: "alert"});
        }
        if (getUrlVars()["afianzadora_deletetrue"])
        {
            Metro.notify.create("Afianzadora eliminado con exito", "<span class='mif-checkmark'></span> ELIMINADO", {cls: "success"});
        }

        if (getUrlVars()["afianzadora_deletefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> NO ELIMINADO", {cls: "alert"});
        }
        if (getUrlVars()["afianzadoraaddtrue"])
        {
            Metro.notify.create("Afianzadora agregada con exito", "<span class='mif-checkmark'></span> AGREGADO", {cls: "success"});
        }

        if (getUrlVars()["afianzadoraaddfalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> NO AGREGADO", {cls: "alert"});
        }
        if (getUrlVars()["fianza_deletetrue"])
        {
            Metro.notify.create("Fianza eliminada con exito", "<span class='mif-checkmark'></span> ELIMINADO", {cls: "success"});
        }

        if (getUrlVars()["fianza_deletefalse"])
        {
            Metro.notify.create("No es posible la operacion, intete otra vez.", "<span class='mif-checkmark'></span> NO AGREGADO", {cls: "alert"});
        }
    </script>

</body>
</html>
<script>
$(window).load(function() {
	$('#preloader').fadeOut('slow');
	$('body').css({'overflow':'visible'});
})
</script>