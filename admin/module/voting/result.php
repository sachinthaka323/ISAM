<?php

require_once '../include/headerpage.php';

$id=$_SESSION['vid'];


$test=array();
$count=0;
$sql="SELECT users.firstname,candidate.id from users,candidate WHERE users.id=candidate.user_id and candidate.voting_id='$id';";
$res=$conn->query($sql);
if ($res->num_rows > 0) {
    while ($row = $res->fetch_assoc()) {
        $cid=$row['id'];
        $sq = "select count(candidate_id) from voting_result where candidate_id=$cid;";
        $result = $conn->query($sq);
        if ($result->num_rows > 0) {
         $ro = $result->fetch_assoc();
        $val = $ro["count(candidate_id)"];
        $test[$count]['label']=$row['firstname'];
        $test[$count]['y']=$val;
        $count=$count+1;
    
    }

    }
}

?>

<script>
window.onload = function() {
 
var chart = new CanvasJS.Chart("chartContainer", {
	animationEnabled: true,
	theme: "light2",
	title:{
		text: "Final  Result"
	},
	axisY: {
		title: "Number of votes"
	},
	data: [{
		type: "column",
		yValueFormatString: "#,##0.## votes",
		dataPoints: <?php echo json_encode($test, JSON_NUMERIC_CHECK); ?>
	}]
});
chart.render();
 
}
</script>
</head>
<body>
<div id="chartContainer" style="height: 370px; width: 100%;"></div>
<script src="https://canvasjs.com/assets/script/canvasjs.min.js"></script>
<?php
require_once '../include/footer.php';
?>
</body>
</html>



