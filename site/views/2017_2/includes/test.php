<!--1-->

<div class="tab-pane fade in active" id="calendar_basic">
    <div id="calen_gen">
        <table class="table table-hover table-responsive" style="font-size: small;">
            <tbody>

                <?php
                foreach ($recData as $row) {
                    ?>

                    <tr>
                        <td style="width: 108px" class="text-left">
                            <span class="label label-info">01 - 4  ส.ค.  58</span>
                        </td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
                    <?PHP
                }
                ?>
            </tbody></table>
    </div>
    <!--pagenation-->
    <div id="pagination" class="pagination"><?php echo $paginationLinks; ?></div>
</div>

<!--2-->
<div class="tab-pane fade" id="calendar_extra">
    <div id="calen_ex">
        <table class="table table-hover" style="font-size: small;">
            <tbody>
                <?php
                foreach ($recData as $row) {
                    ?>
                    <tr>
                        <td style="width: 108px" class="text-left">
                            <span class="label label-info">01 - 4  ส.ค.  58</span>
                        </td>
                        <td><?php echo $row['title']; ?></td>
                    </tr>
                    <?PHP
                }
                ?>                                                           

            </tbody></table>
    </div>
    <div id="pagination" class="pull-right"><ul class="pagination bootpag"><li data-lp="1" class="prev disabled"><a href="javascript:void(0);">«</a></li><li data-lp="1" class="active"><a href="javascript:void(0);">1</a></li><li data-lp="2"><a href="javascript:void(0);">2</a></li><li data-lp="3"><a href="javascript:void(0);">3</a></li><li data-lp="2" class="next"><a href="javascript:void(0);">»</a></li></ul></div>
</div>
<script>

    $('#pagination').on('click', 'a', function(e) {
        e.preventDefault();
        var url = $(this).attr('href');
        console.log($(this).attr('href'));
        console.log(url);
        getDriverList(url);
    });
</script>