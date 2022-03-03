<?php 
$url = 'C:\xampp\htdocs\day3\assets\bg.png';
include_once ("../class/Crud.php");
   
if(!(isset($_SESSION["login"]))){
    header("Location:login.php");
}








 if(!empty($_GET['delid'])) 
 { 
 
 $id=$_GET['delid']; 
 
 $crud= new crud(); 
 $crud->deletedata("form",$id); 
 header('location:listig.php');
 } 
   
 ?>

<!DOCTYPE html>
<html lang="en">

<head>
    <title>List</title>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <link rel="stylesheet" type="text/css" href="../css/style.css">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Roboto:ital,wght@0,400;1,100&display=swap" rel="stylesheet">

</head>

<body>

    <div class="main_body">

    <header class="header">
            <div class="title">Library</div>
            <div class="logout">
           <div class="lg"> <a href="logout.php">LOG OUT</a></div>
            </div>
        </header>

        <table class="table_table_striped">
            <thead>
                <tr>
                    <th>Name</th>
                    <th>Author</th>
                    <th>Pages</th>
                    <th>Price</th>
                    <th>Edit</th>
                    <th>Delete</th>
                </tr>
            </thead>
            <tbody>



                <?php 
                    $crud= new crud();
                     $result = $crud->selectalldata("form"); 
    
             while($data = mysqli_fetch_array($result)) 
             { 
             ?>

                <tr>
                    <td><?php echo $data['name']; ?></td>
                    <td><?php echo $data['author']; ?></td>
                    <td><?php echo $data['pages']; ?></td>
                    <td><?php echo $data['price']; ?></td>
                    <td><a class="edt" href="edit.php?editid=<?php echo $data['id'];?>">Edit</td>
                    <td><a class="dlt" href="listing.php?delid=<?php echo $data['id'];?>"
                            onclick=" return confirm('Do You really want to delete this data')">Delete</td>
                </tr>
                <?php } ?>
            </tbody>
        </table>
        <form class="crtfrm" method="POST" action="add.php">
        <input class="crtbtn" type="submit" value="Create">
        </form>
         <!-- <a href="logout.php">LOG OUT</a> -->
    </div>
  

</body>

</html>