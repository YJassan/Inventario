<?php
defined('BASEPATH') OR exit('No direct script access allowed');
?>
<!DOCTYPE html>
<html>
<head>
  <title>Productos</title>
  <meta charset="utf-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <script src="https://code.jquery.com/jquery-3.6.0.min.js" integrity="sha256-/xUj+3OJU5yExlq6GSYGSHk7tPXikynS7ogEvDej/m4=" crossorigin="anonymous"></script>
  <link rel="stylesheet" href="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/css/bootstrap.min.css" integrity="sha384-Gn5384xqQ1aoWXA+058RXPxPg6fy4IWvTNh0E263XmFcJlSAwiGgFAW/dAiS6JXm" crossorigin="anonymous">
  <link rel="stylesheet" href="<?=base_url()?>plugins/css/style.css">
  <link rel="stylesheet" href="https://use.fontawesome.com/releases/v5.8.1/css/all.css" integrity="sha384-50oBUHEmvpQ+1lW4y57PTFmhCaXp0ML5d60M1M7uH2+nqUivzIebhndOJK28anvf" crossorigin="anonymous">

  <!-- DataTables -->
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables-bs4/css/dataTables.bootstrap4.min.css">
  <link rel="stylesheet" href="<?=base_url()?>plugins/datatables-responsive/css/responsive.bootstrap4.min.css">
  <!-- toastr -->
  <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet"/>
  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css">
</head>
<body class="hold-transition sidebar-mini">

<div class="wrapper">
  <!-- Content Wrapper. Contains page content -->
  <div class="content-wrapper">    
    <!-- /.content-header -->
  <!-- Main content -->
    <section class="content">
      <div class="row">
        <div class="col-12">
          <div class="card">
            <h3>Inventario Productos</h3>
            <div class="card-body">
              <button class="btn btn-success" data-toggle="modal" data-target="#modalRegistro"><i class="fas fa-plus"></i> Nuevo Producto</button>
            </div>          
            <div class="card-header">
            </div>            
            <!-- /.card-header -->
            <div class="card-body">
            <table id="TblProductos" class="table table-bordered table-hover table-condensed">                
                <thead>
                <tr style="font-weight: bold;">
                  <td>CodProducto</td>
                  <td>NombreProducto</td>
                  <td>Referencia</td>
                  <td>Precio</td>
                  <td>Peso</td>
                  <td>Categoria</td>
                  <td>Stock</td>
                  <td>FechaCreacion</td>
                  <td>FechaUltimaVenta</td>
                  <td data-priority="1">Acciones</td>
                </tr>
                </thead>
              </table>
            </div>
            <!-- /.card-body -->
          </div>
          <!-- /.card -->
        </div>
        <!-- /.col -->
      </div>
      <!-- /.row -->
    </section>
    <!-- /.content -->
  </div>
</div>

<div class="modal fade" id="modalRegistro" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Registrar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <label>Nombre Producto</label>
        <input type="text" name="txtnombre" id="txtnombre" class="form-control input-sm" autofocus>
        <label>Referencia</label>
        <input type="text" name="txtreferencia" id="txtreferencia" class="form-control input-sm">
        <label>Precio</label>
        <input type="text" name="txtprecio" id="txtprecio" class="form-control input-sm">
        <label>Peso</label>
        <input type="text" name="txtpeso" id="txtpeso" class="form-control input-sm">
        <label>Categoría</label>
        <input type="text" name="txtcategoria" id="txtcategoria" class="form-control input-sm">
        <label>Stock</label>
        <input type="text" name="txtstock" id="txtstock" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnguardar">Guardar</button>
      </div>
    </div>
  </div>
</div>

<div class="modal fade" id="modalEditar" tabindex="-1" role="dialog" aria-labelledby="myModalLabel">
  <div class="modal-dialog modal-sm" role="document">
    <div class="modal-content">
      <div class="modal-header">
        <h4 class="modal-title" id="myModalLabel">Actualizar Producto</h4>
        <button type="button" class="close" data-dismiss="modal" aria-label="Close"><span aria-hidden="true">&times;</span></button>
      </div>
      <div class="modal-body">
        <label>Código Producto</label>
        <input type="text" name="txtcodproducto" id="txtcodproducto" class="form-control input-sm" readonly>      
        <label>Nombre Producto</label>
        <input type="text" name="txtnomupdate" id="txtnomupdate" class="form-control input-sm">
        <label>Referencia</label>
        <input type="text" name="txtrefupdate" id="txtrefupdate" class="form-control input-sm">
        <label>Precio</label>
        <input type="text" name="txtprecioupdate" id="txtprecioupdate" class="form-control input-sm">
        <label>Peso</label>
        <input type="text" name="txtpesoupdate" id="txtpesoupdate" class="form-control input-sm">
        <label>Categoría</label>
        <input type="text" name="txtcatupdate" id="txtcatupdate" class="form-control input-sm">
        <label>Stock</label>
        <input type="text" name="txtstockupdate" id="txtstockupdate" class="form-control input-sm">
      </div>
      <div class="modal-footer">
        <button type="button" class="btn btn-primary" id="btnactualizar">Actualizar</button>
      </div>
    </div>
  </div>
</div>

<script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/js/toastr.min.js" integrity="sha512-VEd+nq25CkR676O+pLBnDW09R7VQX9Mdiij052gVCp5yVH3jGtH70Ho/UUv4mJDsEdTvqRCFZg0NKGiojGnUCw==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<!-- DataTables -->
<script src="<?=base_url()?>plugins/datatables/jquery.dataTables.min.js"></script>
<script src="<?=base_url()?>plugins/datatables-bs4/js/dataTables.bootstrap4.min.js"></script>
<script src="<?=base_url()?>plugins/datatables-responsive/js/dataTables.responsive.min.js"></script>
<script src="<?=base_url()?>plugins/datatables-responsive/js/responsive.bootstrap4.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.0.0/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
<?php include("application/views/FuncionesJs/FuncionesGenerales.php"); ?>

<script>
$(document).ready(function() {
    var table = $('#TblProductos').DataTable({
      "destroy"       : true,
      "paging"        : true,
      "lengthChange"  : true,
      "searching"     : true,
      "ordering"      : true,
      "info"          : true,
      "autoWidth": false,
      "responsive": true,
      "scrollCollapse": true,
      "stateSave"     : true,
      "language":
      {
      "lengthMenu": "filas por pagina _MENU_ registros por página",
      "zeroRecords": "No hay datos - lo sentimos",
      "info": "Mostrando página _PAGE_ de _PAGES_",
      "infoEmpty": "No hay registros disponibles",
      "infoFiltered": "(filtrado de _MAX_ registros totales)",
      "search":"Buscar",
      "paginate": {
      "first": "Primero",
      "last": "Ultimo",
      "next": "Siguiente",
      "previous": "Anterior"
      },      
      },
        "ajax": "<?=base_url()?>index.php/Productos/ListarProductos",
        "columns": [
            { "data": "codproducto" },
            { "data": "nombreproducto" },
            { "data": "referencia" },
            { "data": "precio" },
            { "data": "peso" },
            { "data": "categoria" },
            { "data": "stock" },
            { "data": "fechacreacion" },
            { "data": "fechaultimaventa" },
            { "defaultContent": `<button type='button' class='editar btn btn-primary' data-toggle='modal' data-target='#modalEditar' title="Actualizar">
                <i class='fas fa-edit'></i></button> <button type='button' class='eliminar btn btn-danger' title="Eliminar">
                <i class='fas fa-trash-alt'></i></button> 
                <button type='button' class='venta btn btn-info' title="Venta Producto"><i class='fas fa-check'></i></button>`}
                     
        ]
    });   


  let datos = "";
  $(document).on("click",".editar",function()
  {
      datos = table.row($(this).parents()).data();

      $("#txtcodproducto").val(datos.codproducto);
      $("#txtnomupdate").val(datos.nombreproducto);
      $("#txtrefupdate").val(datos.referencia);
      $("#txtprecioupdate").val(datos.precio);
      $("#txtpesoupdate").val(datos.peso);
      $("#txtcatupdate").val(datos.categoria);
      $("#txtstockupdate").val(datos.stock);
      $(".modal-header").css("background-color","#F5F5F5");
  });

  $(document).on("click",".eliminar",function()
    {
        datos = table.row($(this).parents()).data();
        let codproducto = datos.codproducto;
            nombreproducto = datos.nombreproducto;
        var respuesta = confirm("¿Esta seguro de eliminar el producto "+codproducto+"->"+nombreproducto+"");
        if (respuesta){
            $.ajax({
                async: true,
                type: "POST",
                data: { "codproducto":datos.codproducto },
                url: "<?=base_url()?>index.php/Productos/Eliminar",
                success: function (data1) {
                if (data1==1) {
                            toastr.success("Producto Eliminado con éxito.");
                            $("#modalEditar").modal("hide"); $("#TblProductos").DataTable().ajax.reload(null,false);
                        }else{ toastr.error(data1); }          
                      }
                  });     
        }
    });

  $(document).on("click",".venta",function()
    {
        datos = table.row($(this).parents()).data();
        let codproducto = datos.codproducto;
            nombreproducto = datos.nombreproducto;
        var respuesta = confirm("¿Esta seguro de realizar una venta del producto "+codproducto+"->"+nombreproducto+"");
        if (respuesta){
            $.ajax({
                async: true,
                type: "POST",
                data: { "codproducto":datos.codproducto },
                url: "<?=base_url()?>index.php/Productos/Venta",
                success: function (data1) {
                if (data1==1) {
                            toastr.success("Producto vendido con éxito.");
                            $("#modalEditar").modal("hide"); $("#TblProductos").DataTable().ajax.reload(null,false);
                        }else{ toastr.error(data1); }          
                      }
                  });         
        }
    });    
});  
</script>

 </body>
</html>