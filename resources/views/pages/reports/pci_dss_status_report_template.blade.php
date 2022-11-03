
<title>PCI DSS Status Report</title>
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@4.6.1/dist/css/bootstrap.min.css" integrity="sha384-zCbKRCUGaJDkqS1kPbPd7TveP5iyJE0EjAuZQTgFLD2ylzuqKfdKlfG/eSrtxUkn" crossorigin="anonymous">
<!-- <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/4.5.0/css/font-awesome.css" integrity="sha512-EaaldggZt4DPKMYBa143vxXQqLq5LE29DG/0OoVenoyxDrAScYrcYcHIuxYO9YNTIQMgD8c8gIUU8FQw7WpXSQ==" crossorigin="anonymous" referrerpolicy="no-referrer" /> -->
<div class="book" id="PDFcontent">
    <style>
            text.highcharts-credits {
                display: none;
            }
            table, th, td{
                font-size: 12px !important;
                border:1px solid black;
                font-family:sans-serif;
            }

            *{
                font-family:sans-serif;
            }
            .page {
                font-size: 12px !important;
                /* width: 100%; */
                width: 21cm;
                /* min-height: auto; */
                min-height: 27.7cm;
                /* padding: 1cm; */
                /* margin: 1cm auto; */
                border: 1px #D3D3D3 solid;
                border-radius: 5px;
                background: white !important;
                box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
            }
            .subpage {
                padding: 15px;
                /* border: 5px red solid; */
                /* height: 256mm; */
                /* outline: 1cm #FFEAEA solid; */
            }
            
            @page {
                size: A4;
                margin: 0;
            }
            @media print {
                *{
                    background: white !important;
                    font-family:sans-serif;
                }
                html, body {
                    border: 1px solid white;
                    height: 99%;
                    page-break-after: avoid;
                    page-break-before: avoid;
                }
                .page {
                    width:100%;
                    margin: 0;
                    /* border: initial; */
                    background: white !important;
                    border-radius: initial;
                    width: initial;
                    min-height: initial;
                    /* box-shadow: initial; */
                    background: initial;
                    page-break-after: always;
                }
                .extension{
                    background: black !important;color: white;padding: 2px 5px 2px 5px;border-radius: 8px;
                }
                
                .projectTitle{
                    font-weight:bold;
                    font-size:30px;
                }
                .companyTitle{
                    font-weight:bold;
                    font-size:40px;
                }
            }
            .content-page{
                width: 60%;
                margin: auto;
            }

            .projectTitle{
                font-weight:bold;
                font-size:30px;
            }
            .companyTitle{
                font-weight:bold;
                font-size:40px;
            }
            .card-header a {
                font-size: 11px;
            }
            p {
                margin-top: 0;
                margin-bottom: 0rem;
            }
    </style>
    <div class="page">
        <div class="subpage">
            <br><br>
            <img src="{{ asset(MyApp::SITE_LOGO) }}" class="img-fluid" width="150">
            <h1 class="companyTitle">
                {{ get_company($project_detail[0]->auditee_id)->company_name }}
            </h1>
            <p style="width:400px;margin-bottom: 0px;">{{ get_company($project_detail[0]->auditee_id)->company_address }}</p>
            <p>{{ get_company($project_detail[0]->auditee_id)->company_website }}</p>
            <h1 class="projectTitle">
                PCI DSS Status Report
            </h1>
            <!-- DMY($project_detail[0]->project_start_date) -->
            <b>Date: {{ date("Y-m-d h:i:s") }}</b>
            <br>
            <br>
            <h5>Contact Information and report Date</h5>
            <table clss="table table-bordered" width="100%">
                <!-- Client -->
                <tr>
                    <th colspan="2" class="text-dark text-left">
                        <h6>Client</h6>
                    </th>
                </tr>
                <tr>
                    <td width="40%">Company name:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_name }}</td>
                </tr>
                <tr>
                    <td width="40%">Company address:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_address }}</td>
                </tr>
                <tr>
                    <td width="40%">Company URL:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_website }}</td>
                </tr>
                <tr>
                    <td width="40%">Company contact name:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_contact_name }}</td>
                </tr>
                <tr>
                    <td width="40%">Company phone number:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_phone }}</td>
                </tr>
                <tr>
                    <td width="40%">Company e-mail address:</td>
                    <td>{{ get_company($project_detail[0]->auditee_id)->company_email }}</td>
                </tr>
                <!-- Assessor Company  -->
                <tr>
                    <th colspan="2" class="text-dark text-left">
                        <h6>Assessor Company</h6>
                    </th>
                </tr>
                <tr>
                    <td width="40%">Company name:</td>
                    <td>{{ get_assessor($project_detail[0]->auditor_company)->company_name }}</td>
                </tr>
                <tr>
                    <td width="40%">Company address:</td>
                    <td>{{ get_assessor($project_detail[0]->auditor_company)->company_physical_address }}</td>
                </tr>
                <tr>
                    <td width="40%">Company website:</td>
                    <td>{{ get_assessor($project_detail[0]->auditor_company)->company_website }}</td>
                </tr>
                <!-- Assessor -->
                <tr>
                    <th colspan="2" class="text-dark text-left">
                        <h6>Assessor</h6>
                    </th>
                </tr>
                <tr>
                    <td width="40%">Lead Assessor name:</td>
                    <td>{{ get_user($project_detail[0]->auditor_id)->username }}</td>
                </tr>
                <tr>
                    <td width="40%">Assessor PCI credentials:
                        <br>
                        (QSA, PA-QSA, etc.)
                    </td>
                    <td></td>
                </tr>
                <tr>
                    <td width="40%">Assessor phone number:</td>
                    <td>{{ get_user($project_detail[0]->auditor_id)->phone }}</td>
                </tr>
                <tr>
                    <td width="40%">Assessor e-mail address:</td>
                    <td>{{ get_user($project_detail[0]->auditor_id)->email }}</td>
                </tr>
                <!-- Assessor QA -->
                <tr>
                    <th colspan="2" class="text-dark text-left">
                        <h6>Assessor Quality Assurance (QA) Primary Reviewer for this specific report (not the general QA contact for the QSA)</h6>
                    </th>
                </tr>
                <tr>
                    <td width="40%">QA reviewer name:</td>
                    <td>{{ get_user($project_detail[0]->auditor_qa_id)->username }}</td>
                </tr>
                <tr>
                    <td width="40%">QA reviewer phone number:</td>
                    <td>{{ get_user($project_detail[0]->auditor_qa_id)->phone }}</td>
                </tr>
                <tr>
                    <td width="40%">QA reviewer e-mail address:</td>
                    <td>{{ get_user($project_detail[0]->auditor_qa_id)->email }}</td>
                </tr>
            </table>
            <br>
            <span class="float-left">
                Print Datetime: {{ date("Y-m-d h:i:s") }}
            </span>
            <span class="float-right">
                Print By: {{ Auth::user()->name }}
            </span>
        </div>    
    </div>
    <div class="page">
        <div class="subpage">
            
            <img src="" id="captured">
            <h4 class="mb-4"><b>PCI DSS Summary</b></h4>
            @if($getChart)
                <img src="{{ asset('capturedChart.jpeg') }}" width="100%" height="900px" alt="PCI DSS Status Report Chart">
            @else
            <div id="ShowCapturedChart"></div>
            <div class="row" id="ChartCapture">
                <div class="col-md-12">
                    Charts
                </div>
                <div class="col-md-6 col-sm-6" id="chart_points">
                    
                </div>
                <div class="col-md-6 col-sm-6" id="tasks_points">
                    
                </div>
                <div class="col-md-12 col-sm-12" id="dep_points">
                    
                </div>
                <div class="col-md-12 col-sm-12" id="req_points">
                    
                </div>
            </div>
            @endif
            <p>
                <span class="float-left">
                    Print Datetime: {{ date("Y-m-d h:i:s") }}
                </span>
                <span class="float-right">
                    Print By: {{ Auth::user()->name }}
                </span>
            </p>
        </div>
    </div>
    <div class="page">
        <div class="subpage">
            
            <h4 class="mb-4"><b>Evidence Tracker</b></h4>
            <table clss="table table-bordered" width="100%">
                <thead class="bg-primary" style="background-color: #be1e2d !important;">
                    <th align="center" style="background-color: #be1e2d !important;color:white;padding:10px;">#</th>
                    <th align="center" style="background-color: #be1e2d !important;color:white;padding:10px;">Req#</th>
                    <th style="background-color: #be1e2d !important;color:white;padding:10px;">Testing Procedure</th>
                    <th align="center" style="background-color: #be1e2d !important;color:white;padding:10px;">Assign To</th>
                    <th align="center" style="background-color: #be1e2d !important;color:white;padding:10px;">Evidence Type</th>
                    <th style="background-color: #be1e2d !important;color:white;padding:10px;" width="40%">Evidence File</th>
                </thead>
                <tbody>
                    @php $i = 1; @endphp
                    @foreach($project_evidence as $evidence)
                    <tr>
                        <td align="center">{{ $i++ }}</td>
                        <td align="center">{{ $evidence->req_no }}</td>
                        <td>{{ $evidence->requirement }}</td>
                        <td align="center">
                            @if($evidence->description=='Not Applicable')
                                ---
                            @else
                            {{ @get_user(checkTaskExistToTeq($evidence->ass_id,$evidence->req_id,2)->assign_to)->username }}
                            @endif
                        </td>
                        <td align="center">
                            @if($evidence->description=='Not Applicable')
                                ---
                            @else
                            {{ $evidence->doc_type }}
                            @endif
                        </td>
                        <td>
                            @if($evidence->description=='Not Applicable')
                                <p class="text-center">Not Applicable</p>
                            @else
                            @php $evi = 1;$attachments=DB::table('observation_images')->where(array("observation_id"=>$evidence->el_id))->orderBy("observation_images.obi_id","DESC")->get()->toArray(); @endphp
                            <p style="height: 18px;">
                                Status
                                @if($evidence->status == 1)
                                <button class="badge badge-success float-right mt-1" style="border: #00ca00 !important;">Closed</button>
                                @elseif($evidence->status == 2)
                                <button class="badge badge-primary float-right mt-1" style="background-color: #007bff !important;border: #007bff !important;">Review Pending </button>
                                @elseif($evidence->status == 3)
                                <button class="badge badge-warning float-right mt-1" style="border: #ffd400 !important;">Action Pending</button>
                                @else
                                <button class="badge badge-danger float-right mt-1" style="border: #be1e2d !important;">Pending</button>
                                @endif
                            </p>
                            <div class="card mt-2" id="documentsData{{ $evidence->el_id }}">
                                @foreach($attachments as $image)
                                @if($image->document_status == 1)
                                <div class="rowImage-{{ $image->obi_id }}">   
                                    <div class="card-header" style="padding: 8px 0px 8px 5px;">
                                        @php $explodeImgName = explode("/",$image->imagelink); @endphp
                                        <b>{{ $evi++ }})</b>   
                                        <span>  
                                            {{ $image->file_description }}
                                            <span class="extension">
                                                {{ detectFileExtension($image->imagelink) }}
                                            </span>
                                        </span>
                                            @if($image->document_status == 1)
                                            <a href="#" class="btn btn-success btn-sm float-right" style="padding:0px 5px 0px 5px;background-color: #00ca00 !important;">Approved</a>
                                            @elseif($image->document_status == 2)
                                                <a href="#" class="btn btn-danger btn-sm float-right" style="padding:0px 5px 0px 5px;font-size:12px;background-color: #be1e2d !important;">Reject</a>
                                            @else
                                                <a href="#" class="btn btn-warning btn-sm float-right" style="padding:0px 5px 0px 5px;font-size:12px;background-color:#ffd400 !important;">Pending</a>
                                            @endif
                                    </div>
                                    <div class="card-body d-flex justify-content-between" style="padding: 0px;">
                                        <p class="card-text"><b>Uploaded By: </b> {!! @get_user($image->added_by)->username !!}  <span>{{ $image->created_at }}</span>  </p>
                                        <div>
                                        <!-- <button class="btn upload"><i class="fa fa-upload"></i></button> -->
                                            <!-- <a download href="{{ asset('public/'.$image->imagelink) }}" class="btn download" target="_blank" style="color:black !important;"> -->
                                                <!-- <i class="fa fa-download"></i> -->
                                                <!-- <img src="https://cdn-icons-png.flaticon.com/512/992/992663.png" width="15" alt=""> -->
                                            <!-- </a> -->
                                        </div>
                                    </div>
                                    @if($image->details != "" || $image->action != "")
                                    <div class="card-body" style="padding: 0px;">
                                        @if($image->observation_by != "")
                                        <p class="card-text"><b>Observation Added By: </b> {!! @get_user($image->observation_by)->username !!}  <span>{{ $image->observation_date }}</span>  </p>
                                        @endif
                                        <p style="margin-bottom:5px !important;"> <b>Observation: </b>{!! $image->details !!}</p>
                                        <p style="margin-bottom:5px !important;"> <b>Action: </b>{!! $image->action !!}</p>
                                    </div>
                                    @endif
                                </div>
                                <hr>
                                @endif
                                @endforeach  
                            </div>
                            @endif
                        </td>
                    </tr>
                    @endforeach
                </tbody>
            </table>
            <span class="float-left">
                Print Datetime: {{ date("Y-m-d h:i:s") }}
            </span>
            <span class="float-right">
                Print By: {{ Auth::user()->name }}
            </span>
        </div>    
    </div>
</div>
