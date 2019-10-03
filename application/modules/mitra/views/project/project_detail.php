<div class="app-content content">
      <div class="content-wrapper">
      <div class="content-detached content-left">
            <div class="content-body">
                <section class="row">
                        <div class="col-md-12">
                            <div class="card">
                                <div class="card-head">
                                    <div class="card-header">
                                    <h4 class="card-title">iOS APP Development</h4>
                                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                                    </div>
                                    <div class="px-1">
                                    <ul class="list-inline list-inline-pipe text-center p-1 border-bottom-grey border-bottom-lighten-3">
                                        <li>Project Owner: <span class="text-muted">Margaret Govan</span></li>
                                        <li>Start: <span class="text-muted">01/Feb/2017</span></li>
                                        <li>Due on: <span class="text-muted">01/Oct/2017</span></li>
                                        <li><a href="#" class="text-muted" data-toggle="tooltip" data-placement="bottom" title="Export as PDF"><i class="fa fa-file-pdf-o"></i></a></li>
                                    </ul>
                                    </div>
                                </div>
                                <!-- project-info -->
                                <div id="project-info" class="card-body row">
                                    <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>12</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="fa fa-user"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Funder</h5>
                                    </div>
                                    </div>
                                    <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>160</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="fa fa-calendar"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Durasi</h5>
                                    </div>
                                    </div>
                                    <div class="project-info-count col-lg-4 col-md-12">
                                    <div class="project-info-icon">
                                        <h2>20</h2>
                                        <div class="project-info-sub-icon">
                                            <span class="fa fa-bug"></span>
                                        </div>
                                    </div>
                                    <div class="project-info-text pt-1">
                                        <h5>Project Bug</h5>
                                    </div>
                                    </div>
                                </div>
                                <!-- project-info -->
                                <div class="card-body">
                                    <div class="card-subtitle line-on-side text-muted text-center font-small-3 mx-2 my-1">
                                    <span>Project Overall</span>
                                    </div>
                                    <div class="row py-2">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="insights px-2">
                                            <div><span class="text-info h3">82%</span> <span class="float-right">Tasks</span></div>
                                            <div class="progress progress-md mt-1 mb-0">
                                                <div class="progress-bar bg-info" role="progressbar" style="width: 82%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="insights px-2">
                                            <div><span class="text-success h3">78%</span> <span class="float-right">TaskLists</span></div>
                                            <div class="progress progress-md mt-1 mb-0">
                                                <div class="progress-bar bg-success" role="progressbar" style="width: 78%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                    <div class="row py-2">
                                    <div class="col-lg-6 col-md-12">
                                        <div class="insights px-2">
                                            <div><span class="text-warning h3">68%</span> <span class="float-right">Milestones</span></div>
                                            <div class="progress progress-md mt-1 mb-0">
                                                <div class="progress-bar bg-warning" role="progressbar" style="width: 68%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="col-lg-6 col-md-12">
                                        <div class="insights px-2">
                                            <div><span class="text-danger h3">62%</span> <span class="float-right">Bugs</span></div>
                                            <div class="progress progress-md mt-1 mb-0">
                                                <div class="progress-bar bg-danger" role="progressbar" style="width: 62%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                                            </div>
                                        </div>
                                    </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                </section>
            </div>
            <div class="content-body">
                <section id="timeline" class="timeline-left timeline-wrapper">
                    <h3 class="page-title text-center text-lg-left">Log Project</h3>
                    <ul class="timeline">
                        <li class="timeline-line"></li>
                    </ul>
                    <ul class="timeline">
                        <li class="timeline-line"></li>
                        <?php
                            if ($log_project) {
                                echo $log_project;
                            } 
                            
                        ?>
                    </ul>

                </section>

        </div>
        </div>
        <div class="sidebar-detached sidebar-right">
          <div class="sidebar"><div class="project-sidebar-content">
            <div class="card">
                
                <div class="card-content">
                    <!-- project search -->
                    <div class="card-body border-top-blue-grey border-top-lighten-5">
                        <button type="button" class="btn btn-success btn-min-width btn-glow mr-1 mb-2 btn-block" onclick="PostingAction()" id="confirm-text"><i class="fa fa-check"></i> Submit Project </button>
                    </div>
                    <!-- /project search -->
                </div>
                <div class="card-content">
                    <!-- project search -->
                    <div class="card-body border-top-blue-grey border-top-lighten-5">
                         <a href="">   
                        <button type="button" class="btn btn-info btn-min-width btn-glow mr-1 mb-2 btn-block" id="buttonrab" onclick="window.location.href='<?php echo base_url().'mitra/project/rab/'.$project_kode.'/'.$project_id; ?>'"><i class="fa fa-plus-square-o"></i> BUAT RAB </button>
                    </div>
                    <!-- /project search -->
                </div>
            </div>

            <!-- Project Users -->
            <div class="card">
                <div class="card-header mb-0">
                    <h4 class="card-title">Funder</h4>
                    <a class="heading-elements-toggle"><i class="fa fa-ellipsis-v font-medium-3"></i></a>
                    <div class="heading-elements">
                        <ul class="list-inline mb-0">
                            <li><a data-action="collapse"><i class="ft-minus"></i></a></li>
                            <li><a data-action="reload"><i class="ft-rotate-cw"></i></a></li>
                            <li><a data-action="close"><i class="ft-x"></i></a></li>
                        </ul>
                    </div>
                </div>
                <div class="card-content">
                    <div class="card-content">
                        <div class="card-body  py-0 px-0">
                            <div class="list-group">
                                <a href="javascript:void(0)"  class="list-group-item">
                                    <div class="media">
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url() ;?>app-assets/images/portrait/small/avatar-s-1.png" alt="avatar"><i></i></span></div>
                                        <div class="media-body w-100">
                                            <h6 class="media-heading mb-0">Margaret Govan</h6>
                                            <p class="font-small-2 mb-0 text-muted">Project Owner</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"  class="list-group-item">
                                    <div class="media">
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="<?php echo base_url() ;?>app-assets/images/portrait/small/avatar-s-2.png" alt="avatar"><i></i></span></div>
                                        <div class="media-body w-100">
                                            <h6 class="media-heading mb-0">Bret Lezama</h6>
                                            <p class="font-small-2 mb-0 text-muted">Project Manager</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"  class="list-group-item">
                                    <div class="media">
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-online rounded-circle"><img src="<?php echo base_url() ;?>app-assets/images/portrait/small/avatar-s-3.png" alt="avatar"><i></i></span></div>
                                        <div class="media-body w-100">
                                            <h6 class="media-heading mb-0">Carie Berra</h6>
                                            <p class="font-small-2 mb-0 text-muted">Senior Developer</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"  class="list-group-item">
                                    <div class="media">
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-away rounded-circle"><img src="<?php echo base_url() ;?>app-assets/images/portrait/small/avatar-s-6.png" alt="avatar"><i></i></span></div>
                                        <div class="media-body w-100">
                                            <h6 class="media-heading mb-0">Eric Alsobrook</h6>
                                            <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                                        </div>
                                    </div>
                                </a>
                                <a href="javascript:void(0)"  class="list-group-item">
                                    <div class="media">
                                        <div class="media-left pr-1"><span class="avatar avatar-sm avatar-busy rounded-circle"><img src="<?php echo base_url() ;?>app-assets/images/portrait/small/avatar-s-7.png" alt="avatar"><i></i></span></div>
                                        <div class="media-body w-100">
                                            <h6 class="media-heading mb-0">Berra Eric</h6>
                                            <p class="font-small-2 mb-0 text-muted">UI Developer</p>
                                        </div>
                                    </div>
                                </a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <!--/ Project Users -->
</div>

          </div>
        </div>

    </div>

</div>
        

<script language="JavaScript" type="text/javascript" src="https://ajax.googleapis.com/ajax/libs/jquery/3.3.1/jquery.min.js" >
</script>

<script type="text/javascript">
        
        function PostingAction(){                    
            $.ajax({
                type : "POST",
                url  : $base_url+'mitra/project/PostingProject',
        //                    data : $( "#formAdd" ).serialize(),
                data : { 
                    project : '<?php echo $project_kode; ?>', 
                    mitra_id : '<?php echo  $mitra_id; ?>'
                },
                dataType : "json",
                success:function(data){
                if(data.status=='200'){
                
                }
       
            }
        });
    }    
</script>