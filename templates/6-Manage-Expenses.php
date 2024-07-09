<?php 
	include_once "../init.php";

	// User login checker
	if ($getFromU->loggedIn() === false) {
        header('Location: ../index.php');
	}

	include_once 'skeleton.php'; 

	// Deletes expense record
	if(isset($_POST['delrec']))
	{
		$getFromE->delexp($_POST['ID']);
		echo "<script>
				Swal.fire({
					title: 'Done!',
					text: 'Record deleted successfully',
					icon: 'success',
					confirmButtonText: 'Close'
				})
				</script>";
	}

	
?>

<style>
	.update{
		
		font-weight:800;
		color:blue;
	}
</style>

<div class="wrapper">
        <div class="row">
           <div class="col-12">
               <div class="card">
                   <div class="card-header">
                        
                        
                        <h3 style="font-family:'Source Sans Pro'; font-size: 1.5em;">
                           <center style='font-size:40px'> Expenses</center>
                        </h3>
                   </div>
                   <div class="card-content">
                   <table>
							<thead>
								<tr>
								
									<th>#</th>
									<th>Item</th>
									<th>Cost</th>
									<th>Date</th>
									<th>Action</th>
									<th>update</th>
								</tr>
							</thead>
							<tbody>
								<?php 
										$totexp = $getFromE->allexp($_SESSION['UserId']);
										if($totexp !== NULL)
										{
											$len = count($totexp);
											for ($x = 1; $x <= $len; $x++) {
											echo "<tr>
												<td>".$x."</td>
												<td>".$totexp[$x-1]->Item."</td>
												<td>"."$ ".$totexp[$x-1]->Cost."</td>
												<td>".date("d-m-Y",strtotime($totexp[$x-1]->Date))."</td>	
												<td><form style='margin-block-end: 0;' action='' method='post'><input style='display:none;' name='ID' value=".$totexp[$x-1]->ID."></input><button type='submit' name='delrec' class='btn btn-default' style='background:none; color:#8f8f8f; font-size:1em;'>
												<i class='far fa-trash-alt' style='color:red;'></i></button></form></td>
												<td><form style='margin-block-end: 0;' action='' method='post'><input style='display:none;' name='ID' ></input><button type='submit' name='delrec' class='btn btn-default' style='background:none; color:#8f8f8f; font-size:1em;'></button>
												<ion-icon class='update' name='create-outline'></ion-icon></form></td>
											</tr>";	
											}
										}
									?>
							</tbody>
						</table>
                   </div>
               </div>
           </div>
        </div>
</div>

<script type="module" src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.esm.js"></script>
<script nomodule src="https://unpkg.com/ionicons@7.1.0/dist/ionicons/ionicons.js"></script>
