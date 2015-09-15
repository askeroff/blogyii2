<?php
namespace common\helpers;

use Yii;

class ParserHelper
    {
    /**
     * We will parse HTML from bb codes
     */
       public static function getHTML($text)
       {
            $html = trim($text);
            $html = str_replace( "\r\n" , '</p><p>' , $html);
            $html = preg_replace('/\[b\](.*)\[\/b\]/Uis', '<b>\1</b>', $html);
            $html = preg_replace('/\[i\](.*)\[\/i\]/Uis', '<i>\1</i>', $html);
            $html = preg_replace('/\[s\](.*)\[\/s\]/Uis', '<s>\1</s>', $html);
            $html = preg_replace('/\[u\](.*)\[\/u\]/Uis', '<u>\1</u>', $html);

            $html = preg_replace('/\[h2\](.*)\[\/h2\]/Uis', '<h2>\1</h2>', $html);
            $html = preg_replace('/\[h3\](.*)\[\/h3\]/Uis', '<h3>\1</h3>', $html);
            $html = preg_replace('/\[h4\](.*)\[\/h4\]/Uis', '<h4>\1</h4>', $html);
            $html = preg_replace('/\[h5\](.*)\[\/h5\]/Uis', '<h5>\1</h5>', $html);
            $html = preg_replace('/\[h6\](.*)\[\/h6\]/Uis', '<h6>\1</h6>', $html);


            $html = preg_replace('/\[ul\](.*)\[\/ul\]/Uis', '<ul>\1</ul>', $html);
            $html = preg_replace('/\[ol\](.*)\[\/ol\]/Uis', '<ol>\1</ol>', $html);
            $html = preg_replace('/\[li\](.*)\[\/li\]/Uis', '<li>\1</li>', $html);
            $html = preg_replace('/\[blockquote\](.*)\[\/blockquote\]/Uis', '<blockquote>\1</blockquote>', $html);

            $html = preg_replace('/\[strong\](.*)\[\/strong\]/Uis', '<strong>\1</strong>', $html);
            $html = preg_replace('/\[em\](.*)\[\/em\]/Uis', '<em>\1</em>', $html);

            $html = preg_replace('/\[url=(.*)\](.*)\[\/url\]/Uis', '<a href="\1" target="_blank">\2</a>', $html);



           return $html;
       }
    }