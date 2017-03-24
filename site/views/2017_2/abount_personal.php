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

		<div class="gtco-section3" id="gtco-personal" data-section="personal">
			<div class="gtco-container">
                
                <div class="row">
                    <div class="col-md-9">
                        <div class="gtco-heading">
                            <h2 class="gtco-left">Personal International Affairs Division.</h2>
                            <br><br>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12 col-sm-12">
                   <div class="row">
                    <div class="col-md-4 col-sm-12 text-center col-md-offset-4">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/inter2017/asymmetry2/images/aj.nung.jpg'); ?>" alt="">
                            </div>
                            <div class="desc">
                                <h3><?php echo $this->lang->line('director_name'); ?></h3>
                                <p class="pos"><?php echo $this->lang->line('director_full'); ?></p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-4 col-sm-12 text-center col-md-offset-4">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/t-rawat_sut_58.jpg'); ?>" alt="">
                            </div>
                            <div class="desc">
                                <h3><?php echo $this->lang->line('direc_name'); ?></h3>
                                <p class="pos"><?php echo $this->lang->line('direc_title'); ?></p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">
                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/laddawan.jpg');?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นางสาวลัดดาวัลย์ พุทธวค์</h5>
                                <p class="pos">เจ้าหน้าที่บริหารงานทั่วไป</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/anuwat.jpg');?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นายอนุวัฒน์ จินาจาย</h5>
                                <p class="pos">เจ้าหน้าที่บริหารงานทั่วไป</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/pui.PNG'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นางสาวปรัชญาพร รัตนะรุ่งรัศมี</h5>
                                <p class="pos">เจ้าหน้าที่บริหารงานทั่วไป</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/dong.jpg'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>Mr.Dong Gang</h5>
                                <p class="pos">ผู้ประสานงานระหว่างประเทศ</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>
                    </div>

                    <div class="row">

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/yunan.jpg'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>Ms.Yu Nanwang</h5>
                                <p class="pos">ผู้ประสานงานระหว่างประเทศ</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/kamkarn_1.jpg'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นางสาวแกมกาญจน์ แซ่ซ้ง</h5>
                                <p class="pos">นักวิเทศสัมพันธ์</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/pakinee.jpg'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นางสาวภาคินี ขันธิกุล</h5>
                                <p class="pos">นักวิเทศสัมพันธ์</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    <div class="col-md-3 col-sm-12 text-center">
                        <div class="about-wrap">
                            <div class="about">
                                <img src="<?PHP echo base_url('assets/themes/templatemo_403_karma/images/likit.jpg'); ?>" alt="">
                            </div>
                            <br>
                            <div class="desc">
                                <h5>นายลิขิต ยอดยา</h5>
                                <p class="pos">นักวิชาการคอมพิวเตอร์</p>
                                
                                <p class="fh5co-social-icons">
                                    <a href="#"><i class="icon-twitter2"></i></a>
                                    <a href="#"><i class="icon-facebook2"></i></a>
                                    <a href="#"><i class="icon-instagram"></i></a>
                                    <a href="#"><i class="icon-dribbble2"></i></a>
                                    <a href="#"><i class="icon-youtube"></i></a>
                                </p>
                            </div>
                        </div>
                    </div>

                    </div>

                    
                    </div>
                    
                </div>
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