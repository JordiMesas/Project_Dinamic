<?php
class Participantes{
    private $id_participantes;
    private $dni;
    private $nombre;
    private $primer_apellido;
    private $segundo_apellido;
    private $fecha_nacimiento;
    private $email;
    private $genero;

    public function __construct($dni,$nombre,$primer_apellido,$segundo_apellido,$fecha_nacimiento,$email,$genero){
       
        $this->dni=$dni;
        $this->nombre=$nombre;
        $this->primer_apellido=$primer_apellido;
        $this->segundo_apellido=$segundo_apellido;
        $this->fecha_nacimiento=$fecha_nacimiento;
        $this->email=$email;
        $this->genero=$genero;
    }

    /**
     * Get the value of id_participantes
     */ 
    public function getId_participantes()
    {
        return $this->id_participantes;
    }

    /**
     * Get the value of dni
     */ 
    public function getDni()
    {
        return $this->dni;
    }

    /**
     * Get the value of nombre
     */ 
    public function getNombre()
    {
        return $this->nombre;
    }

    /**
     * Get the value of primer_apellido
     */ 
    public function getPrimer_apellido()
    {
        return $this->primer_apellido;
    }

    /**
     * Get the value of segundo_apellido
     */ 
    public function getSegundo_apellido()
    {
        return $this->segundo_apellido;
    }

    /**
     * Get the value of fecha_nacimiento
     */ 
    public function getFecha_nacimiento()
    {
        return $this->fecha_nacimiento;
    }

    /**
     * Get the value of email
     */ 
    public function getEmail()
    {
        return $this->email;
    }

    /**
     * Set the value of id_participantes
     *
     * @return  self
     */ 
    public function setId_participantes($id_participantes)
    {
        $this->id_participantes = $id_participantes;

        return $this;
    }

    /**
     * Get the value of genero
     */ 
    public function getGenero()
    {
        return $this->genero;
    }
}
?>