<?

class View
{
	
	function generate($template_view, $content_view, $data = null)
	{
	    include 'application/views/'.$template_view.'.php';
	}
}

