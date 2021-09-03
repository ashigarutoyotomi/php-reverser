<?php 
//эта функция не работает с многобайтовой кодировкой!
//я пытался уже исправить это с mb_strlen
function revertCharacters($sent){
	$arr = explode(" ",$sent);
	$words = [];
	for($i = 0;$i<count($arr);$i++) {
		preg_match("|(\w{1,})([!.,;:]*)|iu", $arr[$i], $matches);
		$punct = $matches[2];
		$revWords = [];
		for ($j=0;$j<strlen($matches[1]);$j++) {
			$revWords[]=$matches[1][$j];
		}
		$letters = implode("",array_reverse($revWords));
		$words[] = $letters.$punct;

	}
	return $words;
}

$result = revertCharacters("howdy! have not seen a long");
print_r($result); 
function testSeparateSymbols($sentence){
	preg_match("|(\w{1,})([!.,;:]*)|iu", $sentence, $matches);
	return $matches;
}
function testReverseWord($word) {
	$revWords = [];
	for ($j=0;$j<strlen($word);$j++) {
		$revWords[]=$word[$j];
	}
	$letters = implode("",array_reverse($revWords));
	return $letters;
}
echo "<br>";
echo testReverseWord("house")."<br>";
print_r(testSeparateSymbols("ready...")[1]);
echo "<br>";
print_r(testSeparateSymbols("ready...")[2]);