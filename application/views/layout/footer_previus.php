</div>

<!--Agregar fianza-->            
<div class="dialog" data-role="dialog" id="add_fianza" data-width="550">
    <div class="dialog-title"><strong><center>NUEVA FIANZA</center></strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url() ?>all/fianzas_add" method="post">
            <div class="form-group">
                <label><strong>Fecha de emision</strong></label>
                <input data-role="datepicker" data-locale="es-MX" data-on-set="fecha_emision(0, arguments[1])" data-distance="1">
                <input type="hidden" id="fecha_emision0" name="fecha_emision0">
            </div>
            </p>
            <div class="row">
                
                <div class="cell-6"><div class="form-group">
                    <label><strong>Contrato</strong></label>
                    <input id="contrato" name="contrato" type="text" placeholder="Numero de contrato" required value="" />
                </div>
                </div>

                <div class="cell-6">
                <input type="hidden" id="tipo_fianza_0" name="tipo_fianza_0" value="">
                <?php echo GetFianzaTipoSelect("", 0, 0) ?>
                </div>
            </div> 
            </p>
            <input type="hidden" id="fiador_0" name="fiador_0" value="">
            <?php echo GetFiadoresSelect("", 0, 0) ?>
            </p>
            <div class="row">
                
                <div class="cell-6">
                <div class="form-group">
                        <label><strong>Monto factura $</strong></label>
                        <input id="monto_factura" name="monto_factura" type="text" placeholder="Monto de la factura" required value="" />
                    </div>
                </div>

                <div class="cell-6">
                <div class="form-group">
                    <label><strong>Folio factura</strong></label>
                    <input id="folio_factura" name="folio_factura" type="text" placeholder="Folio de la factura" required value="" />
                </div>
                </div>
            </div> 
            </p>
            <div class="row">
                
                <div class="cell-6">
                <div class="form-group">
                    <div class="form-group">
                        <label><strong>Folio fianza</strong></label>
                        <input id="folio_fianza" name="folio_fianza" type="text" placeholder="Folio de la fianza" required value="" />
                    </div>
                </div>
                </div>

                <div class="cell-6">
                    <div class="form-group">
                        <label><strong>Estatus</strong></label>
                        <input id="entrega" name="entrega" type="text" placeholder="Estatus" required value="" />
                    </div>
                </div>
            </div> 
            </p>
            <input type="hidden" id="afianzadora_0" name="afianzadora_0" value="">
            <?php echo GetAfianzadoraSelect("", 0, 0) ?>
            </p>
            
            <div class="form-group">
                <label><strong>Fecha de pago</strong></label>
                <input data-role="datepicker" data-value="" data-locale="es-MX" data-on-set="fecha_pago(0, arguments[1])" data-distance="1" style="z-index: 100">
                <input type="hidden" id="fecha_pago0" name="fecha_pago0">
            </div>
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER['REQUEST_URI']) ?>">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button warning"><span class="mif-pencil"></span> Actualizar</button>
        </form>
        <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
    </div>
</div>
</div>

<div class="dialog" data-role="dialog" id="search_fiador" data-on-open="document.getElementById('1search').focus();" data-width = "700" >
    <div class="dialog-title">Buscar Fiador: Razon social | Contacto</strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/fiadores_gestionar" method="get">
            <input type="text" id="1search" name="search" data-role="input" data-search-button="true" placeholder="Ingrese texto aqui ...">
    </div>
    <div class="dialog-actions">
        </form>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="search_fianza" data-on-open="document.getElementById('3search').focus();" data-width = "700" >
    <div class="dialog-title">Buscar Fianza:</strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/fianzas_gestionar" method="get">
            <input type="text" id="3search" name="search" data-role="input" data-search-button="true" placeholder="Ingrese texto aqui ..." >
    </div>
    <div class="dialog-actions">
        </form>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="search_afianzadora" data-on-open="document.getElementById('2search').focus();" data-width = "700" >
    <div class="dialog-title">Buscar Afianzadora: Nombre | Razon social</strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/afianzadoras" method="get">
            <input type="text" id="2search" name="search" data-role="input" data-search-button="true" placeholder="Ingrese texto aqui ...">
    </div>
    <div class="dialog-actions">
        </form>
        <button class="button js-dialog-close">Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="add_fiador">
    <div class="dialog-title"><strong><center>ALTA FIADOR</center></strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/fiadores_add" method="post">
            <div class="form-group">
                <label>Razon social</label>
                <input id="razon_social" name="razon_social" type="text" placeholder="Ingrese razon social"/ required>
            </div>

            <div class="form-group">
                <label>Contactos</label>
                <input id="contactos" name="contactos" type="text" placeholder="Contacto, Puede se mas de uno"/ required>
            </div>

            <div class="form-group">
                <label>Correo #1</label>
                <input id="correo1" name="correo1" type="email" placeholder="Correo electronico principal"/ required>
            </div>

            <div class="form-group">
                <label>Telefono</label>
                <input id="telefonos" name="telefonos" type="text" placeholder="Ingrese telefono, puede ser mas de uno"/>
            </div>

            <div class="form-group">
                <label>Correo #2</label>
                <input id="correo2" name="correo2" type="email" placeholder="Correo electronico secundario"/>
            </div>
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER['REQUEST_URI']);?>">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button info"><span class="mif-plus"></span> Agregar</button>
    </form>
    <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="add_afianzadora">
    <div class="dialog-title"><strong><center>ALTA AFIANZADORA</center></strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/afianzadoras_add" method="post">
        <div class="form-group">
            <label>Nombre</label>
            <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre" required />
        </div>

        <div class="form-group">
            <label>Razon social</label>
            <input id="razon_social" name="razon_social" type="text" placeholder="Razon social" required />
        </div>

        <div class="form-group">
            <label>Direccion fiscal</label>
            <input id="direccion" name="direccion" type="text" placeholder="Direccion fiscal" />
        </div>

        <div class="form-group">
            <label>Telefono</label>
            <input id="telefono" name="telefono" type="text" placeholder="Ingrese numero de telefono" />
        </div>

        <div class="form-group">
            <label>Email</label>
            <input id="email" name="email" type="email" placeholder="Correo electronico" />
        </div>
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER['REQUEST_URI']);?>">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button info"><span class="mif-plus"></span> Agregar</button>
    </form>
    <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
    </div>
</div>

<div class="dialog" data-role="dialog" id="add_afianzadora_tipo">
    <div class="dialog-title"><strong><center>NUEVO TIPO AFIANZADOR</center></strong></div>
    <div class="dialog-content">
        <form action="<?php echo base_url(); ?>all/afianzador_tipo_add" method="post">
            <div class="form-group">
                <label>Nombre</label>
                <input id="nombre" name="nombre" type="text" placeholder="Ingrese nombre de el tipo afianzador"/ required>
            </div>
            <input type="hidden" id="url" name="url" value="<?php echo UrlActual($_SERVER['REQUEST_URI']);?>">
    </div>
    <div class="dialog-actions">
        <button type="submit" class="button info"><span class="mif-plus"></span> Agregar</button>
    </form>
    <button class="button js-dialog-close"><span class="mif-cross"></span> Cerrar</button>
    </div>
</div>
  <footer class="container-fluid bg-grayWhite p-4">
    <div class="row">
        <div class="cell-md-6">
            <p>
              <span class="no-wrap">ONAPPAFA, A.C.</span>
                <br />
                <span class="no-wrap">Direccion temporal, 234 altos</span><br>
                <span class="no-wrap">Ciudad: Manizales. CP: 23700, Vercruz, mexico.</span><br>
                <span class="no-wrap"><a target="_blank" href="http://www.cyberchoapas.com"> © 2019 | CLTA DESARROLLO & DISTRIBUCION DE SOFTWARE</a>.</span>
            </p>
            <ul class="inline-list h-menu no-hover bg-grayWhite" style="margin-left: -.5rem">
                <li><a target="_blank" href="#">Quienes somos</a></li>
                <li><a target="_blank" href="#">Facebook</a></li>
                <li><a target="_blank" href="#">Mail</a></li>
            </ul>
        </div>
        <div class="cell-md-6">
            <!-- ads-html -->
        </div>
    </div>
</footer>
</div>
<script>
    function fecha_emision (id, fecha)
    {
        $("#fecha_emision".concat(id)).val(fecha);
    }

    function fecha_pago (id, fecha)
    {
        $("#fecha_pago".concat(id)).val(fecha);
    }

    function select_afianzadora (id, select)
    {
        $("#afianzadora_".concat(id)).val(select);
    }
    function select_fiador (id, select)
    {
        $("#fiador_".concat(id)).val(select);
    }
    function select_tipo_fianza (id, select)
    {
        $("#tipo_fianza_".concat(id)).val(select);
    }
</script>