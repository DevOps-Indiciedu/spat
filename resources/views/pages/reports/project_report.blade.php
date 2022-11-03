@extends('layouts.app')
@section('content')
<style>
    .page {
        width:100% !important;
        margin: 1cm auto !important;
    }
</style>
<!-- Page Content  -->
<div id="content-page" class="content-page">
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                    <div class="iq-card-header d-flex justify-content-between">
                        <div class="iq-header-title">
                            <h4 class="card-title">{{ __('Project Report') }}</h4>
                        </div>
                        <a href="{{ url('pciDSSReportPDF') }}/{{ Request::segment(2) }}" class="btn btn-danger btn-sm">Generate PDF</a>
                    </div>
                    <div class="iq-card-body">
                        @include('pages.reports.pci_dss_status_report_template')
                        {{--
                        <div class="book" id="PDFcontent">
                        <style>
                                table, th, td{
                                    font-size: 12px !important;
                                }
                                .page {
                                    font-size: 12px !important;
                                    /* width: 100%; */
                                    /* width: 21cm; */
                                    min-height: auto;
                                    min-height: 29.7cm;
                                    /* padding: 1cm; */
                                    margin: 1cm auto;
                                    border: 1px #D3D3D3 solid;
                                    border-radius: 5px;
                                    background: white !important;
                                    box-shadow: 0 0 5px rgba(0, 0, 0, 0.1);
                                }
                                .subpage {
                                    padding: 1cm;
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
                                    }
                                    .page {
                                        width:100%;
                                        margin: 0;
                                        border: initial;
                                        background: white !important;
                                        border-radius: initial;
                                        width: initial;
                                        min-height: initial;
                                        box-shadow: initial;
                                        background: initial;
                                        page-break-after: always;
                                    }
                                    .extension{
                                        background: black !important;color: white;padding: 2px 5px 2px 5px;border-radius: 8px;
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
                                    <img src="{{ asset(MyApp::SITE_LOGO) }}" class="img-fluid" width="150">
                                    <h1 class="companyTitle">
                                        {{ get_company($project_detail[0]->auditee_id)->company_name }}
                                    </h1>
                                    <p style="width:400px;margin-bottom: 0px;">{{ get_company($project_detail[0]->auditee_id)->company_address }}</p>
                                    <p>{{ get_company($project_detail[0]->auditee_id)->company_website }}</p>
                                    <h1 class="projectTitle">
                                        PCI DSS Status Report
                                    </h1>
                                    <b>Date: {{ DMY($project_detail[0]->project_start_date) }}</b>
                                    <br>
                                    <br>
                                    <h1>Contact Information and report Date</h1>
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
                                </div>    
                            </div>
                            <div class="page">
                                <div class="subpage">
                                    <h4 class="mb-4"><b>PCI DSS Summary</b></h4>
                                </div>
                            </div>
                            <div class="page">
                                <div class="subpage">
                                    
                                    <h4 class="mb-4"><b>Evidence Tracker</b></h4>
                                    <table clss="table table-bordered" width="100%">
                                        <thead class="bg-primary" style="background-color: #be1e2d !important;">
                                            <th style="background-color: #be1e2d !important;">#</th>
                                            <th style="background-color: #be1e2d !important;">Req#</th>
                                            <th style="background-color: #be1e2d !important;">Testing Procedure</th>
                                            <th style="background-color: #be1e2d !important;">Assign To</th>
                                            <th style="background-color: #be1e2d !important;">Evidence Type</th>
                                            <th style="background-color: #be1e2d !important;" width="40%">Evidence File</th>
                                        </thead>
                                        <tbody>
                                            @php $i = 1; @endphp
                                            @foreach($project_evidence as $evidence)
                                            <tr>
                                                <td>{{ $i++ }}</td>
                                                <td>{{ $evidence->req_no }}</td>
                                                <td>{{ $evidence->description }}</td>
                                                <td>{{ @get_user(checkTaskExistToTeq($evidence->ass_id,$evidence->req_id,2)->assign_to)->username }}</td>
                                                <td class="text-center">{{ $evidence->doc_type }}</td>
                                                <td>
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
                                                        <div class="rowImage-{{ $image->obi_id }}">   
                                                            <div class="card-header">
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
                                                                <a download href="{{ asset('public/'.$image->imagelink) }}" class="btn download"><i class="fa fa-download"></i></a>
                                                                </div>
                                                            </div>
                                                            @if($image->details != "" || $image->action != "")
                                                            <div class="card-body" style="padding: 0px;">
                                                                <p style="margin-bottom:5px !important;"> <b>Observation: </b>{!! $image->details !!}</p>
                                                                <p style="margin-bottom:5px !important;"> <b>Action: </b>{!! $image->action !!}</p>
                                                            </div>
                                                            @endif
                                                        </div>
                                                        <hr>
                                                        @endforeach  
                                                    </div>
                                                </td>
                                            </tr>
                                            @endforeach
                                        </tbody>
                                    </table>
                                </div>    
                            </div>
                        </div>
                        --}}
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

@include('pages.ajax.projectAjax')
<script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/jspdf/1.3.2/jspdf.debug.js"></script>
<!-- <script type="text/javascript" src="https://cdnjs.cloudflare.com/ajax/libs/html2canvas/0.4.1/html2canvas.js"></script> -->
<script src="{{ asset(MyApp::ASSET_SCRIPT.'html2canvas.js') }}"></script>
<script>

// $('#gpdf').click(function() {
    // var options = {
    // };
    // var pdf = new jsPDF('p', 'pt', 'a4');
    // pdf.addHTML($(document.body), 15, 15, options, function() {
    //     pdf.save('projectReport.pdf');
    // });
// });

$('#gpdf').click(function () {
    printpage = "PDFcontent";
    var headstr = "<html><head><title>Project Report</title><link rel='stylesheet' href='http://localhost:8080/spat/public/assets/css/bootstrap.min.css'><link rel='stylesheet' href='http://localhost:8080/spat/public/assets/css/style.css'></head><body>";
    var footstr = "</body>";
    var newstr = document.all.item(printpage).innerHTML;
    var oldstr = document.body.innerHTML;
    document.body.innerHTML = headstr + newstr + footstr;
    window.print();
    document.body.innerHTML = oldstr;
    return false;

    // var restorepage = $('body').html();
    // var printcontent = $('#PDFcontent').clone();
    // $('body').empty().html(printcontent);
    // window.print();
    // $('body').html(restorepage);
});

</script>
<script src="{{ asset(MyApp::ASSET_SCRIPT.'html2canvas.js') }}"></script>
<script>
    $(document).ready(function(){
        setTimeout(function() { 
            doCapture();    
        }, 1500);
    });
    
    function doCapture() {
        window.scrollTo(0, 0);
    
        html2canvas(document.getElementById("ChartCapture")).then(function (canvas) {
    
            // Create an AJAX object
            var ajax = new XMLHttpRequest();
    
            // Setting method, server file name, and asynchronous
            ajax.open("POST", "{{ route('saveCapturedChart') }}", true);
    
            // Setting headers for POST method
            ajax.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
            ajax.setRequestHeader('x-csrf-token', "{{ csrf_token() }}");
            // Sending image data to server
            ajax.send("image=" + canvas.toDataURL("image/jpeg", 0.9));
    
            // Receiving response from server
            // This function will be called multiple times
            ajax.onreadystatechange = function () {
                // Check when the requested is completed
                if (this.readyState == 4 && this.status == 200) {

                    // Displaying response from server
                    console.log(this.responseText);
                }
            };
        });
    }
</script>
@endsection

