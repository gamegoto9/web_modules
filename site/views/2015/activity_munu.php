<?php
defined('BASEPATH') OR exit('No direct script access allowed');

$user_language = $this->session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);


?>
<div class="col col-md-8 col-sm-9 col-xs-9 center-row" id="services_content">
    <br/>
    <div class="arrow-left"></div>
    <div class="arrow-box center-row">
        <div class="tab-content center">              

            <?php
            $i = 0;
            foreach ($recData as $row) {
                $i++;

                if ($i == 1) {
                    ?>
                    <div class="tab-pane fade in active" id="a<?PHP echo $i; ?>">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo substr($row['Ntext'],0,600); ?>........</p>
                        
                        <div class="pull-right">
                            <button class="btn btn-warning btn-sm"><a href="<?php echo base_url(); ?>/site/dashboard/gallery/<?php echo $row['Nid']; ?>/"><?PHP echo $this->lang->line('read_all') ?></a></button>
                        </div>

                    </div>

                    <?PHP
                } else {
                    ?>

                    <div class="tab-pane fade" id="a<?PHP echo $i; ?>">
                        <h3><?php echo $row['title']; ?></h3>
                        <p><?php echo substr($row['Ntext'],0,600); ?>........</p>
                        
                        <div class="pull-right">
                            <button class="btn btn-warning btn-sm"><a href="<?php echo base_url(); ?>/site/dashboard/gallery/<?php echo $row['Nid']; ?>/"><?PHP echo $this->lang->line('read_all') ?></a></button>
                        </div>

                    </div>


                    <?PHP
                }
            }
            ?>
        </div>                                     
    </div>
</div>