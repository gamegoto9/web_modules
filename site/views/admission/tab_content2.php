
<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

//$res = $recData->row_array();
//$multi = $res['multi_file'];
?>
<table class="table table-hover table-responsive" style="font-size: small;">
    <?PHP
    $i = 0;
    foreach ($recData->result_array() as $row) {
        $i++;

        $multi = $row['multi_file'];

        if ($multi == 1) {
            ?>
			<!--
            <tr>
                <td style="width: 108px" class="text-left" colspan="2"> 
			<tr>
			-->
                    <div class="panel panel-default">
					
								   <td><span class="label label-info"><?PHP echo $row['Ddate']; ?></span></td>
								   <td colspan="-2">	
                        <div class="panel-heading1">
                            <h3 class="panel-title">
							
                                <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page<?PHP echo $row['id']; ?>">
                                   
                                    <dd>
                                        <font color="#2A6496" size="2"><?php echo $row[$title]; ?></font>
                                    </dd>
									
                    <!--                    <img src='http://crruinter.crru.ac.th/css/images/new.gif'>-->

                                </a>
								
                            </h3>
							
                        </div>
						</td>
						</tr>
						<tr>
						<td colspan="2">
                        <div id="page<?PHP echo $row['id']; ?>" class="panel-collapse collapse">                                                                     
                            <div class="panel-body">
                                <div class="media accordion-inner">
                                    <div class="pull-left">
                                        <!--<img src='<?php echo base_url('assets/themes/agency/img/icon.png'); ?>'width="100px">-->
                                    </div>
                                    <?PHP echo $row['note']; ?>
                                </div>
                                <hr width="100%">
									<p align="right"> <a href="<?php echo $row['file']; ?>" target="_bank"><span class="label label-info">อ่านต่อ..</span> </a></p>
                            </div>
                        </div>
						
						</td>
								
						
                    </div>
				</tr>	
                </td>
            </tr>
            <?PHP
        } else {
            ?>
            <tr>
                <td style="width: 108px" class="text-left">
                    <span class="label label-info"><?PHP echo $row['Ddate']; ?></span>
                </td>
                <td>
                    <a href="<?php echo $row['file']; ?>" target="_bank">
                        <?php echo $row[$title]; ?>
                    </a>
                </td>
            </tr>
            <?PHP
        }
    }
    ?>  
    <tr>
        <td colspan="2">
            <div id="page_all" class="pull-right">
                <br>
                <a class="btn btn-danger btn-xs" href="<?php echo site_url() . '/site/dashboard/list_scholarships'; ?>" style="color:#fff;"><?PHP echo $this->lang->line('read_all') ?></a>
            </div>
        </td>
    </tr>
</table>






