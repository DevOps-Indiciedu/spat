@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-sm-12 col-lg-12">
            <div class="iq-card">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Contact Information and Report Date</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  @if(Request::get('type') == "assessor")
                  <form id="form-wizard1" method="POST" class="text-center mt-4">
                     @csrf
                     <ul id="top-tab-list" class="p-0">
                        <li class="active" id="account">
                           <a href="javascript:void();">
                              <i class="ri-lock-unlock-line"></i><span>Contact Information</span>
                           </a>
                        </li>
                        <li id="personal">
                           <a href="javascript:void();">
                              <i class="ri-user-fill"></i><span>Timeframe of assessment</span>
                           </a>
                        </li>
                        <li id="payment">
                           <a href="javascript:void();">
                              <i class="ri-camera-fill"></i><span>PCI DSS version</span>
                           </a>
                        </li>
                        <li id="payment">
                           <a href="javascript:void();">
                              <i class="ri-check-fill"></i><span>Additional services by QSA</span>
                           </a>
                        </li>
                        <!-- <li id="payment">
                           <a href="javascript:void();">
                              <i class="ri-check-fill"></i><span>Summary of Findings</span>
                           </a>
                        </li> -->
                     </ul>
                  @endif   
                     <!-- fieldsets -->
                     <fieldset>
                        @if(Request::get('type') == "company")
                        <form id="companyForm" method="POST">
                           @csrf
                           <div class="form-card text-left">
                                 <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                    <div class="col-12">
                                       <h3 class="mb-2 mt-2">Client Information</h3>
                                    </div>
                                    <!-- <div class="col-5">
                                       <h2 class="steps">Step 1 - 4</h2>
                                    </div> -->
                                 </div> 
                                 <div class="row">
                                    <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="company_name">Company Name <span class="text-danger">*</span></label> 
                                          <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" />
                                          <span class="text-danger" id="companyNameErr"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="company_contact_name">Company Contact Name <span class="text-danger">*</span></label> 
                                          <input type="text" class="form-control" id="company_contact_name" name="company_contact_name" placeholder="" />
                                          <span class="text-danger" id="companyContactNameErr"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="company_phone">Company Phone No <span class="text-danger">*</span></label> 
                                          <input type="number" class="form-control" id="company_phone" name="company_phone" placeholder="" />
                                          <span class="text-danger" id="companyPhoneErr"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="company_email">Company E-mail Address <span class="text-danger">*</span></label> 
                                          <input type="email" class="form-control" id="company_email" name="email" placeholder="" />
                                          <span class="text-danger" id="companyEmailErr"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="company_website">Company Website</label>
                                          <input type="url" class="form-control" id="company_website" name="company_website" value="" placeholder="">
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="company_standard">Company Standard <span class="text-danger">*</span></label> 
                                          {!! company_standards() !!}
                                          <span class="text-danger" id="companyStandardsErr"></span>
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="company_max_users">Company Maximum Users</label> 
                                          <input type="number" class="form-control" id="company_max_users" name="company_max_users" value="0" placeholder="" />
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <label for="company_address">Company Physical Address</label>
                                          <textarea class="form-control" id="company_address" name="company_address" rows="2"></textarea>
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group">
                                          <button type="submit" class="btn btn-primary float-left" value="Submit" >Submit</button> 
                                       </div>
                                    </div>
                              </div>
                           </div> 
                        </form>
                        @endif

                        @if(Request::get('type') == "assessor")
                        <div class="form-card text-left">
                           <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                 <div class="col-12">
                                    <h3 class="mb-2 mt-2">Assessor Company Information</h3>
                                 </div>
                                 <!-- <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                 </div> -->
                           </div> 
                           <div class="row">
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="company_name">Company Name <span class="text-danger">*</span></label> 
                                    <input type="text" class="form-control" id="company_name" name="company_name" placeholder="" />
                                    <span class="text-danger" id="companyNameErr"></span>
                                 </div>
                                 </div>
                                 <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="company_website">Company Website</label>
                                    <input type="url" class="form-control" name="company_website" id="company_website" value="" placeholder="">
                                 </div>
                                 </div>
                                 <div class="col-md-12">
                                    <div class="form-group">
                                       <label for="company_address">Company Physical Address</label>
                                       <textarea class="form-control" name="company_address" id="company_address" rows="2"></textarea>
                                    </div>
                                 </div>
                              </div>
                           </div> 
                           <div class="form-card text-left">
                              <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                 <div class="col-12">
                                    <h3 class="mb-2 mt-2">Assessor Information</h3>
                                 </div>
                                 <!-- <div class="col-5">
                                    <h2 class="steps">Step 1 - 4</h2>
                                 </div> -->
                              </div> 
                              <div class="row">
                              <div class="col-md-6">
                                    <div class="form-group">
                                       <label for="assessor_name">Lead Assessor Name <span class="text-danger">*</span></label> 
                                       <input type="text" class="form-control" id="assessor_name" name="assessor_name" placeholder="" />
                                       <span class="text-danger" id="assessorNameErr"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group"> 
                                       <label for="assessor_creds">Assessor PCI Credentials</label> 
                                       <input type="text" class="form-control" id="assessor_creds" name="assessor_creds" placeholder="" />
                                       <span class="text-danger" id="assessorCredErr"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group"> 
                                       <label for="assessor_phone">Assessor Phone No <span class="text-danger">*</span></label> 
                                       <input type="number" class="form-control" id="assessor_phone" name="assessor_phone" placeholder="" />
                                       <span class="text-danger" id="assessorPhoneErr"></span>
                                    </div>
                                 </div>
                                 <div class="col-md-6">
                                    <div class="form-group"> 
                                       <label for="assessor_email">Assessor E-mail Address <span class="text-danger">*</span></label> 
                                       <input type="email" class="form-control" id="assessor_email" name="email" placeholder="" />
                                       <span class="text-danger" id="assessorEmailErr"></span>
                                    </div>
                                 </div>
                                 </div>
                              </div> 
                              <div class="form-card text-left">
                                 <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                    <div class="col-12">
                                       <h3 class="mb-2 mt-2">Assessor QA Information</h3>
                                    </div>
                                    <!-- <div class="col-5">
                                       <h2 class="steps">Step 1 - 4</h2>
                                    </div> -->
                                 </div> 
                                 <div class="row">
                                 <div class="col-md-6">
                                       <div class="form-group">
                                          <label for="qa_review_name">QA Reviewer Name</label> 
                                          <input type="text" class="form-control" id="qa_review_name" name="qa_review_name" placeholder="" />
                                       </div>
                                    </div>
                                    <div class="col-md-6">
                                       <div class="form-group"> 
                                          <label for="qa_review_phone">QA Reviewer Phone No</label> 
                                          <input type="number" class="form-control" id="qa_review_phone" name="qa_review_phone" placeholder="" />
                                       </div>
                                    </div>
                                    <div class="col-md-12">
                                       <div class="form-group"> 
                                          <label for="qa_review_email">QA Reviewer E-mail Address</label> 
                                          <input type="email" class="form-control" id="qa_review_email" name="qa_review_email" placeholder="" />
                                       </div>
                                    </div>
                                    </div>
                                 </div> 
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button>
                        @endif
                     </fieldset>
                     @if(Request::get('type') == "assessor")
                     <fieldset>
                        <div class="form-card text-left">
                              <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                 <div class="col-12">
                                    <h3 class="mb-2 mt-2">Date And Timeframe Of Assessment</h3>
                                 </div>
                                 <!-- <div class="col-5">
                                    <h2 class="steps">Step 2 - 4</h2>
                                 </div> -->
                              </div>
                              <div class="row">
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="date_of_report">Date of Report</label>
                                    <input type="date" class="form-control" name="date_of_report" id="date_of_report" value="2022-7-14">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="time_assessment_start_date">Timeframe of assessment (start date)</label>
                                    <input type="date" class="form-control" name="time_assessment_start_date" id="time_assessment_start_date" value="2022-7-14">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="time_assessment_complete_date">Timeframe of assessment (completion date)</label>
                                    <input type="date" class="form-control" name="time_assessment_complete_date" id="time_assessment_complete_date" value="2022-7-24">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="identity_start_date">Identify date(s) spent onsite at the entity(start date)</label>
                                    <input type="date" class="form-control" name="identity_start_date" id="identity_start_date" value="2022-7-14">
                                 </div>
                              </div>
                              <div class="col-md-6">
                                 <div class="form-group">
                                    <label for="identity_complete_date">Identify date(s) spent onsite at the entity(completion date)</label>
                                    <input type="date" class="form-control" name="identity_complete_date" id="identity_complete_date" value="2022-7-24">
                                 </div>
                              </div>
                              <div class="col-md-12">
                                 <div class="form-group">
                                    <label for="identity_decription">Describe the time spent onsite at the entity, time spent performing remote assessment activities and time spent on validation of remediation activities</label>
                                    <textarea class="form-control" name="identity_decription" id="identity_decription" rows="2"></textarea>
                                 </div>
                              </div>
                              </div>
                        </div> 
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button> 
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                     </fieldset>
                     @endif
                     @if(Request::get('type') == "assessor")
                     <fieldset>
                        <div class="form-card text-left">
                              <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                 <div class="col-12">
                                    <h3 class="mb-2 mt-2">PCI DSS version</h3>
                                 </div>
                                 <!-- <div class="col-5">
                                    <h2 class="steps">Step 3 - 4</h2>
                                 </div> -->
                              </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="pci_dss_version">Version Of The PCI Data Security Standard Used For The Assessment</label>
                                 <textarea class="form-control" name="pci_dss_version" id="pci_dss_version" rows="2"></textarea>
                              </div>
                           </div>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Next" >Next</button> 
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                     </fieldset>
                     @endif 
                     @if(Request::get('type') == "assessor")
                     <fieldset>
                     <div class="form-card text-left">
                           <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                              <div class="col-12">
                                 <h3 class="mb-2 mt-2">Additional services provided by QSA company</h3>
                              </div>
                              <!-- <div class="col-5">
                                 <h2 class="steps">Step 3 - 4</h2>
                              </div> -->
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="disclose_qsac">Disclose all services offered to the assessed entity by the QSAC, including but not limited to whether the assessed entity uses any security-related devices or security-related applications that have been developed or manufactured by the QSA, or to which the QSA owns the rights or that the QSA has configured or manages</label>
                                 <textarea class="form-control" id="disclose_qsac" name="disclose_qsac" rows="2"></textarea>
                              </div>
                           </div>
                           <div class="col-md-12">
                              <div class="form-group">
                                 <label for="efforts_qsac">Describe efforts made to ensure no conflict of interest resulted from the above mentioned services provided by the QSAC</label>
                                 <textarea class="form-control" id="efforts_qsac" name="efforts_qsac" rows="2"></textarea>
                              </div>
                           </div>
                        </div> 
                        <input type="hidden" name="hiddeId">
                        <button type="submit" name="next" class="btn btn-primary float-right" >Submit</button> 
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                     </fieldset>
                     @endif
                     {{--
                     <fieldset>
                        <div class="form-card">
                              <div class="row" style="border-bottom: 1px solid #f2edff;background: #000;">
                                 <div class="col-12">
                                    <h3 class="mb-2 mt-2">Summary of Findings</h3>
                                 </div>
                                 <!-- <div class="col-5">
                                    <h2 class="steps">Step 4 - 4</h2>
                                 </div> -->
                              </div> <br>
                              <table style="width:100%">
                              <tr>
                                 <th colspan="2" rowspan="3" bgcolor="#bd1e2d">PCI DSS Requirement</th>
                                 <th colspan="4" rowspan="2" bgcolor="#bd1e2d">Summary of Findings <p>(check one)</p></th>
                              </tr>
                              <tr>
                                 </tr>
                              <tr>
                                 <th bgcolor="#000" style="border-right: 1px solid white;">Complaint</th>
                                 <th bgcolor="#000" style="border-right: 1px solid white;">Non-Complaint</th>
                                 <th bgcolor="#000" style="border-right: 1px solid white;">Not Applicable</th>
                                 <th bgcolor="#000" style="">Not Tested</th>
                              </tr>
                              <tr>
                                    <td colspan="2" style="text-align: left;" class="pl-md-2">1. Install and maintain a firewall configuration to protect cardholder data</td>
                                    <td>
                                       <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck1">
                                                <label class="custom-control-label" for="customCheck1"></label>
                                             </div>
                                       </div>   
                                    </td>
                                    <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck2">
                                             <label class="custom-control-label" for="customCheck2"></label>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="3">
                                             <label class="custom-control-label" for="customCheck3"></label>
                                          </div>
                                       </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck4">
                                                <label class="custom-control-label" for="customCheck4"></label>
                                             </div>
                                          </div>
                                    </td>
                                 </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">2. Do not use vendor-supplied defaults for system passwords and other security parameters</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck5">
                                             <label class="custom-control-label" for="customCheck5"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck6">
                                             <label class="custom-control-label" for="customCheck6"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck7">
                                             <label class="custom-control-label" for="customCheck7"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck8">
                                             <label class="custom-control-label" for="customCheck8"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">3. Protect stored cardholder data</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck9">
                                             <label class="custom-control-label" for="customCheck9"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck10">
                                             <label class="custom-control-label" for="customCheck10"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck11">
                                             <label class="custom-control-label" for="customCheck11"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck12">
                                             <label class="custom-control-label" for="customCheck12"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">4. Encrypt transmission of cardholder data across open, public networks</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck13">
                                             <label class="custom-control-label" for="customCheck13"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck14">
                                             <label class="custom-control-label" for="customCheck14"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck15">
                                             <label class="custom-control-label" for="customCheck15"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck16">
                                             <label class="custom-control-label" for="customCheck16"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">5. Protect all systems against malware and regularly update anti-virus software or programs</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck17">
                                             <label class="custom-control-label" for="customCheck17"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck18">
                                             <label class="custom-control-label" for="customCheck18"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck19">
                                             <label class="custom-control-label" for="customCheck19"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck20">
                                             <label class="custom-control-label" for="customCheck20"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">6. Develop and maintain secure systems and applications</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck21">
                                             <label class="custom-control-label" for="customCheck21"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck22">
                                             <label class="custom-control-label" for="customCheck22"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck23">
                                             <label class="custom-control-label" for="customCheck23"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck24">
                                             <label class="custom-control-label" for="customCheck24"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">7. Restrict access to cardholder data by business need to know</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck25">
                                             <label class="custom-control-label" for="customCheck25"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck26">
                                             <label class="custom-control-label" for="customCheck26"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck27">
                                             <label class="custom-control-label" for="customCheck27"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck28">
                                             <label class="custom-control-label" for="customCheck28"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">8. Identify and authenticate access to system components</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck29">
                                             <label class="custom-control-label" for="customCheck29"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck30">
                                             <label class="custom-control-label" for="customCheck30"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck31">
                                             <label class="custom-control-label" for="customCheck31"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck32">
                                             <label class="custom-control-label" for="customCheck32"></label>
                                          </div>
                                       </div>
                                 </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" style="text-align: left;" class="pl-md-2">9. Restrict physical access to cardholder data</td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck33">
                                                <label class="custom-control-label" for="customCheck33"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck34">
                                                <label class="custom-control-label" for="customCheck34"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck35">
                                                <label class="custom-control-label" for="customCheck35"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck36">
                                                <label class="custom-control-label" for="customCheck36"></label>
                                             </div>
                                          </div>
                                    </td>
                                 </tr>
                                 <tr>
                                    <td colspan="2" style="text-align: left;" class="pl-md-2">10. Track and monitor all access to network resources and cardholder data</td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck37">
                                                <label class="custom-control-label" for="customCheck37"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck38">
                                                <label class="custom-control-label" for="customCheck38"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                             <div class="custom-control custom-checkbox">
                                                <input type="checkbox" class="custom-control-input" id="customCheck39">
                                                <label class="custom-control-label" for="customCheck39"></label>
                                             </div>
                                          </div>
                                    </td>
                                    <td>
                                          <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck40">
                                             <label class="custom-control-label" for="customCheck40"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">11. Regularly test security systems and processes</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck41">
                                             <label class="custom-control-label" for="customCheck41"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck42">
                                             <label class="custom-control-label" for="customCheck42"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck43">
                                             <label class="custom-control-label" for="customCheck43"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck44">
                                             <label class="custom-control-label" for="customCheck44"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">12. Maintain a policy that addresses information security for all personnel</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck45">
                                             <label class="custom-control-label" for="customCheck45"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck46">
                                             <label class="custom-control-label" for="customCheck46"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck47">
                                             <label class="custom-control-label" for="customCheck47"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck48">
                                             <label class="custom-control-label" for="customCheck48"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">Appendix A1: Additional PCI DSS Requirements for Shared Hosting Providers</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck49">
                                             <label class="custom-control-label" for="customCheck49"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck50">
                                             <label class="custom-control-label" for="customCheck50"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck51">
                                             <label class="custom-control-label" for="customCheck51"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck52">
                                             <label class="custom-control-label" for="customCheck52"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">Appendix A2: Additional PCI DSS Requirements for Entities Using SSL/Early TLS for Card-Present POS POI Terminal Connections</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck53">
                                             <label class="custom-control-label" for="customCheck53"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck54">
                                             <label class="custom-control-label" for="customCheck54"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck55">
                                             <label class="custom-control-label" for="customCheck55"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck56">
                                             <label class="custom-control-label" for="customCheck56"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              <tr>
                                 <td colspan="2" style="text-align: left;" class="pl-md-2">Appendix A3: Designated Entities Supplemental Validation</td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck57">
                                             <label class="custom-control-label" for="customCheck57"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck58">
                                             <label class="custom-control-label" for="customCheck58"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck59">
                                             <label class="custom-control-label" for="customCheck59"></label>
                                          </div>
                                       </div>
                                 </td>
                                 <td>
                                       <div class="form-group">
                                          <div class="custom-control custom-checkbox">
                                             <input type="checkbox" class="custom-control-input" id="customCheck60">
                                             <label class="custom-control-label" for="customCheck60"></label>
                                          </div>
                                       </div>
                                 </td>
                              </tr>
                              </table>
                        </div>
                        <button type="button" name="next" class="btn btn-primary next action-button float-right" value="Submit" >Submit</button> 
                        <button type="button" name="previous" class="btn btn-dark previous action-button-previous float-right mr-3" value="Previous" >Previous</button>
                     </fieldset>
                     --}}
                  </form>
               </div>
            </div>
         </div>     
      </div>
   </div>
</div>
@include('pages.ajax.companyAjax')
@if(Request::get('type') == "company" || Request::get('type') == "assessor")
<script>
    $(document).ready(function(){
        $('#confirmModal').modal('hide');
    });
</script>
@else
<script>
    $(document).ready(function(){
        $('#confirmModal').modal('show');
    });
</script>
@endif
@endsection