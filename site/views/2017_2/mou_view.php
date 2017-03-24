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
					<div class="col-md-12 col-sm-12 animate-box fadeInLeft animated-fast" data-animate-effect="fadeInLeft">
						<div class="feature-center">
							<table class="table table-striped">
                        <thead>
                            <tr>


                                <td align="center"><h3>ลำดับที่</h3></td>
                                <td align="center"><h3>มหาวิทยาลัย / องกรณ์ / ความร่วมมือกับต่างชาติ</h3></td>
                                <td align="center"><h3>ประเทศ</h3></td>
                                <td align="center"><h3>Website</h3></td>

                            </tr>
                        </thead>
                        <tbody>
                            <?php
foreach ($recData->result_array() as $row) {
    ?>
                                <tr>
                                    <td align="center"><?php echo $row['id']; ?></tdH>
                                    <td><?php echo $row['name']; ?></td>
                                    <td align="center"><?php echo $row['international']; ?></td>
                                    <td align="center"><a href="<?php echo $row['link']; ?>" target="_blank">Website</a></td>
                                </tr>
                            <?php
}
?>
                            </tbody>
                        </table>
						
						<?php echo $this->pagination->create_links(); ?>

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