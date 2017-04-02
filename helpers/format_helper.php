<?php
	/**
	 * Format The Date
	 */
	function formatDate($date) {
		return date('F j, Y, g:i a', strtotime($date));
	}

	/**
	 * [shortenText description]
	 * @param  string  $text  Gets Blog Post Text
	 * @param  integer $chars How Many Chars Before 'Read More'
	 * @return string         Returns frozen text
	 */
	function shortenText($text, $chars = 450) {
		$text = $text." ";
		$text = substr($text, 0, $chars);
		$text = substr($text, 0, strrpos($text, ' ')); //siradaki boslukta dondur. strpos olmasa kelimenin ortasinda 450 karakter dolunca dondurur.
		$text = $text."...";

		return $text;
	}
?>