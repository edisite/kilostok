<div class="content-header row">
        <div class="content-header-left col-md-6 col-12">
          <h3 class="content-header-title"><?php echo $page_title; ?></h3>
        </div>
        <div class="content-header-right breadcrumbs-right col-md-6 col-12">
            <div class="breadcrumb-wrapper col-12">
                <ol class="breadcrumb">
                    <?php
                            for ($i=0; $i<sizeof($breadcrumb); $i++)
                            {
                                    $active = ($i==sizeof($breadcrumb)-1 || $breadcrumb[$i]['url']=='#') ? 'active' : '';
                                    $name = $breadcrumb[$i]['name'];

                                    if ($active)
                                    {
                                            echo "<li class='breadcrumb-item $active'>$name</li>";
                                    }
                                    else
                                    {
                                            $url = $breadcrumb[$i]['url'];
                                            echo "<li class='breadcrumb-item'><a href='$url'>$name</a></li>";
                                    }
                            }
                    ?>
                </ol>
            </div>
        </div>
        </div>

