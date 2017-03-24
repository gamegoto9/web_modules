<style type="text/css">
    body .modal-admin {
        /* new custom width */
        /*width: 50%;*/
        /* must be half of the width, minus scrollbar on the left (30px) */
        /*margin-left: 30%;*/
    }
</style>

<?php
if($row == 1){
    ?>

    <form class="form-horizontal">

       <div class="panel panel-default" style="background-color: #FFFFFF;">
       <div class="panel-heading" style="background-color: #9fcc1d; color: #333">
            <span class="panel-title"><i class="fa fa-address-book"></i> Personal Information</span>
        </div>
        <div class="panel-body">
            <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Name : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="name" style="text-align: left;"><?php echo $data['title']; ?>. <?php echo $data['name']; ?></label>
          </div>
          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Passport Number : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="passport" style="text-align: left;"><?php echo $data['passport_id']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Date of Birth : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="date_birth" style="text-align: left;"><?php echo $data['date_birth']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Country : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="Country" style="text-align: left;"><?php echo $data['country']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Nationality : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="Nationality" style="text-align: left;"><?php echo $data['nation']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Religion : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="Religion" style="text-align: left;"><?php echo $data['religion']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Blood Type : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="Blood" style="text-align: left;"><?php echo $data['blood']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">Gender : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="sex" style="text-align: left;"><?php echo $data['sex']; ?></label>
          </div>

          <div class="form-group">
              <label for="inputEmail3" class="col-sm-3 control-label">E-mail : </label>
              <label for="inputEmail3" class="col-sm-3 control-label" id="email" style="text-align: left;"><?php echo $data['email']; ?></label>
          </div>
      </div>
  </div>



  <div class="panel panel-default" style="background-color: #FFFFFF;">
      <div class="panel-heading" style="background-color: #9fcc1d; color: #333">
        <span class="panel-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Preference Educational Background</span>
    </div>
    <div class="panel-body">

      <div class="form-group">
          <label for="inputEmail3" class="col-sm-5 control-label">*Educational Background : </label>
          <label for="inputEmail3" class="col-sm-5 control-label" id="level" style="text-align: left;"><a href="#" onclick="showModal2('<?php echo $data['educational_file']; ?>');"><i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo $data['educational']; ?></a></label>
      </div>


  </div>
</div>





  <div class="panel panel-default" style="background-color: #FFFFFF;">
      <div class="panel-heading" style="background-color: #9fcc1d; color: #333">
        <span class="panel-title"><i class="fa fa-graduation-cap" aria-hidden="true"></i> Preference field of study</span>
    </div>
    <div class="panel-body">




      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Level of Study : </label>
          <label for="inputEmail3" class="col-sm-3 control-label" id="level" style="text-align: left;"><?php echo $data['lev_of_name']; ?></label>
      </div>


      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Field of Study: </label>
          <label for="inputEmail3" class="col-sm-3 control-label" id="subject" style="text-align: left;"><?php echo $data['sub_name_en']; ?></label>
      </div>


      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Faculty : </label>
          <label for="inputEmail3" class="col-sm-3 control-label" id="faculty" style="text-align: left;"><?php echo $data['maj_name_en']; ?></label>
      </div>


      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Student Type : </label>
          <label for="inputEmail3" class="col-sm-3 control-label" id="std_type" style="text-align: left;"><?php echo $data['type_std_id']; ?></label>
      </div>


      <div class="form-group">
          <label for="inputEmail3" class="col-sm-3 control-label">Passport Image : </label>
          <label for="inputEmail3" class="col-sm-3 control-label" id="img" style="text-align: left;"><a href="#" onclick="showModal2('<?php echo $data['file']; ?>');"><i class="fa fa-file-image-o" aria-hidden="true"></i> <?php echo $data['passport_id']; $id = $data['passport_id'];?></a></label>

      </div>
  </div>
</div>


</form>
<?php }else{
    ?>
<div class="text-center">
    <label for="inputEmail3" class="control-label" style=" font-size: 20px; font-weight: bold; color: red;">NO DATA</label>

</div>




    <?php } ?>


    <!-- Modal -->
<div class="modal fade" id="modalShow2" tabindex="-1" role="dialog" aria-labelledby="myModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-admin" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <button type="button" class="close" data-dismiss="modal"><span aria-hidden="true">&times;</span><span class="sr-only">Close</span></button>
                <h4 class="modal-title" id="myModalLabel"><i class="fa fa-file-image-o" aria-hidden="true"></i> File - -</h4>
            </div>
            <div class="modal-body">


                <div id="div_show2">
                    <img src="" width="100%" height="100%" id="my_image" name="my_image">
                </div>

            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>


<script type="text/javascript">
    function showModal2(xid) {


        var sdata = xid;

        console.log(sdata);

        //$('#div_show').load(sdata);
        $("#my_image").attr("src",sdata);
        $('#modalShow2').modal('show');
    }
</script>