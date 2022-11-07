<?php
    include_once "conn.php";
    function execute_query($query, $args=NULL, $debug=false)
    {
        global $conn;
        $query = $conn->prepare($query);

        if ($debug) {
            var_dump($query);
            var_dump($args);
        }

        $query->execute($args);
        return $query;
    }

    function top_5_score()
    {
        $s = "";
        $q = execute_query("SELECT * from forknight_score ORDER BY score DESC limit 5;");
        $q = $q->fetchAll();
        foreach ($q as $key => $val)
        {
            // var_dump($key, $val);
            // $s .= "<div>" . $val["name"] . $val["score"] . "</div>";
            $s .= '<div class="users row z-depth-1"><div class="col l4">' . $val["name"] . '</div><div class="col l4">' . $val["score"] . '</div><div class="col l4">' . $val["time"] . '</div></div>        <div id="last"></div>';
        }
        echo $s;
    }
?>