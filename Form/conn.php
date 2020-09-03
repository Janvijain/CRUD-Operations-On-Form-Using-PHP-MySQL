<?php
$name = "";
$contact ="";
$id = 0;
$edit_status = false;
$db = mysqli_connect('localhost', 'root', '', 'test');
if (isset($_POST['submit'])){
$name = $_POST['name'];
$contact = $_POST['contact'];
$query = "INSERT INTO form (`name`, `contact`) VALUES ('$name' , '$contact')";
mysqli_query($db,$query);
header('location:index.php');
}

if (isset($_POST['edit'])){
    $name = mysqli_real_escape_string($db,$_POST['name']);
    $contact = mysqli_real_escape_string($db,$_POST['contact']);
    $id = mysqli_real_escape_string($db,$_POST['id']);
    mysqli_query($db,"UPDATE `form` SET `name`='$name',`contact`='$contact' WHERE id = $id"); 
    header('location:index.php');

}
if (isset($_GET['delete'])){
    $id = $_GET['delete'];
    mysqli_query($db,"DELETE FROM form WHERE id=$id");
    header('location:index.php');
}
$sql = "SELECT * FROM form";
$result = mysqli_query($db, $sql);
?>