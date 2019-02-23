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
            Metro.notify.create("Verifique nombre de usuario y contraseña", "Error", {cls: "alert"});
        }

        if (getUrlVars()["yessession"])
        {
            Metro.notify.create("Credencial correcta", "Bienvenido", {cls: "info"});
        }

        if (getUrlVars()["update_profile"])
        {
            Metro.notify.create("Informacion actualizada", "<span class='mif-checkmark'></span> Perfil actualizado.", {cls: "success"});
        }

        if (getUrlVars()["noupdate_profile"])
        {
            Metro.notify.create("No fue posible realizar alguna actualizacion", "<span class='mif-cross'></span> No se actualizo", {cls: "alert"});
        }
    </script>

</body>
</html>