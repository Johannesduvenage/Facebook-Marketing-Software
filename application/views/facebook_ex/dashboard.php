                  
<div class="row">
		<h2 class="font-medium text-inverse dash-heading"><?php echo $this->lang->line('Lifetime Sammary'); ?></h2>
	</div>

<div class="row">
    <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                    <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-inverse card-info">
                            <div class="box bg-info text-center">
                                <h1 class="font-light text-white"><?php echo number_format($subscriber_number); ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Total Subscriber");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo number_format($unsubscriber_number); ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Total Unsubscriber");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo number_format($message_number); ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Total messages sent");?></h6>
                            </div>
                        </div>
                    </div>
                   
               
                   <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $campaign_details_completed; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("campaign completed"); ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $campaign_details_processing; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Campaign Processing"); ?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-6 col-xs-12 left">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $campaign_details_pending; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Campaign Pending"); ?></h6>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>
<?php
        $bar = $chart_bar;
               
        $years = array_column($bar, 'year');
        $sentMessageArr = array_column($bar, 'sent_message');
        $sentCampaignArr = array_column($bar, 'sent_campaign');
       
        $label = json_encode($years);
        $sentMessage = json_encode($sentMessageArr);
        $sentCampaignArr = json_encode($sentCampaignArr);
            ?>

	
<div class="row">
<div class="col-lg-12 b-l">
                                    <div class="card-block">
                                        <h4 class="font-medium text-inverse">MESSAGE SENT VS CAMPAIGN CREATED REPORT FOR LAST 12 MONTHS</h4>
                                     <div id='div_for_bar'></div>
                                        <ul class="list-inline">
                                            <li class="p-l-0">
                                                <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-success"></i>Sent Message</h6>
                                            </li>
                                            <li>
                                                <h6 class="text-muted"><i class="fa fa-circle m-r-5 text-info"></i>Sent Campaign</h6>
                                            </li>
                                        </ul>
                                        <div id="total-revenue4" class="total-revenue4" style="height: 350px;"></div>
                                        
                                    </div>
                                </div>

</div>
                                    

<!--	<div class="row">
		<div class="text-center"><h2 style="font-weight:900;"><?php echo $this->lang->line('MESSAGE SENT VS CAMPAIGN CREATED REPORT FOR LAST 12 MONTHS'); ?></h2></div>
		
	</div>-->
	
	<br/><br/>
	<div class="row" style="padding-top:10px;">
  		
  		
  		<div class="col-md-6">
  			<!-- DONUT CHART -->
			 <div class="card">
                            
                            <div class="card-block bg-light dash-table-head ">
                                <div class="row">
                                    <div class="col-10">
                                       
                                        <h4 class="font-light m-t-0">Recently Completed Campaign</h4></div>
                                   
                                </div>
                            </div>
                            
							<?php 
				  				
				  				echo "</pre>";

				  				echo "<div class='table-responsive'><table class='table table-hover'>";

				  				echo "<tr>";
			  						echo "<th class='text-center'>SL</th>";
			  						echo "<th>Campaign name</th>";
			  						echo "<th>Created at</th>";
			  						echo "<th>Total Message sent</th>";
			  					echo "</tr>";

				  				$sl=0;
				  				foreach ($last_campaign_completed_info as $key => $value) 
				  				{
				  					$sl++;
				  					echo "<tr>";
				  						echo "<td class='text-center'>".$sl."</td>";
				  						echo "<td class='txt-oflo'>".$value["campaign_name"]."</td>";
				  						echo "<td class='txt-oflo'>".$value["added_at"]."</td>";
				  						echo "<td ><span class='text-success'>".$value["successfully_sent"]."<span></td>";
				  					echo "</tr>";
				  				}
				  				if($sl==0) echo "<tr><td class='text-center' colspan='4'>No data found.</td></tr>";
				  				echo "</table></div>";
				  			?>
						
			</div>
  		</div>
  		
  		
            
            <div class="col-md-6">
  			<!-- DONUT CHART -->
			 <div class="card">
                            
                            <div class="card-block bg-light dash-table-head ">
                                <div class="row">
                                    <div class="col-10">
                                       
                                        <h4 class="font-light m-t-0">Pending Campaign</h4></div>
                                   
                                </div>
                            </div>
                            
							<?php 
				  	
				  				echo "<div class='table-responsive'><table class='table table-hover'>";

				  				echo "<tr>";
			  						echo "<th>SL</th>";
			  						echo "<th>Campaign name</th>";
			  						echo "<th>Schedule Time</th>";
			  						echo "<th>Selected Message</th>";
			  					echo "</tr>";

				  				$sl=0;
				  				foreach ($last_campaign_pending_info as $key => $value) 
				  				{
				  					$sl++;
				  					echo "<tr>";
				  						echo "<td class='text-center'>".$sl."</th>";
				  						echo "<td class='txt-oflo'>".$value["campaign_name"]."</td>";
				  						echo "<td class='txt-oflo'>".$value["schedule_time"]."</td>";
				  						echo "<td> <span class='text-success'>".$value["total_thread"]."<span></td>";
				  					echo "</tr>";
				  				}
				  				if($sl==0) echo "<tr><td class='text-center' colspan='4'>No data found.</td></tr>";
				  				echo "</table></div>";
				  			?>
						
			</div>
  		</div>
  		
	</div>
	<br/><br/>
	<div class="row">
		<h2 class="font-medium text-inverse dash-heading">Monthly Sammary (<?php echo date("M-Y");?>)</h2>
	</div>
        
        
        <div class="row">
            <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                   <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $campaign_completed_this_month; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Campaign Complete");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $subscribergained_this_month; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Total Subscriber");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $message_number_month; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Total messages sent");?></h6>
                            </div>
                        </div>
                    </div>
                  </div>
                </div>
      
	<div class="row">
		<h2 class="font-medium text-inverse dash-heading"><?php echo $this->lang->line('Lead Generation Information'); ?></h2>
	</div>
	<div class="row box-margin" style="padding-top:10px;">
		<div class="col-md-12">
			<!-- DONUT CHART -->
			<div class="card">
				<div class="card-block bg-light dash-table-head">
					<h2 class="font-light m-t-0">Last Auto Reply</h2>					
				</div>
                                    	<?php 
				  			
				  				echo "<div class='table-responsive'><table class='table table-hover'>";

				  				echo "<tr>";
			  						echo "<th>SL</th>";
			  						echo "<th>Reply To</th>";
			  						echo "<th>Reply Time</th>";
			  						echo "<th>Post Name</th>";
			  					echo "</tr>";

				  				$sl=0;
				  				foreach ($my_last_auto_reply_data as $key => $value) 
				  				{
				  					$sl++;
				  					echo "<tr>";
				  						echo "<td class='text-center'>".$sl."</td>";
				  						echo "<td class='txt-oflo'>".$value["name"]."</td>";
				  						echo "<td class='txt-oflo'>".$value["reply_time"]."</td>";
				  						echo "<td ><span class='text-success'>".$value["post_name"]."</span></td>";
				  					echo "</tr>";
				  				}
				  				if($sl==0) echo "<tr><td class='text-center' colspan='4'>No data found.</td></tr>";
				  				echo "</table></div>";
				  			?>
						
			</div><!-- /.box -->		

  		</div>
	</div>
	
        
       <div class="row">
           <div class="col-md-12 col-sm-12 col-xs-12" style="padding: 0px;">
                   <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-inverse card-warning">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $auto_reply_enable; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Auto Reply Enabled Post");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-primary card-inverse">
                            <div class="box text-center">
                                <h1 class="font-light text-white">&nbsp;<?php echo $total_auto_replay; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Auto Reply Sent");?></h6>
                            </div>
                        </div>
                    </div>
                    <!-- Column -->
                    <div class="col-md-4 col-sm-4 col-xs-6 left">
                        <div class="card card-inverse card-success">
                            <div class="box text-center">
                                <h1 class="font-light text-white"><?php echo $chat_plugin_enable; ?></h1>
                                <h6 class="text-white"><?php echo $this->lang->line("Chat Plugin Enabled");?></h6>
                            </div>
                        </div>
                    </div>
                   </div>
                </div>  
        
        
<!--<script>
	$j("document").ready(function(){
		var pieOptions = {
			//Boolean - Whether we should show a stroke on each segment
			segmentShowStroke: true,
			//String - The colour of each segment stroke
			segmentStrokeColor: "#fff",
			//Number - The width of each segment stroke
			segmentStrokeWidth: 2,
			//Number - The percentage of the chart that we cut out of the middle
			percentageInnerCutout: 25, // This is 0 for Pie charts
			//Number - Amount of animation steps
			animationSteps: 100,
			//String - Animation easing effect
			animationEasing: "easeOutBounce",
			//Boolean - Whether we animate the rotation of the Doughnut
			animateRotate: true,
			//Boolean - Whether we animate scaling the Doughnut from the centre
			animateScale: false,
			//Boolean - whether to make the chart responsive to window resizing
			responsive: true,
			// Boolean - whether to maintain the starting aspect ratio or not when responsive, if set to false, will take up entire container
			maintainAspectRatio: false
	  	};

		//-------------
		//- PIE CHART -
		//-------------
		// var campaign_info_chart_data = $("#campaign_info_chart_data").val();
		// // Get context with jQuery - using jQuery's .get() method.
		// var pieChartCanvas = $("#campaign_data_pieChart").get(0).getContext("2d");
		// var pieChart = new Chart(pieChartCanvas);
		// var PieData = JSON.parse(campaign_info_chart_data);

		// You can switch between pie and douhnut using the method below.  
		// pieChart.Doughnut(PieData, pieOptions);

		Morris.Bar({
	  		element: 'div_for_bar',
	  		data: <?php echo json_encode($bar); ?>,
	  		xkey: 'year',
	  		ykeys: ['sent_message', 'sent_campaign'],
	  		labels: ['Total Message Sent', 'Total Campaign Created']
		});

	});  
</script>-->

<script>
$j(function () {
    "use strict";
   // ============================================================== 
    // Total revenue chart
    // ============================================================== 
    new Chartist.Line('#total-revenue4', {
        labels: <?php echo $label;?>,
        series: [
        <?php echo $sentMessage;?>
        , <?php echo $sentCampaignArr;?>
      ]
    }, {
        high: 15
        , low: 0
        , showArea: true
        , fullWidth: true
        , plugins: [
        Chartist.plugins.tooltip()
      ], // As this is axis specific we need to tell Chartist to use whole numbers only on the concerned axis
        axisY: {
            onlyInteger: true
            , offset: 20
            , labelInterpolationFnc: function (value) {
                return (value / 1) + 'k';
            }
        }
     });
});    
</script>