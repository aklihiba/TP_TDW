<?php
    $nameerr= $pswerr= "" ;
    if ($_SERVER["REQUEST_METHOD"]=="POST") {
       
        $name= $_POST["name"];
        $psw= $_POST["psw"];
        
        if ($name=="admin" and $psw=="admin") {
            header("Location: admin.php");

        }
        else{
            if(empty($name)){
                $nameerr="user name is required" ;
            }else{
                $nameerr="wrong user name" ;
            }
            if(empty($psw)){
                $pswerr="password is required" ;
            }else{
                $pswerr="wrong password" ;
            }
        }
    }
    
?>

<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>authentification</title>
    <link href="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/css/bootstrap.min.css" rel="stylesheet" integrity="sha384-1BmE4kWBq78iYhFldvKuhfTAU6auU8tT94WrHftjDbrCEXSU1oBoqyl2QvZ6jIW3" crossorigin="anonymous">
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.1.3/dist/js/bootstrap.bundle.min.js" integrity="sha384-ka7Sk0Gln4gmtz2MlQnikT1wXgYsOg+OMhuP+IlRH9sENBO0LRn5q+8nbTov4+1p" crossorigin="anonymous"></script>
    <style>
        center {
            margin: 50px;
        }
        h1, label {
            font-family:serif;

        }
        .form-control{
            border-radius: 20px;
        }
        .error{
            color: red;
        }
    </style>
</head>
<body>
    <center>
    <div style="height: 100px;">
        <h1>Admin Auth</h1>
    </div>
    </center>
    <center>
        <div style="width: 500px;">
          
            <form action="auth.php" method="post" >
                <div class="mb-3">
                    <label for="exampleInputEmail1" class="form-label">user name</label>
                    <input name="name" type="text"  class="form-control" id="exampleInputEmail1" aria-describedby="emailHelp">
                    <span class="error"> <?php echo $nameerr;?></span>
                    <br><br>
                </div>
                <div class="mb-3">
                    <label for="exampleInputPassword1" class="form-label">password</label>
                    <input name="psw" type="password"  class="form-control" id="exampleInputPassword1">
                    <span class="error"> <?php echo $pswerr;?></span>
                    <br><br>
                </div>
                
                <button type="submit" class="btn btn-primary">connect</button>
            </form>
        </div>
    </center>
   
</body>
</html>