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

		<div class="gtco-section" id="gtco-services" data-section="passport">
			<div class="gtco-container">
				<div class="row">
					<div class="col-md-6">
						<div class="gtco-heading">
							<h2 class="gtco-left"><?php echo $this->lang->line('service_visa'); ?></h2>
							
						</div>
					</div>
				</div>
				<div class="row">
					<div class="col-md-6 animate-box fadeIn animated-fast">
						<div class="row">

							<div class="col-md-12">
								<div class="feature-left">
									<span class="icon">
										<i class="icon-credit-card"></i>
									</span>
									<div class="feature-copy">
										<h3>หนังสือเดินทางราชการ</h3>
										<p>การออกหนังสือเดินทางราชการ </p>

										<p>ตามระเบียบกระทรวงการต่างประเทศว่าด้วยการออกหนังสือเดินทาง พ.ศ. 2548 ข้อ 9 กำหนดให้ออกหนังสือเดินทางราชการแก่บุคคลดังต่อไปนี้</p>

										<ol>
											<li>ข้าราชการ เจ้าหน้าที่ของหน่วยงานที่จัดตั้งตามรัฐธรรมนูญ และสมาชิกรัฐสภา ซึ่งเดินทางไปราชการในต่างประเทศ</li>
											<li>ข้าราชการซึ่งไปปฏิบัติหน้าที่ประจำอยู่ ณ สถานเอกอัครราชทูตหรืสถานกงสุลไทย หรือ ในคณะทูตถาวรประจำองค์การระหว่างประเทศในตำแหน่งอื่นที่มิใช่ตำแหน่งทางการทูต รวมทั้ง คู่สมรส และบุตรที่ชอบด้วยกฎหมายซึ่งอยู่ในความดูแลของบิดามารดาที่ประจำอยู่ หรือทำการศึกษาอยู่ในประเทศอื่น แต่บุตรต้องอายุไม่เกิน 25 ปี</li>
											<li>บุคคลที่ได้รับมอบหมายให้ไปราชการต่างประเทศ</li>
											<li>บุคคลอื่นใดเพื่อประโยชน์แก่ทางราชการหรือในกรณีที่เห็นสมควรเป็นพิเศษ หรือ เกี่ยวกับการเผยแพร่ชื่อเสียงเกียรติคุณของประเทศ ให้ปลัดกระทรวงการต่างประเทศหรือผู้ที่ปลัดกระทรวงการต่างประเทศมอบหมาย มีอำนาจใช้ดุลยพินิจในการอนุมัติให้ออกหนังสือเดินทางได้</li>
										</ol>

										<p>หนังสือเดินทางราชการมีอายุไม่เกิน 5 ปี หรือเมื่อเสร็จภารกิจหรือผู้ถือขาดคุณสมบัติที่จะถือหนังสือเดินทางราชการ ให้ส่งหนังสือเดินทางราชการนั้นแก่กระทรวงการต่างประเทศ ทั้งนี้ผู้ถือหนังสือเดินทางราชการจะนำไปใช้ในการเดินทางส่วนตัวไม่ได้</p>

										<p><b>เอกสารประกอบการขอหนังสือเดินทางราชการ </b></p>

										<p>ผู้ยื่นคำร้องขอหนังสือเดินทาง ต้องมาดำเนินการด้วยตนเอง เนื่องจากต้องเก็บข้อมูลชีวภาพของผู้ถือหนังสือเดินทาง ได้แก่ ภาพใบหน้า และลายพิมพ์นิ้วมือ เพื่อนำไปบันทึกลงในไมโครชิพที่ฝังในหนังสือเดินทาง เอกสารที่ต้องเตรียมมาในวันยื่นคำร้อง   - หนังสือนำจากต้นสังกัดระดับปลัดกระทรวง หรือผู้ที่ได้รับมอบหมายถึงปลัดกระทรวงการต่างประเทศ ขอให้ออกหนังสือเดินทาง โดยแจ้งการอนุมัติให้ผู้ยื่นคำร้องเดินทางไปราชการ ให้ระบุประเทศ กำหนดวันเวลาที่จะเดินทาง</p>

										<ul>
											<li>สำเนาบันทึกหรือสำเนาคำสั่งที่อนุมัติตัวบุคคลให้เดินทางไปราชการ แสดงรายละเอียดการเบิกค่าใช้จ่ายได้ตามสิทธิซึ่งอยู่ในหลักเกณฑ์ตามพระราชกฤษฎีกาค่าใช้จ่ายในการเดินทางไปราชการ(ประกอบด้วย ค่าเบี้ยเลี้ยง, ค่าที่พัก, ค่าพาหนะเดินทาง ฯลฯ) กรณีที่ได้รับทุนสนับสนุนจากที่อื่น เช่น จากต่างประเทศ หรือหน่วยงานในประเทศ ขอเอกสารที่เกี่ยวข้องประกอบ   - บัตรประจำตัวข้าราชการ พร้อมสำเนาบัตรประจำตัวประชาชนที่มีเลข 13 หลัก หรือ สำเนาทะเบียนบ้าน</li>
											<li>กรณีเป็นพนักงานของรัฐ หรือ พนักงานมหาวิทยาลัย โปรดนำหลักฐานแสดงระยะเวลาการปฏิบัติงานกับต้นสังกัด เช่น สัญญาการจ้างมาแสดง เพื่อประกอบการพิจารณากำหนดอายุการใช้งานของหนังสือเดินทาง</li>
											<li>ค่าธรรมเนียม ในการขอหนังสือเดินทางราชการ 1,000 บาท สามารถนำใบเสร็จรับเงินเป็นหลักฐานเบิกคืนจากหน่วยงานต้นสังกัด</li>
											<li>การขอหนังสือนำไปขอรับการตรวจลงตรา (VISA) </li>

										</ul>

										<p>กรณีขอหนังสือเดินทางราชการพร้อมหนังสือนำเพื่อการตรวจลงตรากับสถานเอกอัครราชทูต/สถานกงสุลต่างประเทศในไทย จะต้องถ่ายสำเนาหน้าหนังสือนำที่มีถึงปลัดกระทรวงการต่างประเทศมาด้วย 1 ชุด</p>

										<p><b>หน่วยบริการทำหนังสือเดือนทาง สำนักงานหนังสือเดินทางชั่วคราว เชียงราย</b></p>

										<p>ที่อยู่ อาคารองค์การบริหารส่วนจังหวัด (อบจ.)หลังใหม่ ถนนศูนย์ราชการ ตำบลริมกก อำเภอเมือง จังหวัดเชียงราย 57100 โทรศัพท์ 053-175375 โทรสาร 053-175374</p>

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
										<i class="icon-credit-card"></i>
									</span>
									<div class="feature-copy">
										<h3>หนังสือเดินทางธรรมดา</h3>
										<p><b>บุคคลบรรลุนิติภาวะ</b></p>
										<ul>
											<li>ระเบียบการขอหนังสือเดินทางของผู้เยาว์อายุต่ำกว่า 15 ปี</li>
											<li>ค่าธรรมเนียม</li>
											<li>เอกสารประกอบการทำหนังสือเดินทางธรรมดาของผู้เยาว์อายุต่ำกว่า 15 ปี</li>
										</ul>

										<p><b>ผู้เยาว์อายุต่ำกว่า 15 ปี</b></p>
										<ul>
											<li>เอกสารประกอบการทำหนังสือเดินทางธรรมดาของบุคคลบรรลุนิติภาวะ</li>
											<li>ค่าธรรมเนียม</li>
										</ul>

										<p><b>ผู้เยาว์อายุระหว่าง 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์</b></p>
										<ul>
											<li>ระเบียบการขอหนังสือเดินทางของผู้เยาว์อายุระหว่าง 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์</li>
											<li>เอกสารประกอบการทำหนังสือเดินทางธรรมดาของผู้เยาว์อายุระหว่าง 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์</li>
											<li>ค่าธรรมเนียม</li>
										</ul>

										<p><b>ข้อควรปฏิบัติในวันมายื่นคำร้อง</b></p>
										<p>โปรดนำเอกสารหลักฐานที่เกี่ยวข้องมาแสดงให้ครบถ้วน โดยเฉพาะการยื่นคำร้องกรณีผู้เยาว์อายุต่ำกว่า 15 ปี และ ผู้เยาว์อายุ 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์ ขั้นตอนการยื่นขอหนังสือเดินทางใหม่</p>

										<ol>
											<li>รับบัตรคิว (บริเวณจุดรับคำร้อง)</li>
											<li>ยื่นบัตรประจำตัวประชาชนที่มีเลข 13 หลัก พร้อมเอกสารหลักฐานอื่น ๆที่จำเป็น อาทิ หากเปลี่ยนชื่อสกุล ต้องมีหลักฐานการเปลี่ยนชื่อ นามสกุล ทะเบียนสมรส ฯลฯ มาแสดง เพื่อตรวจสอบข้อมูล</li>
											<li>เมื่ีอถึงคิวรับบริการ
												<ul>
													<li>ข้อมูลชีวภาพ (วัดส่วนสูง เก็บลายพิมพ์นิ้วมือซ้ายและขวาด้วยเครื่องสแกนเนอร์ และถ่ายรูปใบหน้า )</li>
													<li>แจ้งความประสงค์หากต้องการขอรับเล่มทางไปรษณีย์</li>
												</ul>
											</li>
											<li>ชำระค่าธรรมเนียม 1,000 บาท (และค่าส่งไปรษณีย์ 40 บาทหากประสงค์ให้จัดส่งทางไปรษณีย์) รับใบเสร็จรับเงิน และรับใบนัดรับเล่มท่านจะได้รับหนังสือเดินทาง ดังนี้
												<ul>
													<li>หากยื่นที่กรมการกงสุล ผู้ร้องสามารถรับหนังสือเดินทางได้ 2 วันทำการ (ไม่นับวันที่ยื่นคำร้อง) หากรับทางไปรษณีย์จะได้รับใน 5-7 วันทำการ</li>
													<li>หากยื่นที่สำนักงานสาขาในกรุงเทพฯ (ปิ่นเกล้าและบางนา) ผู้ร้องจะได้รับเล่มภายใน 2 วันทำการ (ไม่นับวันที่ยื่นคำร้อง) หากรับทางไปรษณีย์จะได้รับใน 7 วันทำการ</li>
													<li>กรณียื่นคำร้องที่สำนักงานสาขาในต่างจังหวัดและขอให้จัดส่งทางไปรษณีย์ผู้ร้อง (ในเขตเมือง) จะได้รับหนังสือเดินทางภายใน 2 สัปดาห์ทำการ</li>
													<li>ในกรณีไม่สามารถมารับเล่มด้วยตนเอง สามารถมอบอำนาจให้ผู้อื่นรับแทน โดยกรอกแบบฟอร์มมอบอำนาจในใบรับเล่ม พร้อมแนบบัตรประจำตัวประชาชนตัวจริงของผู้มอบอำนาจ และผู้รับมอบอำนาจ</li>
												</ul>
											</li>
										</ol>

										<p><b>บุคคลบรรลุนิติภาวะ</b></p>
										<p>เอกสารประกอบการขอหนังสือเดินทางธรรมดาของบุคคลบรรลุนิติภาวะ</p>
										<ul>

   <li>บัตรประจำตัวประชาชนที่ยังมีอายุใช้งานฉบับจริง หรือ บัตรข้าราชการ หรือ บัตรประจำตัวที่ใช้แทนตามกฎกระทรวงมหาดไทยฉบับจริง (ในกรณีที่เป็นบัตรข้าราชการให้นำสำเนาทะเบียนบ้านมาด้วย)</li>
<li>กรณีที่เกิดในต่างประเทศ ให้นำสูติบัตรหรือหนังสือเดินทางเล่มเดิมมาแสดง เพื่อยืนยันสถานที่เกิด</li>
</ul>

<p><b>ค่าธรรมเนียม</b></p>
<ul>
<li>การทำหนังสือเดินทางใหม่เสียค่าธรรมเนียม 1,000 บาท ค่าจัดส่งไปรษณียื 40 บาท</li>
</ul>
<p><b>ผู้เยาว์อายุต่ำกว่า 15 ปี</b></p>

<p>ระเบียบการขอหนังสือเดินทางของผู้เยาว์อายุต่ำกว่า 15 ปี</p>
<p>ผู้เยาว์อายุต่ำกว่า 15 ปี ต้องนำบัตรประชาชนหรือสูติบัตรฉบับจริง หากเป็นสำเนาต้องได้รับการรับรองสำเนาถูกต้องจาก อำเภอ/เขตมาแสดงพร้อมผู้มีอำนาจปกครอง หากผู้มีอำนาจปกครองไม่สามารถมาดำเนินการได้
สามารถมอบอำนาจให้ผู้อื่นมาดำเนินการแทนได้โดยต้องมีหนังสือมอบอำนาจและหนังสือยินยอมให้ผู้เยาว์เดินทางไปต่างประเทศพร้อมทั้งบัตรประจำตัวประชาชนของบิดามารดาและ/หรือผู้มีอำนาจปกครองฉบับจริงมาแสดง
ทั้งนี้หนังสือมอบอำนาจและหนังสือยินยอมให้ผู้เยาว์เดินทางไปต่างประเทศต้องผ่านการรับรองจากอำเภอ/เขต</p>

<p><b>เอกสารประกอบการขอหนังสือเดินทางธรรมดาของผู้เยาว์อายุต่ำกว่า 15 ปี</b></p>
<ul>
<li>บัตรประชาชนหรือสูติบัตรฉบับจริง หากเป็นสำเนาสูติบัตรต้องได้รับการรับรองจากอำเภอ/เขต</li>
<li>บิดาและมารดา หรือผู้มีอำนาจปกครอง นำบัตรประชาชนฉบับจริงมาลงนามต่อหน้าเจ้าหน้าที่และ บัตรประจำตัวประชาชนที่ยังมีอายุใช้งาน หรือ บัตรที่ใช้แทนได้ตามกฎกระทรวงมหาดไทย ของบิดา มารดา หรือผู้มีอำนาจปกครองฉบับจริง</li>
<li>หากชื่อนามสกุลบิดา มารดาในสูติบัตรไม่ตรงกับบัตรประจำตัวประชาชน ให้นำหลักฐานการเปลี่ยนชื่อ หรือ นามสกุลที่เป็นต้นฉบับมาแสดงด้วย ในกรณีที่มารดาหย่า และจดทะเบียนสมรสใหม่ และใช้นามสกุลใหม่ตามสามีให้นำหลักฐานการหย่าและการสมรสที่เป็นต้นฉบับมาแสดงด้วย</li>
<li>หนังสือยินยอมให้ผู้เยาว์เดินทางไปต่างประเทศและบัตรประจำตัวประชาชนฉบับจริงของบิดามารดาที่ไม่มา ในกรณีที่บิดา/มารดาฝ่ายหนึ่งฝ่ายใดไม่สามารถมาแสดงตัวได้ **หนังสือยินยอมของบิดา/มารดา ต้องผ่านการรับรองจากอำเภอ/เขต</li>
<li>เอกสารอื่น ๆ ที่จำเป็น อาทิ หลักฐานใบเปลี่ยนชื่อ เปลี่ยนนามสกุล เอกสารหลักฐานการรับรอง บุตรหรือรับบุตรบุญธรรม บันทึกการหย่า ซึ่งมีข้อความระบุให้บุตรอยู่ในความดูแลของบิดา หรือมารดา เป็นต้น</li>
<li>กรณีบิดา มารดาผู้เยาว์เสียชีวิต / บิดาหรือมารดาผู้เยาว์เป็นชาวต่างชาติมิได้จดทะเบียนสมรสและ ไม่สามารถตามหาฝ่ายใดฝ่ายหนึ่งมาให้ความยินยอมได้ /บิดามารดามิได้จดทะเบียนสมรสแต่บุตรอยู่ในความดูแลของบิดาฝ่ายเดียวมาตลอด และไม่สามารถตามหามารดาได้ ให้นำคำสั่งศาลซึ่งระบุชื่อผู้มีอำนาจปกครอง พร้อมบัตรประจำตัวประชาชนของผู้มีอำนาจปกครองมาแสดง</li>

<p><b>ค่าธรรมเนียม</b></p>
<ul>
   <li>ผู้เยาว์อายุ 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์</li>
   <li>ระเบียบการขอหนังสือเดินทางของผู้เยาว์อายุ 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปี บริบูรณ์</li>
</ul>

<p><b>ผู้เยาว์อายุระหว่าง 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์</b></p>

   <p>ผู้เยาว์ที่มีอายุ 15 ปีขึ้นไปแต่ยังไม่ครบ 20 ปีบริบูรณ์ ที่ทำบัตรประชาชนแล้วสามารถติดต่อขอทำ หนังสือเดินทางด้วยตนเอง โดยมีหนังสือยินยอมของบิดาและมารดา หรือ ผู้มีอำนาจปกครองที่ยินยอมให้ผู้เยาว์เดินทางไปต่างประเทศที่ผ่านการรับรองจากอำเภอ/เขตมาแสดงประกอบการยื่นคำร้อง 
หากไม่มีหนังสือยินยอม บิดาและมารดาหรือผู้มีอำนาจปกครองผู้เยาว์ต้องมาลงนามต่อหน้าเจ้าหน้าที่ในวันที่ยื่นคำร้อง หรือ มีหนังสือยินยอม จากฝ่ายที่มาไม่ได้มาแสดง เอกสารที่นำมายื่นขอหนังสือเดินทางต้องเป็นต้นฉบับหากเป็นสำเนาต้องผ่านการรับรองสำเนาถูกต้อง 
จากหน่วยงานที่ออกเอกสารดังกล่าวเท่านั้น</p>

<p>เอกสารประกอบการขอหนังสือเดินทางธรรมดาของผู้เยาว์ที่มีอายุ 15 ปีขึ้นไป แต่ยังไม่ครบ 20 ปีบริบูรณ์</p>
<ul>
<li>บัตรประจำตัวประชาชนที่ยังมีอายุใช้งาน หรือ บัตรประจำตัวที่ใช้แทนตามกฎกระทรวง มหาดไทย</li>
<li>หนังสือยินยอมให้ผู้เยาว์เดินทางไปต่างประเทศที่ผ่านการรับรองจากอำเภอ/เขต และบัตรประจำตัวประชาชนของผู้ปกครอง พร้อมรับรองสำเนาถูกต้อง</li>
<li>เอกสารอื่น ๆ ที่จำเป็น อาทิ หลักฐานใบเปลี่ยนชื่อ เปลี่ยนนามสกุล เอกสารหลักฐานการรับรองบุตรหรือรับบุตรบุญธรรมใบสำคัญการสมรส ทะเบียนสมรส ทะเบียนหย่า ทะเบียนบ้าน คำสั่งศาลกรณีระบุผู้มีอำนาจปกครองแทนบิดามารดา เป็นต้น</li>
</ul>
<p><b>ค่าธรรมเนียม</b></p>

<ul>
<li>การทำหนังสือเดินทางเสียค่าธรรมเนียม 1,000 บาท</li>
<li>หน่วยบริการทำหนังสือเดือนทาง</li>
</ul>
<p><b>สำนักงานหนังสือเดินทางชั่วคราว เชียงราย</b></p>

<p>ที่อยู่ อาคารองค์การบริหารส่วนจังหวัด (อบจ.)หลังใหม่ ถนนศูนย์ราชการ ตำบลริมกก อำเภอเมือง จังหวัดเชียงราย 57100 
   โทรศัพท์ 053-175375 โทรสาร 053-175374 </p>
									</div>
								</div>
							</div>
							
						</div>
					</div>
				</div>
			</div>
		</div>
		</div>

		


<div class="gtco-section-overflow">
    
    <?php $this->
    load->view('2017_2/includes/footer');?>
</div>
</div>