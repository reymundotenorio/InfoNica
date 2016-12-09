<?php

class crud
{
	private $db;
	
	function __construct($DB_con)
	{
		$this->db = $DB_con;
	}
	
	public function create($nombre, $apellido, $correo, $contrasena, $codigo, $rol, $estado)
	{
		try
		{
			$stmt = mysqli_prepare($this->db,"INSERT INTO Usuario (Nombre_Usuario, Apellido_Usuario, Correo_Usuario,
				Contrasena_Usuario, ID_Activacion_Usuario, Rol, Estado_Usuario) VALUES (?,?,?,?,?,?,?) ");

			mysqli_stmt_bind_param($stmt, 'sssssss', $nombre, $apellido, $correo, base64_encode($contrasena), $codigo, $rol, $estado);
			mysqli_stmt_execute($stmt);
			return true;
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
		
	}
	
	public function getID($id)
	{
		$stmt = mysqli_prepare($this->db,"SELECT * FROM Usuario WHERE ID_Usuario=? LIMIT 1");
		mysqli_stmt_bind_param($stmt, 'i', $id);
		mysqli_stmt_execute($stmt);
	//	$result = $stmt->get_result();
		mysqli_stmt_bind_result($stmt, $ID_Usuario, $Nombre_Usuario, $Apellido_Usuario, $Correo_Usuario, $Contrasena_Usuario,
			$Fecha_Registro, $ID_Activacion_Usuario, $Rol, $Foto_Usuario, $Estado_Usuario);

		 while (mysqli_stmt_fetch($stmt)) {
      //  printf("%s %s\n", $col1, $col2);
    

		$editRow = array(
			'ID_Usuario'  => $ID_Usuario,
			'Nombre_Usuario'  => $Nombre_Usuario,
			'Apellido_Usuario' => $Apellido_Usuario,
			'Correo_Usuario' => $Correo_Usuario,
			'Contrasena_Usuario' => $Contrasena_Usuario,
			'Fecha_Registro' => $Fecha_Registro,
			'ID_Activacion_Usuario' => $ID_Activacion_Usuario,
			'Rol' => $Rol,
			'Foto_Usuario' => $Foto_Usuario,
			'Estado_Usuario' => $Estado_Usuario
			);
	}


//		$editRow = $result->fetch_array(MYSQLI_BOTH);
		return $editRow;
	}
	
	public function update($id,$nombre, $apellido, $correo, $contrasena, $rol)
	{
		try
		{
			$stmt = mysqli_prepare($this->db,"UPDATE Usuario SET Nombre_Usuario = ?, Apellido_Usuario = ?, Correo_Usuario = ?,
				Contrasena_Usuario = ?, Rol = ?  WHERE ID_Usuario = ?");

			$contrasena64 = base64_encode($contrasena);
			mysqli_stmt_bind_param($stmt, 'sssssi', $nombre, $apellido, $correo, $contrasena64, $rol, $id);
			mysqli_stmt_execute($stmt);

			
			return true;	
		}
		catch(PDOException $e)
		{
			echo $e->getMessage();	
			return false;
		}
	}
	
	public function delete($id)
	{	$estado = 'Inactivo';
	$stmt = mysqli_prepare($this->db,"UPDATE Usuario SET Estado_Usuario=? WHERE ID_Usuario=?");
	mysqli_stmt_bind_param($stmt, 'si', $estado, $id);
	mysqli_stmt_execute($stmt);
	
	return true;
}

public function active($id)
{	$estado = 'Activo';
$stmt = mysqli_prepare($this->db,"UPDATE Usuario SET Estado_Usuario=? WHERE ID_Usuario=?");
mysqli_stmt_bind_param($stmt, 'si', $estado, $id);
mysqli_stmt_execute($stmt);

return true;
}

/* paging */

public function dataview($query)
{
		//$stmt = $this->db->prepare($query);
	$stmt = mysqli_query($this->db, $query);
		//$stmt->execute();
	
	if($stmt->num_rows>0)
	{
		while($row=mysqli_fetch_array($stmt,MYSQLI_BOTH))
		{
			?>

			<?php if($row['Estado_Usuario'] == 'Inactivo'){ ?>
			<tr class="danger">
				<?php 
			}
			else{ ?>
			<tr class="success">
				<?php } ?>



				<td data-title="No."><?php print($row['ID_Usuario']); ?></td>
				<td data-title="Fotografía"> <img id="ingresar-img" src=<?php echo($row['Foto_Usuario']); ?> class="pics" alt="iniciar" height="48px" width="48px"></td>
				<td data-title="Nombre"><?php print($row['Nombre_Usuario']); ?></td>
				<td data-title="Apellido"><?php print($row['Apellido_Usuario']); ?></td>
				<td data-title="Correo"><?php print($row['Correo_Usuario']); ?></td>
				<td data-title="Contraseña"><?php print(base64_decode($row['Contrasena_Usuario'])); ?></td>
				<td data-title="Fecha registro"><?php print($row['Fecha_Registro']); ?></td>
				<td data-title="Codigo Activación"><?php print($row['ID_Activacion_Usuario']); ?></td>
				<td data-title="Rol"><?php print($row['Rol']); ?></td> 
				<td data-title="Estado"><?php print($row['Estado_Usuario']); ?></td>


				<td data-title="Modificar" align="center">
					<a data-toggle="tooltip" data-placement="top" title="Modificar" href="edit-data.php?edit_id=<?php print($row['ID_Usuario']); ?>"><i class="glyphicon glyphicon-edit"></i></a>
				</td>
				<td data-title="Activar/Desactivar" align="center">
					<a data-toggle="tooltip" title="Activar/Desactivar" href="delete.php?delete_id=<?php print($row['ID_Usuario']); ?>"><i class="glyphicon glyphicon-remove-circle"></i></a>
				</td>
			</tr>
			<?php
		}
	}
	else
	{
		?>
		<tr>
			<td>Sin Registros</td>
		</tr>
		<?php
	}

}

public function paging($query,$records_per_page)
{
	$starting_position=0;
	if(isset($_GET["page_no"]))
	{
		$starting_position=($_GET["page_no"]-1)*$records_per_page;
	}
	$query2=$query." limit $starting_position,$records_per_page";
	return $query2;
}

public function paginglink($query,$records_per_page)
{

	$self = $_SERVER['PHP_SELF'];

	$stmt = mysqli_query($this->db, $query);
		//$stmt->execute();

	$total_no_of_records = $stmt->num_rows;


	if($total_no_of_records > 0)
	{
		?><ul class="pagination"><?php
		$total_no_of_pages=ceil($total_no_of_records/$records_per_page);
		$current_page=1;
		if(isset($_GET["page_no"]))
		{
			$current_page=$_GET["page_no"];
		}
		if($current_page!=1)
		{
			$previous =$current_page-1;
			echo "<li><a href='".$self."?page_no=1'>Primero</a></li>";
			echo "<li><a href='".$self."?page_no=".$previous."'>Anterior</a></li>";
		}
		for($i=1;$i<=$total_no_of_pages;$i++)
		{
			if($i==$current_page)
			{
				echo "<li><a href='".$self."?page_no=".$i."' style='color:red;'>".$i."</a></li>";
			}
			else
			{
				echo "<li><a href='".$self."?page_no=".$i."'>".$i."</a></li>";
			}
		}
		if($current_page!=$total_no_of_pages)
		{
			$next=$current_page+1;
			echo "<li><a href='".$self."?page_no=".$next."'>Siguiente</a></li>";
			echo "<li><a href='".$self."?page_no=".$total_no_of_pages."'>Último</a></li>";
		}
		?></ul><?php
	}
}

/* paging */

}
