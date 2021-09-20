<script type="text/javascript">
    $("#btnguardar").click(function(){
      nombre      = document.getElementById("txtnombre").value;
      referencia  = document.getElementById("txtreferencia").value;
      precio      = document.getElementById("txtprecio").value;
      peso        = document.getElementById("txtpeso").value;
      categoria   = document.getElementById("txtcategoria").value;
      stock       = document.getElementById("txtstock").value;

    $.ajax({
        async: true,
        type: "POST",
        data: { "nombre":nombre, "referencia":referencia, "precio":precio, "peso":peso, "categoria":categoria, "stock":stock },
        url: "<?=base_url()?>index.php/Productos/Registro",
        success: function (data1) {
        if (data1==1) {
                    toastr.success("Producto guardado con éxito.");
                    $("#modalRegistro").modal("hide"); $("#TblProductos").DataTable().ajax.reload(null,false);
                    document.getElementById("txtnombre").value      = "";
                    document.getElementById("txtreferencia").value  = "";
                    document.getElementById("txtprecio").value      = "";
                    document.getElementById("txtpeso").value        = "";
                    document.getElementById("txtcategoria").value   = "";
                    document.getElementById("txtstock").value       = "";
                }else{ toastr.error(data1); }          
              }
          });
});
</script>
<script type="text/javascript">
  $('#modalRegistro').on('shown.bs.modal', function () {
    $('#txtnombre').focus();
})
</script>
<script type="text/javascript">
    $("#btnactualizar").click(function(){
      codproducto = document.getElementById("txtcodproducto").value;
      nombre      = document.getElementById("txtnomupdate").value;
      referencia  = document.getElementById("txtrefupdate").value;
      precio      = document.getElementById("txtprecioupdate").value;
      peso        = document.getElementById("txtpesoupdate").value;
      categoria   = document.getElementById("txtcatupdate").value;
      stock       = document.getElementById("txtstockupdate").value;

    $.ajax({
        async: true,
        type: "POST",
        data: { "codproducto":codproducto, "nombre":nombre, "referencia":referencia, "precio":precio, "peso":peso, "categoria":categoria, "stock":stock },
        url: "<?=base_url()?>index.php/Productos/Actualizar",
        success: function (data1) {
        if (data1==1) {
                    toastr.success("Producto actualizado con éxito.");
                    $("#modalEditar").modal("hide"); $("#TblProductos").DataTable().ajax.reload(null,false);
                }else{ toastr.error(data1); }          
              }
          });
});
</script>