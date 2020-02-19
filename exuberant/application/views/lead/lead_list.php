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
    <h1>Lead module (Indiadeals)</h1>
    
    	<div class="row">
			<div class="col-md-6" style="width:1500px">
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
						<form class="form-inline md-form mr-auto mb-4" name="serachform" method="post" action="<?php echo base_url('index.php/Lead/leadlist'); ?>">
  <input class="form-control mr-sm-2" type="text" placeholder="Search by Name" aria-label="Search" name="custname" id="custname" value="<?php echo !empty($custname) ? $custname : "" ;?>">
  <!--<input class="form-control mr-sm-2" type="text" placeholder="Search by emailId" aria-label="Search" name="custname" id="custname">
  <input class="form-control mr-sm-2" type="text" placeholder="Search by Mobile" aria-label="Search" name="custmobile" id="custmobile">
  <input class="form-control mr-sm-2" type="text" placeholder="Search by Product" aria-label="Search" name="prod" id="prod">
  <input class="form-control mr-sm-2" type="text" placeholder="Search by loan amount" aria-label="Search" name="loanamt" id="loanamt">-->
  
  <button class="btn btn-outline-warning btn-rounded btn-sm my-0" type="submit" name="submit">Search</button>
</form>
<?php if($this->session->flashdata('message')) {?>
<div class="main-box-body clearfix">
<div class="alert alert-success">
<?php echo $this->session->flashdata('message');?>
</div><br />
<?php } ?>

<button><a href="<?php echo base_url('index.php/Lead/addlead')  ;?>">Add Lead</a></button>
					</div>
					<table class="table table-hover" id="dev-table" style="width:1500px;align:center">
						<thead>
							
							<tr>
								<th>#SRNO</th>
								<th>Customer Name</th>
								<th>Email-id</th>
								<th>Mobile Number</th>
								<th>Product</th>
								<th>Loan amount</th>
								<th>City</th>
								<th>User/DSA</th>
								<!--<th>Channel</th>-->
								<th>Action</th>
							</tr>
						</thead>
						<tbody>
							<?php 
								 foreach($leadList as $value){
									$lead_id = $value->lead_id;
									$dsa_id = $value->lead_dsa;
									$lead_first_name=$value->lead_first_name;
									$lead_last_name=$value->lead_last_name;
									$lead_email=$value->lead_email;
									$lead_mobile=$value->lead_mobile;
									$lead_loan_amount=$value->lead_loan_amount;
									$product_name	=$value->product_name	;
									$location_name	=$value->location_name	;
									$account_firstname	=$value->account_firstname	;
									$channel_type	=$value->channel_type	;
								?>
							<tr>
								<td><?php echo $lead_id ;?></td>
								<td><a href="<?php echo base_url('index.php/Lead/viewleaddeatils/'.$lead_id) ?>"><?php echo $lead_first_name." ".$lead_last_name ;?></a></td>
								<td><?php echo $lead_email ;?></td>
								<td><?php echo $lead_mobile ;?></td>
								<td><?php echo $product_name ;?></td>
								<td><?php echo $lead_loan_amount ;?></td>
								<td><?php echo $location_name	 ;?></td>
								<td><?php echo $account_firstname ;?></td>
								<td><button>
									<?php
										
										$invoiceArr = CHECKdsaExitance($lead_id);
										//print_r($invoiceArr);
										if($invoiceArr) {
										$invoideId = $invoiceArr['id'];
										
									?>
										<a href="<?php echo base_url('index.php/Lead/payoutinvoicedetails/'.$invoideId.'/'.$lead_id) ;?>">Payout</a>
									<?php
									} else {
									 ?>
										<a href="<?php echo base_url('index.php/Lead/addPayoutDetails/'.$lead_id) ;?>">Payout</a>
									<?php } ?>
									</button>
									</td>
									
									<td><button><a href="<?php echo base_url('index.php/lead/generateInvoice/'.$lead_id) ;?>">Add Payout</button</td>
							</tr>
							<?php
						}
					?>
						</tbody>
					</table>
					
				</div>
				<div class="clearfixmrg8"></div>
				<div class="text-right">
			
				<?= $this->pagination->create_links(); ?>
			</div>
			
			
		</div>
	</div>
