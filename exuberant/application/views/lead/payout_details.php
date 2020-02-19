<?php //print_r($data) ;?>
<link href="//netdna.bootstrapcdn.com/bootstrap/3.1.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//netdna.bootstrapcdn.com/bootstrap/3.1.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->
<script>
	
	    	.row{
		    margin-top:40px;
		    padding: 0 10px;
		}
		.clickable{
		    cursor: pointer;   
		}

		.panel-heading div {
			margin-top: -18px;
			font-size: 15px;
		}
		.panel-heading div span{
			margin-left:5px;
		}
		.panel-body{
			display: none;
		}

</script>

 <style type="text/css">
    a {
     padding-left: 5px;
     padding-right: 5px;
     margin-left: 5px;
     margin-right: 5px;
    }
    </style>
    
<div class="container">
    <h1>Lead Details</h1>
    	<div class="row">
			
			<div class="col-md-6" style="width:1500px">
				<button><a href="<?php echo base_url('index.php/Lead/Leadlist')  ;?>">Back</a></button>
				<div class="panel panel-primary">
					
					<div class="panel-heading">
						<h3 class="panel-title">Developers</h3>
						<div class="pull-right">
							<span class="clickable filter" data-toggle="tooltip" title="Toggle table filter" data-container="body">
								<!--<i class="glyphicon glyphicon-filter"></i>-->
							</span>
						</div>
					</div>
					
					<div class="panel-body">
						<!--<input type="text" class="form-control" id="dev-table-filter" data-action="filter" data-filters="#dev-table" placeholder="Filter Developers" />-->
						
					</div>
				<table class="table table-hover" id="dev-table" style="width:1500px;align:center">
						
					<tr><h3>Payout details</h3></tr>
					<tr><td>Lead ID::</td><td><?php echo $data["lead_id"]; ?></td></tr>
					<tr><td>Customer first name::</td><td><?php echo $data["lead_first_name"]; ?></td></tr>
					<tr><td>Customer Last name::</td><td><?php echo $data["lead_last_name"]; ?></td></tr>
					<tr><td>Customer Email::</td><td><?php echo $data["lead_email"]; ?></td></tr>
					<tr><td>Customer Phone::</td><td><?php echo $data["lead_mobile"]; ?></td></tr>
					<tr><td>Customer Location::</td><td><?php echo $data["location_name"]; ?></td></tr>
					<tr><td>Loan Product::</td><td><?php echo $data["product_name"]; ?></td></tr>
					<tr><td>Loan Amount::</td><td><?php echo $data["lead_loan_amount"]; ?></td></tr>
					<tr><td>DSA ID::</td><td><?php echo $data["account_id"]; ?></td></tr>
					<tr><td>DSA Name::</td><td><?php echo $data["account_firstname"]." ".$data["account_lastname"]; ?></td></tr>
					<tr><td>DSA Email::</td><td><?php echo $data["account_email"]; ?></td></tr>
					<tr><td>DSA Phone Number::</td><td><?php echo $data["account_mobile"]; ?></td></tr>
					<tr><td>DSA Status::</td><td><?php echo $data["account_status"]; ?></td></tr>
					<tr><td>DSA registered at::</td><td><?php echo $data["account_created_on"]; ?></td></tr>
					<tr><td>DSA Employee Type::</td><td><?php echo $data["account_emp_type"]; ?></td></tr>
					<?php
					
						$dsaId = $data["account_id"];
						$nrmdetails = getNRMDeatilswithnrmmapping($dsaId);
						echo $nrmId = $nrmdetails["account_id"];
						echo $nrmfirstname = $nrmdetails["account_firstname"];
						echo $nrmlastname = $nrmdetails["account_lastname"];
						print_r($nrmdetails);
					 ?>
					<tr><td>NRM Details::</td><td><?php echo $data["account_emp_type"]; ?></td></tr>
				</table>
				</div>
				
				
				
				<div class="clearfixmrg8"></div>
				<div class="text-right">
			
				<?= $this->pagination->create_links(); ?>
			</div>
			
			
		</div>
	</div>
