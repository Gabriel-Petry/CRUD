<html>
<head>
    <title>Add Registro</title>
</head>

<body>

<?php
include_once("classes/Crud.php");
include_once("classes/Validation.php");

$crud = new Crud();
$validation = new Validation();

if(isset($_POST['Submit'])) {

    $name = $crud->escape_string($_POST['name']);
    $age = $crud->escape_string($_POST['age']);
    $email = $crud->escape_string($_POST['email']);

    $msg = $validation->check_empty($_POST, array('name', 'age', 'email'));
    $check_age = $validation->is_age_valid($_POST['age']);
    $check_email = $validation->is_email_valid($_POST['email']);

    if($msg != null) {
       
        echo $msg;
        echo "<br/><a href='javascript:self.history.back();'>Go Back</a>";
    
    } elseif (!$check_age) {
       
        echo 'Please provide proper age.';
    
    } elseif (!$check_email) {
        
        echo 'Please provide proper email.';
    
    }

    else {

        $result = $crud->execute("INSERT INTO users(name,age,email) VALUES('$name','$age','$email')");
        echo "<font color='green'>Data added successfully.";
        echo "<br/><a href='index.php'>View Result</a>";
    }
}

?>

</body>

</html>