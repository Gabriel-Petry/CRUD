<?php
include_once("classes/Crud.php");
$crud = new Crud();
$query = "SELECT * FROM users ORDER BY id DESC";
$result = $crud->getData($query);
?>

<html>
<head>
    <title>Homepage</title>
</head>
<body>
    <center><a href="add.html">Add New Data</a><br/><br/>
    <table width='80%' border=0>
    <tr bgcolor='#CCCCCC'>
    <td>Name</td>
    <td>Age</td>
    <td>Email</td>
    <td>Update</td>
    </tr>
    <?php
        foreach ($result as $key => $res) {
        echo "<tr>";
        echo "<td>".$res['name']."</td>";
        echo "<td>".$res['age']."</td>";
        echo "<td>".$res['email']."</td>";
        echo "<td><a href=\"edit.php?id=$res[id]\">Edit</a> | <a href=\"delete.php?id=$res[id]\" onClick=\"return confirm('Are you sure you want to delete?')\">Delete</a></td>";
        }
    ?>
    </table>
    </center>
</body>
</html>