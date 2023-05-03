<form action="" method="post">
    Name: <input type="text" name="name" ><br>
    Registration number:<input type="text" name="reg" ><br>
    Mobile number:<input type="text" name="mbn" ><br>
    <select name="crud" id="">
        <option value="create">creation</option>
        <option value="update">updation</option>
        <option value="deletion">deletion</option>
    </select>
    <input type="submit" name="submit" value="submit">
</form>
<?php
$conn=mysqli_connect('localhost','root','','test');
if(isset($_POST['submit'])){
    $name=$_POST['name'];
    $regno=$_POST['reg'];
    $mobno=$_POST['mbn'];
    $crud=$_POST['crud'];
    if(($crud=='create')&&($name&&$mobno&&$regno)){
    $query="INSERT INTO creation(name,regno,mobno) values('$name','$regno','$mobno')";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        echo "data inserted successfully";
    }
}
else if(($crud=='update')&&($mobno)){
    $query="UPDATE creation SET name='$name',regno='$regno' where name='$name'";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        echo "data updated successfully";
    }
}
else if($crud=='deletion'){
    $mobno=$_POST['mbn'];
    $query="DELETE FROM creation where mobno='$mobno'";
    $res=mysqli_query($conn,$query);
    if($res)
    {
        echo "data deleted successfully";
    }
}
}
?>
