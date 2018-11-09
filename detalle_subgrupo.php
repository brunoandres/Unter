<?php
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "unter";
$conn = mysqli_connect($servername, $username, $password, $dbname) or die("Connection failed: " . mysqli_connect_error());

if(isset($_POST["employee_id"]))
 {
      $output = '';
      $query = "SELECT * from subgrupos WHERE id = '".$_POST["employee_id"]."'";
      $result = mysqli_query($conn, $query);
      $registros = mysqli_num_rows($result);
      $output .= "<br><br>
      <div>";
      while($row = mysqli_fetch_array($result))  {

        $cuerpo = $row["cuerpo"];
        $cuerpo_sin_html = preg_replace ('/]*>/', '', $cuerpo);
           $output .=
            '
                <tr>
                     <td><h6>Nombre Subgrupo: </h6>'.$row['nombre'].'</td><br>
                     <td><h6>Asunto Subgrupo: </h6>'.$row['asunto'].'</td><br>
                     <td><h5>Cuerpo de mail : </h5> </td><br>
                     <textarea id="summernote" name="cuerpoGrupo" readonly="readonly">'.$row['cuerpo'].'</textarea>

                </tr>
           ';
      }
      $output .= '</tbody>

      </div>
      ';


      echo $output;
      mysqli_close($conn);
}

?>
<script src="vistas/assets/js/summernote.js"></script>

<script>
$(document).ready(function() {
    $('#summernote').summernote();
});
</script>
<link href="vistas/assets/css/summernote.css" rel="stylesheet">
