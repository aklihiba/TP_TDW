<?php
    ob_start();
    //glaubal variables
    
   $cultureidtab = array();
   $animalidtab = array();
    $newanimal= '';
    $newnombre="";
    $newculture="";
    $newprod="";
    $newsup="";
    #pour creer une ligne dans le tableau culture
    class RowCulture {
        public $id;
        public $nom;
        public $superficie;
        public $production;

        function __construct($row){
            $this->id = $row['Id_culture'];
            $this->nom = $row['Nom_culture'];
            $this->superficie = $row['Superficie'];
            $this->production = $row['Production'];

            echo "<tr>";
            /*
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" style="width:2cm;" value="' . htmlspecialchars($this->id) . '" >
            </td>'; */
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"  name="culture' . htmlspecialchars($this->id) . '"  style="width:4cm;" value="' . htmlspecialchars($this->nom) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"   name="super' . htmlspecialchars($this->id) . '" style="width:3cm;" value="' . htmlspecialchars($this->superficie) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"  name="prod' . htmlspecialchars($this->id) . '"   style="width:3cm;" value="' . htmlspecialchars($this->production) . '" >
            </td>';

            echo '<td><input type="submit" name="changeculture' . htmlspecialchars($this->id) . '"  value="change" class="btn btn-secondary"></td>';
            echo '<td><input type="submit" name="deleteculture' . htmlspecialchars($this->id) . '"  value="delete" class="btn btn-secondary"></td>';
            echo "</tr>" . "\n";
        }
        
    }
    # pour creer une ligne dans le tableau des animaux
    class RowAnimal {
        public $id;
        public $animal;
        public $nombre;
       

        function __construct($row){
            $this->id = $row['Id_elevage'];
            $this->nom = $row['Nom_animal'];
            $this->nombre= $row['Nombre_tete'];
           

            echo "<tr>";
           /* echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" style="width:2cm;" value="' . htmlspecialchars($this->id) . '" >
            </td>'; */
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" name="animal' . htmlspecialchars($this->id) . '" style="width:4cm;" value="' . htmlspecialchars($this->nom) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" name="nombre' . htmlspecialchars($this->id) . '" style="width:3cm;" value="' . htmlspecialchars($this->nombre) . '" >
            </td>';
        
            echo '<td><input type="submit" name="changeanimal' . htmlspecialchars($this->id) . '" value="change" class="btn btn-secondary"></td>';
            echo '<td><input type="submit" name="deleteanimal' . htmlspecialchars($this->id) . '" value="delete" class="btn btn-secondary"></td>';
            echo "</tr>" . "\n";
        }
    }
# donnee d'acces a la bdd 
$servername = "localhost";
$username = "root";
$password = "";

try {
    #connection 
    $conn = new PDO("mysql:host=$servername;dbname=tdw", $username, $password);
    $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
    $getculture = $conn->prepare("SELECT Id_culture, Nom_culture, Superficie, Production FROM culture ORDER BY Nom_culture");
    $getculture->execute();

    $getanimal= $conn->prepare("SELECT Id_elevage, Nom_animal, Nombre_tete FROM elevage ORDER BY Nom_animal");
    $getanimal->execute();
    // set the resulting array to associative
    $result = $getculture->setFetchMode(PDO::FETCH_ASSOC);
    $result = $getanimal->setFetchMode(PDO::FETCH_ASSOC);
}
catch(PDOException $e) {
    echo "Error: " . $e->getMessage();
}


?>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Admin</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        h1{
            margin: 20px;
        }
       
        .row{
            display: inline-table;
            max-width: min-content;
        }      
       .column{
          display: table-cell;
         padding-left:50px;
         padding-right:50px;
         padding-top:30px ;

       }
    
    </style>
</head>
<body>
    <h1>Produits</h1>
  <div class="row">
    <form method="post" action="<?php echo $_SERVER['PHP_SELF'];?>" >
        <div class="column">
              <h3>Principale productions végétales mondiales</h3>
        <?php
            echo "<table class='tableau'>";
            echo '<tr>
         
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Culture</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Superficie</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Production</th>
            </tr>';
          

            foreach ($getculture->fetchAll() as $row){
                $element = new RowCulture($row);
                $cultureidtab[] = $element->id;
                
            } 
            //add the last line to add the new element
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"  name="culture"  style="width:4cm;" value="' . htmlspecialchars($newculture) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"   name="super" style="width:3cm;" value="' . htmlspecialchars($newsup) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control"  name="prod"   style="width:3cm;" value="' . htmlspecialchars($newprod) . '" >
            </td>';

            echo '<td><input type="submit" name="addculture"  value="add"  class="btn btn-secondary"></td>';
            echo "</tr>" . "\n";
            echo "</table>";
?>
        </div>
        <div class="column">
            <h3>Principaux élevages mondiaux</h3>
        <?php echo "<table class='tableau'>";
            echo '<tr>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Animal</th>
            <th class="text-center text-uppercase text-secondary text-xxs font-weight-bolder opacity-7">Nombre</th>
            </tr>';
            foreach ($getanimal->fetchAll() as $row){
                $element = new RowAnimal($row);
                $animalidtab[]= $element->id;
            } 
            
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" name="animal" style="width:4cm;" value="' . htmlspecialchars($newanimal) . '" >
            </td>';
            echo' <td class="align-middle text-center text-sm">
            <input type="text" class="form-control" name="nombre" style="width:3cm;" value="' . htmlspecialchars($newnombre) . '" >
            </td>';
        
            echo '<td><input type="submit" name="addanimal" value="add"  class="btn btn-secondary"></td>';
           
            echo "</tr>" . "\n";

            echo "</table>";
?>
        </div>
        </form>
    </div>

</body>
</html>




<?php
//forms post :any modification to the db
if ($_SERVER["REQUEST_METHOD"]=="POST") {

    foreach ($cultureidtab as $i ) { 
        
        if (isset($_POST["changeculture".$i])) {
                # alter element in culture table
                # get the inputs with the id in their name -> concatenal the fields name with id
                $nom = $_POST['culture'.$i];
                $sup = $_POST['super'.$i];
                $pro = $_POST['prod'.$i];
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE culture SET Nom_culture='".$nom."', Superficie='".$sup."', Production='".$pro."' WHERE Id_culture=".$i;
                
                // Prepare statement
                $stmt = $conn->prepare($sql);

                // execute the query
                $stmt->execute();
                header("Refresh: 0;");

        
            }
        if (isset($_POST['deleteculture'.$i])) {
            # delete element in culture table
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "DELETE FROM culture  WHERE Id_culture=".$i;
                
                // Prepare statement
                $stmt = $conn->prepare($sql);

                // execute the query
                $stmt->execute();
                header("Refresh: 0;");
        }
    }
    foreach ($animalidtab as $i) { 
        if (isset($_POST['changeanimal'.$i])) {
            # alter element in animal table
                # get the inputs with the id in their name -> concatenal the fields name with id
                $nom = $_POST['animal'.$i];
                $nbr = $_POST['nombre'.$i];
                
                
                $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
                $sql = "UPDATE elevage SET Nom_animal='".$nom."', Nombre_tete='".$nbr."' WHERE Id_elevage=".$i;
                
                // Prepare statement
                $stmt = $conn->prepare($sql);

                // execute the query
                $stmt->execute();
                header("Refresh: 0;");

        }
        if (isset($_POST['deleteanimal'.$i])) {
            # delete element in animal table
               # get the inputs with the id in their name -> concatenal the fields name with id
            
               $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
               $sql = "DELETE FROM elevage  WHERE Id_elevage=".$i;
               
               // Prepare statement
               $stmt = $conn->prepare($sql);

               // execute the query
               $stmt->execute();
               header("Refresh: 0;");
        }
    }
    if(isset($_POST["addanimal"])){
        if((!empty( $_POST['animal'])) and (!empty($_POST['nombre']))){
            $newanimal=$_POST['animal'];
            $newnombre=$_POST['nombre'];
    
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "INSERT INTO elevage ( Nom_animal, Nombre_tete)
             VALUES ('".$newanimal."', '".$newnombre."')";
              $conn->exec($sql);
              header("Refresh: 0;");
        }
    }
    if(isset($_POST["addculture"])){
        if((!empty( $_POST['culture'])) and (!empty($_POST['super'])) and (!empty($_POST['prod']))){
            $newculture=$_POST['culture'];
            $newsup=$_POST['super'];
            $newprod=$_POST['prod'];
           
            $conn->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
             $sql = "INSERT INTO culture ( Nom_culture, Superficie, Production)
             VALUES ('".$newculture."', '".$newsup."', '".$newprod."')";
              $conn->exec($sql);
              header("Refresh: 0;");
        }
    }
}
ob_end_flush();
?>
