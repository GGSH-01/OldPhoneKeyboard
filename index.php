<?
include 'form.php';
class PhoneKeyboardConverter {

    private $phoneKeyboardKeys = array(
        
        '2' => 'a',
        '22' => 'b',
        '222' => 'c',
        '3' => 'd',
        '33' => 'e',
        '333' => 'f',
        '4' => 'g',
        '44' => 'h',
        '444' => 'i',
        '5' => 'j',
        '55' => 'k',
        '555' => 'l',
        '6' => 'm',
        '66' => 'n',
        '666' => 'o',
        '7' => 'p',
        '77' => 'q',
        '777' => 'r',
        '7777' => 's',
        '8' => 't',
        '88' => 'u',
        '888' => 'v',
        '9' => 'w',
        '99' => 'x',
        '999' => 'y',
        '9999' => 'z',
        '0' => ' '
        );
   
    public function convertToNumeric($text) {
        $phoneKeyboardKeys=array_flip($this->phoneKeyboardKeys);
        $letters = str_split(strtolower($text));
	foreach ($letters as $letter)
	{
	    if(array_key_exists($letter, $phoneKeyboardKeys)){
			$numbers[]=$phoneKeyboardKeys[$letter];
	    }else{
		return 'error, check your string';
	    }
	}

	return implode(',',$numbers);
    }
    public function convertToString($numbers) {
        $numbers=explode(',',$numbers);
	foreach ($numbers as $number)
	{
		if(array_key_exists($number, $this->phoneKeyboardKeys)){
		$text[]=$this->phoneKeyboardKeys[$number];
		}else{
		return 'error, check your string';
		}
	}
	return implode('',$text);
    }

}


if( isset( $_POST['submit'] ) )  
{
    $phoneKeyboardConverter = new PhoneKeyboardConverter();

    if (preg_match("/^[a-zA-Z_ ]*$/", $_POST['text'])) {
        echo $phoneKeyboardConverter ->convertToNumeric($_POST['text']);
    } elseif(preg_match("/^(?:\d\,?)+$/", $_POST['text'])) {
        echo $phoneKeyboardConverter ->convertToString($_POST['text']);
    } else{
        echo 'error, check your string';
    }
}

?>
