<?php
/**
 * Custom Page content
 *
 * @uses $vars['name']	The name of a user
 * @uses $vars['blogs']	Latest 4 blog posts by the user
 *
 */

$class = array('class' => 'page-header');

$hello = elgg_echo('Projects <small>(' . $vars['count'] . ')</small>&nbsp;<a class="btn btn-mini btn-primary" href="/kanboard/project/create" title="Create new project"><i class="fa fa-plus"></i> New</a>&nbsp;<button type="button" class="btn btn-mini btn-primary" data-toggle="modal" data-target="#myModal"><i class="fa fa-calculator"></i> Resource Calculator</button>');
echo elgg_view_title($hello, $class);

if($vars['projects']) {
	$tasks = $vars['tasks'];
	for ($x = 0; $x < count($vars['projects']); $x++) {
		$row = $vars['projects'][$x];
			$totalToDo =0;		
			$totalDoing =0;
			$totalDone =0;
			$totalTasks =0;
			
			echo '<div class="panel panel-default">';
				echo '<div class="panel-heading">';
					echo '<i class="fa fa-archive"></i>&nbsp;<strong><a style="color: black !important; text-decoration: none;" href="/kanboard/board/'.$row->id.'">'.$row->name.'</a></strong>';
				echo '</div>';

				echo '<div class="panel-body clearfix">';
					echo '<div class="col-xs-8">'.($row->description!= '' ? $row->description : 'No description').'</div>';					
					echo '<div class="col-xs-2"><i class="fa fa-calendar-o"></i>&nbsp;<b>Start:</b>&nbsp;<time title="Start date">'.($row->start_date!= '' ? $row->start_date : 'N/A').'</time></div>';
					echo '<div class="col-xs-2"><i class="fa fa-calendar-o"></i>&nbsp;<b>End:</b>&nbsp;<time title="End date">'.($row->end_date!= '' ? $row->end_date : 'N/A').'</time></div>';
					
					echo '<div class="col-xs-8">';
					echo '</div>';
					echo '<div class="col-xs-4">';
					echo '<div class="container-fluid">';
						$counter=0;
						if(!empty($tasks)){
							for($k=0; $k < count($tasks);$k++){
								$projectId = $tasks[$k]->id;
								
								if($projectId == $row->id){
									$counter++;
									$taskTitles = $vars['tasks'][$k]->title;
									$taskTotals = $vars['tasks'][$k]->total;
									$tTitles= explode(",", $taskTitles);
									$tTotals= explode(",", $taskTotals);
									
									for($i=0; $i < count($tTitles);$i++){											
										if($i==0){
											$totalToDo =$tTotals[$i];		
											echo '<div class="col-xs-4"><h2 style="border-bottom:none;"><span class="label label-primary">';
										}else if($i==1){
											$totalDoing =$tTotals[$i];
											echo '<div class="col-xs-4"><h2 style="border-bottom:none;"><span class="label label-warning">';
										}else if($i==2){
											$totalDone =$tTotals[$i];
											echo '<div class="col-xs-4"><h2 style="border-bottom:none;"><span class="label label-success">';
										}
										
										$totalTasks += $tTotals[$i];
										echo '<b>'.$tTitles[$i].': </b>'.$tTotals[$i].'</span></h2></div>';
									}
									break;
								}
							}
						}
					echo '</div>';
					echo '</div>';
				echo '</div>';
				echo '<div class="panel-footer">';
					if($counter==0){
						echo '<p><i class="fa fa-info-circle"></i>&nbsp;No tasks defined for this project. <a style="color: blue !important; text-decoration: none;" href="/kanboard/?controller=taskcreation&action=create&project_id='.$row->id.'">Create a new task</a></p>';
					}else{
						echo '<div class="progress">';
							echo '<div title="To Do ('.round($totalToDo/$totalTasks * 100, 2).'%)" class="progress-bar progress-bar-primary" style="width: '.($totalToDo/$totalTasks * 100).'%">';
								echo round($totalToDo/$totalTasks * 100, 2).'%';
							echo '</div>';
							echo '<div title="Doing ('.round($totalDoing/$totalTasks * 100, 2).'%)" class="progress-bar progress-bar-warning" style="width: '.($totalDoing/$totalTasks * 100).'%">';
								echo round($totalDoing/$totalTasks * 100, 2).'%';
							echo '</div>';
							echo '<div title="Done ('.round($totalDone/$totalTasks * 100, 2).'%)" class="progress-bar progress-bar-success" style="width: '.($totalDone/$totalTasks * 100).'%">';
								echo round($totalDone/$totalTasks * 100, 2).'%';
							echo '</div>';
						echo '</div>';
						
						echo '<p><i class="fa fa-tasks"></i>&nbsp;<b>'.$row->assigned.'</b> assigned / <b>'.$row->unassigned.'</b> unassigned tasks</p>';
					}
				echo '</div>';
			echo '</div>';
	}

} else {
	$title = elgg_echo('Projects');
	$content = elgg_echo('custompage:noblogs');
	echo elgg_view_module('custompage', $title, $content);
}
?>

<!-- Modal -->
<div id="myModal" class="modal fade" data-backdrop="true" role="dialog">
  <div class="modal-dialog modal-lg">

    <!-- Modal content-->
    <div class="modal-content">
      <div class="modal-header" style="background-color:white;">
        <button type="button" class="close" data-dismiss="modal">&times;</button>
        <h4 class="modal-title">Resource Calculator</h4>
      </div>
      <div class="modal-body">

       <div class="panel panel-success no-print" id="resultPanel" style="display:none;">
            <div class="panel-heading">
                <h3>Resource Capacity Visual</h3>
				<p id="result">N/A</p>
            </div>
            <div class="panel-body" id="result_progress"></div>
        </div>

        <form class="form-inline" id="fte_form">
            <div class="panel panel-info">
                <div class="panel-heading no-print clearfix">
					<div class="pull-left">
						<h3>Tasks</h3>
					</div>
                    <div class="pull-right">
                        <div class="btn-group" data-toggle="buttons">
                            <label class="btn btn-default active">
                            <input type="radio" name="myoptions" id="fulltime" value="0"> Full-Time
                            </label>
                            <label class="btn btn-default">
                            <input type="radio" name="myoptions" id="parttime" value="1"> Part-Time
                            </label>
                        </div>
                    </div>
                </div>
                <div class="panel-body">
                        <div class="row-fluid pull-right no-print">
                            <div class="col-md-12">
                                <button id="add_row" type="button" value="add" class="btn btn-default">+ Add</button>
                                <button id="calculate_row" type="button" value="calculate" class="btn btn-success">Calculate</button>
                                <button id="clear_all" type="button" value="clear" class="btn btn-danger">Clear all</button>
                            </div>
                        </div>

                        <div class="container-fluid clearfix" id="fte_table">
                                   <div class="row-fluid">
                                        <div class="col-md-4">Task</div>
                                        <div class="col-md-2">Time</div>
                                        <div class="col-md-2">Hours or Days</div>
                                        <div class="col-md-2">FTE (in days)</div>
                                        <div class="col-md-2">FTE (a year)</div>
                                   </div>
                        </div>
                    </div>
             </div>
        </form>
      </div>
      <div class="modal-footer" style="background-color:white;">
        <button type="button" class="btn btn-default" data-dismiss="modal">Close</button>
      </div>
    </div>
  </div>
</div>
        
<script type="text/javascript">
    $(document).ready(function () {
        var index = 0;
        var fullTimeVar = 191;
        var partTimeVar = 95.5;
        var fullTimeLoad = 7.5;
        var partTimeLoad = 3.75;

        $('.numbersOnly').bind('keypress', function (e) { return !(e.which != 8 && e.which != 0 && (e.which < 48 || e.which > 57) && e.which != 46); });

        $("#clear_all").click(function () {
            location.reload();
        });

        $("#calculate_row").click(function () {
            var timeInputArray = $("input[id^='fte_time_']");
            var hourDayInputArray = $("select[id^='fte_hd_']");
            var fteDaysInputArray = $("span[id^='fte_days_']");
            var fteYearsInputArray = $("span[id^='fte_year_']");
            var fullPartTime = $("input[name='myoptions']:checked").val();
            var resultTag = $("#result");
            var resultPanel = $("#resultPanel");
            var resultProgress = $("#result_progress");
            var totalFteYears = 0;

            if (isNaN(fullPartTime))
                fullPartTime = 0;

            for (var i = 0; i < timeInputArray.length; i++) {
                var time = $(timeInputArray[i]).val();
                var hOrD = $(hourDayInputArray[i]).val();
                var fteDaysElement = $(fteDaysInputArray[i]);
                var fteYearsElement = $(fteYearsInputArray[i]);
                var fteDays = "";
                var fteYear = "";

                if (hOrD == 0) {
                    if (fullPartTime == 0) {
                        fteDays = (time / fullTimeLoad).toFixed(2);
                        fteYear = fteDays / fullTimeVar;
                    } else {
                        fteDays = (time / partTimeLoad).toFixed(2);
                        fteYear = fteDays / partTimeVar;
                    }
                } else {
                    fteDays = time;

                    if (fullPartTime == 0) {
                        fteYear = fteDays / fullTimeVar;
                    } else {
                        fteYear = fteDays / partTimeVar;
                    }
                }

                fteDaysElement.html(fteDays);
                fteYearsElement.html(fteYear.toFixed(2));

                totalFteYears += fteYear;
            }

            resultTag.html("The activities listed would require " + (totalFteYears * 100).toFixed(2) + "% of one " + (fullPartTime == 0 ? "Full-Time" : "Part-Time") + " Employee's time over the course of one year.");
            resultProgress.html("<div class='progress'><div class='progress-bar progress-bar-success' role='progressbar' aria-valuenow='" + (totalFteYears * 100).toFixed(2) + "' aria-valuemin='0' aria-valuemax='100' style='width:" + (totalFteYears * 100).toFixed(2) + "%'>" + (totalFteYears * 100).toFixed(2) + "%</div></div>");
            resultPanel.show();
        });

        $("#add_row").click(function () {
            index++;

            var newRow = "";
            newRow += " <div class='row-fluid'>";
            newRow += " <div class='col-md-4'>";
            newRow += "     <input id='fte_activity_" + index + "' class='form-control' type='text' size='80' />";
            newRow += " </div>";
            newRow += " <div class='col-md-2'>";
            newRow += "     <input id='fte_time_" + index + "' class='numbersOnly form-control' type='text' size='5' maxlength='5' />";
            newRow += " </div>";
            newRow += " <div class='col-md-2'>";
            newRow += "     <select id='fte_hd_" + index + "' class='form-control'>";
            newRow += "         <option value='0'>Hours</option>";
            newRow += "         <option value='1'>Days</option>";
            newRow += "     </select>";
            newRow += " </div>";
            newRow += " <div class='col-md-2'>";
            newRow += "     <span id='fte_days_" + index + "' />";
            newRow += " </div>";
            newRow += " <div class='col-md-2'>";
            newRow += "     <span id='fte_year_" + index + "' />";
            newRow += " </div>";
            newRow += " </div>";

            $('#fte_table').append(newRow);
        });
    });

</script>
        
<?php
function get_time_ago($time_stamp)
{
    if(strtotime($time_stamp) < strtotime('now'))
	echo '';
    else
    	return $time_stamp;
    
    $time_stamp = strtotime($time_stamp);
    $time_difference = strtotime('now') - $time_stamp;

    if ($time_difference >= 60 * 60 * 24 * 365.242199)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 365.242199 days/year
         * This means that the time difference is 1 year or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 365.242199, 'year');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 30.4368499)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 30.4368499 days/month
         * This means that the time difference is 1 month or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 30.4368499, 'month');
    }
    elseif ($time_difference >= 60 * 60 * 24 * 7)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day * 7 days/week
         * This means that the time difference is 1 week or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24 * 7, 'week');
    }
    elseif ($time_difference >= 60 * 60 * 24)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour * 24 hours/day
         * This means that the time difference is 1 day or more
         */
        return get_time_ago_string($time_stamp, 60 * 60 * 24, 'day');
    }
    elseif ($time_difference >= 60 * 60)
    {
        /*
         * 60 seconds/minute * 60 minutes/hour
         * This means that the time difference is 1 hour or more
         */
        return get_time_ago_string($time_stamp, 60 * 60, 'hour');
    }
    else
    {
        /*
         * 60 seconds/minute
         * This means that the time difference is a matter of minutes
         */
        return get_time_ago_string($time_stamp, 60, 'minute');
    }
}

function get_time_ago_string($time_stamp, $divisor, $time_unit)
{
    $time_difference = strtotime("now") - $time_stamp;
    $time_units      = floor($time_difference / $divisor);

    settype($time_units, 'string');

    if ($time_units === '0')
    {
        return 'less than 1 ' . $time_unit . ' ago';
    }
    elseif ($time_units === '1')
    {
        return '1 ' . $time_unit . ' ago';
    }
    else
    {
        /*
         * More than "1" $time_unit. This is the "plural" message.
         */
        // TODO: This pluralizes the time unit, which is done by adding "s" at the end; this will not work for i18n!
        return $time_units . ' ' . $time_unit . 's ago';
    }
}