<?php

$error = NULL;

if(isset($_POST['submit'])){
    //get form data
    $name = $_POST['name'];
    $price = $_POST['price'];
    $image = $_POST['image'];
    
        //form is valid
        
        //conect to database
        $mysqli = NEW MySQLi('localhost', 'georgeka_user', 'theteng1098', 'georgeka_shoppingcart');
        
        //sanitize form data
        $name = $mysqli->real_escape_string($name);
        $price = $mysqli->real_escape_string($price);
        $image = $mysqli->real_escape_string($image);
        
        
        
        
        //insert accounts into the database
        
        $insert = $mysqli->query("INSERT INTO producttb (product_name, product_price, product_image) VALUES ('$name', '$price', '$image')");
        
        if($insert){
            
            header('location:index.php');
        }else{
            echo $mysqli->error;
        }
    
}

?>
<html>
    <head>
        <!--<link href="style.css" rel="stylesheet" type="text/css" />-->
    </head>
    <body>
        <form method="POST" action="">
            <table border="0" align="center" cellpadding="5">
                <tr>
                    <td align="right">product name:</td>
                    <td><input type="TEXT" name="name" required/></td>
                </tr>
                <tr>
                    <td align="right">product price:</td>
                    <td><input type="TEXT" name="price" required/></td>
                </tr>
                <tr>
                    <td align="right">product image:</td>
                    <td><input type="FILE" name="image" required/></td>
                </tr>
                <tr>
                    <td colspan="2" align="center"><input type="SUBMIT" name="submit" value="add" required/></td>
                </tr>
            </table>
        </form>
        <center>
            <?php 
                echo $error;
            ?>
        </center>
    </body>
</html>