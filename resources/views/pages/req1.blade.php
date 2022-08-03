
<!-- Page Content  -->
@extends('layouts.app')

<head>
    <style>
        #accordion-1 table, th,td {
          width:0px;
        }
        .navbar-list li img{
            margin-top: 40% !important;
         }
    </style>
</head>

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="iq-right-fixed rounded iq-card iq-card iq-card-block iq-card-stretch iq-card-height" style="height:250px;">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Activity timeline</h4>
                           </div>
                           <!-- <div class="iq-card-header-toolbar d-flex align-items-center">
                              <div class="dropdown">
                                 <span class="dropdown-toggle text-primary" id="dropdownMenuButton4" data-toggle="dropdown">
                                 View All
                                 </span>
                                 <div class="dropdown-menu dropdown-menu-right" aria-labelledby="dropdownMenuButton">
                                    <a class="dropdown-item" href="#"><i class="ri-eye-fill mr-2"></i>View</a>
                                    <a class="dropdown-item" href="#"><i class="ri-delete-bin-6-fill mr-2"></i>Delete</a>
                                    <a class="dropdown-item" href="#"><i class="ri-pencil-fill mr-2"></i>Edit</a>
                                    <a class="dropdown-item" href="#"><i class="ri-printer-fill mr-2"></i>Print</a>
                                    <a class="dropdown-item" href="#"><i class="ri-file-download-fill mr-2"></i>Download</a>
                                 </div>
                              </div>
                           </div> -->
                        </div>
                        <div class="iq-card-body" style="box-sizing:border-box;">
                          
                           <div class="container">
                              <div class="row">
                                 <ul class="breadcrumb">
                                    <li class="active"><a href="{{ url('req1') }}" data-toggle="popover-hover" title="Requirement 1" data-content="Install and maintain a firewall configuration to protect cardholder data">Req # 1</a></li>
                                    <li><a href="{{ url('req2') }}" data-toggle="popover-hover" title="Requirement 2" data-content="Do not use vendor-supplied defaults for system passwords and other security parameters">Req # 2</a></li>
                                    <li><a href="{{ url('req3') }}" data-toggle="popover-hover" title="Requirement 3" data-content="Protect stored cardholder data">Req # 3</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 4" data-content="Encrypt transmission of cardholder data across open, public networks">Req # 4</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 5" data-content="Protect all systems against malware and regularly update anti-virus software or programs">Req # 5</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 6" data-content="Develop and maintain secure systems and applications">Req # 6</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 7" data-content="Restrict access to cardholder data by business need to know">Req # 7</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 8" data-content="Identify and authenticate access to system components">Req # 8</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 9" data-content="Restrict physical access to cardholder data">Req # 9</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 10" data-content="Track and monitor all access to network resources and cardholder data">Req # 10</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 11" data-content="Regularly test security systems and processes">Req # 11</a></li>
                                    <li><a href="javascript:void(0);" data-toggle="popover-hover" title="Requirement 12" data-content="Maintain a policy that addresses information security for all personnel">Req # 12</a></li>
                                 </ul>
                              </div>
                           </div>
                           <div class="container">
                              <div class="row" style="background-color: #f3f3f3; margin-top: 20px;">
                                 <h6 style="padding: 10px;">Requirement 1 : <span>Install and maintain a firewall configuration to protect cardholder data </span></h6>
                              </div>
                           </div>
                        </div>
                     
                     </div>
                  </div>
                  <div class="col-sm-12 col-lg-12">
                     <div class="iq-card">
                        <div class="iq-card-header d-flex justify-content-between">
                           <div class="iq-header-title">
                              <h4 class="card-title">Build and Maintain a Secure Network and Systems</h4>
                           </div>
                        </div>
                        <div id="accordion">
                              <div class="card">
                                <div class="card-header" id="heading-1">
                                  <h5 class="mb-0">
                                    <a role="button" id="req1" data-toggle="collapse" href="#collapse-1" aria-expanded="true" aria-controls="collapse-1">
                                       Requirement 1: 	Install and maintain a firewall configuration to protect cardholder data 
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse-1" class="collapse show" data-parent="#accordion" aria-labelledby="heading-1">
                                  <div class="card-body">
                                    <form id="form-wizard1">
                                    <div id="accordion-1">
                                      <div class="card">
                                        <div class="card-header" id="heading-1-1">
                                          <h5 class="mb-0">
                                            <a  role="button" data-toggle="collapse" href="#collapse-1-1" aria-expanded="true" aria-controls="collapse-1-1">
                                             1.1 Establish and implement firewall and router configuration standards that include the following:
                                             <br/>1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapse-1-1" class="collapse show" data-parent="#accordion-1" aria-labelledby="heading-1-1">
                                          <div class="card-body">
                            
                                              <div id="accordion-1-1">
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-1-1">
                                                    <h5 class="mb-0">
                                                      <a  role="button" data-toggle="collapse" href="#collapse-1-1-1" aria-expanded="true" aria-controls="collapse-1-1-1">
                                                        Requirement 1 . 1 . 1
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-1-1" class="collapse show" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-1">
                                                    <div class="card-body">
                                                       
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.1</b> A formal process for approving and testing all network connections and changes to the firewall and router configurations.</td>
                                                               
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="3" colspan="1">
                                                                <b>1.1.1.a</b> Examine documented procedures<br/> to verify there is a formal process for<br/> testing and approval of all:<br/><span style="font-size: 15px;font-weight: bolder;">&#8594;</span>	Network connections, and <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Changes to firewall and router configurations.
                                                               </td>
                                                               <td colspan="7">
                                                                  Identify the document(s) reviewed to verify procedures define the formal processes for:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Testing and approval of all network connections. 
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a1" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                     </div> 
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Testing and approval of all changes to firewall and router configurations. 
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a2" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                               <td rowspan="6" colspan="1">
                                                                  <b>1.1.1.b</b> For a sample of network connections, interview responsible personnel and examine records to verify that network connections were approved and tested.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the sample of records for network connections that were selected for this testing procedure.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a3" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that network connections were approved and tested.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a3" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  Describe how the sampled records verified that network connections were:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Approved
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a4" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Tested
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a5" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>

                                                            <tr>
                                                               <td rowspan="6" colspan="1">
                                                                  <b>1.1.1.c</b> Identify a sample of actual changes made to firewall and router configurations, compare to the change records, and interview responsible personnel to verify the changes were approved and tested.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the sample of records for firewall and router configuration changes that were selected for this testing procedure.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a6" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that changes made to firewall and router configurations were approved and tested.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a7" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  Describe how the sampled records verified that the firewall and router configuration changes were:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Approved
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a8" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Tested
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a9" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>

                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-1-2">
                                                    <h5 class="mb-0">
                                                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-2" aria-expanded="false" aria-controls="collapse-1-1-2">
                                                         Requirement 1 . 1 . 2
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-1-2" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-2">
                                                    <div class="card-body">
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.2</b> Current diagram that identifies all connections between the cardholder data environment and other networks, including any wireless networks.</td>
                                                              
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="5" colspan="1">
                                                                  <b>1.1.2.a</b> Examine diagram(s) and observe network configurations to verify that a current network diagram exists and that it documents all connections to the cardholder data environment, including any wireless networks.
                                                               </td>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the current network diagram(s) examined.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a10" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  Describe how network configurations verified that the diagram:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Is current.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a11" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Includes all connections to cardholder data. 
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a12" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Includes any wireless network connections.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a13" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                               <td rowspan="2" colspan="1">
                                                                  <b>1.1.2.b</b> Interview responsible personnel to verify that the diagram is kept current.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that the diagram is kept current.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a14" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            
                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-1-3">
                                                    <h5 class="mb-0">
                                                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-3" aria-expanded="false" aria-controls="collapse-1-1-3">
                                                         Requirement 1 . 1 . 3
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-1-3" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-3">
                                                    <div class="card-body">
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.3</b> Current diagram that shows all cardholder data flows across systems and networks.</td>
                                                              
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="3" colspan="1">
                                                                  <b>1.1.3.a</b> Examine data flow diagram and interview personnel to verify the diagram:
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Shows all cardholder data flows across systems and networks.
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Is kept current and updated as needed upon changes to the environment.
                                                                  
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the data-flow diagram(s) examined. 
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a15" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that the diagram:
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Shows all cardholder data flows across systems and networks.
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Is kept current and updated as needed upon changes to the environment.
                                                                  
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a16" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>

                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card">
                                                   <div class="card-header" id="heading-1-1-4">
                                                     <h5 class="mb-0">
                                                       <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-4" aria-expanded="false" aria-controls="collapse-1-1-4">
                                                         Requirement 1 . 1 . 4
                                                       </a>
                                                     </h5>
                                                   </div>
                                                   <div id="collapse-1-1-4" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-4">
                                                     <div class="card-body">
                                                        
                                                       <table style="width:100%">
                                                          <tr>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                          </tr>
                                                          <tr>
                                                           </tr>
                                                          <!-- <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                          </tr>
                                                          <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                          </tr> -->
                                                          <tr>
                                                             <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                             <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                             <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.4</b> Requirements for a firewall at each Internet connection and between any demilitarized zone (DMZ) and the internal network zone.</td>
                                                              
                                                             </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.4.a</b> Examine the firewall configuration standards and verify that they include requirements for a firewall<br/> at each Internet connection and <br/>between any DMZ and the internal network zone.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall configuration standards document examined to verify requirements for a firewall:
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	At each Internet connection.
                                                                  <br/><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Between any DMZ and the internal network zone.

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a17" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.4.b</b> Verify that the current network diagram is consistent with the firewall configuration standards.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Provide the name of the assessor who attests that the current network diagram is consistent with the firewall configuration standards.

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a18" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="4" colspan="1">
                                                                  <b>1.1.4.c</b> Observe network configurations to verify that a firewall is in place at each Internet connection and between any demilitarized zone (DMZ) and the internal network zone, per the documented configuration standards and network diagrams.
                                                               </td>
                                                            </tr>
                                                             <tr>
                                                               <td colspan="7">
                                                                  Describe how network configurations verified that, per the documented configuration standards and network diagrams, a firewall is in place:
                                                                 </td>
                                                            </tr>
                                                             <tr>
                                                                <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	At each Internet connection.
                                                                </td>
                                                                <td colspan="6">
                                                                   <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a30" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                  </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Between any DMZ and the internal network zone.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a19" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                             
                                                            
                                                        </table>
                                                     </div>
                                                   </div>
                                                 </div>

                                                 <div class="card">
                                                   <div class="card-header" id="heading-1-1-5">
                                                     <h5 class="mb-0">
                                                       <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-5" aria-expanded="false" aria-controls="collapse-1-1-5">
                                                         Requirement 1 . 1 . 5
                                                       </a>
                                                     </h5>
                                                   </div>
                                                   <div id="collapse-1-1-5" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-5">
                                                     <div class="card-body">
                                                        
                                                       <table style="width:100%">
                                                          <tr>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                          </tr>
                                                          <tr>
                                                           </tr>
                                                          <!-- <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                          </tr>
                                                          <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                          </tr> -->
                                                          <tr>
                                                             <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                             <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                             <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.5</b> Description of groups, roles, and responsibilities for management of network components.</td>
                                                                
                                                             </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.5.a</b> Verify that firewall and router configuration standards include a description of groups, roles, and responsibilities for management of network components.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall and router configuration standards document(s) reviewed to verify they include a description of groups, roles and responsibilities for management of network components.

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a20" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.5.b</b> Interview personnel responsible for management of network components to confirm that roles and responsibilities are assigned as documented.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that roles and responsibilities are assigned as documented. 

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a21" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            
                                                        </table>
                                                     </div>
                                                   </div>
                                                 </div>

                                                 <div class="card">
                                                   <div class="card-header" id="heading-1-1-6">
                                                     <h5 class="mb-0">
                                                       <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-6" aria-expanded="false" aria-controls="collapse-1-1-6">
                                                         Requirement 1 . 1 . 6
                                                       </a>
                                                     </h5>
                                                   </div>
                                                   <div id="collapse-1-1-6" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-6">
                                                     <div class="card-body">
                                                        
                                                       <table style="width:100%">
                                                          <tr>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                          </tr>
                                                          <tr>
                                                           </tr>
                                                          <!-- <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                          </tr>
                                                          <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                          </tr> -->
                                                          <tr>
                                                             <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                             <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                             <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.6</b> Documentation of business justification and approval for use of all services, protocols, and ports allowed, including documentation of security features implemented for those protocols considered to be insecure.</td>
                                                               
                                                             </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.6.a</b> Verify that firewall and router configuration standards include a documented list of all services, protocols and ports, including business justification and approval for each.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall and router configuration standards document(s) reviewed to verify the document(s) contains a list of all services, protocols and ports necessary for business, including a business justification and approval for each.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a22" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                             <tr>
                                                                <td rowspan="5" colspan="1">
                                                                  <b>1.1.6.b</b> Identify insecure services, protocols, and ports allowed; and verify that security features are documented for each service. 
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Indicate whether any insecure services, protocols or ports are allowed. (yes/no)
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a23" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Indicate whether any insecure services, protocols or ports are allowed. (yes/no)
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a24" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  If “yes,” complete the instructions below for EACH insecure service, protocol, and port allowed: (add rows as needed)
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall and router configuration standards document(s) reviewed to verify that security features are documented for each insecure service/protocol/port.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a25"  title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="4" colspan="1">
                                                                  <b>1.1.6.c</b> Examine firewall and router configurations to verify that the documented security features are implemented for each insecure service, protocol, and port.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  If “yes” at 1.1.6.b, complete the following for each insecure service, protocol, and/or port present (add rows as needed):
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Describe how firewall and router configurations verified that the documented security features are implemented for each insecure service, protocol and/or port.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a26" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            
                                                        </table>
                                                     </div>
                                                   </div>
                                                 </div>

                                                 <div class="card">
                                                   <div class="card-header" id="heading-1-1-7">
                                                     <h5 class="mb-0">
                                                       <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-1-7" aria-expanded="false" aria-controls="collapse-1-1-7">
                                                         Requirement 1 . 1 . 7
                                                       </a>
                                                     </h5>
                                                   </div>
                                                   <div id="collapse-1-1-7" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-1-7">
                                                     <div class="card-body">
                                                        
                                                       <table style="width:100%">
                                                          <tr>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                            <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                          </tr>
                                                          <tr>
                                                           </tr>
                                                          <!-- <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                          </tr>
                                                          <tr>
                                                             <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                          </tr> -->
                                                          <tr>
                                                             <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                             <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                             <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.1.7</b> Requirement to review firewall and router rule sets at least every six months.</td>
                                                                
                                                             </tr>
                                                             <tr>
                                                                <td rowspan="2" colspan="1">
                                                                  <b>1.1.7.a</b> Verify that firewall and router configuration standards require review of firewall and router rule sets at least every six months.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall and router configuration standards document(s) reviewed to verify they require a review of firewall rule sets at least every six months. 

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a27" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                             <tr>
                                                                <td rowspan="3" colspan="1">
                                                                  <b>1.1.7.b</b> Examine documentation relating to rule set reviews and interview responsible personnel to verify that the rule sets are reviewed at least every six months.
                                                                </td>
                                                             </tr>
                                                             <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the document(s) relating to rule set reviews that were examined to verify that rule sets are reviewed at least every six months for firewall and router rule sets.

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a28" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the responsible personnel interviewed who confirm that rule sets are reviewed at least every six months for firewall and router rule sets.

                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a29" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            
                                                        </table>
                                                     </div>
                                                   </div>
                                                 </div>

                                              </div>
                            
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                        <div class="card-header" id="heading-1-2">
                                          <h5 class="mb-0">
                                            <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2" aria-expanded="false" aria-controls="collapse-1-2">
                                             1.2 Build firewall and router configurations that restrict connections between untrusted networks and any system components in the cardholder data environment.<br>
                                             Note: An “untrusted network” is any network that is external to the networks belonging to the entity under review, and/or which is out of the entity's ability to control or manage.<br>
                                             1.2 Examine firewall and router configurations and perform the following to verify that connections are restricted between untrusted networks and system components in the cardholder data environment:
                                            </a>
                                          </h5>
                                        </div>
                                        <div id="collapse-1-2" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-2">
                                          <div class="card-body">
                            
                                              <div id="accordion-1-2">
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-2-1">
                                                    <h5 class="mb-0">
                                                      <a  role="button" data-toggle="collapse" href="#collapse-1-2-1" aria-expanded="true" aria-controls="collapse-1-2-1">
                                                         Requirement 1 . 2 . 1
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-2-1" class="collapse show" data-parent="#accordion-1-1" aria-labelledby="heading-1-2-1">
                                                    <div class="card-body">
                                                       
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.2.1</b> Restrict inbound and outbound traffic to that which is necessary for the cardholder data environment, and specifically deny all other traffic.</td>
                                                               
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="2" colspan="1">
                                                                <b>1.2.1.a</b> Examine firewall and router configuration standards to verify that they identify inbound and outbound traffic necessary for the cardholder data environment.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Identify the firewall and router configuration standards document(s) reviewed to verify they identify inbound and outbound traffic necessary for the cardholder data environment.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a111" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                     </div> 
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="3" colspan="1">
                                                                  <b>1.2.1.b</b> Examine firewall and router configurations to verify that inbound and outbound traffic is limited to that which is necessary for the cardholder data environment.
                                                               </td>
                                                               <td colspan="7">
                                                                  Describe how firewall and router configurations verified that the following traffic is limited to that which is necessary for the cardholder data environment:
                                                                 </td>
                                                            </tr>
                                                            
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Inbound traffic
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a114" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Outbound traffic
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a115" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>

                                                            <tr>
                                                               <td rowspan="6" colspan="1">
                                                                  <b>1.2.1.c</b> Examine firewall and router configurations to verify that all other inbound and outbound traffic is specifically denied, for example by using an explicit “deny all” or an implicit deny after allow statement.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  Describe how firewall and router configurations verified that the following is specifically denied:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	All other inbound traffic
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a116" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>		All other outbound traffic
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a117" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>

                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-2-2">
                                                    <h5 class="mb-0">
                                                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2-2" aria-expanded="false" aria-controls="collapse-1-2-2">
                                                         Requirement 1 . 2 . 2
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-2-2" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-2-2">
                                                    <div class="card-body">
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.2.2</b> Secure and synchronize router configuration files.</td>
                                                               
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <b>1.2.2.a</b> Examine router configuration files to verify they are secured from unauthorized access.
                                                               </td>
                                                               <td rowspan="1" colspan="1">
                                                                  Describe how router configuration files are secured from unauthorized access.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a210" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                           
                                                            
                                                            <tr>
                                                               <td rowspan="2" colspan="1">
                                                                  <b>1.2.2.b</b> Examine router configurations to verify they are synchronized—for example, the running (or active) configuration matches the start-up configuration (used when machines are booted).
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Describe how router configurations are synchronized.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a211" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            
                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>
                                                <div class="card">
                                                  <div class="card-header" id="heading-1-2-3">
                                                    <h5 class="mb-0">
                                                      <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-2-3" aria-expanded="false" aria-controls="collapse-1-2-3">
                                                         Requirement 1 . 2 . 3
                                                      </a>
                                                    </h5>
                                                  </div>
                                                  <div id="collapse-1-2-3" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-2-3">
                                                    <div class="card-body">
                                                      <table style="width:100%">
                                                         <tr>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                           <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                         </tr>
                                                         <tr>
                                                          </tr>
                                                         <!-- <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                         </tr> -->
                                                         <tr>
                                                            <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                            <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                            <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.2.3</b> Install perimeter firewalls between all wireless networks and the cardholder data environment, and configure these firewalls to deny or, if traffic is necessary for business purposes, permit only authorized traffic between the wireless environment and the cardholder data environment.</td>
                                                              
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="2" colspan="1">
                                                                  <b>1.2.3.a</b> Examine firewall and router configurations to verify that there are perimeter firewalls installed between all wireless networks and the cardholder data environment.
                                                              
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  Describe how firewall and router configurations verified that perimeter firewalls are in place between all wireless networks and the cardholder data environment.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a515" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="6" colspan="1">
                                                                  <b>1.2.3.b</b> Verify that the firewalls deny or, if traffic is necessary for business purposes, permit only authorized traffic between the wireless environment and the cardholder data environment.
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span> Indicate whether traffic between the wireless environment and the cardholder data environment is necessary for business purposes. (yes/no)
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a116" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  If “no”:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Describe how firewall and/or router configurations verified that firewalls deny all traffic from any wireless environment into the cardholder environment.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a516" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>
                                                            <tr>
                                                               <td colspan="7">
                                                                  If “yes”:
                                                                 </td>
                                                            </tr>
                                                            <tr>
                                                               <td rowspan="1" colspan="1">
                                                                  <span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>Describe how firewall and/or router configurations verified that firewalls permit only authorized traffic from any wireless environment into the cardholder environment.
                                                               </td>
                                                               <td colspan="6">
                                                                  <div class="form-group col-md-12 Inputfield">
                                                                     <div class="d-flex " style="align-items: center;">
                                                                         <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                         <a href="javascript:void(0);" class="add_button" id="a517" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                        
                                                                         <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                           <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                         </label>
                                                                         <input id="file-input" type="file" style="display:none;"/>
                                                                         
                                                                     </div>
                                                                 </div>
                                                               </td>
                                                            </tr>

                                                       </table>
                                                    </div>
                                                  </div>
                                                </div>

                                              </div>
                            
                                          </div>
                                        </div>
                                      </div>
                                      <div class="card">
                                       <div class="card-header" id="heading-1-3">
                                         <h5 class="mb-0">
                                           <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3" aria-expanded="false" aria-controls="collapse-1-3">
                                             1.3 Prohibit direct public access between the Internet and any system component in the cardholder data environment.<br>
                                             1.3 Examine firewall and router configurations—including but not limited to the choke router at the Internet, the DMZ router and firewall, the DMZ cardholder segment, the perimeter router, and the internal cardholder network segment—and perform the following to determine that there is no direct access between the Internet and system components in the internal cardholder network segment:
                                           </a>
                                         </h5>
                                       </div>
                                       <div id="collapse-1-3" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-3">
                                         <div class="card-body">
                           
                                             <div id="accordion-1-3">
                                               <div class="card">
                                                 <div class="card-header" id="heading-1-3-1">
                                                   <h5 class="mb-0">
                                                     <a  role="button" data-toggle="collapse" href="#collapse-1-3-1" aria-expanded="true" aria-controls="collapse-1-3-1">
                                                      Requirement 1 . 3 . 1
                                                     </a>
                                                   </h5>
                                                 </div>
                                                 <div id="collapse-1-3-1" class="collapse show" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-1">
                                                   <div class="card-body">
                                                      
                                                     <table style="width:100%">
                                                        <tr>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                        </tr>
                                                        <tr>
                                                         </tr>
                                                        <!-- <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                        </tr> -->
                                                        <tr>
                                                           <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                           <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                           <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.1</b> Implement a DMZ to limit inbound traffic to only system components that provide authorized publicly accessible services, protocols, and ports.</td>
                                                              
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="2" colspan="1">
                                                               <b>1.3.1.a</b>Examine firewall and router configurations to verify that a DMZ is implemented to limit inbound traffic to only system components that provide authorized publicly accessible services, protocols, and ports.
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that the DMZ is implemented to limit inbound traffic to only system components that provide authorized publicly accessible services, protocols, and ports.
                                                              </td>
                                                              <td colspan="6">
                                                                 <div class="form-group col-md-12 Inputfield">
                                                                    <div class="d-flex " style="align-items: center;">
                                                                        <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                        <a href="javascript:void(0);" class="add_button" id="a111" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                       
                                                                        <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                          <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                        </label>
                                                                        <input id="file-input" type="file" style="display:none;"/>
                                                                    </div> 
                                                                </div>
                                                              </td>
                                                           </tr>
                                                           
                                                      </table>
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="card">
                                                 <div class="card-header" id="heading-1-3-2">
                                                   <h5 class="mb-0">
                                                     <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-2" aria-expanded="false" aria-controls="collapse-1-3-2">
                                                      Requirement 1 . 3 . 2
                                                     </a>
                                                   </h5>
                                                 </div>
                                                 <div id="collapse-1-3-2" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-2">
                                                   <div class="card-body">
                                                     <table style="width:100%">
                                                        <tr>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                        </tr>
                                                        <tr>
                                                         </tr>
                                                        <!-- <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                        </tr> -->
                                                        <tr>
                                                           <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                           <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                           <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.2</b>Examine firewall and router configurations to verify that inbound Internet traffic is limited to IP addresses within the DMZ.</td>
                                                              
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="1" colspan="1">
                                                                 <b>1.3.2</b> Describe how firewall and router configurations verified that configurations limit inbound Internet traffic to IP addresses within the DMZ. 
                                                              </td>
                                                              <td rowspan="1" colspan="1">
                                                                 Describe how router configuration files are secured from unauthorized access.
                                                              </td>
                                                              <td colspan="6">
                                                                 <div class="form-group col-md-12 Inputfield">
                                                                    <div class="d-flex " style="align-items: center;">
                                                                        <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                        <a href="javascript:void(0);" class="add_button" id="a710" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                       
                                                                        <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                          <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                        </label>
                                                                        <input id="file-input" type="file" style="display:none;"/>
                                                                        
                                                                    </div>
                                                                </div>
                                                              </td>
                                                           </tr>
                                                          
                                                           
                                                           
                                                      </table>
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="card">
                                                 <div class="card-header" id="heading-1-3-3">
                                                   <h5 class="mb-0">
                                                     <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-3" aria-expanded="false" aria-controls="collapse-1-3-3">
                                                      Requirement 1 . 3 . 3
                                                     </a>
                                                   </h5>
                                                 </div>
                                                 <div id="collapse-1-3-3" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-3">
                                                   <div class="card-body">
                                                     <table style="width:100%">
                                                        <tr>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                        </tr>
                                                        <tr>
                                                         </tr>
                                                        <!-- <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                        </tr> -->
                                                        <tr>
                                                           <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                           <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                           <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.3</b> Implement anti-spoofing measures to detect and block forged source IP addresses from entering the network.
                                                               <br>(For example, block traffic originating from the Internet with an internal source address)
                                                            </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="2" colspan="1">
                                                                 <b>1.3.3</b> Examine firewall and router configurations to verify that anti-spoofing measures are implemented, for example internal addresses cannot pass from the Internet into the DMZ.
                                                             
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that anti-spoofing measures are implemented.
                                                              </td>
                                                              <td colspan="6">
                                                                 <div class="form-group col-md-12 Inputfield">
                                                                    <div class="d-flex " style="align-items: center;">
                                                                        <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                        <a href="javascript:void(0);" class="add_button" id="a815" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                       
                                                                        <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                          <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                        </label>
                                                                        <input id="file-input" type="file" style="display:none;"/>
                                                                        
                                                                    </div>
                                                                </div>
                                                                </td>
                                                           </tr>
                                                           

                                                      </table>
                                                   </div>
                                                 </div>
                                               </div>
                                               <div class="card">
                                                <div class="card-header" id="heading-1-3-4">
                                                  <h5 class="mb-0">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-4" aria-expanded="false" aria-controls="collapse-1-3-4">
                                                      Requirement 1 . 3 . 4
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapse-1-3-4" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-4">
                                                  <div class="card-body">
                                                    <table style="width:100%">
                                                       <tr>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                       </tr>
                                                       <tr>
                                                        </tr>
                                                       <!-- <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                       </tr> -->
                                                       <tr>
                                                          <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                          <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                          <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.4</b> Do not allow unauthorized outbound traffic from the cardholder data environment to the Internet.
                                                           </td>
                                                            
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="2" colspan="1">
                                                                <b>1.3.4</b> Examine firewall and router configurations to verify that outbound traffic from the cardholder data environment to the Internet is explicitly authorized.
                                                             </td>
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that outbound traffic from the cardholder data environment to the Internet is explicitly authorized.
                                                             </td>
                                                             <td colspan="6">
                                                                <div class="form-group col-md-12 Inputfield">
                                                                   <div class="d-flex " style="align-items: center;">
                                                                       <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                       <a href="javascript:void(0);" class="add_button" id="a915" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                      
                                                                       <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                         <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                       </label>
                                                                       <input id="file-input" type="file" style="display:none;"/>
                                                                       
                                                                   </div>
                                                               </div>
                                                               </td>
                                                          </tr>
                                                          

                                                     </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="card">
                                                <div class="card-header" id="heading-1-3-5">
                                                  <h5 class="mb-0">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-5" aria-expanded="false" aria-controls="collapse-1-3-5">
                                                      Requirement 1 . 3 . 5
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapse-1-3-5" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-5">
                                                  <div class="card-body">
                                                    <table style="width:100%">
                                                       <tr>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                       </tr>
                                                       <tr>
                                                        </tr>
                                                       <!-- <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                       </tr> -->
                                                       <tr>
                                                          <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                          <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                          <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.5</b> Permit only “established” connections into the network.
                                                           </td>
                                                              
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="2" colspan="1">
                                                                <b>1.3.5</b>Examine firewall and router configurations to verify that the firewall permits only established connections into internal network, and denies any inbound connections not associated with a previously established session.
                                                             </td>
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that the firewall permits only established connections into internal network, and denies any inbound connections not associated with a previously established session
                                                             </td>
                                                             <td colspan="6">
                                                                <div class="form-group col-md-12 Inputfield">
                                                                   <div class="d-flex " style="align-items: center;">
                                                                       <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                       <a href="javascript:void(0);" class="add_button" id="a1115" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                      
                                                                       <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                         <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                       </label>
                                                                       <input id="file-input" type="file" style="display:none;"/>
                                                                       
                                                                   </div>
                                                               </div>
                                                               </td>
                                                          </tr>
                                                          

                                                     </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="card">
                                                <div class="card-header" id="heading-1-3-6">
                                                  <h5 class="mb-0">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-6" aria-expanded="false" aria-controls="collapse-1-3-6">
                                                      Requirement 1 . 3 . 6
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapse-1-3-6" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-6">
                                                  <div class="card-body">
                                                    <table style="width:100%">
                                                       <tr>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                       </tr>
                                                       <tr>
                                                        </tr>
                                                       <!-- <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                       </tr> -->
                                                       <tr>
                                                          <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                          <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                          <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.6</b> Place system components that store cardholder data (such as a database) in an internal network zone, segregated from the DMZ and other untrusted networks. 
                                                           </td>
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="4" colspan="1">
                                                                <b>1.3.6</b>Examine firewall and router configurations to verify that system components that store cardholder data are on an internal network zone, segregated from the DMZ and other untrusted networks. 
                                                             </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                             <td rowspan="1" colspan="1">
                                                               Indicate whether any system components store cardholder data. (yes/no)
                                                             </td>
                                                             <td colspan="6">
                                                                <div class="form-group col-md-12 Inputfield">
                                                                   <div class="d-flex " style="align-items: center;">
                                                                       <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                       <a href="javascript:void(0);" class="add_button" id="a1215" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                      
                                                                       <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                         <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                       </label>
                                                                       <input id="file-input" type="file" style="display:none;"/>
                                                                       
                                                                   </div>
                                                               </div>
                                                               </td>
                                                          </tr>
                                                          <tr>
                                                            <td colspan="7">
                                                               If “yes”:
                                                         </tr>
                                                          <tr>
                                                            <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that the system components that store cardholder data are located on an internal network zone, and are segregated from the DMZ and other untrusted networks.
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1216" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                      
                                                                  </div>
                                                              </div>
                                                              </td>
                                                         </tr>

                                                     </table>
                                                  </div>
                                                </div>
                                              </div>
                                              <div class="card">
                                                <div class="card-header" id="heading-1-3-7">
                                                  <h5 class="mb-0">
                                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-3-7" aria-expanded="false" aria-controls="collapse-1-3-7">
                                                      Requirement 1 . 3 . 7
                                                    </a>
                                                  </h5>
                                                </div>
                                                <div id="collapse-1-3-7" class="collapse" data-parent="#accordion-1-1" aria-labelledby="heading-1-3-7">
                                                  <div class="card-body">
                                                    <table style="width:100%">
                                                       <tr>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                         <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                       </tr>
                                                       <tr>
                                                        </tr>
                                                       <!-- <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                       </tr>
                                                       <tr>
                                                          <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                       </tr> -->
                                                       <tr>
                                                          <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                          <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                          <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.3.7</b> Do not disclose private IP addresses and routing information to unauthorized parties.
                                                            <br>Note: Methods to obscure IP addressing may include, but are not limited to:
                                                            <br><span style="font-size: 15px;font-weight: bolder;"><&#x2192;/span>	Network Address Translation (NAT),
                                                            <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span> Placing servers containing cardholder data behind proxy servers/firewalls, 
                                                            <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Removal or filtering of route advertisements for private networks that employ registered addressing, 
                                                            <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span>	Internal use of RFC1918 address space instead of registered addresses.
                                                            
                                                           </td>
                                                             
                                                          </tr>
                                                          <tr>
                                                             <td rowspan="2" colspan="1">
                                                                <b>1.3.7.a</b> Examine firewall and router configurations to verify that methods are in place to prevent the disclosure of private IP addresses and routing information from internal networks to the Internet. 
                                                             </td>
                                                          </tr>
                                                          
                                                          <tr>
                                                             <td rowspan="1" colspan="1">
                                                               Describe how firewall and router configurations verified that methods are in place to prevent the disclosure of private IP addresses and routing information from internal networks to the Internet.
                                                             </td>
                                                             <td colspan="6">
                                                                <div class="form-group col-md-12 Inputfield">
                                                                   <div class="d-flex " style="align-items: center;">
                                                                       <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                       <a href="javascript:void(0);" class="add_button" id="a1315" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                      
                                                                       <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                         <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                       </label>
                                                                       <input id="file-input" type="file" style="display:none;"/>
                                                                       
                                                                   </div>
                                                               </div>
                                                               </td>
                                                          </tr>
                                                          <tr>
                                                            <td rowspan="3" colspan="1">
                                                               <b>1.3.7.b</b> Interview personnel and examine documentation to verify that any disclosure of private IP addresses and routing information to external entities is authorized.
                                                            </td>
                                                         </tr>
                                                         
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               Identify the document reviewed that specifies whether any disclosure of private IP addresses and routing information to external parties is permitted. 
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1316" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                      
                                                                  </div>
                                                              </div>
                                                              </td>
                                                         </tr>
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               For each permitted disclosure, identify the responsible personnel interviewed who confirm that the disclosure is authorized.
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1317" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                      
                                                                  </div>
                                                              </div>
                                                              </td>
                                                         </tr>

                                                     </table>
                                                  </div>
                                                </div>
                                              </div>

                                             </div>
                           
                                         </div>
                                       </div>
                                     </div>
                                     <div class="card">
                                       <div class="card-header" id="heading-1-4">
                                         <h5 class="mb-0">
                                           <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-4" aria-expanded="false" aria-controls="collapse-1-4">
                                             1.4
                                           </a>
                                         </h5>
                                       </div>
                                       <div id="collapse-1-4" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-4">
                                         <div class="card-body">
                           
                                             <div id="accordion-1-3">
                                               <div class="card">
                                                 <div class="card-header" id="heading-1-4-1">
                                                   <h5 class="mb-0">
                                                     <a  role="button" data-toggle="collapse" href="#collapse-1-4-1" aria-expanded="true" aria-controls="collapse-1-4-1">
                                                      Requirement 1 . 4 . 1
                                                     </a>
                                                   </h5>
                                                 </div>
                                                 <div id="collapse-1-4-1" class="collapse show" data-parent="#accordion-1-1" aria-labelledby="heading-1-4-1">
                                                   <div class="card-body">
                                                      
                                                     <table style="width:100%">
                                                        <tr>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                        </tr>
                                                        <tr>
                                                         </tr>
                                                        <!-- <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                        </tr> -->
                                                        <tr>
                                                           <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                           <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                           <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.4</b> Install personal firewall software or equivalent functionality on any portable computing devices (including company and/or employee/owned) that connect to the Internet when outside the network (for example, laptops used by employees), and which are also used to access the CDE. Firewall (or equivalent) configurations include:
                                                               <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span> Specific configuration settings are defined. 
                                                               <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span> Personal firewall (or equivalent functionality) is actively running.
                                                               <br><span style="font-size: 15px;font-weight: bolder;">&#x2192;</span> Personal firewall (or equivalent functionality) is not alterable by users of the portable computing devices. 
                                                            </td>
                                                             
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="4" colspan="1">
                                                                  <b>1.4.a</b> Examine policies and configuration standards to verify:
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall software or equivalent functionality is required for all portable computing devices (including company and/or employee-owned) that connect to the Internet when outside the network, (for example, laptops used by employees), and which are also used to access the CDE. 
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Specific configuration settings are defined for personal firewall or equivalent functionality. 
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall or equivalent functionality is configured to actively run. 
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall or equivalent functionality is configured to not be alterable by users of the portable computing devices.
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="1" colspan="1">
                                                               Indicate whether portable computing devices (including company and/or employee-owned) with direct connectivity to the Internet when outside the network are used to access the organization’s CDE. (yes/no)
                                                              </td>
                                                              <td colspan="6">
                                                                 <div class="form-group col-md-12 Inputfield">
                                                                    <div class="d-flex " style="align-items: center;">
                                                                        <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                        <a href="javascript:void(0);" class="add_button" id="a1709" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                       
                                                                        <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                          <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                        </label>
                                                                        <input id="file-input" type="file" style="display:none;"/>
                                                                    </div> 
                                                                </div>
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                            <td rowspan="1" colspan="1">
                                                               If “no,” identify the document reviewed that explicitly prohibits portable computing devices (including company and/or employee-owned) with direct connectivity to the Internet when outside the network from being used to access the organization’s CDE.
                                                               Mark 1.4.b as “not applicable”
                                                               
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1710" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               If “yes,” identify the documented policies and configuration standards that define the following:
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall software or equivalent functionality is required for all portable computing devices (including company and/or employee-owned) that connect to the Internet when outside the network, (for example, laptops used by employees), and which are also used to access the CDE
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Specific configuration settings are defined for personal firewall or equivalent functionality. 
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall or equivalent functionality is configured to actively run. 
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall or equivalent functionality is configured to not be alterable by users of the portable computing devices.
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1711" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>

                                                         <tr>
                                                            <td rowspan="8" colspan="1">
                                                                <b>1.4.b</b> Personal firewall or equivalent functionality is not alterable by users of the portable computing devices.
                                                                <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall (or equivalent functionality) is installed and configured per the organization’s specific configuration settings.
                                                                <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall (or equivalent functionality) is actively running.
                                                                <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Personal firewall or equivalent functionality is not alterable by users of the portable computing devices.
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               Identify the sample of mobile and/or employee-owned devices selected for this testing procedure.
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1811" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td colspan="7">
                                                               Describe how the sample of portable computing devices (including company and/or employee-owned) verified that personal firewall software is:
                                                              </td>
                                                         </tr>
                                                         
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               &#x2192;	Installed and configured per the organization’s specific configuration settings.
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1812" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                         
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               &#x2192;	Actively running.
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1814" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                         <tr>
                                                            <td rowspan="1" colspan="1">
                                                               &#x2192;	Not alterable by users of mobile and/or employee-owned devices.
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1815" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                           
                                                      </table>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                           
                                         </div>
                                       </div>
                                     </div>
                                     <div class="card">
                                       <div class="card-header" id="heading-1-5">
                                         <h5 class="mb-0">
                                           <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-1-5" aria-expanded="false" aria-controls="collapse-1-5">
                                             1.5
                                           </a>
                                         </h5>
                                       </div>
                                       <div id="collapse-1-5" class="collapse" data-parent="#accordion-1" aria-labelledby="heading-1-5">
                                         <div class="card-body">
                           
                                             <div id="accordion-1-5">
                                               <div class="card">
                                                 <div class="card-header" id="heading-1-5-1">
                                                   <h5 class="mb-0">
                                                     <a  role="button" data-toggle="collapse" href="#collapse-1-5-1" aria-expanded="true" aria-controls="collapse-1-5-1">
                                                      Requirement 1 . 5 . 1
                                                     </a>
                                                   </h5>
                                                 </div>
                                                 <div id="collapse-1-5-1" class="collapse show" data-parent="#accordion-1-1" aria-labelledby="heading-1-5-1">
                                                   <div class="card-body">
                                                      
                                                     <table style="width:100%">
                                                        <tr>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">PCI DSS Requirements <p>and Testing Procedures</p></th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Instruction</th>
                                                          <th colspan="1" rowspan="2" bgcolor="#bd1e2d">Reporting Details:<p>Assessor’s Response</p></th>
                                                        </tr>
                                                        <tr>
                                                         </tr>
                                                        <!-- <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Establish and implement firewall and router configuration standards that include the following:</td>
                                                        </tr>
                                                        <tr>
                                                           <td colspan="8" style="text-align: left;" class="pl-md-2">1.1 Inspect the firewall and router configuration standards and other documentation specified below and verify that standards are complete and implemented as follows:</td>
                                                        </tr> -->
                                                        <tr>
                                                           <!-- <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                                           <td colspan="1" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td> -->
                                                           <td colspan="3" style="text-align: left;" class="pl-md-2"><b>1.5</b> Ensure that security policies and operational procedures for managing firewalls are documented, in use, and known to all affected parties.
                                                            </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="3" colspan="1">
                                                                  <b>1.5</b> Examine documentation and interview personnel to verify that security policies and operational procedures for managing firewalls are:
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Documented, 
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> In use, and 
                                                                  <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Known to all affected parties.
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                              <td rowspan="1" colspan="1">
                                                               Identify the document reviewed to verify that security policies and operational procedures for managing firewalls are documented.
                                                              </td>
                                                              <td colspan="6">
                                                                 <div class="form-group col-md-12 Inputfield">
                                                                    <div class="d-flex " style="align-items: center;">
                                                                        <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                        <a href="javascript:void(0);" class="add_button" id="a1909" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                       
                                                                        <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                          <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                        </label>
                                                                        <input id="file-input" type="file" style="display:none;"/>
                                                                    </div> 
                                                                </div>
                                                              </td>
                                                           </tr>
                                                           <tr>
                                                            <td rowspan="1" colspan="1">
                                                               Identify the responsible personnel interviewed who confirm that the above documented security policies and operational procedures for managing firewalls are:
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> In use
                                                               <br><span style="font-size: 25px;font-weight: bolder;">&#x2192;</span> Known to all affected parties
                                                               
                                                            </td>
                                                            <td colspan="6">
                                                               <div class="form-group col-md-12 Inputfield">
                                                                  <div class="d-flex " style="align-items: center;">
                                                                      <input type="text" class="form-control" name="field_name[]" id="exampleInputText1" value="" placeholder="">
                                                                      <a href="javascript:void(0);" class="add_button" id="a1911" title="Add field"><i class="fa fa-plus mt-3" style="color:#be1e2d;font-size:20px;margin:10px;"></i></a>
                                                                     
                                                                      <label for="file-input" style="margin-bottom:-0.5rem;">
                                                                        <i class="fa fa-upload" style="font-size:20px;"aria-hidden="true"></i>
                                                                      </label>
                                                                      <input id="file-input" type="file" style="display:none;"/>
                                                                  </div> 
                                                              </div>
                                                            </td>
                                                         </tr>
                                                           
                                                      </table>
                                                   </div>
                                                 </div>
                                               </div>
                                             </div>
                           
                                         </div>
                                       </div>
                                     </div>
                                    </div>      
                                    </form>
                                  </div>
                                </div>
                              </div>
                              <!-- <div class="card">
                                <div class="card-header" id="heading-2">
                                  <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-2" aria-expanded="false" aria-controls="collapse-2">
                                      Item 2
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse-2" class="collapse" data-parent="#accordion" aria-labelledby="heading-2">
                                  <div class="card-body">
                                    Text 2
                                  </div>
                                </div>
                              </div>
                              <div class="card">
                                <div class="card-header" id="heading-3">
                                  <h5 class="mb-0">
                                    <a class="collapsed" role="button" data-toggle="collapse" href="#collapse-3" aria-expanded="false" aria-controls="collapse-3">
                                      Item 3
                                    </a>
                                  </h5>
                                </div>
                                <div id="collapse-3" class="collapse" data-parent="#accordion" aria-labelledby="heading-3">
                                  <div class="card-body">
                                    Text 3
                                  </div>
                                </div>
                              </div> -->
                            </div>
                        
                     </div>
                  </div>     
               </div>
            </div>
         </div>

@endsection