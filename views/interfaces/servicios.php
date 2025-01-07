<?php
// Verifica si la sesión no ha sido iniciada antes de llamar session_start()
if (session_status() == PHP_SESSION_NONE) {
    session_start();
}
?>
<!DOCTYPE html>
<html>
<head>
    <meta charset="UTF-8">
    <title>Registro de estudiantes - Universidad Técnica de Ambato</title>
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/black/easyui.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/icon.css">
    <link rel="stylesheet" type="text/css" href="jquery-easyui-1.10.19/themes/color.css">
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.min.js"></script>
    <script type="text/javascript" src="jquery-easyui-1.10.19/jquery.easyui.min.js"></script>
</head>
<body>
    <h2>Estudiantes UTA</h2>

    <table id="dg" title="Estudiantes" class="easyui-datagrid" style="width:700px;height:250px"
            url="models/acceder.php"
            toolbar="#toolbar" pagination="true"
            rownumbers="true" fitColumns="true" singleSelect="true">
        <thead>
            <tr>
                <th field="estCedula" width="50">Cédula</th>
                <th field="estNombre" width="50">Nombre</th>
                <th field="estApellido" width="50">Apellido</th>
                <th field="estTelefono" width="50">Teléfono</th>
                <th field="estDireccion" width="50">Dirección</th>
            </tr>
        </thead>
    </table>

    <div id="toolbar">
        <?php if (isset($_SESSION['usuario'])) { ?>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="newUser()">Nuevo Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="editUser()">Editar Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="destroyUser()">Borrar Estudiante</a>
        <?php } else { ?>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-add" plain="true" onclick="alertLogin()">Nuevo Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-edit" plain="true" onclick="alertLogin()">Editar Estudiante</a>
            <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-remove" plain="true" onclick="alertLogin()">Borrar Estudiante</a>
        <?php } ?>
        <a href="reportes/reporte.php" class="easyui-linkbutton" iconCls="icon-ok" plain="true" target="_blank">Reporte</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-ok" plain="true" onclick="reporte()">Generar Reporte Específico</a>
        <a href="reportes/reporteireport.php" class="easyui-linkbutton" iconCls="icon-ok" plain="true" target="_blank">Ireport</a>
    </div>

    <div id="dlg" class="easyui-dialog" style="width:400px" data-options="closed:true,modal:true,border:'thin',buttons:'#dlg-buttons'">
        <form id="fm" method="post" novalidate style="margin:0;padding:20px 50px">
            <h3>Registro Estudiante</h3>
            <div style="margin-bottom:10px">
                <input id="idcedula" name="cedula" class="easyui-textbox" required="true" label="Cédula:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="nombre" class="easyui-textbox" required="true" label="Nombre:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="apellido" class="easyui-textbox" required="true" label="Apellido:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="telefono" class="easyui-textbox" required="true" label="Teléfono:" style="width:100%">
            </div>
            <div style="margin-bottom:10px">
                <input name="direccion" class="easyui-textbox" required="true" label="Dirección:" style="width:100%">
            </div>
        </form>
    </div>

    <div id="dlg-buttons">
        <a href="javascript:void(0)" class="easyui-linkbutton c6" iconCls="icon-ok" onclick="saveUser()" style="width:90px">Guardar</a>
        <a href="javascript:void(0)" class="easyui-linkbutton" iconCls="icon-cancel" onclick="javascript:$('#dlg').dialog('close')" style="width:90px">Cancelar</a>
    </div>

    <script type="text/javascript">
        var url;

        function alertLogin() {
            $.messager.alert('Acceso denegado', 'Debe iniciar sesión para realizar esta acción.', 'warning');
        }

        function newUser() {
            <?php if (!isset($_SESSION['usuario'])) { ?>
                alertLogin();
                return;
            <?php } ?>
            $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Nuevo Estudiante');
            $('#fm').form('clear');
            $('#idcedula').textbox('readonly', false);
            url = 'models/guardar.php';
        }

        function editUser() {
            <?php if (!isset($_SESSION['usuario'])) { ?>
                alertLogin();
                return;
            <?php } ?>
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $('#dlg').dialog('open').dialog('center').dialog('setTitle', 'Editar Estudiante');
                var formData = {
                    cedula: row.estCedula,
                    nombre: row.estNombre,
                    apellido: row.estApellido,
                    direccion: row.estDireccion,
                    telefono: row.estTelefono
                };
                $('#fm').form('load', formData);
                $('#idcedula').textbox('readonly', true);
                url = 'models/editar.php?cedula=' + row.estCedula;
            } else {
                $.messager.alert('Atención', 'Seleccione un estudiante para editar.', 'info');
            }
        }

        function destroyUser() {
            <?php if (!isset($_SESSION['usuario'])) { ?>
                alertLogin();
                return;
            <?php } ?>
            var row = $('#dg').datagrid('getSelected');
            if (row) {
                $.messager.confirm('Confirmar', '¿Está seguro de borrar este estudiante?', function(r) {
                    if (r) {
                        $.post('models/eliminar.php', { cedula: row.estCedula }, function(result) {
                            if (result.errorMsg) {
                                $.messager.show({
                                    title: 'Error',
                                    msg: result.errorMsg
                                });
                            } else {
                                $('#dg').datagrid('reload');
                            }
                        }, 'json');
                    }
                });
            } else {
                $.messager.alert('Atención', 'Seleccione un estudiante para borrar.', 'info');
            }
        }

        function saveUser() {
            $('#fm').form('submit', {
                url: url,
                onSubmit: function() {
                    return $(this).form('validate');
                },
                success: function(result) {
                    var resultData = JSON.parse(result);
                    if (resultData.errorMsg) {
                        $.messager.show({
                            title: 'Error',
                            msg: resultData.errorMsg
                        });
                    } else {
                        $('#dlg').dialog('close');
                        $('#dg').datagrid('reload');
                    }
                }
            });
        }
    </script>
</body>
</html>
