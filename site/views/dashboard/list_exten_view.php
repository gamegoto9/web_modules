<?php $this->load->view('includes/header'); ?>
<?php $this->load->view('includes/navbar'); ?>
<?php $this->load->view('includes/sidebar'); ?>


<?php $this->load->view('includes2/header'); ?>
<?php
$ffdate = date("Y-m-d", strtotime('-7 day'));

function compareDate($date1, $date2) {
    $checkdate;
    $arrDate1 = explode("-", $date1);
    $arrDate2 = explode("-", $date2);
    $timStmp1 = mktime(0, 0, 0, $arrDate1[1], $arrDate1[2], $arrDate1[0]);
    $timStmp2 = mktime(0, 0, 0, $arrDate2[1], $arrDate2[2], $arrDate2[0]);

    if ($timStmp1 == $timStmp2) {
        $checkdate = "1";
    } else if ($timStmp1 > $timStmp2) {
        $checkdate = "1";
    } else if ($timStmp1 < $timStmp2) {
        $checkdate = "2";
    }
    return($checkdate);
}
?>
<section id="content">
    <div class="container">

        <div class="row">
            <div class="border-radius-activity-top"
                 <h2>โครงการแลกเปลี่ยนของหน่วยงาน</h2>
            </div>
            <div class="accordion">
                <div class="panel-group" id="accordion2">
                    <div class="border-radius-found-bottom">
                        <font color="#000">
                        <table class="table table-hover">
                            <tbody>
                                
                                    <tr bgcolor="#F2F4F7">                                  
                                            <td>
                                                <a href="http://www.inter.mua.go.th/main2/article.php?id=203"><font color="#000">ประกาศรายชื่อผู้ผ่านการคัดเลือกเข้าร่วมโครงการแลกเปลี่ยนนักศึกษาของสถาบันอุดมศึกษาไทยกับต่างประเทศ ประจำปีงบประมาณ 2558</font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>  
                                    </tr>
                                    <tr bgcolor="#F2F4F7">
                                            <td>
                                                <a href="http://www.inter.mua.go.th/main2/article.php?id=490"><font color="#000">โครงการอบรมเพื่อพัฒนาทักษะการสื่อสารภาษาอังกฤษในการประชุมระดับนานาชาติ สำหรับหน่วยงานด้านการเกษตร</font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                    </tr>
                                    <tr bgcolor="#F2F4F7">
                                            <td>
                                                <a href="http://www.inter.mua.go.th/main2/article.php?id=219"><font color="#000">โครงการแลกเปลี่ยนนักศึกษาผ่านระบบออนไลน์ (USCO) ประจำปี 2558 ครั้งที่ 1</font></a>
                                                <img lass="img-responsive" src="http://crruinter.crru.ac.th/css/images/new.gif" width="4%">
                                            </td>
                                    </tr>
                                    
                                       
                            </tbody>
                        </table>
                    </div>



                </div><!--/#accordion1-->
            </div>

             
            
            
            
            <div class="border-radius-activity-top"
                 <h2>โครงการแลกเปลี่ยนประจำของหน่วยงานต่างประเทศ</h2>
            </div>
            <div class="accordion">
                <div class="panel-group" id="accordion2">
                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page4">
                                                     1. YSEALI <img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page4" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            
                                                           
                                                            Young Southeast Asian Leaders Initiative (YSEALI) เพื่อสร้างเครือข่ายระดับภูมิภาคและพัฒนาทักษะความเป็นผู้นำในหมู่เยาวชนอาเซียน รัฐบาลสหรัฐฯ ขอเชิญชวนเยาวชนชาวไทยอายุระหว่าง 18-35 ปี 
                                                            ลงทะเบียนเป็นสมาชิกและร่วมเป็นส่วนหนึ่งของโครงการ Young Southeast Asian Leaders Initiative (YSEALI) 
                                                            โดยสมาชิกโครงการ YSEALI จะมีสิทธิ์สมัครชิงทุนสนับสนุนกิจกรรม YSEALI Seeds for the Future  
                                                            ผู้สนใจสามารถลงทะเบียนและอ่านรายละเอียดเพิ่มเติมเกี่ยวกับทุนได้ที่เว็บไซต์ของโครงการ <a href="http://yseali.state.gov/">http://yseali.state.gov/</a> 
                                                            และ <a href="http://thai.bangkok.usembassy.gov/yseali.html">http://thai.bangkok.usembassy.gov/yseali.html</a><br>
                                                            <br><br>
                                                            2. AuPair
                                                               
                                                        </div>



                                                       

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : 22 April 2015 ||</a></p>
                                                </div>
                                            </div>
                                </div>
                    
                    
                    <div class="panel panel-default">
                                            <div class="panel-heading">
                                                <h3 class="panel-title">
                                                    <a class="accordion-toggle" data-toggle="collapse" data-parent="#accordion2" href="#page5">
                                                     2. AuPair<img src='http://crruinter.crru.ac.th/css/images/new.gif'>
                                                        <i class="fa fa-angle-right pull-right"></i>
                                                    </a>
                                                </h3>
                                            </div>
                                            <div id="page5" class="panel-collapse collapse">                                                                     
                                                <div class="panel-body">
                                                    <div class="media accordion-inner">
                                                        <div class="pull-left">
                                                            
                                                           Becoming an Au Pair in America is one of the best ways to discover the USA. As an Au Pair in America you can experience everyday life by living with one of our carefully selected American host families caring for their children.
                                                           
                                                           <br><br>
                                                           <a href="http://www.aupairamerica.co.uk/">http://www.aupairamerica.co.uk/</a>
                                                        </div>



                                                       

                                                    </div>
                                                    <hr width="100%">
                                                    <p align="right">วันที่ : 22 April 2015 ||</a></p>
                                                </div>
                                            </div>
                                </div>
                    
                    

                </div>

                </div><!--/#accordion1-->
            </div>



        </div><!--/.row-->
    </div><!--/.container-->
</section><!--/#content-->
<?php $this->load->view('includes/footer'); ?>