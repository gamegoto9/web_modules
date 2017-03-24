
<?php $this->load->view('admission/includes/header'); ?>

<style type="text/css">
    body {
    padding: 20px;
}
</style>
<form>
    <div class="form-group">
        <label class="control-label" for="firstname">Nome:</label>
        <div class="input-group">
            <span class="input-group-addon">$</span>
            <input class="form-control" placeholder="Insira o seu nome próprio" name="firstname" type="text" />
        </div>
    </div>
        
    <div class="form-group">
        <label class="control-label" for="lastname">Apelido:</label>
        <div class="input-group">
            <span class="input-group-addon">€</span>
            <input class="form-control" placeholder="Insira o seu apelido" name="lastname" type="text" />
        </div>
    </div>
    
        <button type="submit" class="btn btn-primary">Submit</button>
</form>

<?php $this->load->view('admission/includes/footer'); ?>
<script type="text/javascript">
        $('form').validate({
        rules: {
            firstname: {
                minlength: 3,
                maxlength: 15,
                required: true
            },
            lastname: {
                minlength: 3,
                maxlength: 15,
                required: true
            }
        },
        highlight: function(element) {
            $(element).closest('.form-group').addClass('has-error');
        },
        unhighlight: function(element) {
            $(element).closest('.form-group').removeClass('has-error');
        },
        errorElement: 'span',
        errorClass: 'help-block',
        errorPlacement: function(error, element) {
            if(element.parent('.input-group').length) {
                error.insertAfter(element.parent());
            } else {
                error.insertAfter(element);
            }
        }
    });

</script>