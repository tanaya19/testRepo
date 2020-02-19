<?php
defined('BASEPATH') OR exit('No direct script access allowed');

class Lead extends CI_Controller {

    function __construct() {
        parent::__construct();

        $this->load->model('Leadmodel');
    }
	public function leadlist($offset=0)
	{
		//echo $this->Leadmodel->num_rows();

		$config=[
				'base_url'=>base_url('index.php/Lead/Leadlist'),
				'per_page'=>20,
				'total_rows'=>$this->Leadmodel->num_rows(),
		];
		$this->pagination->initialize($config);
		$custname = $this->input->post('custname');
		$data=array();
		$result=$this->Leadmodel->getleads($custname,$config['per_page'],$this->uri->segment(3));
		$data["leadList"]=$result;
		$data["custname"]=$custname;
		//print_r($data);
		$this->load->view('lead/lead_list',$data);
	}
	
	public function viewleaddeatils($lead_id){
		
		//echo"Welcome dashboard";
		$result=$this->Leadmodel->viewdetail($lead_id);
		$editdata["lead_id"]=$lead_id;
		$editdata["data"]=$result;
		//print_r($editdata);
		$this->load->view('lead/lead_details',$editdata);
		}
		
		public function addlead(){
			//echo "Tanaya";
			$this->load->view('lead/add_lead');
		}
			
		public function PayoutDetails($lead_id){

			$result=$this->Leadmodel->viewdetail($lead_id);
			$editdata["lead_id"]=$lead_id;
			$editdata["data"]=$result;
			$this->load->view('lead/payoutall',$editdata);	
		}
		
	public function updatePayableAmt($invoiceId, $lead_id){
		
		
			$invoice_detail_id = $this->input->post("invoice_detail_id");
			$lead_loan_amount = $this->input->post("lead_loan_amount");
			$slabrate = $this->input->post("slabrate");
			$lead_loan_amount = $this->input->post("lead_loan_amount");
			
			$slabAmtCal = ($lead_loan_amount * ($slabrate/100));
			$totGSTAmt = ($lead_loan_amount * (18/100));
			$totTDSAmt = ($lead_loan_amount * (10/100));
			
			$fianlPayAmt = (($slabAmtCal + $totGSTAmt) - $totTDSAmt ) ;
		
		$totalpayable = $this->input->post("totalpayable");
			$dispaly=array(
			"total_payable_amt"=>$fianlPayAmt,
			"modified_at" => date("Y-m-d H:i:s")
		);
		$this->Leadmodel->updatePayout($invoiceId,$dispaly);
		$invoicedetailsupdate = array (
			
			"slab_rate" => $slabrate,
			"modified_at" => date("Y-m-d H:i:s")
		);
			$this->Leadmodel->updatePayoutdetails($invoice_detail_id,$invoicedetailsupdate);
			redirect('lead/payoutinvoicedetails/'.$invoiceId.'/'.$lead_id.'/');
		}
		
		public function invoiceGenerate($lead_id){
			echo "Tanaya-->";

			$result=$this->Leadmodel->invoiceDetail($lead_id);
			$editdata["lead_id"]=$lead_id;
			$editdata["data"]=$result;
			$this->load->view('lead/invoice',$editdata);
		}
		
		public function payoutinvoicedetails($invoiceID, $leadId) {
			//echo "tanaya========";
			$result=$this->Leadmodel->viewdsainvoicedetail($leadId);
			
			$editdata["invoiceId"]=$invoiceID;
			$editdata["lead_id"]=$leadId;
			$editdata["data"]=$result;
			$this->load->view('lead/invoice',$editdata);
		}
		
		public function PayoutaddDetails($lead_id){
			echo "tanaya--->>>>".$lead_id;
			$this->load->view('lead/add_payout');
		}
		
		public function addPayoutDetails($lead_id){
			$result=$this->Leadmodel->viewdsainvoicedetail($lead_id);
			$editdata["lead_id"]=$lead_id;
			$editdata["data"]=$result;
			$this->load->view('lead/payoutall',$editdata);	
		}
		
		public function save_invoiceDetails(){
		$lead_id = $this->input->post("lead_id");
		$dsa_id = $this->input->post("dsa_id");
		$slab_id = $this->input->post("slab_id");
		$lead_loan_amount = $this->input->post("lead_loan_amount");
		$slabrate = $this->input->post("slabrate");
		$invoice_date = $this->input->post("invoice_date");
		
		$slabAmtCal = ($lead_loan_amount * ($slabrate/100));
		$totGSTAmt = ($lead_loan_amount * (18/100));
		$totTDSAmt = ($lead_loan_amount * (10/100));
		
		$fianlPayAmt = ( ($slabAmtCal + $totGSTAmt) - $totTDSAmt  ) ;
		
		$invoiceNo = 'Exusys-'.date("m-y");
		
			$dispaly=array(
			"dsa_id"=>$dsa_id,
			"slab_id"=>$slab_id,
			"total_dist_amt"=>$lead_loan_amount,
			//"total_payable_amt"=>$slabAmtCal,
			"gst_amt"=>$totGSTAmt,
			"final_amt"=>$fianlPayAmt,
			"tds_amt"=>$totTDSAmt,
			"invoice_no" => $invoiceNo,
			"invoice_date" => $invoice_date,
			"created_at" => date("Y-m-d H:i:s"),
			 "modified_at" =>  date("Y-m-d H:i:s")
			 
		);
			$dsaMasterId = $this->Leadmodel->addIntoDSAMaster($dispaly);
			$datainsertdetails = array (
			 "dsa_master_id" => $dsaMasterId,
			 "slab_rate" => $slabrate,
			 "lead_id" => $lead_id,
			 "total_payable_amt" => $slabAmtCal,
			 "created_at" => date("Y-m-d H:i:s"),
			 "modified_at" =>  date("Y-m-d H:i:s")
			);
			$dsaInvoicedetailId = $this->Leadmodel->addIntoDSAMasterDetails($datainsertdetails);
			
			redirect('lead/payoutinvoicedetails/'.$dsaMasterId.'/'.$lead_id);
			//$this->load->view('lead/detailsDSA');
		}
			
		function update_invoiceDetails($invoiceId, $lead_id) {
			
			$invoice_detail_id = $this->input->post("invoice_detail_id");
			$lead_loan_amount = $this->input->post("lead_loan_amount");
			$slabrate = $this->input->post("slabrate");
			$lead_loan_amount = $this->input->post("lead_loan_amount");
			$slabAmtCal = ($lead_loan_amount * ($slabrate/100));
			$totGSTAmt = ($lead_loan_amount * (18/100));
			$totTDSAmt = ($lead_loan_amount * (10/100));
			
			echo "final---".$fianlPayAmt = (($slabAmtCal + $totGSTAmt) - $totTDSAmt ) ;
		}
		
		public function generateInvoice($lead_id){
			$result=$this->Leadmodel->viewdsainvoicedetail($lead_id);
			$editdata["lead_id"]=$lead_id;
			$editdata["data"]=$result;
			$this->load->view('lead/generate_Invoice_details',$editdata);
		}
		
		public function updateInvoicePaid($invoice_detail_id){
			$updateInvoicePaid = array (
			
			"invoice_paid" => 1,
			"modified_at" => date("Y-m-d H:i:s")
		);
			$this->Leadmodel->updateInvoicePaid($invoice_detail_id,$updateInvoicePaid);
			
		}
		
		
	
		
}

