<html>
<head>
	<link href="/stylesheets/getpacemaker.css" media="screen, projection" rel="stylesheet" type="text/css" />
</head>
<body>
  <?php include '../../banner-small.php' ?>
  <div id="inner-body" style="text-align: left;">
     <div class="coda-slider" style="padding: 20px; width: 800px;">
	<h2>Annotated Pacemaker Sources</h2>
        <?php

echo "<ul>";

$runs = glob("*");
array_multisort(array_map('filemtime', $runs), /*SORT_ASC*/SORT_DESC, $runs);

$lpc = 0;
/*$total = count($runs);*/

foreach ($runs as $hash) {
    if(strstr($hash, "index")) {
	continue;
    }
    $total++;
}

foreach ($runs as $hash) {
    if(strstr($hash, "index")) {
	continue;
    }

    $run = $total - $lpc;
    $when = date("F d Y, gA", filemtime($hash));

    echo "<li>Run $run $hash ($when) ";
    echo " [<a href=$hash/index.html>Results</a>]";
    echo " [<a href=http://hg.clusterlabs.org/pacemaker/devel/rev/$hash>Sources</a>]";
    echo "</li>";
    $lpc++;
}

echo "</ul>";
	?>
      </p>
      <div align="center">
        <object type="image/svg+xml" width="50" height="30" data="http://php.logfish.net/svgCounter.php"></object>
      </div>
    </div>
  </div>
</body>
</html>