<?php

namespace Students\John\app\Http\Format;

class Time
{
    public static function timeDifference($input)
    {
        $input = strtotime($input);
        $currentTime = (time()-$input);
        $minutes = floor($currentTime / 60);
        $hours = floor($currentTime / 3600);
        $days = floor($currentTime / 86400);
        $weeks = floor($currentTime / 604800);
        $months = floor($currentTime / 2419200);
        $years = floor($currentTime / 29030400);

        $out = "";
        $s = "";

        if($currentTime < 60){
            $out = $currentTime ." secs ago";
        }
        else if($currentTime < 3600)
        {
            if($minutes > 1)
            {
                $s = "s";
            }
            $out = $minutes ." minute{$s} ago";
        }
        else if($currentTime < 86400)
        {
            if($hours > 1)
            {
                $s = "s";
            }
            $out = $hours ." hour{$s}  ago";
        }

        else if($currentTime < 604800)
        {
            if($days > 1)
            {
                $s = "s";
            }
            $out = $days ." day{$s} ago";
        }
        else if($currentTime < 2419200)
        {
            if($weeks > 1)
            {
                $s = "s";
            }
            $out = $weeks ." week{$s} ago";
        }
        else if($currentTime < 29030400)
        {
            if($months > 1)
            {
                $s = "s";
            }
            $out = $months ." month{$s} ago";
        }
        else
        {
            if($years > 1)
            {
                $s = "s";
            }
            $out = $years . " year{$s} ago";
        }
        return $out;
    }

    public static function time()
    {
        return date("Y-m-d H:i:s");
    }

    /**
     * @param $input
     * @return string
     */
    public static function getDate($input)
    {
        return date("Y-m-d", strtotime($input));
    }

    /**
     * @return string
     */
    public static function dateToday()
    {
        return date("Y-m-d");
    }
}