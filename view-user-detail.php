<?php
session_start();
error_reporting(0);
include('includes/connect_db.php');
if (strlen($_SESSION['ccmsaid']==0)) {
  header('location:logout.php');
  } else{
   if(isset($_POST['submit']))
  {
    
    $cid=$_GET['upid'];
      
      
      
      $fees=$_POST['fees'];
    
   $query=mysqli_query($con, "update  tblusers set where ID='$id'");
    if ($query) {
echo '<script>alert("Details updated")</script>';
echo "<script>window.location.href ='manage-olduser.php'</script>";
  }
  else
    {
      $msg="Something Went Wrong. Please try again";
    }

  
} 

?>

<!doctype html>
<html class="no-js" lang="en">

<head>
    
    <title> New Users</title>
    

    <link rel="apple-touch-icon" href="apple-icon.png">
  

    <link rel="stylesheet" href="vendors/bootstrap/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="vendors/font-awesome/css/font-awesome.min.css">
    <link rel="stylesheet" href="vendors/themify-icons/css/themify-icons.css">
    <link rel="stylesheet" href="vendors/flag-icon-css/css/flag-icon.min.css">
    <link rel="stylesheet" href="vendors/selectFX/css/cs-skin-elastic.css">

    <link rel="stylesheet" href="assets/css/style.css">

    <link href='https://fonts.googleapis.com/css?family=Open+Sans:400,600,700,800' rel='stylesheet' type='text/css'>



</head>

<body>
    <!-- Left Panel -->

    <?php include_once('includes/sidebar.php');?>

    <div id="right-panel" class="right-panel">

        <!-- Header-->
        <?php include_once('includes/header.php');?>

        <div class="breadcrumbs">
            <div class="col-sm-4">
                <div class="page-header float-left">
                    <div class="page-title">
                        <h1>User Details</h1>
                    </div>
                </div>
            </div>
            <div class="col-sm-8">
                <div class="page-header float-right">
                    <div class="page-title">
                        <ol class="breadcrumb text-right">
                            <li><a href="dashboard.php">Dashboard</a></li>
                            <li><a href="view-user-detail.php"> User Details</a></li>
                            <li class="active">User Details</li>
                        </ol>
                    </div>
                </div>
            </div>
        </div>

        <div class="content mt-3">
            <div class="animated fadeIn">


                <div class="row">
                    <div class="col-lg-6">
                       <!-- .card -->

                    </div>
                    <!--/.col-->

                    <div class="col-lg-12">
                        <div class="card">
                            <div class="card-header"><strong>Detailed </strong><small> Info</small></div>
                           
                                <p style="font-size:16px; color:red" align="center"> <?php if($msg){
    echo $msg;
  }  ?> </p>
                            <div class="card-body card-block">
 <?php
 $cid=$_GET['upid'];
$ret=mysqli_query($con,"select distinct * from tblusers join tblcomputers on tblcomputers.ID=tblusers.ComputerName
where tblusers.ID='$cid'");
$cnt=1;
while ($row=mysqli_fetch_array($ret)) {

?>                       <table border="1" class="table table-bordered mg-b-0">
   
   <tr>
                                <th>Entry ID</th>
                                   <td><?php  echo $row['EntryID'];?></td>

                                <th>Full Name</th>
                                   <td><?php  echo $row['UserName'];?></td>
                                   </tr>
                                 
                                <tr>
                                <th>User Address</th>
                                   <td colspan="3"><?php  echo $row['UserAddress'];?></td>
                                   </tr>
                                   <tr>
                                    <th>Mobile Number</th>
                                      <td><?php  echo $row['MobileNumber'];?></td>
                             
                                       <th>Email</th>
                                        <td><?php  echo $row['Email'];?></td>
</tr>
<tr>
                        <th>Computer Name</th>
                        <td><?php  echo $row['ComputerName'];?></td>
                       <th>Computer Location</th>
                        <td><?php  echo $row['ComputerLocation'];?></td>
                         </tr>  

                         <tr>
                        <th>IP Address</th>
                        <td><?php  echo $row['IPAdd'];?></td>
                       <th>ID Proof</th>
                        <td><?php  echo $row['IDProof'];?></td>
                         </tr>                          
           
                     <tr>
       <th>In Time</th>
       <td><?php  echo $row['InTime'];?></td>

    <th>Status</th>
    <td> <?php  
if($row['Status']=="")
{
  echo "Not Updated Yet";
}
if($row['Status']=="Out")
{
  echo "Check Out";
}

     ;?></td>
  </tr>
</table>
                                                 
                                       
<table class="table mb-0">

<?php if($row['Status']==""){ ?>


<form name="submit" method="post" enctype="multipart/form-data"> 

<tr>
    <th>Remark :</th>
    <td>
    <textarea name="remark" placeholder="" rows="12" cols="14" class="form-control wd-450" required="true"></textarea></td>
  </tr>

<tr>
<th>Fees </th>
<td>
  <input type="text" name="fees" id="fees" class="form-control wd-450" >
</td></tr>

  <tr>
    <th>Status :</th>
    <td>
   <select name="status" class="form-control wd-450" required="true" >
     <option value="Out">Check Out</option>
   </select></td>
  </tr>

  <tr align="center">
    <td colspan="2"><button type="submit" name="submit" class="btn btn-primary btn-sm"><i class="fa fa-dot-circle-o"></i> Update</button></td>
  </tr>
  </form>
<?php } else { ?>
    <table border="1" class="table table-bordered mg-b-0">
        <tr>
            <th colspan="4">Official/Admin Remarks</th>
        </tr>
  <tr>
    <th>Remark</th>
    <td width="382"><?php echo $row['Remark']; ?></td>
    <th>Out Time</th>
    <td><?php echo $row['OutTime']; ?></td>
  </tr>

  
 <tr>
    <th>Fees</th>
    <td><?php echo $row['Fees']; ?></td>
<th>Updation Date</th>
<td><?php echo $row['UpdationDate']; ?>  </td></tr>
<?php } ?>
</table>

   </div>
                                                    
                                                    
                                                    
                                                    
                                                </div>
  

  

<?php } ?>

                                            </div>



                                           
                                            </div>
                                        </div><!-- .animated -->
                                    </div><!-- .content -->
                                </div><!-- /#right-panel -->
                                <!-- Right Panel -->


                            <script src="vendors/jquery/dist/jquery.min.js"></script>
                            <script src="vendors/popper.js/dist/umd/popper.min.js"></script>

                            <script src="vendors/jquery-validation/dist/jquery.validate.min.js"></script>
                            <script src="vendors/jquery-validation-unobtrusive/dist/jquery.validate.unobtrusive.min.js"></script>

                            <script src="vendors/bootstrap/dist/js/bootstrap.min.js"></script>
                            <script src="assets/js/main.js"></script>
</body>
</html>
<?php }  ?>
