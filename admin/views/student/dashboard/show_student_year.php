
<!--datatable-->
<link href="<?php echo base_url('assets/css/jquery.dataTables.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/js/jquery.dataTables.min.js') ?>"></script>
<!--pnotify-->
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.icons.css') ?>" rel="stylesheet">
<link href="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.default.css') ?>" rel="stylesheet">
<script src="<?php echo base_url('assets/bootstrap_extras/pnotify/jquery.pnotify.js') ?>"></script>

<script src="<?php echo base_url('assets/bootstrap_extras/bootbox/bootbox.min.js'); ?>"></script>
<script>
    $(document).ready(function() {
        $('table.display').dataTable();
    });
</script>
<style>
    div.dataTables_wrapper {
        margin-bottom: 3em;
    }
</style>

<div class="row">
    <div class="col-xs-12 col-md-8">
        
   
<table class="table table-bordered text-center">
    <thead>
        <tr class="active" >
            <th>#</th>
            <th>ปีที่เข้า</th>
            <th>จำนวน(คน)</th>
            <th><i class="fa fa fa-cogs"></i></th>
            
        </tr>
    </thead>



    <tbody>
        <?php
      
        $i = 1;
        
        if($send1 == "02"){
        foreach ($student as $row) {
            ?>

           
            <tr class="warning">
                <td><?php echo $i ?></td>
                <td><?php echo $row['year_in']; ?></td>
                <td><?php echo $row['amount']; ?></td>
                
                

            <td><i class="fa fa-folder-o btn btn-success btn-lg btn-block" onclick ="data_std1(<?php echo $row['year_in'];?>)"> View</i></td>
              
            </tr>
            <?php
            $i++;
        }
        }else if($send1 == "03"){
           
            $year1="";
            $countfull= 0;
            
            
            $count2= 0;
            $a=0;
            
            
            foreach ($student as $row2) {  
                        
                        if($row2['year_in'] >= '2559'){
                        ?>
                            <tr class="warning">
                                <td><?php echo $i ?></td>
                                <td><?php echo $row2['year_in']; ?></td>
                                <td><?php echo $row2['amount']; ?></td>
                                <td><i class="fa fa-folder-o btn btn-success btn-lg btn-block" onclick ="data_std2(<?php echo $row2['year_in'];?>)"> View</i></td>
                            </tr>
                        <?PHP
                           $i++;
                        }
 
                    }
            foreach ($student2 as $row) {
                
                $year1 = $row['year_in'];
                $count1 = $row['amount'];
                
            ?>

           
           
               
                <?php
                    foreach ($student as $row2) {  
                        
                        if($year1 == $row2['year_in']){
                             
                            $count2 = $row2['amount'];
                            break;
                        }else{
                            $count2 = 0;
                        }
 
                    }
                    
                    
                    
                    
                    $countfull = $count1 + $count2;
                    
                        ?>
             <tr class="warning">
                            <td><?php echo $i ?></td>
                            <td><?php echo $year1; ?></td>
                            <td><?php echo $countfull; ?></td>
                            <td><i class="fa fa-folder-o btn btn-success btn-lg btn-block" onclick ="data_std2(<?php echo $row['year_in'];?>)"> View</i></td>
             </tr>
                        <?PHP
                    
               
            $i++;
            }

        }
        
        ?>
    </tbody>
</table>

 </div>
</div>
 <!-- Modal -->
    <div class="modal fade" id="modalShow" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
        <div class="modal-dialog">
            <div class="modal-content">
                <div class="modal-header">
                    <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                    <h4 class="modal-title" id="myModalLabel">Modal title</h4>
                </div>
                <div class="modal-body">
                    
                    
                    <div id="div_show">
                        
                    </div>
                  
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
                    <button type="button" class="btn btn-primary" onclick="save_edit()">Save changes</button>
                </div>
            </div>
        </div>
    </div>

<script>
    
    
    
    function data_std1(year){
        
        var year = year;
        
        
        $('#main_view').load('student/show_data_std1/'+year);      
        
    }
    
    function data_std2(year){
        
        var year = year;
        
        
        $('#main_view').load('student/show_data_std2/'+year);      
        
    }
    
   

</script>