</div>
<?php
session_start();
$con =  mysqli_connect('localhost','root','','cmp');

$name="vasanth";

$rid="317126510132";


?>

<!DOCTYPE html>
<html>
<head>
  <title>studentcomplaintform</title>
  <link href="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/4.1.1/js/bootstrap.min.js"></script>
<script src="//cdnjs.cloudflare.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
  
  <script src="ckeditor.js"></script>
  <style type="text/css">*{
  margin: 0;
  padding: 0;
}
.wrapper
{
  width: 1170px;
  margin: auto;
}

header
{
background: linear-gradient(rgba(0,0,0,0.6),rgba(0,0,0,0.6)), url("wri1.jpeg") ;
height:100vh;
-webkit-background-size:cover;
background-size: cover;
background-position: center center;
position:relative;


}
.nav-area
{
float: right;
list-style: none;
margin-top: 30px;
background-color: aqua;

}
.nav-area li
{
  width: 150px;
  height:40px;
 display: inline-block;
  
    opacity:0.6;
    line-height: 40px;
    text-align: center;
    font-size: 20px;

}
.nav-area li a
{

color: #000;
text-decoration: none;
padding: 5px 20px;
font-family: poppins;
font-size: 20px;

}
.nav-area li a:hover{
 background: #0f0;
 color:#333;

}




.logo img
{
  width:120px;
  float:left;
  height:auto;
  padding-left: 20px;

}
    .header{
      border-top: 3px solid #28a745;
      background: #495057;
      color: #fff;
      width: 70%;
      padding: 1%;
    }
    .header-left i{
      margin-left: 5%;
    }
    .header-right h4{
      text-align: right;
      margin-right: 10%;
      line-height: 2; 
    }
    .content{
      background: #28a745;
      width: 70%;
    }
    .content .form-content{
      padding:10%;
    }
    .content .form-content .input-group .input-group-text{
      background:#333;
      color:#fff;
      border:none;
      border-radius:0;
      font-weight: 600;
    }
    .content .form-content .input-group input{
          border-radius: 0;
    }
    .content .form-content .input-group input:focus{
      border-color: transparent;
    }
    .content .form-content h4{
      margin-bottom:5%;
    }
    .content .form-content button{
      background: #333;
      color: #fff;
      border-radius: 0;
      width: 20%;
      font-weight: 600;
    }
    .bac-im
    {
      background-image: url("wri1.jpg");
          height: 100px;


    }

.back-im
{


      background-image: url("wri1.jpg");
          height: 500px;



}





  </style>
</head>
<body>
  <div class='bac-im'>
            <div class="wrapper">
  
    <div class="logo">
      <img src="anits.jpeg" alt="" >
      
    </div>
    <ul class="nav-area">
      <li>
        <a href="studentcomplaintform.php"style="background-color: white; color: green;">COMPLAINT</a>

      </li>
      <li>
        <a href="index1.php">STATUS</a>
      </li>
      <li>
        <a href="reader.php">FEEDBACK</a>
        
      </li>
      
      <li><a href="categories.php">COMPLETED</a></li>
      <li>
        <a href="contact.php">SUGGESTION</a>
      </li>
      
      
             <li>
        <a href="lr.php">Logout</a>
      </li>

    </ul>

          </div>


</div>
<div style="background-color: aqua;">
  
<form action="studentcomplaintform.php" method="post" enctype="multipart/form-data">

    <div class="container content">
      <div class="form-content">
<div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">DEPARTMENT</span>
          </div>
          <input type="text" name="dep" class="form-control" aria-label="BOOK PDF" aria-describedby="basic-addon1" required>
        </div>
        
        <div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">ROOM_NO</span>
          </div>
          <input type="text" name="rno" class="form-control" aria-label="pen name" aria-describedby="basic-addon1" required>
        </div><div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">ISSUE_ON</span>
          </div>
          <input type="text" name="ison" class="form-control" aria-label="title" aria-describedby="basic-addon1" required>
        </div>
        <div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">DESCRPTION</span>
          </div>
          <textarea  name="desc" rows="5" cols="30"  class="form-control" aria-label="title" aria-describedby="basic-addon1" required></textarea>
        </div>
<div class="input-group mb-3">
          <div class="input-group-prepend">
          <span class="input-group-text" id="basic-addon1">UPLOAD_IMAGE</span>
          </div>
          <input type="file" name="img" class="form-control" aria-label="cover image" aria-describedby="basic-addon1" required>
        </div>
<input type="submit" name="subm" value="COMPLAINT">


</form>


</div>

</div>

</div>


</body>
</html>

<?php
if(isset($_POST['subm']) ) {
    
        
       $ext = strtolower(pathinfo($_FILES['img']['name'], PATHINFO_EXTENSION));
    $allowed_extensions = array("jpeg","png","jpg","gif");
        //Check extension
       if(in_array($ext, $allowed_extensions)) {
           //Convert image to base64
           $encoded_image = base64_encode(file_get_contents($_FILES['img']['tmp_name']));
           $encoded_image = 'data:image/'.$ext.';base64,' . $encoded_image;
       
           

           

           $dep = $con->real_escape_string($_POST['dep']);
           $rno =$con->real_escape_string($_POST['rno']);
           $ison =$con->real_escape_string($_POST['ison']);
           $desc =$con->real_escape_string($_POST['desc']);
           
           
           $resss = "insert into issues(rollno,category,descp,rno,cimage) values('$rid','$ison','$dep','$rno','".$encoded_image."')";
            $ide=mysqli_query($con, $resss);
              
    
}}


?>


