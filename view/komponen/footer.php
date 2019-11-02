<?php 
    $base_url = 'http://localhost/primausaha/';
 ?>
            <div class="footer">
				<div class="footer-inner">
					<div class="footer-content">
						<span class="bigger-120">
							<span class="blue bolder"> Prima Usaha Era Mandiri</span>
							Application &copy; 2019
						</span>

						&nbsp; &nbsp;
						<span class="action-buttons">
							<!-- <a href="#">
								<i class="ace-icon fa fa-twitter-square light-blue bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-facebook-square text-primary bigger-150"></i>
							</a>

							<a href="#">
								<i class="ace-icon fa fa-rss-square orange bigger-150"></i>
							</a> -->
						</span>
					</div>
				</div>
			</div>

			<a href="#" id="btn-scroll-up" class="btn-scroll-up btn btn-sm btn-inverse">
				<i class="ace-icon fa fa-angle-double-up icon-only bigger-110"></i>
			</a>
        </div>
        <!-- /.main-container -->


		<!-- basic scripts -->

		<!--[if !IE]> -->
		<script src="<?= $base_url; ?>/assets/js/jquery-2.1.4.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/simple.money.format.js"></script>
		<script src="<?= $base_url; ?>/assets/js/myscript.js"></script>

		<!-- <![endif]-->

		<!--[if IE]>
<script src="assets/js/jquery-1.11.3.min.js"></script>
<![endif]-->
		<script type="text/javascript">
			if('ontouchstart' in document.documentElement) document.write("<script src='<?= $base_url; ?>/assets/js/jquery.mobile.custom.min.js'>"+"<"+"/script>");
		</script>
		<script src="<?= $base_url; ?>/assets/js/bootstrap.min.js"></script>

		<!-- page specific plugin scripts -->

		<!--[if lte IE 8]>
		  <script src="assets/js/excanvas.min.js"></script>
		<![endif]-->
		<script src="<?= $base_url; ?>/assets/js/jquery-ui.custom.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.ui.touch-punch.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.easypiechart.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.sparkline.index.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.flot.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.flot.pie.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.flot.resize.min.js"></script>

		<!-- ace scripts -->
		<script src="<?= $base_url; ?>/assets/js/ace-elements.min.js"></script>
        <script src="<?= $base_url; ?>/assets/js/ace.min.js"></script>

		<!-- page specific plugin scripts -->
		<script src="<?= $base_url; ?>/assets/js/jquery.dataTables.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/jquery.dataTables.bootstrap.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/dataTables.buttons.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/buttons.flash.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/buttons.html5.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/buttons.print.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/buttons.colVis.min.js"></script>
		<script src="<?= $base_url; ?>/assets/js/dataTables.select.min.js"></script>
		<script src="assets/js/chosen.jquery.min.js"></script>

        <script type="text/javascript">
			jQuery(function($) {
				//initiate dataTables plugin
				var myTable = $('#dynamic-table')
				//.wrap("<div class='dataTables_borderWrap' />")   //if you are applying horizontal scrolling (sScrollX)
				.DataTable( {
					bAutoWidth: true,
					// "aoColumns": [
					// //   { "bSortable": true },
					// // //   null, null,null, null, null,null,
					// //   { "bSortable": false }
					// ],
					"aaSorting": [],			
			
					// select: {
					// 	style: 'multi'
					// }
			    } );
			
				
				
				$.fn.dataTable.Buttons.defaults.dom.container.className = 'dt-buttons btn-overlap btn-group btn-overlap';
				
				new $.fn.dataTable.Buttons( myTable, {
					buttons: [
					 
					  {
						"extend": "copy",
						"text": "<i class='fa fa-copy bigger-110 pink'></i> <span class='hidden'>Copy to clipboard</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "csv",
						"text": "<i class='fa fa-database bigger-110 orange'></i> <span class='hidden'>Export to CSV</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "excel",
						"text": "<i class='fa fa-file-excel-o bigger-110 green'></i> <span class='hidden'>Export to Excel</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "pdf",
						"text": "<i class='fa fa-file-pdf-o bigger-110 red'></i> <span class='hidden'>Export to PDF</span>",
						"className": "btn btn-white btn-primary btn-bold"
					  },
					  {
						"extend": "print",
						"text": "<i class='fa fa-print print bigger-110 grey'></i> <span class='hidden'>Print</span>",
						"className": "btn btn-white btn-primary btn-bold",
						autoPrint: false,
						message: 'This print was produced using the Print button for DataTables'
					  }		  
					]
                } );
                
				myTable.buttons().container().appendTo( $('.tableTools-container') );
				
				//style the message box
				var defaultCopyAction = myTable.button(1).action();
				myTable.button(1).action(function (e, dt, button, config) {
					defaultCopyAction(e, dt, button, config);
					$('.dt-button-info').addClass('gritter-item-wrapper gritter-info gritter-center white');
                });
                
                setTimeout(function() {
					$($('.tableTools-container')).find('a.dt-button').each(function() {
						var div = $(this).find(' > div').first();
						if(div.length == 1) div.tooltip({container: 'body', title: div.parent().text()});
						else $(this).tooltip({container: 'body', title: $(this).text()});
					});
				}, 500);
				
				
			
				/********************************/
				//add tooltip for small view action buttons in dropdown menu
				// $('[data-rel="tooltip"]').tooltip({placement: tooltip_placement});
				
				// //tooltip placement on right or left
				// function tooltip_placement(context, source) {
				// 	var $source = $(source);
				// 	var $parent = $source.closest('table')
				// 	var off1 = $parent.offset();
				// 	var w1 = $parent.width();
			
				// 	var off2 = $source.offset();
				// 	//var w2 = $source.width();
			
				// 	if( parseInt(off2.left) < parseInt(off1.left) + parseInt(w1 / 2) ) return 'right';
				// 	return 'left';
				// }
			
			
			})
		</script>


        <script>
            $('.nav-list li').on('click',function (e) { 
                $('li').removeClass('active');
                $(this).addClass('active');
            });
            $('.money').simpleMoneyFormat();
        </script>
        
	</body>
</html>