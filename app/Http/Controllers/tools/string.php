<?php

// solo sirve para laravel
function strings($name) {
    $string = array(
        'error_ajax' => 'Acceso Denegado',
        'error_cmd' => 'Tipo de cmd no valido',
        'success_notify' => 'Notificacion enviada exitosamente',
        'error_notify' => 'No se pudo enviar la notificacion',
        'error_empty' => 'No debe haber campos vacios',
        'error_option' => 'Hubo un error en los datos, verifiquelo',
        'error_anidado' => 'No puede eliminar datos relacionados',
        'verify_user' => 'El nombre de usuario no está disponible',
        'existing_code' => 'El codigo que trata de registrar ya existe',
        'error_method' => 'Tipo de metodo no reconocido',
        'success_login' => 'Los datos son correctos',
        'error_login' => 'El ususario o contraseña es incorrecta',
        'success_read' => 'Datos encontrados',
        'error_read' => 'No se encontraron datos',
        'success_create' => 'Los datos fueron registrados',
        'error_create' => 'Hubo un error al registrar los datos',
        'success_update' => 'Los datos fueron actualizados',
        'error_update' => 'Hubo un error al actualizar los datos',
        'success_delete' => 'Los datos fueron eliminados',
        'error_delete' => 'Hubo un error al eliminar los datos',
        'relative_data' => 'Es imposible eliminar, ya que tiene datos relacionados',
        'error_upload' => 'No se pudo guardar el archivo o imagen',
        'success_upload' => 'El archivo o imagen fue guardada',
        'error_upload_extension' => 'La extension del archivo no es valido',
        'success_color' => 'Se cambio de color existosamente',
        'error_color' => 'No se pudo realizar el cambio de color',
        'success_cambiodedato' => 'Preparando todo para realizar los cambios',
        'error_duplicate' => 'Los datos que intenta registrar, ya existe en el sistema'
    );

    return @$string[$name];
}