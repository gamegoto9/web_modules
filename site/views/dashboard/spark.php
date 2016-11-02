<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>



<?php $this->load->view('includes2/header'); ?>
<script src="<?php echo base_url('assets/js/jsapi.js');?>"></script>
	
<br><br><br><br><br><br><br><br>
<section id="content">
    <div class="container">

        <div class="row">



            <div class="col-xs-12 col-sm-12 ">	
                <div class="border-radius-top-teerawat">
                    <font color="#FFF">สถิตินักศึกษา</font>
                </div>
                <div class="single-profile-top wow fadeInDown" data-wow-duration="1000ms" data-wow-delay="300ms">
                    
                        <?php
                            foreach ($student2556->result_array() as $row) {
                                    $s_std2556 = $row['count'];
                                }
                            foreach ($student2556_inter->result_array() as $row) {
                                    $i_std2556 = $row['count'];
                            }
                            foreach ($student2557->result_array() as $row) {
                                    $s_std2557 = $row['count'];
                            }
                            foreach ($student2557_inter->result_array() as $row) {
                                    $i_std2557 = $row['count'];
                            }
                            ?>
                           
                    
                      <script type="text/javascript">
                            drawChart(500,500);
                      </script>
                   
                    <div id="piechart_3d" style="width: 900px; height: 500px;"></div>
                </div>
            </div><!--/.col-lg-4 -->
        </div><!--/.row-->
        
</section><!--/#content-->  


<script type="text/javascript">
      google.load("visualization", "1", {packages:["corechart"]});
      google.setOnLoadCallback(drawChart);
      function drawChart() {
          
        
                  
        var std2556=<?=$s_std2556 + $i_std2556?>;
        var std2557=<?=$s_std2557 + $i_std2557?>;
        
        var data = google.visualization.arrayToDataTable([
          ['Task', 'Hours per Day'],
          ['ปีการศึกษา 2556',     std2556],
          ['ปีการศึกษา 2557',      std2557]
          
        ]);

        var options = {
          title: 'จำนวนนักศึกษาต่างชาติที่ศึกษา ปีการศึกษา 2556- 2557',
          is3D: true,
        };

        var chart = new google.visualization.PieChart(document.getElementById('piechart_3d'));
        chart.draw(data, options);
      }
    </script>
<?php $this->load->view('includes/footer'); ?>