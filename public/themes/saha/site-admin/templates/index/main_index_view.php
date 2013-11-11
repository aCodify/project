<style>
	
	table th
	{
		text-align: left;
		width: 30em;
	}
	.width30em
	{
		width: 30em;
	}
	.set_box
	{
		padding: 1em;
		margin: 10px;
		background-color: #FBCECE;
	}

</style>


<?php if ( $google_analytice == false ): ?>
	
	<div style="margin: 0px auto; width: 20em; padding-top: 10em;">

		<span>กรุณาใส่ข้อมูล <a href="<?php echo site_url('site-admin/setting/#google_analytice') ?>">Setting ID Google Analytics</a></span>

	</div>

<?php else: ?>

	<?php 





	include_once ABSPATH.'libraries/gaApi.php';

	$user_google = $user_analytics;
	$password_google = $password_analytics;
	$id_code_google = $id_code_analytics;

	$ga=new gaApi( $user_google , $password_google ,'ga:'.$id_code_google);

	$now=date("Y-m-d");
	$lastmonth=date('Y-m-d', strtotime('-10 days'));

	//Summery: visitors, unique visit, pageview, time on site, new visits, bounce rates
	$summery=$ga->getSummery($lastmonth,$now);

	//All time summery: visitors, page views
	$allTimeSummery=$ga->getAllTimeSummery();

	//Last 10 days visitors (for graph)
	$visits=$ga->getVisits($lastmonth,$now,20);

	//Top 10 search engine keywords
	$topKeywords=$ga->getTopKeyword($lastmonth,$now,10);


	//Top 10 visitor countries
	$topCountries=$ga->getTopCountry($lastmonth,$now,10);

	//Top 10 page views
	$topPages=$ga->getTopPage($lastmonth,$now,10);

	//Top 10 referrer websites
	$topReferrer=$ga->getTopReferrer($lastmonth,$now,10);

	//Top 10 visitor browsers
	$topBrowsers=$ga->getTopBrowser($lastmonth,$now,10);

	//Top 10 visitor operating systems
	$topOs=$ga->getTopOs($lastmonth,$now,10);

	?>
	<div id="vGA">
		<div>
		<h4><span>&nbsp;&nbsp;All user look up</span><b> <?php echo $allTimeSummery['ga:pageviews'] ?> </b><span id="vGALabel">Views</span></h4>
	    </div>
	</div>

	<div class="set_box" style="display: inline-block; width: 35em; background-color: rgb(214, 207, 255);" >
		<h1>Visitors Overview</h1>
		<img src="http://chart.apis.google.com/chart?
		chs=460x200
		&amp;chg=22,30&amp;chd=t:<?
		$i=0;
		$max=0;
		$min=100000;
		foreach($visits as $v){
			if($i>0)echo ",";
			if($v['ga:visits']>$max)$max=$v['ga:visits'];
			if($v['ga:visits']<$min)$min=$v['ga:visits'];
			echo $v['ga:visits'];
			$i++;
		}
		$max=$max+5;
		$min=$min-5;
		?>
		&amp;chl=<?
		$i=0;
		foreach($visits as $v){
			if($i>0)echo "|";
			$tmp=null;
			$tmp[]=substr($v['ga:date'], -2);
			$tmp[]=substr($v['ga:date'], -4,2);
			//echo $v['ga:date'];
			echo "$tmp[0]/$tmp[1]";
			$i++;
		}
		?>
		&amp;chxr=1,<?php echo $min ?>,<?php echo $max ?>
		&amp;chds=<?php echo $min ?>,<?php echo $max ?>
		&amp;chm=o,0066FF,0,-1.0,6|N,0066FF,0,-1.0,11
		&amp;chxt=x,y
		&amp;cht=lc
		" />
	</div>

	<div class="set_box" style="display: inline-block; float: right; width: 35em; height: 20em;" >
		<h1>Last 30 Days</h1>
		<table>
		<tr><th class="width30em" >visits</th><td><?php echo $summery['ga:visits'] ?></td></tr>
		<tr><th class="width30em" >unique visitors</th><td><?php echo $summery['ga:visitors'] ?></td></tr>
		<tr><th class="width30em" >pageviews</th><td><?php echo $summery['ga:pageviews'] ?></td></tr>
		<tr><th class="width30em" >time on site</th><td><?php echo floor(($summery['ga:timeOnSite']/$summery['ga:visits'])/60) . ":" . ($summery['ga:timeOnSite']/$summery['ga:visits']) % 60 ?></td></tr>
		<tr><th class="width30em" >new visits</th><td><?php echo ceil(($summery['ga:newVisits']/$summery['ga:visits'])*100) ?> %</td></tr>
		<tr><th class="width30em" >bounce rate</th><td><?php echo ceil(($summery['ga:bounces']/$summery['ga:entrances'])*100)?> %</td></tr>
		</table>
	</div>
	<div style="clear: both;" ></div>
	<div class="set_box" style="display: inline-block; width: 35em; background-color: rgb(212, 255, 195); height: 15em;" >
		<h1>All Time</h1>
		<table>
		<tr><th >visits</th><td><?php echo $allTimeSummery['ga:visits'] ?></td></tr>
		<tr><th >pageviews</th><td><?php echo $allTimeSummery['ga:pageviews'] ?></td></tr>
		</table>
	</div>

	<div class="set_box" style="display: inline-block; float: right; width: 35em; background-color: rgb(153, 153, 153); color: rgb(255, 255, 255); height: 15em;" >
		<h1>Top Keyword</h1>
		<table>
		<? foreach($topKeywords as $keyword){ ?>
		<tr><th><?php echo $keyword['ga:keyword'] ?></th><td><?php echo $keyword['ga:visits'] ?></td></tr>
		<? } ?>
		</table>
	</div>

	<div style="clear: both;" ></div>
	<div class="set_box" style="display: inline-block; width: 35em; height: 23em; background-color: rgb(27, 44, 166); color: rgb(255, 255, 255);" >
		<h1>Top Country</h1>
		<table>
		<? foreach($topCountries as $country){ ?>
		<tr><th><?php echo $country['ga:country'] ?></th><td><?php echo $country['ga:visits'] ?></td></tr>
		<? } ?>
		</table>
	</div>

	<div class="set_box" style="display: inline-block; float: right; width: 35em; background-color: rgb(210, 237, 254);" >
		<h1>Top Page View</h1>
		<table>
		<? foreach($topPages as $page){ ?>
		<tr><th><div><?php echo $page['ga:pagePath'] ?></div></th><td><?php echo $page['ga:visits'] ?></td></tr>
		<? } ?>
		</table>
	</div>
	<div style="clear: both;" ></div>
	<div class="set_box" style="display: inline-block; width: 35em; height: 20em; background-color: rgb(193, 76, 76);" >
		<h1>Top Referrer</h1>
		<table>
		<? foreach($topReferrer as $ref){ ?>
		<tr><th><div><?php echo $ref['ga:source'] ?></div></th><td><?php echo $ref['ga:visits'] ?></td></tr>
		<? } ?>
		</table>
	</div>

	<div class="set_box" style="width: 35em; background-color: rgb(92, 78, 154); color: rgb(255, 255, 255);" >
		<h1>Top Browser</h1>
		<img src="http://chart.apis.google.com/chart?
		chs=460x160
		&amp;chd=t:<?
		$i=0;
		foreach($topBrowsers as $browser){
			if($i>0)echo ",";
			echo $browser['ga:visits'];
			$i++;
		}
		?>
		&amp;chl=<?
		$i=0;
		foreach($topBrowsers as $browser){
			if($i>0)echo "|";
			echo $browser['ga:browser'];
			$i++;
		}
		?>
		&amp;cht=p3
		" />
	</div>

	<div  class="set_box" style="width: 35em; background-color: rgb(78, 166, 109);" >
		<h1>Top OS</h1>
		<img src="http://chart.apis.google.com/chart?
		chs=460x160
		&amp;chd=t:<?
		$i=0;
		foreach($topOs as $os){
			if($i>0)echo ",";
			echo $os['ga:visits'];
			$i++;
		}
		?>
		&amp;chl=<?
		$i=0;
		foreach($topOs as $os){
			if($i>0)echo "|";
			echo $os['ga:operatingSystem'];
			$i++;
		}
		?>
		&amp;cht=p3
		" />
	</div>
	</div><!--end container-->
	</body>
	</html>

<?php endif ?>
