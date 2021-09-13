<?php

class Home extends Controller {
    function show($f3, $args) {
        $f3->set('featured',$this->db->exec(
            'SELECT * FROM us_accidents WHERE NOT Visibility="Nan" LIMIT 10',
        ));
        header('Content-Type: application/json');
        echo json_encode($f3->get('featured'));
    }

    function visibility($f3, $args) {
       $visibility = $this->db->exec(
            'SELECT Visibility FROM us_accidents 
            WHERE NOT Visibility="Nan" 
            AND NOT Visibility > "10.0"
            AND NOT ID="ID" LIMIT 10000'
        );
        header('Content-Type: application/json');
        echo json_encode($visibility);

    }

    function severity($f3, $args) {
        $visibility = $this->db->exec(
            'SELECT Visibility, Severity 
            FROM us_accidents 
            WHERE NOT Visibility="Nan"
            AND NOT Visibility > "10.0"
            AND NOT Severity="Nan"
            AND NOT ID="ID"
            LIMIT 10000'
        );
        header('Content-Type: application/json');
        echo json_encode($visibility);
    }

    function correlation($f3, $args) {
        $visibility = $this->db->exec(
            'SELECT Visibility, Severity, Distance, Temperature, Humidity, Precipitation 
            FROM us_accidents 
            WHERE NOT Visibility="Nan"
            AND NOT Distance="Nan"
            AND NOT Temperature="Nan"
            AND NOT Humidity="Nan"
            AND NOT Precipitation="Nan"
            AND NOT Visibility > "10.0"
            AND NOT Severity="Nan"
            AND NOT ID="ID"
            LIMIT 10000'
        );
        header('Content-Type: application/json');
        echo json_encode($visibility);
    }

    function state($f3, $args) {
        $state = $this->db->exec(
            'SELECT State 
            FROM us_accidents
            WHERE NOT ID="ID"'
        );
        header('Content-Type: application/json');
        echo json_encode($state);
    }

    function sides($f3, $args) {
        $state = $this->db->exec(
            'SELECT Side, Crossing, Give_Way, Junction, Stop, Traffic_Signal 
            FROM us_accidents
            WHERE NOT ID="ID"'
        );
        header('Content-Type: application/json');
        echo json_encode($state);
    }

    function distance($f3, $args) {
        $state = $this->db->exec(
            'SELECT Distance, Severity
            FROM us_accidents
            WHERE NOT ID="ID"
            AND NOT Severity="Nan"
            AND NOT Distance="Nan"'
        );
        header('Content-Type: application/json');
        echo json_encode($state);
    }

    function day($f3, $args) {
        $state = $this->db->exec(
            'SELECT Severity, Sunrise_Sunset
            FROM us_accidents
            WHERE NOT ID="ID"
            AND NOT Severity="Nan"
            AND NOT Sunrise_Sunset="Nan"'
        );
        header('Content-Type: application/json');
        echo json_encode($state);
    }
}