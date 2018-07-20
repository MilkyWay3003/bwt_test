<?

require "vendor/autoload.php";
use PHPHtmlParser\Dom;

class Weather extends Model
{
    public function parser()
    {
       //by using PHPHtmlParser
        $data = [];
        $data[0] = "Parser weather: method by using PHPHtmlParser";

        $dom = new Dom;
        $dom->loadFromUrl('http://www.gismeteo.ua/city/daily/5093/');

        $temperature = $dom->find('.higher')->find('.temp')->find('.c', 0);
        $data[1] = $temperature->text;
        
        $cloudness = $dom->find('.higher')->find('.cloudness')->find('td', 0);
        $data[2] = $cloudness->text;

        $wind = $dom->find('.higher')->find('.wind')->find('dt', 0);
        $data[3] = $wind->text;

        $wind_speed = $dom->find('.higher')->find('.wind')->find('.ms', 0);
        $data[4] =$wind_speed->text;

        $pressure = $dom->find('.higher')->find('.barp')->find('.torr', 0);
        $data[5] = $pressure->text;

        $humanity = $dom->find('.higher')->find('.hum');
        $data[6] = $humanity->text;

        $temperature_water = $dom->find('.higher')->find('.water')->find('.c');
        $data[7] = $temperature_water->text;

        return $data;
    }
    
    function parse($p1,$p2) 
    {
        $text = file_get_contents('http://www.gismeteo.ua/city/daily/5093/');
        $num1 = strpos($text, $p1);
        if ($num1 === false) return 0;
        $num2 = substr($text, $num1);
        return strip_tags(substr($num2, 0, strpos($num2,$p2)));
    }

    public function myparser()
    {
        //hand made
        $data = [];
        $data[0] = "Parser weather: hand made method";
        $pattern1 = "<dd class='value m_temp c'>";
        $pattern2 = "<span class=";
        $data[1] = $this->parse($pattern1, $pattern2);       
            
        $pattern1 = "<dd><table><tr><td>";
        $pattern2 = "</td></tr></table></dd>";
        $data[2] = $this->parse($pattern1, $pattern2);         

        $pattern1 = "<dd class='value m_wind ms' style='display:inline'>";
        $pattern2 = "</dt>";
        $data[4] = $this->parse($pattern1, $pattern2);         
        $data[3] = substr($data[4], -4);
        $data[4] = $data[4][0];
                      
        $pattern1 = "<dd class='value m_press torr'>";
        $pattern2 = "<span class=";
        $data[5] = $this->parse($pattern1, $pattern2); 
               
        $pattern1 = "wicon hum";
        $pattern2 = "<span class=";
        $data[6] = $this->parse($pattern1, $pattern2); 
        $data[6] = substr($data[6], -2);
      
        $pattern1 = "wicon water";
        $pattern2 = "<span class=";
        $data[7] = $this->parse($pattern1, $pattern2);
        $data[7] = substr($data[7], -2);

        return $data;
    }


    public function parserapi()
    {
        //by using API 
        $data = [];
        $data[0] = "Parser weather: method by using API";
        //  https://www.gismeteo.ru/api/

        return $data;
    }

}