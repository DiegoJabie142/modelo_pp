<?php

class Usuario{

	public int $id;
	public string $nombre;
	public string $correo;
    public string $clave;
    public int $id_perfil;
    public string $perfil;

    public function __construct(string $nombre, string $correo, string $clave)
    {
        $this->nombre = $nombre;
        $this->correo = $correo;
        $this->clave = $clave;
    }

    public function ToJSON():string{
        $obj = array();
        $obj['nombre'] = $this->nombre;
        $obj['correo'] = $this->correo;
        $obj['clave'] = $this->clave;

        return json_encode($obj);
    }

    public function GuardarEnArchivo(){
        
        $retorno = array();
        $retorno["exito"] = false;
        $retorno["mensaje"] = "Fallo al agregar";

		$ar = fopen("archivos\usuarios.json", "a");
        $cant = fwrite($ar, $this->ToJson()."\r\n");

		if($cant > 0)
		{
			$retorno["exito"] = true;	
            $retorno["mensaje"] = "Se pudo agregar";		
		}

		fclose($ar);

		return json_encode($retorno);
    }

    public static function TraerTodosJSON(){
        
		$retorno = "";

		//ABRO EL ARCHIVO
		$ar = fopen("archivos\usuarios.json", "r");

        $usuarios = array();

		//LEO LINEA X LINEA DEL ARCHIVO 
		while(!feof($ar))
		{
			$linea = fgets($ar);
            $usuarioAr = json_decode($linea);
            if(isset($usuarioAr)){
                $usuario = new Usuario($usuarioAr->nombre, $usuarioAr->correo, $usuarioAr->clave);
                array_push($usuarios, $usuario);
            }
		}

		//CIERRO EL ARCHIVO
		fclose($ar);

		return $usuarios;
    }

    public function Agregar(){
        
    }

}
