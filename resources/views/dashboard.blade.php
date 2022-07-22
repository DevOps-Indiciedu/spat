@extends('layouts.app')

@section('content')
<div id="content-page" class="content-page">
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <h2 class="card-title" style="background-color: #000;color:white;text-align:center;">Welcome To Dashboard</h2>
                  </div>
               </div>
            </div>
            <div class="container-fluid">
               <div class="row">
                  <div class="col-lg-12">
                     <div class="row" style="margin-right: 0px;">
                        <div class="col-xl-3">
                           <div class="iq-card iq-card-block iq-card-stretch">
                              <div class="iq-card-body p-2">
                                 <div id="menu-chart-03"></div>
                              </div>
                           </div>
                        </div>
                        <div class="col-xl-9">
                           <div class="row" style="">
                              <div class="col-xl-4" style="padding: 0;">
                                 <div class="iq-card iq-card-block iq-card-stretch">
                                    <div class="iq-card-body p-2">
                                       <div id="menu-chart-033"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-4" style="padding: 0;">
                                 <div class="iq-card iq-card-block iq-card-stretch">
                                    <div class="iq-card-body p-2">
                                       <div id="menu-chart-034"></div>
                                    </div>
                                 </div>
                              </div>
                              <div class="col-xl-4" style="padding: 0;">
                                 <div class="iq-card iq-card-block iq-card-stretch">
                                    <div class="iq-card-body p-2">
                                       <div id="menu-chart-035"></div>
                                    </div>
                                 </div>
                              </div>
                           </div>
                        </div>
                     </div>
                  </div>

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
                        </div>
                     </div>
                  </div>
               </div>
            </div>
         </div>
@endsection