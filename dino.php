<?php
    header("Content-type: text/css");
	global $bg_url;
	global $block_url;

	$bg_url = "aa";
	$block_url = "";

    
    $seasons = [

        "spring" =>
        ["3/21", "6/20",
            [
                "https://media.istockphoto.com/photos/beautiful-meadow-field-with-fresh-grass-and-yellow-dandelion-flowers-picture-id1301592082?b=1&k=20&m=1301592082&s=612x612&w=0&h=HfIjUy6VIblyWYvhFs4GEcPKliJOQXmR_b2qsNaAaYI=",
                "https://upload.wikimedia.org/wikipedia/commons/thumb/e/e7/Leucanthemum_vulgare_%27Filigran%27_Flower_2200px.jpg/1126px-Leucanthemum_vulgare_%27Filigran%27_Flower_2200px.jpg",
                ""
            ]
        ],
    
    
        "summer" =>
        ["6/21", "9/20",
            [
                "https://t3.ftcdn.net/jpg/02/46/14/48/360_F_246144813_VSYaSoJgpD90TY566bpXRLTPCIjnD1SY.jpg",
                "https://t3.ftcdn.net/jpg/02/46/14/48/360_F_246144813_VSYaSoJgpD90TY566bpXRLTPCIjnD1SY.jpg",
                ""
            ]
        ],
    
        "autumn" =>
        ["9/21", "12/20",
            [
                "https://m.media-amazon.com/images/I/815ELZ-AgyL.jpg",
                "https://static.vecteezy.com/system/resources/previews/001/201/811/original/maple-leaf-png.png",
                ""
            ]
        ],
    
        "winter" =>
        ["12/21", "3/20 +1 year",
            [
                "https://i.pinimg.com/originals/40/b1/d3/40b1d3900da6b89c409bc907a7bbb77f.jpg",
                "https://i.pinimg.com/originals/23/f3/ec/23f3ece7d918e274ebb41083997764e9.jpg",
                ""
            ]
        ],
    
    ];
    
    $holidays = 
    [
        "new year" =>
        ["12/31", "1/1",
            [
                "https://www.aworldinreach.com/wp-content/uploads/2020/11/Brussels-Belgium-NYE.jpeg",
                "https://thumbs.dreamstime.com/b/flat-icon-firework-rocket-isolated-white-background-vector-illustration-flat-icon-firework-rocket-143336787.jpg",
                ""
            ]
        ],
    
        "valentine" =>
        ["2/10", "2/14",
            [
                "https://hips.hearstapps.com/hmg-prod.s3.amazonaws.com/images/valentines-day-zoom-backgrounds-hearts-1643038425.jpeg",
                "https://www.samolepky-samolepky.cz/image/cache/catalog/postavy/postava25-andel-amor-500x500.png",
                ""
            ]
        ],
        
        "Saint Patrick's Day" =>
        ["3/16", "3/17",
            [
                "https://media.istockphoto.com/vectors/saint-patricks-day-background-vector-id1133014349",
                "https://previews.123rf.com/images/yupiramos/yupiramos1901/yupiramos190109999/125979334-money-bag-with-coins-happy-st-patricks-day-vector-illustration.jpg",
                ""
            ]
        ],
    
        "halloween" =>
        ["10/30", "11/1",
            [
                "https://wallpapercave.com/wp/wp7519807.jpg",
                "https://i.guim.co.uk/img/media/7550077872f207b086dc4c0caa3616c7f0c7ed50/439_10_4751_2851/master/4751.jpg?width=1200&height=1200&quality=85&auto=format&fit=crop&s=3cd871ca83571286d3adb3a2a0d7abe0",
                ""
            ]
        ],
    
        "christmas" =>
        ["12/20", "12/30",
            [
                "https://static.vecteezy.com/system/resources/previews/003/536/556/original/christmas-tree-background-free-vector.jpg",
                "https://i.pinimg.com/originals/0a/af/1c/0aaf1cac36ea499387ec201d252a69d2.png",
                ""
            ]
        ],
    ];
    
    $date = strtotime("now");
    foreach ($seasons as $key => $val)
    {
        $val[0] = strtotime($val[0]);
        $val[1] = strtotime($val[1]);

        if (($date >= $val[0]) && $date <= $val[1]) {
            $bg_url = $val[2][0];
            $block_url = $val[2][1];
            break;
        }
    }

    foreach ($holidays as $key => $val)
    {
        $val[0] = strtotime($val[0]);
        $val[1] = strtotime($val[1]);

        if (($date >= $val[0]) && $date <= $val[1]) {
            $bg_url = $val[2][0];
            $block_url = $val[2][1];
            break;
        }
    }
    
    
?>

*{
	padding: 0;
	margin: 0; 
}
body {
	background-color: black;
    color: #FFFFFF;
}
#game{
	width: 500px;
	height: 200px;
	border: 1px solid white;
	margin: auto;
	background-color: #eeeeee;
	background-image: url(<?php global $bg_url; echo $bg_url; ?>);
	background-size: cover;
	<!-- margin-top: 20px; -->
}

#name {
	color: #eeeeee;
}

#character{
	width: 20px;
	height: 50px;
	position: relative;
	top: 150px;
}
#characterHead{
	width: 20px;
	height: 15px;
	background-color: black;
	border-radius: 50%;
}
#characterFeet{
	width: 20px;
	height: 35px;
	background-color: black;
}
.animate{
	animation: jump 310ms;
}
@keyframes jump{
	0%{top: 150px;}
	30%{top: 100px;}
	70%{top: 100px;}
	100%{top: 150px;}
}
#block{
	width: 20px;
	height: 20px;
	background-color: white;
	background-image: url(<?php global $block_url; echo $block_url; ?>);
	background-size: cover;
	position: relative;
	top: 130px;
	left: 480px;
	animation: block 0.7s infinite linear;
}
@keyframes block{
	0%{left: 480px;}
	100%{left: -15px;}
}

#score {
	font-size: 24px;
	color: white;
}
h1 {
	margin-top: 100px !important;
	color: white;
}
h2, h3, h4, h5 {
	color: white;
}
.container {
	padding: 20px;
	color: white !important;
}
#border {
	color: white !important;
	border: 1px solid white;
}
.bold{
	font-weight: bold;
}