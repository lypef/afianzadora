<script src="../../../metro/js/jquery-3.3.1.min.js"></script>
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
    </script>

</body>
</html>