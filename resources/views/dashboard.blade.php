@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
   <div class="container-fluid">
      <div class="row">
         <div class="col-lg-12">
            <div class="card-title" style="background-color: #000;color:white;text-align:center;font-size:20px;padding:7px;font-weight:400">
               Analytics Dashboard
            </div>
            <!-- <button id="btn-nft-enable" onclick="initFirebaseMessagingRegistration()" class="btn btn-danger btn-xs btn-flat">Allow for Notification</button>
            <form action="{{ route('send.notification') }}" method="POST">
               @csrf
               <div class="form-group">
                     <label>Title</label>
                     <input type="text" class="form-control" name="title">
               </div>
               <div class="form-group">
                     <label>Body</label>
                     <textarea class="form-control" name="body"></textarea>
                  </div>
               <button type="submit" class="btn btn-primary">Send Notification</button>
            </form> -->
         </div>
      </div>
   </div>
   <div class="container-fluid">
      
      <div class="row">
         <div class="col-lg-12">
            @if(session('status'))
            <div class="alert alert-success">
               {{ session('status') }}
            </div>
            @endif
            
            <!-- <div class="row" style="margin-right: 0px;">
               <div class="col-xl-3" style="padding-right:0px;">
                  <div class="iq-card iq-card-block iq-card-stretch">
                     <div class="iq-card-body p-2">
                        <div id="menu-chart-03"></div>
                     </div>
                  </div>
               </div>
                     <div class="col-xl-3" style="padding: 0;">
                        <div class="iq-card iq-card-block iq-card-stretch">
                           <div class="iq-card-body p-2">
                              <div id="menu-chart-033"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3" style="padding: 0;">
                        <div class="iq-card iq-card-block iq-card-stretch">
                           <div class="iq-card-body p-2">
                              <div id="menu-chart-034"></div>
                           </div>
                        </div>
                     </div>
                     <div class="col-xl-3" style="padding: 0;">
                        <div class="iq-card iq-card-block iq-card-stretch">
                           <div class="iq-card-body p-2">
                              <div id="menu-chart-035"></div>
                           </div>
                        </div>
                     </div>
            </div> -->
         </div>
         @if(Auth::user()->system_admin == 1)
         @else
         
         @if(Auth::user()->usermanagement->role_id == 2)
         <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Evidence Points Status</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="chart_points"></div>
               </div>
            </div>
         </div>

         <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Total Action Points Status</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                         <div id="tasks_points"></div>
               </div>
            </div>
         </div>

         <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Departments Bases Action Point Status</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="dep_points"></div>
               </div>
            </div>
         </div>
         

         <div class="col-lg-6">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Requirement Wise Compliance Status</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <div id="req_points"></div>
               </div>
            </div>
         </div>
         @else
         <div class="col-lg-12">
            <div class="iq-card iq-card-block iq-card-stretch iq-card-height">
               <div class="iq-card-header d-flex justify-content-between">
                  <div class="iq-header-title">
                     <h4 class="card-title">Prioritized Approach Summary & Attestation of Compliance*</h4>
                  </div>
               </div>
               <div class="iq-card-body">
                  <table class="table mb-0 ">
                     <thead style="background-color: #be1e2d;">
                        <tr>
                           <th class="dmiddle" scope="col">Milestone</th>
                           <th class="dmiddle" scope="col">Goals</th>
                           <th class="dmiddle" scope="col"> Percent Complete</th>
                           <th class="dmiddle" scope="col">Estimated Date for Completion of Milestone</th>
                        </tr>
                     </thead>
                     <tbody>
                        <tr>
                           <td class="dmiddle">1</td>
                           <td>Remove sensitive authentication data and limit data retention. This milestone targets a key area of risk for entities that have been compromised. Remember – if sensitive authentication data and other cardholder data are not stored, the effects of a compromise will be greatly reduced. If you don't need it, don't store it</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle">2</td>
                           <td>Protect systems and networks, and be prepared to respond to a system breach.  This milestone targets controls for points of access to most compromises, and the processes for responding.</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle">3</td>
                           <td>Secure payment card applications. This milestone targets controls for applications, application processes, and application servers. Weaknesses in these areas offer easy prey for compromising systems and obtaining access to cardholder data.</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle">4</td>
                           <td>Monitor and control access to your systems.  Controls for this milestone allow you to detect the who, what, when, and how concerning who is accessing your network and cardholder data environment.</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle">5</td>
                           <td>Protect stored cardholder data. For those organizations that have analyzed their business processes and determined that they must store Primary Account Numbers, Milestone Five targets key protection mechanisms for that stored data.</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle">6</td>
                           <td>Finalize remaining compliance efforts, and ensure all controls are in place.  The intent of Milestone Six is to complete PCI DSS requirements, and to finalize all remaining related policies, procedures, and processes needed to protect the cardholder data environment.</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                        <tr>
                           <td class="dmiddle" colspan="2">Overall</td>
                           <td class="dmiddle">0.0%</td>
                           <td></td>
                        </tr>
                     </tbody>
                  </table>
                     <!-- <div class="row">
                         <div class="col-md-12">
                             Charts
                         </div>
                         <div class="col-md-6" id="chart_points">
                             
                         </div>
                          <div class="col-md-6" id="tasks_points">
                             
                         </div>
                          <div class="col-md-12" id="dep_points">
                             
                         </div>
                          <div class="col-md-12" id="req_points">
                             
                         </div>
                     </div> -->
               </div>
            </div>
         </div>
         @endif
         @endif
      </div>
   </div>
</div>
@endsection

