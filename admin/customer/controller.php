<?php
require_once ("../../include/initialize.php");
	 if (!isset($_SESSION['CUSTOMERID'])){
      redirect(web_root."admin/index.php");
     }

$action = (isset($_GET['action']) && $_GET['action'] != '') ? $_GET['action'] : '';

switch ($action) {
	case 'add' :
	doInsert();
	break;
	
	case 'edit' :
	doEdit();
	break;
	
	case 'delete' :
	doDelete();
	break;

	case 'photos' :
	doupdateimage();
	break;

 
	}
   
	function doInsert(){
		if(isset($_POST['save'])){


		if ($_POST['FNAME'] == "" OR $_POST['LNAME'] == "" OR $_POST['PHONE'] == "" OR $_POST['CUSTPROVINCE'] == "" OR $_POST['CUSUNAME'] == "" OR $_POST['CUSPASS'] == "") {
			$messageStats = false;
			message("All field is required!","error");
			redirect('index.php?view=add');
		}else{	
			$user = New Customer();
			// $user->USERID 		= $_POST['user_id'];
			$user->FNAME 		    = $_POST['FNAME'];
			$user->LNAME			=  $_POST['LNAME'];
			$user->GENDER			=  $_POST['GENDER'];
			$user->PHONE			=  $_POST['PHONE'];
			$user->CUSUNAME			=  $_POST['CUSUNAME'];
			$user->CUSTPROVINCE		=  $_POST['CUSTPROVINCE'];
			$user->CUSTDISTRICT 	=  $_POST['CUSTDISTRICT'];
			$user->CUSTSECTOR		=  $_POST['CUSTSECTOR'];
			$user->CUSTCELL		    =  $_POST['CUSTCELL'];
			$user->CUSTVILLAGE		=  $_POST['CUSTVILLAGE'];
			$user->CUSPASS			=sha1($_POST['CUSPASS']);
			$user->create();

						// $autonum = New Autonumber(); 
						// $autonum->auto_update(2);

			message("New [". $_POST['FNAME'] ."". $_POST['LNAME'] ."] created successfully!", "success");
			redirect("index.php");
			
		}
		}

	}

	function doEdit(){
	if(isset($_POST['save'])){

			$user = New Customer(); 
			
			$user->FNAME 		    = $_POST['FNAME'];
			$user->LNAME			=  $_POST['LNAME'];
			$user->GENDER			=  $_POST['GENDER'];
			$user->PHONE			=  $_POST['PHONE'];
			$user->CUSUNAME			=  $_POST['CUSUNAME'];
			$user->CUSTPROVINCE		=  $_POST['CUSTPROVINCE'];
			$user->CUSTDISTRICT 	=  $_POST['CUSTDISTRICT'];
			$user->CUSTSECTOR		=  $_POST['CUSTSECTOR'];
			$user->CUSTCELL		    =  $_POST['CUSTCELL'];
			$user->CUSTVILLAGE		=  $_POST['CUSTVILLAGE'];
			$user->CUSPASS			=sha1($_POST['CUSPASS']);
			$user->update($_POST['CUSTOMERID']);

			  message("[". $_POST['FNAME'] ."] has been updated!", "success");
			redirect("index.php");
		}
	}


	function doDelete(){
		
		// if (isset($_POST['selector'])==''){
		// message("Select the records first before you delete!","info");
		// redirect('index.php');
		// }else{

		// $id = $_POST['selector'];
		// $key = count($id);

		// for($i=0;$i<$key;$i++){

		// 	$user = New Customer();
		// 	$user->delete($id[$i]);

		
				$id = 	$_GET['id'];

				$user = New Customer();
	 		 	$user->delete($id);
			 $confirm='<div> alert("Are You sure you want to delete this customer?")</div>';
			 if($confirm==true){
			message("Customer Deleted successfully!","info");
		}
			redirect('index.php');
		// }
		// }

		
	}

	function doupdateimage(){
 
			$errofile = $_FILES['photo']['error'];
			$type = $_FILES['photo']['type'];
			$temp = $_FILES['photo']['tmp_name'];
			$myfile =$_FILES['photo']['name'];
		 	$location="photos/".$myfile;


		if ( $errofile > 0) {
				message("No Image Selected!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
		}else{
	 
				@$file=$_FILES['photo']['tmp_name'];
				@$image= addslashes(file_get_contents($_FILES['photo']['tmp_name']));
				@$image_name= addslashes($_FILES['photo']['name']); 
				@$image_size= getimagesize($_FILES['photo']['tmp_name']);

			if ($image_size==FALSE ) {
				message("Uploaded file is not an image!", "error");
				redirect("index.php?view=view&id=". $_GET['id']);
			}else{
					//uploading the file
					move_uploaded_file($temp,"photos/" . $myfile);
		 	
					 

						$user = New Customer();
						$user->USERIMAGE 			= $location;
						$user->update($_SESSION['USERID']);
						redirect("index.php");
						 
							
					}
			}
			 
		}
 
?>