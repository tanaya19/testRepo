<link href="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/css/bootstrap.min.css" rel="stylesheet" id="bootstrap-css">
<script src="//maxcdn.bootstrapcdn.com/bootstrap/3.3.0/js/bootstrap.min.js"></script>
<script src="//code.jquery.com/jquery-1.11.1.min.js"></script>
<!------ Include the above in your HEAD tag ---------->

 <!-- Forked from www  .j a  va  2 s  . c  o m-->
 <link rel="stylesheet" type="text/css"
  href="http://netdna.bootstrapcdn.com/twitter-bootstrap/2.3.2/css/bootstrap-combined.min.css">
 <div class="container">
    <div class="accordion" id="searchAccordion">
      <div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse"
            data-parent="#searchAccordion" href="#collapseOne">Add Lead</a>
        </div>
        <div id="collapseOne" class="accordion-body collapse in">
          <div class="accordion-inner">
            <form class="form-inline" name="addLeadform" action="">
              <div class="row-fluid">
                <div class="span4">
                  <label>Name</label> <input class="input-long" type="text" />
                </div>
                <div class="span4">
                  <label>Mobile Number</label> <input class="input-long" type="text" />
                </div>
                <div class="span4">
                  <label>City</label>  
                  <select name="rol" id="pos_select" class="form_input">
                      <option value="">---Select City---</option>
                      <option value="HR">HR</option>
                      <option value="Student">Student</option>
                  </select>
                </div>
                <div class="span4">
                  <label>Product</label> 
                  <select name="rol" id="pos_select" class="form_input">
                      <option value="">---Select Product---  </option>
                      <option value="HR">HR</option>
                      <option value="Student">Student</option>
                  </select>
                </div>
              </div>
             <button type="submit" name="submit" class="btn-primary">Submit</button>
          <a href="<?php echo base_url('index.php/Lead/leadlist'); ?>">Cancel</a>
            </form>
          </div>
        </div>
      </div>
      <!--<div class="accordion-group">
        <div class="accordion-heading">
          <a class="accordion-toggle" data-toggle="collapse"
            data-parent="#searchAccordion" href="">Advanced
            Options</a>
        </div>
        <div id="collapseTwo" class="accordion-body collapse">
          <div class="accordion-inner">
            <form class="form-inline">
              <div class="row-fluid">
                <div class="span4">
                  <label>Address</label> <input class="input-large" type="text" />
                </div>
                <div class="span4">
                  <label>Assessor</label> <input class="input-medium typeahead"
                    id="taAssessor" type="text" data-provide="typeahead"
                    autocomplete="off" />
                </div>
                <div class="span4">
                  <label>Client</label> <input class="input-large typeahead"
                    id="taClient" type="text" data-provide="typeahead"
                    autocomplete="off" />
                </div>
              </div>
              <div class="row-fluid">
                <div class="span4">
                  <label>Status</label> <input class="input-medium typeahead"
                    id="taStatus" type="text" data-provide="typeahead"
                    autocomplete="off" />
                </div>
                <div class="span4">
                  <label>Type</label> <input class="input-large typeahead"
                    id="taType" type="text" data-provide="typeahead"
                    autocomplete="off" />
                </div>
                <div class="span4">
                  <label>Department</label> <input class="input-medium typeahead"
                    id="taDepartment" type="text" data-provide="typeahead"
                    autocomplete="off" />
                </div>
              </div>
              <div class="row-fluid">
                <div class="span3">
                  <label>Client Ref</label> <input class="input-small"
                    type="text" />
                </div>
                <div class="span3">
                  <label>PO Number</label> <input class="input-small" type="text" />
                </div>
              </div>
            </form>
          </div>
        </div>
      </div>-->
    </div>
  </div>
</body>
</html>
