<?php

include_once ("../class/Crud.php");

$id = $_GET['editid'];

$crud= new crud();

$data = $crud->selectbyid('form',$id);

if(isset($_POST['submit']))
{
	$data= array(
	
                "name"  => $crud->escape_string($_POST['name']),	
	            "author"  => $crud->escape_string($_POST['author']),
				"pages"  => $crud->escape_string($_POST['pages']),
				"price"  => $crud->escape_string($_POST['price'])
	
	);
	
	
	  $crud->update($data,'form',$id);
	
	
	if($data)
	{
	echo 'updated successfully';
	header('location:listing.php');
	}
	
else
	{
	echo 'try again' ;
	}
}

?>
<!DOCTYPE html>
<html>

<head>
    <title>Edit</title>
    <link rel="stylesheet" type="text/css" href="../css/style.css">
	<meta name="viewport" content="width=device-width, initial-scale=1">
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

        <form method="POST" name="form" class="form">

            <div class="input-group">
                <label>Name</label>
                <input type="text" name="name" value="<?php echo $data['name'];?>"><br />
            </div>

            <div class="input-group">
                <label>Author</label>
                <input type="text" name="author" value="<?php echo $data['author'];?>"><br />
            </div>

            <div class="input-group">
                <label>Pages</label>
                <input type="text" name="pages" value="<?php echo $data['pages'];?>"><br />
            </div>

            <div class="input-group">
                <label>Price</label>
                <input type="text" name="price" value="<?php echo $data['price'];?>"><br />
            </div>

            <input class="btn-edt" type="submit" name="submit">

        </form>
        <form class="crtfrm" method="POST" action="listing.php">
            <input class="btn" type="submit" value="Back">
        </form>
    </div>
</body>

</html>