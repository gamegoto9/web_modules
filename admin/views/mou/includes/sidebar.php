<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->
        <section class="sidebar">
            <!-- Sidebar user panel -->
            <div class="user-panel">
                <div class="pull-left image">
                    <img src="<?php echo base_url('assets/themes/crru_inter/img/avatar3.png'); ?>" class="img-circle" alt="User Image" />
                </div>
                <div class="pull-left info">
                    <p><?php echo $this->session->userdata('name'); ?></p>

                    <a href="#"><i class="fa fa-circle text-success"></i> Online</a>
                </div>
            </div>
            <!-- search form -->
<!--            <form action="#" method="get" class="sidebar-form">
                <div class="input-group">
                    <input type="text" name="q" class="form-control" placeholder="Search..."/>
                    <span class="input-group-btn">
                        <button type='submit' name='seach' id='search-btn' class="btn btn-flat"><i class="fa fa-search"></i></button>
                    </span>
                </div>
            </form>-->
            <!-- /.search form -->
            <!-- sidebar menu: : style can be found in sidebar.less -->
            <ul class="sidebar-menu">
                <li class="active">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                
             

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>
    
    <script>
    
    $(document).ready(function(){

      
        //loadpage1();
    });
            
            
            
            
    function loadpage1(){
        $('#main_view').load('student/show_drurbleGoods/07');      
        
    }
    function loadpage2(){
        $('#main_view').load('student/show_drurbleGoods/01');      
        
    }
    function loadpage3(){
        $('#main_view').load('student/checkMA_student/01');      
        
    }
    function loadpage4(){
        $('#main_view').load('student/show_data_student_year/02');      
        
    }
    function loadpage5(){
       $('#main_view').load('student/show_drurbleGoods/02'); 
        
    }
    function loadpage6(){
       $('#main_view').load('student/show_data_student_year/03');   
        
    }
    function loadpage7(){
       $('#main_view').load('student/checkMA_student/03');      
        
    }
    function loadpage8(){
       $('#main_view').load('student/confrim_student');      
        
    }
            
            
</script>