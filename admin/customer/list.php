<?php
	 if (!isset($_SESSION['USERID'])){
      redirect(web_root."admin/index.php");
     }

?>

<div class="row">
    <div class="col-lg-12">
        <h1 class="page-header">List of Customers<a href="index.php?view=add" class="btn btn-primary btn-xs  "> <i
                    class="fa fa-plus-circle fw-fa"></i> New</a> </h1>
    </div>
    <!-- /.col-lg-12 -->
</div>
<form action="controller.php?action=delete" Method="POST">
    <div class="table-responsive">
        <table id="dash-table" class="table table-striped table-bordered table-hover table-responsive"
            style="font-size:12px" cellspacing="0">

            <thead>
                <tr>
                    <!-- <th>#</th> -->
                    <th>
                        <!-- <input type="checkbox" name="chkall" id="chkall" onclick="return checkall('selector[]');">  -->
                        Customer Name
                    </th>
                    <th>Username</th>
                    <th>Phone</th>
                    <th>Address</th>
                    <th>Date Joined</th>
                    <th width="10%">Action</th>

                </tr>
            </thead>
            <tbody>
                <?php 
				  		// $mydb->setQuery("SELECT * 
								// 			FROM  `tblcustomer` WHERE TYPE != 'Customer'");
				  		$mydb->setQuery("SELECT * 
											FROM  `tblcustomer`");
				  		$cur = $mydb->loadResultList();

						foreach ($cur as $result) {
				  		echo '<tr>';
				  		// echo '<td width="5%" align="center"></td>';
				  		echo '<td>' . $result->FNAME.' ' . $result->LNAME.'</a></td>';
                          
				  		echo '<td>'. $result->CUSUNAME.'</td>';
				  		echo '<td>'. $result->PHONE.'</td>';
				  		echo '<td>'. $result->CUSTDISTRICT.'</td>';
                        echo '<td>'. $result->DATEJOIN.'</td>';
                        echo '<td align="center" > <a title="Edit" href="index.php?view=edit&id='.$result->CUSTOMERID.'"  class="btn btn-primary btn-xs  ">  <span class="fa fa-edit fw-fa"></span></a>
				  					 <a title="Delete" href="controller.php?action=delete&id='.$result->CUSTOMERID.'" class="btn btn-danger btn-xs" ><span class="fa fa-trash-o fw-fa"></span> </a>
				  					 </td>';
				  		echo '</tr>';
				  	} 
				  	?>
            </tbody>

        </table>

        <!-- <div class="btn-group">
				  <a href="index.php?view=add" class="btn btn-default">New</a>
				  <button type="submit" class="btn btn-default" name="delete"><span class="glyphicon glyphicon-trash"></span> Delete Selected</button>
				</div>
 -->
    </div>
</form>


</div>
<!---End of container-->