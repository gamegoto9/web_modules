<?php
defined('BASEPATH') or exit('No direct script access allowed');

$user_language = $this->
    session->userdata('language');
$this->lang->load('contact_form_' . $user_language, $user_language);

$this->session->set_userdata('LASTURL', $this->uri->uri_string());
?>
<?php $this->
    load->view('2017_2/includes/header');?>
<div class="gtco-loader">
</div>
<div id="page">

<?php $this->
    load->view('2017_2/includes/navbar');?>




<div class="gtco-section-overflow">

		<div class="gtco-section3" id="gtco-about" data-section="about">
			<div class="gtco-container">
                <div class="row">
                    <div class="col-md-6">
                        <div class="gtco-heading">
                            <h2 class="gtco-left">International Affair Division.</h2>
                            
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-6">
                        <div class="row">

                            <div class="col-md-12">
                                <div class="feature-left">
                                    <span class="icon">
                                        <i class="icon-globe"></i>
                                    </span>
                                    <div class="feature-copy">
                                        <h3>เกี่ยวกับเรา</h3>
                                        <p>สำนักงานวิเทศสัมพันธ์ สถาบันราชภัฏเชียงรายได้รับการจัดตั้งเป็นหน่วยงานภายใต้การดูแลของผู้ช่วยอธิการบดีด้านต่างประเทศ เพื่อรับผิดชอบงานวิเทศสัมพันธ์ของสถาบัน  เดิมตั้งอยู่ ณ อาคาร 39 (สถาบันภาษาเดิม) เมษายน 2548 มหาวิทยาลัยราชภัฏเชียงรายได้จัดตั้งกองวิเทศสัมพันธ์ เป็นหน่วยงานภายในสังกัดสำนักงานอธิการบดี โดยมีที่ตั้งหน่วยงาน ณ อาคารบริหารงานกล่าง เพื่อรองรับการขยายงานด้านต่างประเทศของมหาวิทยาลัย โดยในช่วงเริ่มต้นมีเจ้าหน้าที่ปฏิบัติงาน จำนวน 2 คน จนกระทั่งปัจจุบัน (ปี พ.ศ. 2560) มีเจ้าหน้าที่ปฏิบัติงานรวม 10 คน</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="feature-left">
                                    <span class="icon">
                                        <i class="icon-heart"></i>
                                    </span>
                                    <div class="feature-copy">
                                        <h3>วิสัยทัศน์</h3>
                                        <p>มุ่งพัฒนาความร่วมมือกับหน่วยงานต่างประเทศของมหาวิทยาลัยให้เป็นที่ยอมรับในระดับภูมิภาค และระดับสากล</p>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="feature-left">
                                    <span class="icon">
                                        <i class="icon-suitcase"></i>
                                    </span>
                                    <div class="feature-copy">
                                        <h3>ปรัชญา</h3>
                                        <p>สร้างพันธมิตร ประสานกิจการความร่วมมือ ช่วยเหลือ และพัฒนางานมหาวิทยาลัย</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>
                    </div>
                    <div class="col-md-6 animate-box fadeIn animated-fast" data-animate-effect="fadeIn">
                        <div class="row">
                            <div class="col-md-12">
                                <div class="feature-left">
                                    <span class="icon">
                                        <i class="icon-archive"></i>
                                    </span>
                                    <div class="feature-copy">
                                        <h3>วิสัยทัศน์</h3>
                                        <ol>
                                            <li>สนับสนุน และร่วมพัฒนาให้มหาวิทยาลัยราชภัฏเชียงรายเป็นศูนย์กลางการศึกษาในระดับภูมิภาค และระดับสากล </li>
                                            <li>สงเสริมการวิจัย การบริการวิชาการ และการทำนุบำรุง เผยแพร่ภาษา ศิลปะ และวัฒนธรรมไทยให้นานาชาติได้รู้จัก</li>
                                            <li>สนับสนุนการสร้างเครือข่ายกับต่างประเทศ</li>
                                        </ol>
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-12">
                                <div class="feature-left">
                                    <span class="icon">
                                        <i class="icon-tag"></i>
                                    </span>
                                    <div class="feature-copy">
                                        <h3>การติดต่อ</h3>
                                        <p>โทร : 053 776 032</p>
                                        <p>E-mail : crruinter@crru.ac.th</p>
                                        <p>ที่ตั้ง : อาคารบริหารงานกลาง สำนักงานกองวิเทศสัมพันธ์</p>
                                    </div>
                                </div>
                            </div>
                            
                        </div>

                    </div>
                </div>
                <!--  -->
               
                
            </div>
		</div>
</div>

<!-- start personal -->


<!-- end personal -->
<div class="gtco-section-overflow">
    
    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>