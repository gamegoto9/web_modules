<div class="wrapper row-offcanvas row-offcanvas-left">
    <!-- Left side column. contains the logo and sidebar -->
    <aside class="left-side sidebar-offcanvas">
        <!-- sidebar: style can be found in sidebar.less -->

        <!-- /.sidebar -->
        <section class="sidebar">

            <ul class="sidebar-menu">
                <li class="active">
                    <a href="#">
                        <i class="fa fa-dashboard"></i> <span>Dashboard</span>
                    </a>
                </li>
                <li class="treeview">
                    <a href="#">
                        <small class="badge pull-right bg-green">1</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>เพิ่มข้อมูล Student + + + </span>
                        
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="loadpage2();"><i class="fa fa-angle-double-right"></i>เพิ่มข้อมูลนักศึกษา Student Input</a></li>


                    </ul>
                </li>
                <li class="treeview">
                    <a href="#">
                        <small class="badge pull-right bg-green">2</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>รายชื่อ Data Student</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="loadpage1();"><i class="fa fa-angle-double-right"></i>รายชื่อนักศึกษา ListStudnt</a></li>


                    </ul>
                </li>




            </ul>
        </section>
    </aside>

    <script>
        function loadpage1() {
            $('#main_view').load('studentdata/liststudent/');
        }
        
        function loadpage2() {
            $('#main_view').load('studentdata/add_DataStudent/');
        }
    </script>