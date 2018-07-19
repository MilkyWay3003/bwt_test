<?

require "vendor/autoload.php";
use PHPHtmlParser\Dom;

class Weather extends Model
{
    public function parser()
    {
       //by using PHPHtmlParser
        $dom = new Dom;
        $dom->loadFromUrl('http://www.gismeteo.ua/city/daily/5093/');
        $temperature = $dom->find('.higher')->find('.temp')->find('.c', 0);
        echo $temperature->text;

        $cloudness = $dom->find('.higher')->find('.cloudness')->find('td', 0);
        echo $cloudness->text;
    }
    
    function parse($text, $p1,$p2) 
    {
        $num1 = strpos($text, $p1);
        if ($num1 === false) return 0;
        $num2 = substr($text, $num1);
        return strip_tags(substr($num2, 0, strpos($num2,$p2)));
    }

    public function myparser()
    {
        //hand made             
        $data=file_get_contents('http://www.gismeteo.ua/city/daily/5093/');
        $pattern1 = "<dd class='value m_temp c'>";
        $pattern2 = "<span class=";
        $temperature = $this->parse($data, $pattern1, $pattern2);            
        echo $temperature;

        $data=file_get_contents('http://www.gismeteo.ua/city/daily/5093/');
        $pattern1 = "<dd><table><tr><td>";
        $pattern2 = "</td></tr></table></dd>";
        $cloudness = $this->parse($data, $pattern1, $pattern2);            
        echo $cloudness;

    }


    public function parserapi()
    {
      //by using API 
    }



}