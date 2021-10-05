<?php 
include "conn.php";
$id = $_GET['id'];

$query = "SELECT * from stud where Id= '$id'";
$data = mysqli_query($conn,$query);

$result = mysqli_fetch_assoc($data);

$name = $result['Name'];
$email = $result['Email'];
$password = $result['Password'];
$confirm_password = $result["Confirm_Password"];
$gender = $result["Gender"];

$address = $result["Address"];
$state = $result["State"];
// $filename = $result["image"]['name'];
 
if(isset($_POST["update"])){
    include("conn.php");
  $name = $_POST["name"];
   
  $email = $_POST["email"];
  $password = $_POST["password"];
  $confirm_password = $_POST["confirm_password"];
  $gender = $_POST["gender"];
 
  $address = $_POST["address"];
  $state = $_POST["state"];
  $filename = $_FILES["image"]['name'];


$query = "UPDATE  stud SET Name='$name',Email='$email', 
Password='$password',Confirm_Password='$confirm_password',Gender='$gender',Address='$address',State='$state',Image='$filename' WHERE Id= '$id'";
  $data  = mysqli_query($conn, $query);
  if ($data) {
    echo header("Location://localhost/Registration/table.php");
  }else {
    echo "not updated";
  }
  }
?>
<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.3/css/bootstrap.min.css"
    integrity="sha384-MCw98/SFnGE8fJT3GXwEOngsV7Zt27NXFoaoApmYm81iuXoPkFOJwJ8ERdknLPMO" crossorigin="anonymous">
  <link rel="stylesheet" href="index.css">
  <title>Document</title>

  
</head>
<body>
<form action="" method="post" enctype ="multipart/form-data" name="form" id="form">
  <section class=" bg-dark">
    <div class="container  py-5 h-100">
      <div class="row d-flex justify-content-center align-items-center h-100">
        <div class="col">
          <div class="card card-registration my-4">
            <div class="row g-0">
              <div class="col-xl-6 d-none d-xl-block">
                <img src="https://mdbootstrap.com/img/Photos/new-templates/bootstrap-registration/img4.jpg"
                  alt="Sample photo" class="img-fluid"
                  style="border-top-left-radius: .10rem; border-bottom-left-radius: .10rem;" />
              </div>
              <div class="col-xl-6">
                <div class="card-body p-md-5 text-black">
                  <h3 class="mb-5 text-uppercase">Registration form</h3>

                  <div class="row">
                    <div class="col-md-6 mb-4">
                      <div class="form-outline">
                        <input type="text" class="form-control form-control-lg" value="<?php echo $name;?>" name="name" id="name"/>
                        <label class="form-label" for="form3Example1m">Name</label>
                      </div>
                    </div>


                  </div>
                  <div class="form-outline mb-4">
                    <input type="text" class="form-control form-control-lg" value="<?php echo $email;?>" name="email" id="email"/>
                    <label class="form-label" for="form3Example97">Email ID</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password"  class="form-control form-control-lg" value="<?php echo $password;?>" name="password" id="password"/>
                    <label class="form-label" for="form3Example97">Password</label>
                  </div>
                  <div class="form-outline mb-4">
                    <input type="password"  class="form-control form-control-lg" value="<?php echo $confirm_password;?>" name="confirm_password" id="confirm_password"/>
                    <label class="form-label" for="form3Example97">Confirm Password</label>
                  </div>

                  <div class="d-md-flex justify-content-start align-items-center mb-4 py-2">

                    <h6 class="mb-0 me-4">Gender: </h6>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="gender" 
                        value="Female" <?php if ($gender == 'Female') echo 'checked="checked"'; ?> />
                      <label class="form-check-label" for="femaleGender">Female</label>
                    </div>

                    <div class="form-check form-check-inline mb-0 me-4">
                      <input class="form-check-input" type="radio" name="gender" value="Male" <?php if ($gender == 'Male') echo 'checked="checked"'; ?> />
                      <label class="form-check-label" for="maleGender">Male</label>
                    </div>

                    <div class="form-check form-check-inline mb-0">
                      <input class="form-check-input" type="radio" value="<?php echo $gender;?>" name="gender" id="otherGender"
                        value="other" <?php if ($gender == 'other') echo 'checked="checked"'; ?> />
                      <label class="form-check-label" for="otherGender">Other</label>
                    </div>

                  </div>
                  <div class="form-outline mb-4">
                    <textarea type="textarea" id="form3Example8" class="form-control form-control-lg" rows="4"
                      cols="50" name="address"><?php echo $address;?></textarea>
                    <label class="form-label" for="form3Example8">Address</label>
                  </div>



                  <div class="row">
                    <div class="col-md-6 mb-4">

                      <select class="select"  name="state">
                        <option value="<?php echo $result["State"]; ?>" ><?php echo $result["State"]; ?></option>
                        <option value="Haryana">Haryana</option>
                        <option value="Punjab">Punjab</option>
                        <option value="Rajasthan">Rajasthan</option>
                        <option value="Uttar Pradesh">Uttar Pradesh</option>
                      </select>

                    </div>

                   
                    <div class="form-outline mb-4"></div>
                    <label for="image">Image:</label>
                    <input type="file" value="<?php echo $filename;?>" name="image" id="image"><br />
                    
                    </div>

                    <div class="d-flex justify-content-end pt-3">
                      
                      <button type="submit" class="btn btn-warning btn-lg ms-2" name="update" id="submit">Update</button>
                    </div>

                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
  </section>
</form>
</body>
</html>

