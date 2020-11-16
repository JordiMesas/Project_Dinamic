<?php
require_once '../model/participantes.php';
class ParticipantesDAO {
    private $pdo;

    public function __construct(){
        require_once '../services/connection.php';
        $this->pdo=$pdo;
    }

    public function inscripcion($participantes){

            try {            
                //Comienza la transacción
                $this->pdo->beginTransaction();               

                $sentencia1=$this->pdo->prepare("INSERT INTO `tbl_participantes` (`id_part`,`dni`, `nombre`, `primer_apellido`,`segundo_apellido`, `fecha_nacimiento`,`genero`,`email`) VALUES (NULL,?,?,?,?,?,?,?);");
               
                $sentencia1->bindValue(1,$participantes->getDni());
                $sentencia1->bindValue(2,$participantes->getNombre());
                $sentencia1->bindValue(3,$participantes->getPrimer_apellido());
                $sentencia1->bindValue(4,$participantes->getSegundo_apellido());
                $sentencia1->bindValue(5,$participantes->getFecha_nacimiento());                
                $sentencia1->bindValue(6,$participantes->getGenero());
                $sentencia1->bindValue(7,$participantes->getEmail());
               
                $sentencia1->execute();                                   
                   
                $sentencia2 = $this->pdo->prepare("INSERT INTO `tbl_competicion` (`id_comp`,`fecha_comp`) VALUES (NULL,CURRENT_DATE());");                                                         
               
                $sentencia2->execute();

                $maxIdTblPart = $this->pdo->query("SELECT MAX(`id_part`) AS max_id FROM `tbl_participantes`")->fetch();
                echo $maxIdTblPart[0];
                $data = $this->pdo->query("SELECT DATEDIFF(CURRENT_DATE(),`fecha_nacimiento`) / 365 AS años_part , `genero` FROM `tbl_participantes` WHERE `id_part` = {$maxIdTblPart[0]};")->fetch();
                
                switch ([$data[0] , $data[1]]) {
                    case [$data[0]>65, 'masculino']:
                         $nombre_cat = 'jubilados';
                        break;
                    case [$data[0]>65, 'femenino']:
                        $nombre_cat ='jubiladas';
                        break;
                    case [$data[0]< 18, 'masculino']:
                        $nombre_cat ='Niños';
                        break;                           
                    case [$data[0]< 18, 'femenino']:
                        $nombre_cat ='Niñas';
                        break;                      
                    case [$data[0]> 40 && $data[0]< 65, 'masculino']:
                        $nombre_cat ='Adultos';
                        break;     
                    case [$data[0]> 40 && $data[0]< 65, 'femenino']:
                        $nombre_cat ='Adultas';
                        break;     
                    case [$data[0]> 18 && $data[0]< 40, 'masculino']:
                        $nombre_cat ='jovenes-hombres';
                        break;     
                    case [$data[0]> 18 && $data[0]< 40, 'femenino']:
                        $nombre_cat ='jovenes-chicas';
                        break;     
                  
                }
                
                //https://www.w3schools.com/sql/sql_case.asp  --->      hacer mañana sentencia para poner nombre categoria!!!
                $sentencia3 = $this->pdo->prepare("INSERT INTO `categoria` (`id_cat`,`nombre_categoria`) VALUES (NULL, ?);");                                                         
                
                $sentencia3->bindParam(1,$nombre_cat);
                $sentencia3->execute(); 

                echo $this->pdo->lastInsertId();
                if($this->pdo->lastInsertId() == 1){

                    $sentencia4 = $this->pdo->prepare("INSERT INTO `inscripcion` ( `id_dorsal`,`id_comp`,`id_part`,`pagado`,`id_cat`) VALUES (NULL,?,?,?,?);");
                    echo $nombre_cat;
                    //lastInsertId()-->camprueba el ultimo id
                    // $this->pdo->lastInsertId();
                    $sentencia4->bindValue(1,$this->pdo->lastInsertId());
                    $sentencia4->bindValue(2,$this->pdo->lastInsertId());
                    $sentencia4->bindValue(3,'1');
                    $sentencia4->bindValue(4,$this->pdo->lastInsertId());                

                }else{

                    $data1 = $this->pdo->query("SELECT id_comp  FROM `tbl_competicion` ORDER BY id_comp DESC;")->fetch();
                    $data2 = $this->pdo->query("SELECT id_part  FROM `tbl_participantes` ORDER BY id_part DESC;")->fetch();
                    $data3 = $this->pdo->query("SELECT id_cat  FROM `categoria` ORDER BY id_cat DESC;")->fetch();

                    $sentencia4 = $this->pdo->prepare("INSERT INTO `inscripcion` ( `id_dorsal`,`id_comp`,`id_part`,`pagado`,`id_cat`) VALUES (NULL,{$data1[0]},{$data2[0]},'1',{$data3[0]});");

                }              
                $sentencia4->execute();
                $this->pdo->commit();
            } catch (Exception $ex) {
                /* Reconocer un error y revertir los cambios */
                $this->pdo->rollback();
                return $ex->getMessage();
               
            }            
        
    }

}


?>