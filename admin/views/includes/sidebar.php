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
                    <p>
                        <?php echo $this->session->userdata('name'); ?>
                    </p>

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
                <li class="treeview">

                    <a href="#">
                        <small class="badge pull-right bg-orange">new</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>ครุภัณฑ์</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li>
                            <a href="#" onclick="durable_goods_news();">
                                <i class="fa fa-bar-chart-o"></i>
                                <span>ครุภัณฑ์</span> <small class="badge pull-right bg-orange">new</small>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="loadpage_lendView('1');"><i class="fa fa-th"></i> <span>เบิก ครุภัณฑ์</span></a>
                        </li>
                        <li>
                            <a href="#" onclick="loadpage_insert();">
                                <i class="fa fa-th"></i> <span>เพิ่มข้อมูลครุภัณฑ์</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="get_goods('1');">
                                <i class="fa fa-th"></i> <span>ยืมครุภัณฑ์</span> <small class="badge pull-right bg-green">new</small>
                            </a>
                        </li>
                    </ul>



                    <!--                    <ul class="treeview-menu">
                        <li><a href="#" onclick="durable_goods_news();"><i class="fa fa-angle-double-right"></i> ครุภัณฑ์</a> </li>
                        <li><a href="#" onclick="durable_goods_news2();"><i class="fa fa-angle-double-right"></i> ครุภัณฑ์ต่ำกว่าเกณฑ์</a></li>
                        
                    </ul>-->
                </li>

                <li class="treeview">
                    <a href="#">
                        <small class="badge pull-right bg-orange">new</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>วัสดุ</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#" onclick="material_news();"><i class="fa fa-th"></i> <span>ข้อมูลวัสดุ</span></a>
                        </li>
                        <li>
                            <a href="#" onclick="material_buy();"><i class="fa fa-th"></i> <span>ซื้อวัสดุระหว่างปี</span></a>
                        </li>
                        <li>
                            <a href="#" onclick="material_lend();"><i class="fa fa-th"></i> <span>เบิกวัสดุ</span></a>
                        </li>
                    </ul>
                </li>

                <!--<li class="treeview">
                    <a href="#">
                        <small class="badge pull-right bg-orange">new</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>เบิก ครุภัณฑ์</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li>
                            <a href="#" onclick="loadpage_lendView('1');"><i class="fa fa-th"></i> <span>เบิก ครุภัณฑ์</span></a>
                        </li>
                    </ul>
                </li>-->


                <!--<li>
                    <a href="#" onclick="loadpage_insert();">
                        <i class="fa fa-th"></i> <span>เพิ่มข้อมูลครุภัณฑ์</span> <small class="badge pull-right bg-green">new</small>
                    </a>
                </li>-->





                <li class="treeview">
                    <a href="#">
                        <small class="badge pull-right bg-orange">new</small>
                        <i class="fa fa-bar-chart-o"></i>
                        <span>รายงาน</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>

                    <ul class="treeview-menu">
                        <li>
                            <a href="#" onclick="loadDetialReturn();">
                                <i class="fa fa-newspaper-o"></i> <span>รายงานครุภัณฑ์ที่ส่งคืน</span>

                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="loadDetialLend('1');">
                                <i class="fa fa-newspaper-o"></i> <span>ใบเบิกครุภัณฑ์</span> <small class="badge pull-right bg-orange">new</small>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="loadDetialLend('2');">
                                <i class="fa fa-newspaper-o"></i> <span>ใบเบิกครุภัณฑ์ต่ำกว่าเกณฑ์</span> <small class="badge pull-right bg-orange">new</small>
                            </a>
                        </li>
                        <li>
                            <a href="#" onclick="loadDetialLendMaterial();">
                                <i class="fa fa-newspaper-o"></i> <span>ใบเบิกวัสดุ</span> <small class="badge pull-right bg-orange">new</small>
                            </a>
                        </li>
                    </ul>
                </li>


                <!--                <li class="treeview">
                    <a href="#">
                        <i class="fa fa-bar-chart-o"></i>
                        <span>ครุภัณฑ์ (เก่า)</span>
                        <i class="fa fa-angle-left pull-right"></i>
                    </a>
                    <ul class="treeview-menu">
                        <li><a href="#" onclick="loadpage2();"><i class="fa fa-angle-double-right"></i> วิเทศ</a></li>
                        <li><a href="#" onclick="loadpage3();"><i class="fa fa-angle-double-right"></i> ยูนิเฮาท์</a></li>
                        <li><a href="#" onclick="loadpage4();"><i class="fa fa-angle-double-right"></i> ห้องสมุด</a></li>
                        <li><a href="#" onclick="loadpage5();"><i class="fa fa-angle-double-right"></i> ศูนย์วีซ่าประจำ มรช.</a></li>
                        <li><a href="#" onclick="loadpage6();"><i class="fa fa-angle-double-right"></i> หอพักนักศึกษาจีน</a></li>
                        <li><a href="#" onclick="loadpage7();"><i class="fa fa-angle-double-right"></i> อื่นๆ</a></li>
                    </ul>
                </li>
                
                <li>
                    <a href="#" onclick="loadpage1();">
                        <i class="fa fa-th"></i> <span>รายงานครุภัณฑ์ หอพัก (Unihuose)</span> 
                    </a>
                </li>-->

            </ul>
        </section>
        <!-- /.sidebar -->
    </aside>

    <script>
        $(document).ready(function() {


            //loadpage1();
        });




        function loadpage1() {
            $('#main_view').load('dashboard/show_drurbleGoods/07');

        }

        function loadpage2() {
            $('#main_view').load('dashboard/show_drurbleGoods/01');

        }

        function loadpage3() {
            $('#main_view').load('dashboard/show_drurbleGoods/02');

        }

        function loadpage4() {
            $('#main_view').load('dashboard/show_drurbleGoods/03');

        }

        function loadpage5() {
            $('#main_view').load('dashboard/show_drurbleGoods/04');

        }

        function loadpage6() {
            $('#main_view').load('dashboard/show_drurbleGoods/05');

        }

        function loadpage7() {
            $('#main_view').load('dashboard/show_drurbleGoods/06');
        }

        function loadpage_insert() {
            $('#main_view').load('dashboard/view_insert_goods');

        }

        function loadpage_lendView(id) {
            var xid = id;
            $('#main_view').load('dashboard/show_lend_news/' + xid);

        }

        function get_goods(id) {
            var xid = id;
            $('#main_view').load('dashboard/get_goods/' + xid);

        }

        function loadDetialReturn() {
            $('#main_view').load('dashboard/DetialReturnGoods/');
        }

        function durable_goods_news() {
            $('#main_view').load('dashboard/show_drurbleGoods_news/1');

        }

        function material_news() {
            $('#main_view').load('dashboard/show_material/');

        }

        function material_buy() {
            $('#main_view').load('dashboard/buy_material/');

        }

        function material_lend() {
            $('#main_view').load('dashboard/lend_material/');

        }

        function durable_goods_news2() {
            $('#main_view').load('dashboard/show_drurbleGoods_news/2');

        }

        function loadDetialLend(standard) {
            var xstandard = standard;
            $('#main_view').load('dashboard/DetialLendGoods/' + xstandard);
        }

        function loadDetialLendMaterial() {

            $('#main_view').load('dashboard/DetialLendMaterial/');
        }
    </script>