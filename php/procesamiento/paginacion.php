<?php
session_start();
class Paginacion{

    private $con;
    public function __construct()
    {

         try {

            $this->con = new PDO('mysql:host=localhost;dbname=vinculacion', 'root', '123456');
            $this->con->exec("SET CHARACTER SET utf8");

        } catch (PDOException $e) {

            print "Error!: " . $e->getMessage();

            die();
        }

    }

     public function prepare($sql)
    {
        return $this->con->prepare($sql);

    }

    //obtenemos el número de posts totales
    public function get_all_posts($clasificacion){
         try {

            $sql = "SELECT COUNT(*) from publicacion_bancos 
            WHERE estado = 0 and fk_clasificacion_publicacion = '$clasificacion'";
            $query = $this->con->prepare($sql);
            $query->execute();

            //si es true
            if($query->rowCount() == 1)
            {

                 return $query->fetchColumn();

            }

        }catch(PDOException $e){

            print "Error!: " . $e->getMessage();

        }
    }


    //creamos los enlaces de nuestra paginación
    public function crea_links($clasificacion){

        //html para retornar
        $html = "";

        //página actual
        $actual_pag = $_SESSION["actual"];

        //limite por página
        $limit = $_SESSION["limit"];

        //total de enlaces que existen
        $totalPag = floor($this->get_all_posts($clasificacion)/$limit);

        //links delante y detrás que queremos mostrar
        $pagVisibles = 2;

        if($actual_pag <= $pagVisibles)
        {
            $primera_pag = 1;
        }else{
            $primera_pag = $actual_pag - $pagVisibles;
        }

        if($actual_pag + $pagVisibles <= $totalPag)
        {
            $ultima_pag = $actual_pag + $pagVisibles;
        }else{
            $ultima_pag = $totalPag;
        }
/*
        <nav aria-label="...">
            <ul class="pagination">
                <li class="page-item disabled">
                  <a class="page-link" href="#" tabindex="-1">Previous</a>
                </li>
                <li class="page-item">
                   <a class="page-link" href="#">1</a>
                </li>

                <li class="page-item active">
                  <a class="page-link" href="#">2 <span class="sr-only">(current)</span></a>
                </li>

                <li class="page-item">
                  <a class="page-link" href="#">3</a>
                  </li>

                <li class="page-item">
                  <a class="page-link" href="#">Next</a>
                </li>
            </ul>
        </nav>
*/
        $html .= '<nav>';
        $html .= '<ul class="pagination">';
        $html .= ($actual_pag > 1) ?
        '<li class="page-item"> <a href="#" class="page-link" onclick="paginate(0,'.$limit.')">Primera</a> </li>' :
        '<li class="page-item disabled"> <a href="#" class="page-link disabled">Primera</a> </li>';

        $html .= ($actual_pag > 1) ?
        '<li class="page-item"> <a href="#" class="page-link" onclick="paginate('.(($actual_pag-2)*$limit).','.$limit.')">Anterior</a> </li>' :
        '<li class="page-item disabled"> <a href="#" class="page-link disabled">Anterior</a> </li>';

        for($i=$primera_pag; $i<=$ultima_pag+1; $i++)
        {
            $z = $i;
            $html .= ($i == $actual_pag) ?
            '<li class="page-item active"> <a class="page-link disabled" href="#">'.$i.'</a> </li>' :
            '<li class="page-item"> <a class="page-link" href="#" onclick="paginate('.(($z-1)*$limit).','.$limit.')">'.$i.'</a> </li>';
        }

        $html .= ($actual_pag < $totalPag) ?
        '<li class="page-item"> <a href="#" class="page-link" onclick="paginate('.(($actual_pag)*$limit).','.$limit.')">Siguiente</a> </li>' :
        '<li class="page-item "> <a href="#" class="page-link disabled">Siguiente</a> </li>';
        $html .= ($actual_pag < $totalPag) ?
        '<li class="page-item"> <a href="#" class="page-link" onclick="paginate('.(($totalPag)*$limit).','.$limit.')">Última</a> </li>' :
        '<li class="page-item "> <a href="#" class="page-link disabled">Última</a> </li>';
        $html .= '</ul>';
        $html .= '</nav>';
        

        return $html;

    }


    public function get_posts($offset = 0, $limit = 10,$clasificacion){
        if($offset == 0){
            $_SESSION["actual"] = 1;
        }else{
            $_SESSION["actual"] = ($offset+$limit)/$limit;
        }
        $_SESSION["limit"] = $limit;
        try {

            $sql = "SELECT id_publicacion_bancos,titulo,descripcion,fecha FROM publicacion_bancos
            WHERE estado = 0 and fk_clasificacion_publicacion = '$clasificacion' LIMIT ?,?";
            $query = $this->con->prepare($sql);
            $query->bindValue(1, (int) $offset, PDO::PARAM_INT);
            $query->bindValue(2, (int) $limit, PDO::PARAM_INT);
            $query->execute();

            //si existe el usuario
            if($query->rowCount() > 0)
            {

                 return $query->fetchAll();

            }

        }catch(PDOException $e){

            print "Error!: " . $e->getMessage();

        }

    }

    public function get_postsBuscador($offset = 0, $limit = 10,$valor,$clasificacion){
        if($offset == 0){
            $_SESSION["actual"] = 1;
        }else{
            $_SESSION["actual"] = ($offset+$limit)/$limit;
        }
        $_SESSION["limit"] = $limit;
        try {

            $sql = "SELECT id_publicacion_bancos,titulo,descripcion,fecha FROM publicacion_bancos 
            WHERE estado = 0 and fk_clasificacion_publicacion = '$clasificacion' and
             titulo LIKE '%".$valor."%'  OR 
            descripcion LIKE '%".$valor."%'  OR 
            fecha LIKE '%".$valor."%'  
            LIMIT ?,?";
            $query = $this->con->prepare($sql);
            $query->bindValue(1, (int) $offset, PDO::PARAM_INT);
            $query->bindValue(2, (int) $limit, PDO::PARAM_INT);
            $query->execute();

            //si existe el usuario
            if($query->rowCount() > 0){

                 return $query->fetchAll();

            }

        }catch(PDOException $e){

            print "Error!: " . $e->getMessage();

        }

    }

}