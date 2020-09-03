<?php include('conn.php');

if (isset($_GET['edit'])){
    $id = $_GET['edit'];
    $edit_status = true;
    $res = mysqli_query($db,"SELECT * FROM form WHERE id=$id ");
    $record = mysqli_fetch_array($res);
    $name = $record['name'];
    $contact = $record['contact'];
}
?>
<!DOCTYPE html>
<html>
<head>
<title>Form</title>
<style>
body {font-family:Arial, Sans-Serif;}
form{width: 300px; margin: 0 auto;}
input[type='text']{width: 200px; border-radius: 2px;border: 1px solid #CCC; padding: 10px; color: #333; font-size: 14px; margin-top: 10px;}
input[type='submit'],input[type='reset']{padding: 10px 25px 8px; color: #fff;background-color: #0067ab;}
table{
    width: 50%;
    margin: 30px auto;
    border-collapse: collapse;
    text-align: left;
}
</style>
</head>
<body>
    <form method="post" action="conn.php">
    <h2>Form</h2>
    <input type="hidden" name="id" value="<?php echo $id; ?>">
    <input type="text" name="name" value="<?php echo $name; ?>" placeholder="Name"><br><br>
    <input type="text" name="contact" value="<?php echo $contact; ?>" placeholder="Contact Number"><br><br>
    <?php if ($edit_status == true): ?>
        <input type="submit" name="edit" value="Update">
    <?php else: ?>
        <input type="submit" name="submit" value="Save">
    <?php endif ?>
    <input type="reset">
    </form>
<table border="1" cellspacing="5" cellpadding="10">
    <tr>
        <th>Name</th>
        <th>Contact</th>
        <th colspan="2">Action</th>
    </tr>  
    <?php while ($row = mysqli_fetch_array($result)) { ?>
    <tr>
        <td><?php echo $row['name']; ?></td>
        <td><?php echo $row['contact']; ?></td>
        <td><a href="index.php?edit=<?php echo $row['id']; ?>">Edit</a></td>
        <td><a href="conn.php?delete=<?php echo $row['id'];?> ">Delete</a>
    </tr>
    <?php } ?>
</table>
</body>
</html>