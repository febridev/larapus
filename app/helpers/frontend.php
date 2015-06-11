<?php
	/**
	*Macro untuk membuat divider
	*@return string HTML
	*/
	HTML::macro('divider', function()
		{
			return "<hr class=\"uk-article-divider\">";
		});
	/**
	 * Macro for UIKIT label
	 * @return string HTML
	*/
	Form::macro('labelUk', function($name, $placeholder)
		{
			return Form::label($name, $placeholder, array('class' => 'uk-form-label'));
		});
		
	/**
	 * Macro for UIKIT text
	 * @return string HTML
	*/
	
	Form::macro('textUk', function($name, $placeholder = null, $icon = null)
		{
			$html='';
			if ($icon) {
				$html .= "<div class=\"uk-form-icon\">
						 <i class = \"$icon\"></i>";
			}
			else
			{
				$html .= "<div class=\"uk-form-controls\">";
			}
			$html .= Form::text($name, null, array('placholder'=>$placeholder));
			$html .= '</div>';
			
			return $html;
			
		});
	Form::macro('submitUk', function(){
		return "<input type=\"submit\" value=\"$title\" class=\"uk-button uk-button-primary\">";
	});
	
	/**
	 * Macro untuk membuat tombol tambah
	 * @param $path string url to route (if any)
	 * @return string generate anchor
	*/
	HTML::macro('buttonAdd', function($path=null){
		if($path){
			$url = $path;
		}
		else
		{
			$url = explode('.', Route::currentRouteName());
			array_pop($url);
			array_push($url, 'create');
			$url = implode('.', $url);
			$url = route($url);
		}
		return '<a class ="uk-button uk-button-primary" href="'.$url.'">Tambah</a>';
	});
?>