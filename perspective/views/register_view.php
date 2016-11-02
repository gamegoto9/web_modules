<form class="form-horizontal" role="form" id="form_save" name="form_save">
    <div class="form-group">

        <label for="inputfname" class="col-sm-2 control-label">ชื่อ</label>
        <div class="col-sm-9">
            <input type="text" id="fname" name="fname" class="form-control" value=""><name></name>
            <span class="glyphicon form-control-feedback" id="fnameIcon" aria-hidden="true"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="inputlname" class="col-sm-2 control-label">สกุล</label>
        <div class="col-sm-9">
            <input type="text" id="lname" name="lname" class="form-control" value=""><lname></lname>
            <span class="glyphicon form-control-feedback" id="lnameIcon" aria-hidden="true"></span>
        </div>
    </div>
    <div class="form-group">
        <label for="inputTel" class="col-sm-2 control-label">เบอร์โทร</label>
        <div class="col-sm-9">
            <input type="text" id="tel" name="tel" placeholder required class="form-control" value="" maxlength="10"><tel></tel>
            <span class="glyphicon form-control-feedback" id="telIcon" aria-hidden="true"></span>

        </div>


    </div>
    <div class="form-group">
        <label for="inputemail" class="col-sm-2 control-label">E-mail</label>
        <div class="col-sm-9">
            <input type="text" id="email" name="email" class="form-control" value=""><email></email>
            <span class="glyphicon form-control-feedback" id="emailIcon" aria-hidden="true"></span>
        </div>
    </div>

    <div class="form-group">
        <label for="inputemail" class="col-sm-4 control-label">เป็นหัวหน้ากลุ่มหรือไม่?</label>
        <div class="radio">
            <label>
                <input type="radio" name="boss" id="boss" value="0" checked>
                ไม่ใช่
            </label>
            <label>
                <input type="radio" name="boss" id="boss" value="1">
                ใช่
            </label>
        </div>

    </div>
</form>

<script type="text/javascript">
    $(document).ready(function() {

        $("#lname").keyup(function() {
            if ($("#lname").val().length < 1) {
                
                $("#lnameIcon").toggleClass("glyphicon-remove");
                $('input[name=lname]').parent().addClass("has-error");
                $("#lnameIcon").addClass("glyphicon-remove");
                $("#lnameIcon").removeClass("glyphicon-ok");
                
            }else{
                $('input[name=lname]').parent().addClass("has-feedback");
                $('input[name=lname]').parent().addClass("has-success");
                $('input[name=lname]').parent().removeClass("has-error");
                


                $("#lnameIcon").toggleClass("glyphicon-ok");
                $("#lnameIcon").addClass("glyphicon-ok");
                $("#lnameIcon").removeClass("glyphicon-remove");
            }

        });

        $("#fname").keyup(function() {

            if ($("#fname").val().length < 1) {
                
                $("#fnameIcon").toggleClass("glyphicon-remove");
                $('input[name=fname]').parent().addClass("has-error");
                $("#fnameIcon").addClass("glyphicon-remove");
                $("#fnameIcon").removeClass("glyphicon-ok");
                
            }else{
                $('input[name=fname]').parent().addClass("has-feedback");
                $('input[name=fname]').parent().addClass("has-success");
                $('input[name=fname]').parent().removeClass("has-error");
                


                $("#fnameIcon").toggleClass("glyphicon-ok");
                $("#fnameIcon").addClass("glyphicon-ok");
                $("#fnameIcon").removeClass("glyphicon-remove");
            }
        });

        $("#tel").keyup(function() {

            var num = $("#tel").val().length;

            

            if (num < 10) {
                
                $("#telIcon").toggleClass("glyphicon-remove");
                $('input[name=tel]').parent().addClass("has-error");
                $("#telIcon").addClass("glyphicon-remove");
                $("#telIcon").removeClass("glyphicon-ok");
                
            }else{
                $('input[name=tel]').parent().addClass("has-feedback");
                $('input[name=tel]').parent().addClass("has-success");
                $('input[name=tel]').parent().removeClass("has-error");
                


                $("#telIcon").toggleClass("glyphicon-ok");
                $("#telIcon").addClass("glyphicon-ok");
                $("#telIcon").removeClass("glyphicon-remove");
            }
        });
        
        $("#email").keyup(function() {

            var num = $("#email").val().length;

            

            if (num < 1) {
                
                $("#emailIcon").toggleClass("glyphicon-remove");
                $('input[name=email]').parent().addClass("has-error");
                $("#emailIcon").addClass("glyphicon-remove");
                $("#emailIcon").removeClass("glyphicon-ok");
                
            }else{
                
                
                $('input[name=email]').parent().addClass("has-feedback");
                $('input[name=email]').parent().addClass("has-success");
                $('input[name=email]').parent().removeClass("has-error");
                


                $("#emailIcon").toggleClass("glyphicon-ok");
                $("#emailIcon").addClass("glyphicon-ok");
                $("#emailIcon").removeClass("glyphicon-remove");
            }
        });

    });
</script>