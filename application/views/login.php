<body class="h-vh-100 bg-brandColor2">
    <style>
    .login-form {
        width: 350px;
        height: auto;
        top: 50%;
        margin-top: -160px;
    }
</style>

    <div id="resultado"></div>

    <form class="login-form bg-white p-6 mx-auto border bd-default win-shadow" 
            action="<?php echo base_url(); ?>all/index" 
            method="POST"
            data-role="validator"
            action="javascript:"
            data-clear-invalid="2000"
            data-on-error-form="invalidForm"
            data-on-validate-form="validateForm">
        <span class="mif-vpn-lock mif-4x place-right" style="margin-top: -10px;"></span>
        <h2 class="text-light">Iniciar</h2>
        <hr class="thin mt-4 mb-4 bg-white">
        <div class="form-group">
            <input type="text" id="username" name="username" data-role="input" data-prepend="<span class='mif-envelop'>" placeholder="Usuario" data-validate="required">
        </div>
        <div class="form-group">
            <input type="password" id="password" name="password" data-role="input" data-prepend="<span class='mif-key'>" placeholder="Contraseña" data-validate="required">
        </div>
        <div class="form-group mt-10">
            <button class="button" onclick="Validar(document.getElementById('username').value, document.getElementById('password').value);">Iniciar</button>
        </div>
    </form>

    <script>
        function Validar(username, password)
        {
            $.ajax({
                url: "func/login.php",
                type: "POST",
                data: "username="+username+"&password="+password,
                success: function(resp){
                    $('#resultado').html(resp)
                }
            });
        }

        function invalidForm(){
            var form  = $(this);
            form.addClass("ani-ring");
            setTimeout(function(){
                form.removeClass("ani-ring");
            }, 1000);
        }

        function validateForm(){
            $(".login-form").animate({
                opacity: 0
            });
        }
    </script>