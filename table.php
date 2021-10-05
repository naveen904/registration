<?php
include("conn.php");
$query = "SELECT * from stud";
$data  =mysqli_query($conn,$query);
$total  =mysqli_num_rows($data);

if($total>0){
    ?>
    <table border="2">
    
    <tr>
      <th scope="col">Id</th>
      <th scope="col">Name</th>
      <th scope="col">Email</th>
      <th scope="col">Password</th>
      <th scope="col">Confirm_Password</th>
      <th scope="col">Gender</th>
      <th scope="col">Address</th>
      <th scope="col">State</th>
      <th scope="col">Image</th>
     <th spancolumn=2>Operations</th> 
    </tr>    
    
    <?php
     //echo "table have data";
    while($result = mysqli_fetch_assoc($data)){
        echo "<tr>
        <th>".$result['Id']."</th>
        <th >".$result['Name']."</th>
        <th >".$result['Email']."</th>
        <th >".$result['Password']."</th>
        <th >".$result['Confirm_Password']."</th>
        <th >".$result['Gender']."</th>
        <th >".$result['Address']."</th>
        <th >".$result['State']."</th>
        <th ><img src='image/".$result['Image']."' width='50' height='50' </th>




        <th><a href='update.php?id=$result[Id]'>Edit</a></th>
        <th><a href='delete.php?id=$result[Id]' onclick='return deletedata()'>Delete</a></th>
      </tr>";        
    }

}else{
    echo "table have  no data";
}
// echo "<pre>";
// print_r($result);

?>
</table>
<script>
    function deletedata(){
       return confirm("Are you sure to delete this record");
    }
</script>