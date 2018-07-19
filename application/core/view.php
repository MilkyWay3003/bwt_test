<?

class View
{
	function generate($template_view, $content_view, $data = null)
	{
		if(is_array($data)) {
            extract($data);
		}

	    include "application/views/{$template_view}.php";
	}
}
