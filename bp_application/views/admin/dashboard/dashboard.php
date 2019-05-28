<!--<div class="col-md-4 col-xs-12">
  <div class="small-box bg-aqua">
	<div class="inner">
	  <h3><?php //echo $total_category; ?></h3>

	  <p></p>
      <h1>
	</div>
	<div class="icon">
	   <i class="fa fa-eye"></i>
	</div>
	<a href="<?php echo base_url();?>backend_application" class="small-box-footer">
	
	  More info <i class="fa fa-arrow-circle-right"></i>
	</a>
  </div>
</div>-->

<!-- Main content -->
<section class="content">
<?php 
	foreach($everyday_application as $value)
	{
		$application[]=$value->date_wise_appliction;
		$day[]="'".$value->applicationdate."'";
	}

	foreach($total_application_unit_wise as $value)
	{
		$total_applied_unit[]=$value->total_application_unit_wise;
	} 				
?>

  <style type="text/css">
    text.highcharts-credits{display:none}
    table.table{margin-top:40px}
    td.amount{text-align:right}
</style>
<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.2.1/jquery.min.js"></script>
<script type="text/javascript" src="<?php echo base_url();?>/assets/backend/plugins/chart/hschart/highcharts.v6.0.1.js"></script>
<script type="text/javascript">
    $(document).ready(function () {
        /* -----------------------Top 10 Service--------------------- */
        
        Highcharts.chart('service-container', {
            title: {
                text: 'Total Application: <?php echo $total_application; ?> '
            },
            tooltip: {
                headerFormat: '<span style="font-size:15px">{point.key}</span><table>',
                pointFormat: '<tr><td style="padding:0">Application. <b>{point.y:.2f}</b></td></tr>',
                footerFormat: '</table>',
                shared: true,
                useHTML: true
            },
            /* subtitle: {
             text: 'Plain'
             },*/

            xAxis: {
                categories: [<?php echo implode(',',$day);?>]
            },
            yAxis: {
                min: 0,
                title: {
                    text: '7 College Admission'
                }
            },
            series: [{
                    type: 'column',
                    colorByPoint: true,
                    data: [<?php echo implode(', ', $application); ?>],
                    showInLegend: false
                }]

        });


        Highcharts.chart('branch-analysis-pie-container', {/* -----------------------Branch Sales Analysis--------------------- */
            chart: {
                plotBackgroundColor: null,
                plotBorderWidth: null,
                plotShadow: false,
                type: 'pie'
            },
            title: {
                text: 'Total Applied Unit: <?php echo array_sum($total_applied_unit); ?>'
            },
            tooltip: {
                pointFormat: '<tr><td>{series.name}:  . <b>{point.y:.2f}</b> ( {point.percentage:.1f}%) </td></tr>'
            },
            plotOptions: {
                pie: {
                    allowPointSelect: true,
                    cursor: 'pointer',
                    dataLabels: {
                        enabled: true,
                        format: '<b>{point.name}</b>: {point.percentage:.1f} %',
                        style: {
                            color: (Highcharts.theme && Highcharts.theme.contrastTextColor) || 'black'
                        }
                    }
                }
            },
            series: [{
						name: 'Application',
						colorByPoint: true,
						data: [
						<?php 
							foreach($total_application_unit_wise as $value)
							{
								$unit2=$unit[$value->unitid];
								echo "{
										name: '".$unit2."',
										y: ".$value->total_application_unit_wise."
									},";
							} 
						?>
						]
					}]
			});
    });
</script>

	<div class="row">
		<div class="col-md-12">
			<!-- AREA CHART -->
			<div class="box box-primary">
				<div class="box-header with-border">
					<h3 class="box-title">Date Wise Application</h3>

					<div class="box-tools pull-right">
						<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i></button>
						<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
					</div>
				</div>
				<div class="box-body">
					<div class="col-md-12 padding-15">                        
						<div class="col-sm-12">
							<div id="service-container" style="width:100%; min-width:310px; height:400px; margin:0 auto"></div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</div>
</div>

	<div class="row">
		<div class="col-md-12">
		  <!-- AREA CHART -->
			<div class="box box-primary">
				<div class="box-header with-border">
				  <h3 class="box-title">Applied Unit</h3>

				  <div class="box-tools pull-right">
					<button type="button" class="btn btn-box-tool" data-widget="collapse"><i class="fa fa-minus"></i>
					</button>
					<button type="button" class="btn btn-box-tool" data-widget="remove"><i class="fa fa-times"></i></button>
				  </div>
				</div>
				<div class="box-body">
					<div class="col-md-12 padding-15">
						<div class="col-sm-12 no-padding-left">
							<div id="branch-analysis-pie-container" style="width:100%; min-width:310px; height:400px; margin:0 auto"></div>
						</div>
					</div>
				</div>
			<!-- /.box-body -->
			</div>
		  <!-- /.box -->
		</div>
	</div>
</section>
