		<!-- jQuery 3 -->
		<script src="../assets/bower_components/jquery/dist/jquery.min.js"></script>
		<!-- jQuery UI 1.11.4 -->
		<script src="../assets/bower_components/jquery-ui/jquery-ui.min.js"></script>
		<!-- Resolve conflict in jQuery UI tooltip with Bootstrap tooltip -->
		<script>
			$.widget.bridge('uibutton', $.ui.button);
		</script>
		<script>
			$(function(){
				/** add active class and stay opened when selected */
				var url = window.location;

				// for sidebar menu entirely but not cover treeview
				$('ul.sidebar-menu a').filter(function() {
				return this.href == url;
				}).parent().addClass('active');

				// for treeview
				$('ul.treeview-menu a').filter(function() {
				return this.href == url;
				}).parentsUntil(".sidebar-menu > .treeview-menu").addClass('active');
				
			});
		</script>
		<!-- Bootstrap 3.3.7 -->
		<script src="../assets/bower_components/bootstrap/dist/js/bootstrap.min.js"></script>
		<!-- ChartJS -->
		<script src="../assets/bower_components/chart.js/Chart.js"></script>
		<!-- FLOT CHARTS -->
		<script src="../assets/bower_components/Flot/jquery.flot.js"></script>
		<!-- FLOT RESIZE PLUGIN - allows the chart to redraw when the window is resized -->
		<script src="../assets/bower_components/Flot/jquery.flot.resize.js"></script>
		<!-- FLOT PIE PLUGIN - also used to draw donut charts -->
		<script src="../assets/bower_components/Flot/jquery.flot.pie.js"></script>
		<!-- FLOT CATEGORIES PLUGIN - Used to draw bar charts -->
		<script src="../assets/bower_components/Flot/jquery.flot.categories.js"></script>

		<!-- Morris.js charts -->
		<script src="../assets/bower_components/raphael/raphael.min.js"></script>
		<script src="../assets/bower_components/morris.js/morris.min.js"></script>
		<!-- Sparkline -->
		<script src="../assets/bower_components/jquery-sparkline/dist/jquery.sparkline.min.js"></script>
		<!-- jvectormap -->
		<script src="../assets/plugins/jvectormap/jquery-jvectormap-1.2.2.min.js"></script>
		<script src="../assets/plugins/jvectormap/jquery-jvectormap-world-mill-en.js"></script>
		<!-- jQuery Knob Chart -->
		<script src="../assets/bower_components/jquery-knob/dist/jquery.knob.min.js"></script>
		<!-- daterangepicker -->
		<script src="../bower_components/moment/min/moment.min.js"></script>
		<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- datepicker -->
		<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- Select2 -->
		<script src="../assets/bower_components/select2/dist/js/select2.full.min.js"></script>
		<!-- InputMask -->
		<script src="../assets/plugins/input-mask/jquery.inputmask.js"></script>
		<script src="../assets/plugins/input-mask/jquery.inputmask.date.extensions.js"></script>
		<script src="../assets/plugins/input-mask/jquery.inputmask.extensions.js"></script>
		<!-- date-range-picker -->
		<script src="../assets/bower_components/moment/min/moment.min.js"></script>
		<script src="../assets/bower_components/bootstrap-daterangepicker/daterangepicker.js"></script>
		<!-- bootstrap datepicker -->
		<script src="../assets/bower_components/bootstrap-datepicker/dist/js/bootstrap-datepicker.min.js"></script>
		<!-- bootstrap color picker -->
		<script src="../assets/bower_components/bootstrap-colorpicker/dist/js/bootstrap-colorpicker.min.js"></script>
		<!-- bootstrap time picker -->
		<script src="../assets/plugins/timepicker/bootstrap-timepicker.min.js"></script>
		<!-- Bootstrap WYSIHTML5 -->
		<script src="../assets/plugins/bootstrap-wysihtml5/bootstrap3-wysihtml5.all.min.js"></script>
		
		<!-- DataTables -->
		<script src="../assets/bower_components/datatables.net/js/jquery.dataTables.min.js"></script>
		<script src="../assets/bower_components/datatables.net-bs/js/dataTables.bootstrap.min.js"></script>
		<!-- Slimscroll -->
		<script src="../assets/bower_components/jquery-slimscroll/jquery.slimscroll.min.js"></script>
		<!-- iCheck 1.0.1 -->
		<script src="../assets/plugins/iCheck/icheck.min.js"></script>
		<!-- FastClick -->
		<script src="../assets/bower_components/fastclick/lib/fastclick.js"></script>
		<!-- CK Editor -->
		<script src="../assets/bower_components/ckeditor/ckeditor.js"></script>
		<!-- fullCalendar -->
		<script src="../assets/bower_components/moment/moment.js"></script>
		<script src="../assets/bower_components/fullcalendar/dist/fullcalendar.min.js"></script>
            <!-- iCheck -->
		<script src="../assets/plugins/iCheck/icheck.min.js"></script>
        <script src="../assets/plugins/seiyria-bootstrap-slider/bootstrap-slider.min.js"></script>

        <!-- AdminLTE App -->
		<script src="../assets/dist/js/adminlte.min.js"></script>
		<!-- AdminLTE dashboard demo (This is only for demo purposes) -->
		<script src="../assets/dist/js/pages/dashboard.js"></script>
		<!-- AdminLTE for demo purposes -->
        <!-- Page Script -->
		<script>
			$(function () {
				//Enable iCheck plugin for checkboxes
				//iCheck for checkbox and radio inputs
				$('.mailbox-messages input[type="checkbox"]').iCheck({
				checkboxClass: 'icheckbox_flat-blue',
				radioClass: 'iradio_flat-blue'
				});

				//Enable check and uncheck all functionality
				$(".checkbox-toggle").click(function () {
				var clicks = $(this).data('clicks');
				if (clicks) {
					//Uncheck all checkboxes
					$(".mailbox-messages input[type='checkbox']").iCheck("uncheck");
					$(".fa", this).removeClass("fa-check-square-o").addClass('fa-square-o');
				} else {
					//Check all checkboxes
					$(".mailbox-messages input[type='checkbox']").iCheck("check");
					$(".fa", this).removeClass("fa-square-o").addClass('fa-check-square-o');
				}
				$(this).data("clicks", !clicks);
				});

				//Handle starring for glyphicon and font awesome
				$(".mailbox-star").click(function (e) {
				e.preventDefault();
				//detect type
				var $this = $(this).find("a > i");
				var glyph = $this.hasClass("glyphicon");
				var fa = $this.hasClass("fa");

				//Switch states
				if (glyph) {
					$this.toggleClass("glyphicon-star");
					$this.toggleClass("glyphicon-star-empty");
				}

				if (fa) {
					$this.toggleClass("fa-star");
					$this.toggleClass("fa-star-o");
				}
				});
			});
		</script>
		
		<!-- Page specific script -->
		<script>
			$(function () {

				/* initialize the external events
				-----------------------------------------------------------------*/
				function init_events(ele) {
				ele.each(function () {

					// create an Event Object (http://arshaw.com/fullcalendar/docs/event_data/Event_Object/)
					// it doesn't need to have a start or end
					var eventObject = {
					title: $.trim($(this).text()) // use the element's text as the event title
					}

					// store the Event Object in the DOM element so we can get to it later
					$(this).data('eventObject', eventObject)

					// make the event draggable using jQuery UI
					$(this).draggable({
					zIndex        : 1070,
					revert        : true, // will cause the event to go back to its
					revertDuration: 0  //  original position after the drag
					})

				})
				}

				init_events($('#external-events div.external-event'))

				/* initialize the calendar
				-----------------------------------------------------------------*/
				//Date for the calendar events (dummy data)
				var date = new Date()
				var d    = date.getDate(),
					m    = date.getMonth(),
					y    = date.getFullYear()
				$('#calendar').fullCalendar({
				header    : {
					left  : 'prev,next today',
					center: 'title',
					right : 'month,agendaWeek,agendaDay'
				},
				buttonText: {
					today: 'today',
					month: 'month',
					week : 'week',
					day  : 'day'
				},
				//Random default events
				events    : [
					{
					title          : 'All Day Event',
					start          : new Date(y, m, 1),
					backgroundColor: '#f56954', //red
					borderColor    : '#f56954' //red
					},
					{
					title          : 'Long Event',
					start          : new Date(y, m, d - 5),
					end            : new Date(y, m, d - 2),
					backgroundColor: '#f39c12', //yellow
					borderColor    : '#f39c12' //yellow
					},
					{
					title          : 'Meeting',
					start          : new Date(y, m, d, 10, 30),
					allDay         : false,
					backgroundColor: '#0073b7', //Blue
					borderColor    : '#0073b7' //Blue
					},
					{
					title          : 'Lunch',
					start          : new Date(y, m, d, 12, 0),
					end            : new Date(y, m, d, 14, 0),
					allDay         : false,
					backgroundColor: '#00c0ef', //Info (aqua)
					borderColor    : '#00c0ef' //Info (aqua)
					},
					{
					title          : 'Birthday Party',
					start          : new Date(y, m, d + 1, 19, 0),
					end            : new Date(y, m, d + 1, 22, 30),
					allDay         : false,
					backgroundColor: '#00a65a', //Success (green)
					borderColor    : '#00a65a' //Success (green)
					},
					{
					title          : 'Click for Google',
					start          : new Date(y, m, 28),
					end            : new Date(y, m, 29),
					url            : 'http://google.com/',
					backgroundColor: '#3c8dbc', //Primary (light-blue)
					borderColor    : '#3c8dbc' //Primary (light-blue)
					}
				],
				editable  : true,
				droppable : true, // this allows things to be dropped onto the calendar !!!
				drop      : function (date, allDay) { // this function is called when something is dropped

					// retrieve the dropped element's stored Event Object
					var originalEventObject = $(this).data('eventObject')

					// we need to copy it, so that multiple events don't have a reference to the same object
					var copiedEventObject = $.extend({}, originalEventObject)

					// assign it the date that was reported
					copiedEventObject.start           = date
					copiedEventObject.allDay          = allDay
					copiedEventObject.backgroundColor = $(this).css('background-color')
					copiedEventObject.borderColor     = $(this).css('border-color')

					// render the event on the calendar
					// the last `true` argument determines if the event "sticks" (http://arshaw.com/fullcalendar/docs/event_rendering/renderEvent/)
					$('#calendar').fullCalendar('renderEvent', copiedEventObject, true)

					// is the "remove after drop" checkbox checked?
					if ($('#drop-remove').is(':checked')) {
					// if so, remove the element from the "Draggable Events" list
					$(this).remove()
					}

				}
				})

				/* ADDING EVENTS */
				var currColor = '#3c8dbc' //Red by default
				//Color chooser button
				var colorChooser = $('#color-chooser-btn')
				$('#color-chooser > li > a').click(function (e) {
				e.preventDefault()
				//Save color
				currColor = $(this).css('color')
				//Add color effect to button
				$('#add-new-event').css({ 'background-color': currColor, 'border-color': currColor })
				})
				$('#add-new-event').click(function (e) {
				e.preventDefault()
				//Get value and make sure it is not null
				var val = $('#new-event').val()
				if (val.length == 0) {
					return
				}

				//Create events
				var event = $('<div />')
				event.css({
					'background-color': currColor,
					'border-color'    : currColor,
					'color'           : '#fff'
				}).addClass('external-event')
				event.html(val)
				$('#external-events').prepend(event)

				//Add draggable funtionality
				init_events(event)

				//Remove event from text input
				$('#new-event').val('')
				})
			})
		</script>
		<script>
			$(function () {
				/* BOOTSTRAP SLIDER */
				$('.slider').slider()
			})
		</script>
		<!-- page script -->
		<script>
			$(function () {
				//Add text editor
				$("#compose-textarea").wysihtml5();
			});
		</script>
		<script>
			$(function () {
				//Initialize Select2 Elements
				$('.select2').select2()

				//Datemask dd/mm/yyyy
				$('#datemask').inputmask('dd/mm/yyyy', { 'placeholder': 'dd/mm/yyyy' })
				//Datemask2 mm/dd/yyyy
				$('#datemask2').inputmask('mm/dd/yyyy', { 'placeholder': 'mm/dd/yyyy' })
				//Money Euro
				$('[data-mask]').inputmask()

				//Date range picker
				$('#reservation').daterangepicker()
				//Date range picker with time picker
				$('#reservationtime').daterangepicker({ timePicker: true, timePickerIncrement: 30, locale: { format: 'MM/DD/YYYY hh:mm A' }})
				//Date range as a button
				$('#daterange-btn').daterangepicker(
				{
					ranges   : {
					'Today'       : [moment(), moment()],
					'Yesterday'   : [moment().subtract(1, 'days'), moment().subtract(1, 'days')],
					'Last 7 Days' : [moment().subtract(6, 'days'), moment()],
					'Last 30 Days': [moment().subtract(29, 'days'), moment()],
					'This Month'  : [moment().startOf('month'), moment().endOf('month')],
					'Last Month'  : [moment().subtract(1, 'month').startOf('month'), moment().subtract(1, 'month').endOf('month')]
					},
					startDate: moment().subtract(29, 'days'),
					endDate  : moment()
				},
				function (start, end) {
					$('#daterange-btn span').html(start.format('MMMM D, YYYY') + ' - ' + end.format('MMMM D, YYYY'))
				}
				)

				//Date picker
				$('#datepicker').datepicker({
				autoclose: true
				})

				//iCheck for checkbox and radio inputs
				$('input[type="checkbox"].minimal, input[type="radio"].minimal').iCheck({
				checkboxClass: 'icheckbox_minimal-blue',
				radioClass   : 'iradio_minimal-blue'
				})
				//Red color scheme for iCheck
				$('input[type="checkbox"].minimal-red, input[type="radio"].minimal-red').iCheck({
				checkboxClass: 'icheckbox_minimal-red',
				radioClass   : 'iradio_minimal-red'
				})
				//Flat red color scheme for iCheck
				$('input[type="checkbox"].flat-red, input[type="radio"].flat-red').iCheck({
				checkboxClass: 'icheckbox_flat-green',
				radioClass   : 'iradio_flat-green'
				})

				//Colorpicker
				$('.my-colorpicker1').colorpicker()
				//color picker with addon
				$('.my-colorpicker2').colorpicker()

				//Timepicker
				$('.timepicker').timepicker({
				showInputs: false
				})
			})
			</script>
		<script>
			$(function () {
				$('#example1').DataTable()
				$('#example3').DataTable()
				$('#example4').DataTable()
				$('#example5').DataTable()
				$('#example6').DataTable()
				$('#example2').DataTable({
				'paging'      : true,
				'lengthChange': false,
				'searching'   : false,
				'ordering'    : true,
				'info'        : true,
				'autoWidth'   : false
				})
			})
		</script>
		<script>
			$(function () {
				// Replace the <textarea id="editor1"> with a CKEditor
				// instance, using default configuration.
				CKEDITOR.replace('editor1')
				//bootstrap WYSIHTML5 - text editor
				$('.textarea').wysihtml5()
			})
		</script>
		<script>
			$(document).ready(function () {
				$('.sidebar-menu').tree()
			})
		</script>
		<script>
			$(function () {
				$('input').iCheck({
				checkboxClass: 'icheckbox_square-blue',
				radioClass: 'iradio_square-blue',
				increaseArea: '20%' /* optional */
				});
			});
		</script>
		<script type="text/javascript">
			// To make Pace works on Ajax calls
			$(document).ajaxStart(function () {
				Pace.restart()
			})
			$('.ajax').click(function () {
				$.ajax({
				url: '#', success: function (result) {
					$('.ajax-content').html('<hr>Ajax Request Completed !')
				}
				})
			})
		</script>
		
		
		<script>
			$(function () {
				/* ChartJS
				* -------
				* Here we will create a few charts using ChartJS
				*/

				//--------------
				//- AREA CHART -
				//--------------

				// Get context with jQuery - using jQuery's .get() method.
				var areaChartCanvas = $('#areaChart').get(0).getContext('2d')
				// This will get the first returned node in the jQuery collection.
				var areaChart       = new Chart(areaChartCanvas)

				var areaChartData = {
				labels  : ['January', 'February', 'March', 'April', 'May', 'June', 'July'],
				datasets: [
					{
					label               : 'Electronics',
					fillColor           : 'rgba(210, 214, 222, 1)',
					strokeColor         : 'rgba(210, 214, 222, 1)',
					pointColor          : 'rgba(210, 214, 222, 1)',
					pointStrokeColor    : '#c1c7d1',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgba(220,220,220,1)',
					data                : [65, 59, 80, 81, 56, 55, 40]
					},
					{
					label               : 'Digital Goods',
					fillColor           : 'rgba(60,141,188,0.9)',
					strokeColor         : 'rgba(60,141,188,0.8)',
					pointColor          : '#3b8bba',
					pointStrokeColor    : 'rgba(60,141,188,1)',
					pointHighlightFill  : '#fff',
					pointHighlightStroke: 'rgba(60,141,188,1)',
					data                : [28, 48, 40, 19, 86, 27, 90]
					}
				]
				}

				var areaChartOptions = {
				//Boolean - If we should show the scale at all
				showScale               : true,
				//Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines      : false,
				//String - Colour of the grid lines
				scaleGridLineColor      : 'rgba(0,0,0,.05)',
				//Number - Width of the grid lines
				scaleGridLineWidth      : 1,
				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines  : true,
				//Boolean - Whether the line is curved between points
				bezierCurve             : true,
				//Number - Tension of the bezier curve between points
				bezierCurveTension      : 0.3,
				//Boolean - Whether to show a dot for each point
				pointDot                : false,
				//Number - Radius of each point dot in pixels
				pointDotRadius          : 4,
				//Number - Pixel width of point dot stroke
				pointDotStrokeWidth     : 1,
				//Number - amount extra to add to the radius to cater for hit detection outside the drawn point
				pointHitDetectionRadius : 20,
				//Boolean - Whether to show a stroke for datasets
				datasetStroke           : true,
				//Number - Pixel width of dataset stroke
				datasetStrokeWidth      : 2,
				//Boolean - Whether to fill the dataset with a color
				datasetFill             : true,
				//String - A legend template
				legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].lineColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
				//Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio     : true,
				//Boolean - whether to make the chart responsive to window resizing
				responsive              : true
				}

				//Create the line chart
				areaChart.Line(areaChartData, areaChartOptions)

				//-------------
				//- LINE CHART -
				//--------------
				var lineChartCanvas          = $('#lineChart').get(0).getContext('2d')
				var lineChart                = new Chart(lineChartCanvas)
				var lineChartOptions         = areaChartOptions
				lineChartOptions.datasetFill = false
				lineChart.Line(areaChartData, lineChartOptions)

				//-------------
				//- PIE CHART -
				//-------------
				// Get context with jQuery - using jQuery's .get() method.
				var pieChartCanvas = $('#pieChart').get(0).getContext('2d')
				var pieChart       = new Chart(pieChartCanvas)
				var PieData        = [
				{
					value    : 700,
					color    : '#f56954',
					highlight: '#f56954',
					label    : 'Chrome'
				},
				{
					value    : 500,
					color    : '#00a65a',
					highlight: '#00a65a',
					label    : 'IE'
				},
				{
					value    : 400,
					color    : '#f39c12',
					highlight: '#f39c12',
					label    : 'FireFox'
				},
				{
					value    : 600,
					color    : '#00c0ef',
					highlight: '#00c0ef',
					label    : 'Safari'
				},
				{
					value    : 300,
					color    : '#3c8dbc',
					highlight: '#3c8dbc',
					label    : 'Opera'
				},
				{
					value    : 100,
					color    : '#d2d6de',
					highlight: '#d2d6de',
					label    : 'Navigator'
				}
				]
				var pieOptions     = {
				//Boolean - Whether we should show a stroke on each segment
				segmentShowStroke    : true,
				//String - The colour of each segment stroke
				segmentStrokeColor   : '#fff',
				//Number - The width of each segment stroke
				segmentStrokeWidth   : 2,
				//Number - The percentage of the chart that we cut out of the middle
				percentageInnerCutout: 50, // This is 0 for Pie charts
				//Number - Amount of animation steps
				animationSteps       : 100,
				//String - Animation easing effect
				animationEasing      : 'easeOutBounce',
				//Boolean - Whether we animate the rotation of the Doughnut
				animateRotate        : true,
				//Boolean - Whether we animate scaling the Doughnut from the centre
				animateScale         : false,
				//Boolean - whether to make the chart responsive to window resizing
				responsive           : true,
				// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
				maintainAspectRatio  : true,
				//String - A legend template
				legendTemplate       : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<segments.length; i++){%><li><span style="background-color:<%=segments[i].fillColor%>"></span><%if(segments[i].label){%><%=segments[i].label%><%}%></li><%}%></ul>'
				}
				//Create pie or douhnut chart
				// You can switch between pie and douhnut using the method below.
				pieChart.Doughnut(PieData, pieOptions)

				//-------------
				//- BAR CHART -
				//-------------
				var barChartCanvas                   = $('#barChart').get(0).getContext('2d')
				var barChart                         = new Chart(barChartCanvas)
				var barChartData                     = areaChartData
				barChartData.datasets[1].fillColor   = '#00a65a'
				barChartData.datasets[1].strokeColor = '#00a65a'
				barChartData.datasets[1].pointColor  = '#00a65a'
				var barChartOptions                  = {
				//Boolean - Whether the scale should start at zero, or an order of magnitude down from the lowest value
				scaleBeginAtZero        : true,
				//Boolean - Whether grid lines are shown across the chart
				scaleShowGridLines      : true,
				//String - Colour of the grid lines
				scaleGridLineColor      : 'rgba(0,0,0,.05)',
				//Number - Width of the grid lines
				scaleGridLineWidth      : 1,
				//Boolean - Whether to show horizontal lines (except X axis)
				scaleShowHorizontalLines: true,
				//Boolean - Whether to show vertical lines (except Y axis)
				scaleShowVerticalLines  : true,
				//Boolean - If there is a stroke on each bar
				barShowStroke           : true,
				//Number - Pixel width of the bar stroke
				barStrokeWidth          : 2,
				//Number - Spacing between each of the X value sets
				barValueSpacing         : 5,
				//Number - Spacing between data sets within X values
				barDatasetSpacing       : 1,
				//String - A legend template
				legendTemplate          : '<ul class="<%=name.toLowerCase()%>-legend"><% for (var i=0; i<datasets.length; i++){%><li><span style="background-color:<%=datasets[i].fillColor%>"></span><%if(datasets[i].label){%><%=datasets[i].label%><%}%></li><%}%></ul>',
				//Boolean - whether to make the chart responsive
				responsive              : true,
				maintainAspectRatio     : true
				}

				barChartOptions.datasetFill = false
				barChart.Bar(barChartData, barChartOptions)
			})
		</script>
		
	</body>
</html>

		
		
	</body>
</html>