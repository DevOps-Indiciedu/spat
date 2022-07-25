@extends('layouts.app')

@section('content')
<!-- Page Content  -->
<div id="content-page" class="content-page">
<style type="text/css">
    th{
        color:black !important;
    }
</style>
    <div class="container-fluid">
        <div class="row">
            <div class="col-sm-12 col-lg-12">
                <div class="iq-card">
                <div class="iq-card-header d-flex justify-content-between">
                    <div class="iq-header-title">
                        <h4 class="card-title">{{ __('All Requirements') }}</h4>
                    </div>
                </div>
                <div class="iq-card-body">
                   
                   <?php 

                        foreach($getRows as $level1)
                        {
                            $level1=(array)$level1;
                            echo "<b>".$level1['req_no']."</b>".$level1['description'];
                            $getlevel2=DB::table('req_lists')->where(array("parent_id"=>$level1['id']))->get()->toArray();
                            echo "<table width='100%' border='1'>";
                            echo "<thead><tr><th>PCI DSS Requirements</th><th>Testing Procedures</th></tr></thead><tbody>";

                            foreach($getlevel2 as $level2)
                            {
                                $level2=(array)$level2;
                                echo "<tr>";
                                $getlevel3=DB::table('req_lists')->where(array("parent_id"=>$level2['id']))->where('req_no','!=','guidence')->get()->toArray();
                                $rowspan=count($getlevel3)-1;
                                echo "<td >".$level2['req_no']." ".$level2['description']."</td>";
                                
                                $guidence=DB::table('req_lists')->where(array("parent_id"=>$level2['id'],'req_no'=>'guidence'))->get()->toArray();
                                if(!empty($guidence))
                                {
                                    $guidence[0]=(array)$guidence[0];
                                    if(!empty($guidence['description']))
                                    {
                                        $guidence=$guidence['description'];
                                    }
                                    else
                                    {
                                        $guidence="";
                                    }
                                }
                                else
                                {
                                    $guidence="";
                                }
                                if(!empty($getlevel3[0]))
                                {
                                 $getlevel3[0]=(array)$getlevel3[0];
                                echo "<td>".$getlevel3[0]['req_no']." ".$getlevel3[0]['description']."</td>";
                                
                                echo "</tr>";
                                unset($getlevel3[0]);
                                }
                               
                            
                                foreach($getlevel3 as $level3)
                                {
                                    $level3=(array)$level3;
                                    echo "<tr>";
                                    echo "<td></td><td>".$level3['req_no']." ".$level3['description']."</td><td></td>";
                                    echo "</tr>";
                                }
                                
                            }

                            echo "</tbody></table><hr>";
                        }
                   ?>
                </div>
                </div>
            </div>
        </div>
    </div>
</div>



@endsection