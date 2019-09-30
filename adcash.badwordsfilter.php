<?php
function badWordsFilter($text, $badWords = array())
{
	echo $text . "\n";
	foreach ($badWords as $badWord)
	{
		preg_match_all("/\b(\w*$badWord\w*)\b/", $text, $matches);
		foreach ($matches[0] as $m)
		{
			$text = preg_replace("/\b$m\b/", 
						str_repeat("*",
							strlen( $m )
						),
					$text);
		}
	}
	
	return $text;
}



echo badWordsFilter(
	"I am fucken genuis but I don`t give a fuck fucked fuckling unfucked unfucking fucked fuckfrankenstein!",
	[ "fuck", "but" ]
);


// RESULT:

// I am fucken genuis but I don`t give a fuck fucked fuckling unfucked unfucking fucked fuckfrankenstein!
// I am ****** genuis *** I don`t give a **** ****** ******** ******** ********* ****** ****************!
// Output completed (0 sec consumed) - Normal Termination


