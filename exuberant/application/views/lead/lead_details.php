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
						
					<tr><h3>Personal details</h3></tr>
					<tr><td>Customer first with last name::</td><td><?php echo $data["lead_first_name"]." ".$data["lead_last_name"]; ?></td><td>Father Name::</td><td><?php echo $data["lead_father_name"]; ?></td></tr>
					<tr><td>Mother Name::</td><td><?php echo $data["lead_mother_name"]; ?></td> <td>PAN Number::</td><td><?php echo $data["lead_pan"]; ?></td></tr>
					<tr><td>Email-ID::</td><td><?php echo $data["lead_email"]; ?></td> <td>City::</td><td><?php echo $data["location_name"]; ?></td></tr>
					<tr><td>Primary Mobile::</td><td><?php echo $data["lead_mobile"]; ?></td> <td>Date of Birth::</td><td><?php echo $data["lead_dob"]; ?></td> </tr>
					<tr><td>Employee Type::</td><td><?php echo $data["lead_emptype"]; ?></td> <td>Product::</td><td><?php echo $data["product_name"]; ?></td> </tr>
					<tr><td>Loan Amount::</td><td><?php echo $data["lead_loan_amount"]; ?></td> <td>Monthly salary::</td><td><?php echo $data["lead_monthly_salary"]; ?> in RS</td></tr>
					<tr><td>Residance Type::</td><td><?php echo $data["lead_residence_type"]; ?></td><td>Residance Since::</td><td><?php echo $data["lead_residence_since"]; ?></td></tr>
					<tr><td>Residance line1:</td><td><?php echo $data["lead_residence_line1"]; ?></td> <td>Residance line2::</td><td><?php echo $data["lead_residence_line2"]; ?></td></tr>
					<tr><td>Residance Pincode:</td><td><?php echo $data["lead_residence_pincode"]; ?></td> <td>Residance line2::</td><td><?php echo $data["lead_residence_line2"]; ?></td></tr>
					<tr><td>Organisation address Line1:</td><td><?php echo $data["lead_office_line1"]; ?></td> <td>Organisation address Line2::</td><td><?php echo $data["lead_office_line2"]; ?></td></tr>
					<tr><td>Registred Date:</td><td><?php echo $data["lead_reg_date"]; ?></td> <td>Channel</td><td><?php echo $data["channel_type"]; ?></td></tr>
					<tr><td>Lead Generator:</td><td><?php echo $data["account_firstname"]; ?></td> <td>Status</td><td><?php echo $data["lead_status"]; ?></td></tr>
					<tr><td>Bank :</td><td><?php echo $data["bank_name"]; ?></td> <td>Bank account type</td><td><?php echo $data["lead_bank_acc_type"]; ?></td></tr>
					<tr><td>Company Type :</td><td><?php echo $data["lead_company_type"]; ?></td> <td>Loan running EMI</td><td><?php echo $data["lead_runningloan_emi"]; ?></td></tr>
					<tr><td>Salary Type :</td><td><?php echo $data["lead_salary_type"]; ?></td> <td>Aadhar Number</td><td><?php echo $data["lead_aadhar"]; ?></td></tr>
					
				</table>
					
				</div>
				<div class="clearfixmrg8"></div>
				<div class="text-right">
			
				<?= $this->pagination->create_links(); ?>
			</div>
			
			
		</div>
	</div>
