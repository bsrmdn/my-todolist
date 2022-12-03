<?php
    $isShowBtn = false;
    function showBtn($show) {
        $display = "";
        if (isset($_GET[$show])) {
            if ($isShowBtn = false) {
                !$isShowBtn;
                $display = "d-none";
            } else {
                !$isShowBtn;
                $display = "d-block";
            }
        }
        return $display;
    }
