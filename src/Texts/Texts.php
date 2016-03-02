<?php

/**
 * Created by PhpStorm.
 * User: Martinhg85
 */
namespace Martinhg\Texts;

use Carbon\Carbon;
use stdClass;

class Texts
{
    public function truncateHtml($subject, $len, $ellipsis = '&hellip;', $isHTML = true) {
        $subject = trim($subject);
        $ellipsis = (strlen(strip_tags($subject)) > $len) ? $ellipsis : '';
        $i = 0;
        $tags = array();

        if($isHTML) {
            preg_match_all('/<[^>]+>([^<]*)/', $subject, $matches, PREG_OFFSET_CAPTURE | PREG_SET_ORDER);

            foreach($matches as $o) {
                if($o[0][1] - $i >= $len) {
                    break;
                }
                $t = substr(strtok($o[0][0], " \t\n\r\0\x0B>"), 1);
                if($t[0] != '/') {
                    $tags[] = $t;
                }
                elseif(end($tags) == substr($t, 1)) {
                    array_pop($tags);
                }
                $i += $o[1][1] - $o[0][1];
            }
        }

        $output = substr($subject, 0, $len = min(strlen($subject), $len + $i)). $ellipsis . (count($tags = array_reverse($tags)) ? '</' . implode('></', $tags) . '>' : '') ;

        return $output;
    }
    public function isTruncated($subject, $len){
        return (strlen(strip_tags($subject)) > $len) ? true : false;
    }
}
