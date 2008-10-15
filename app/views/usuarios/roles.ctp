<?php

/**
* Creo el cuerpo de la tabla.
*/
$cuerpo = null;
foreach ($this->data['Rol'] as $k=>$v) {
	$fila = null;
	$id = $v['id'];
	
	//$fila[] = array("tipo"=>"desglose", "id"=>$id, "update"=>"desglose_1", "imagen"=>array("nombre"=>"usuarios.gif", "alt"=>"Usuarios"), "url"=>'../grupos/usuarios');
	//$fila[] = array("tipo"=>"desglose", "id"=>$id, "update"=>"desglose_2", "imagen"=>array("nombre"=>"menus.gif", "alt"=>"Menus"), "url"=>'../grupos/menus');
	//$fila[] = array("tipo"=>"desglose", "id"=>$id, "update"=>"desglose_3", "imagen"=>array("nombre"=>"parametros.gif", "alt"=>"Parametros"), "url"=>'../grupos/parametros');
	$fila[] = array("model"=>"RolesUsuario", "field"=>"id", "valor"=>$v['RolesUsuario']['id'], "write"=>$v['RolesUsuario']['write'], "delete"=>$v['RolesUsuario']['delete']);
	$fila[] = array("model"=>"Rol", "field"=>"nombre", "valor"=>$v['nombre']);
	$fila[] = array("model"=>"RolesUsuario", "field"=>"estado", "valor"=>$v['RolesUsuario']['estado']);
	$cuerpo[] = $fila;
}

$url = array("controller"=>"roles_usuarios", "action"=>"add", "RolesUsuario.usuario_id"=>$this->data['Usuario']['id']);
echo $this->renderElement("desgloses/agregar", array("url"=>$url, "titulo"=>"Roles", "cuerpo"=>$cuerpo));

?>