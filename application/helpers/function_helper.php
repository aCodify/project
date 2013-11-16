<?php  

/**
*
* Block comment
*
**/
function call_strtotime()
{
	return strtotime( date( 'Y-m-d' ) );
}


/**
*
* Block comment
*
**/
function conversion_time( $info = '' ) 
{
	if ( empty( $info )  ) 
	{
		return '';
	}

	$date = date( 'Y-m-d' , $info );
	return getDateFull( $date );
}


/**
*
* Block comment
*
**/
function set_time_to_strtotime( $time , $tag = '/' )
{
	if ( empty( $time ) ) 
	{
		// echo "this time is empty";
		// die();

		return date( 'Y-m-d' );
	}

	$array_time = explode( $tag , $time );
	return $array_time[2].'-'.$array_time[1].'-'.$array_time[0];

}
	


//------------------------------------------------------------------------
/**
 * truncate text to a specific length
 *
 * @param String $string
 * @param Integer $limit
 * @param String $suffix
 * @return String truncated string
 */
function limit_text($string, $limit, $suffix = '&hellip;')
{
	if (mb_strlen($string, 'UTF-8') > $limit)
	{
		$string = mb_substr($string, 0, $limit, 'UTF-8') . $suffix;
	}
	
	return $string;
}

/**
*
* Block comment
*
**/
function getDateFull($myDate, $Lang='th'){
	if($Lang=='th'){

		$myDateArray=explode("-",$myDate);
		if ($myDateArray[1] == 00) {
			return false;
		}
		$myDay = sprintf("%d",$myDateArray[2]);
		switch($myDateArray[1]) 
		{
			case "01" : $myMonth = "มกราคม";  break;
			case "02" : $myMonth = "กุมภาพันธ์";  break;
			case "03" : $myMonth = "มีนาคม"; break;
			case "04" : $myMonth = "เมษายน"; break;
			case "05" : $myMonth = "พฤษภาคม";   break;
			case "06" : $myMonth = "มิถุนายน";  break;
			case "07" : $myMonth = "กรกฎาคม";   break;
			case "08" : $myMonth = "สิงหาคม";  break;
			case "09" : $myMonth = "กันยายน";  break;
			case "10" : $myMonth = "ตุลาคม";  break;
			case "11" : $myMonth = "พฤศจิกายน";   break;
			case "12" : $myMonth = "ธันวาคม";  break;
		}
		$myYear = sprintf("%d",$myDateArray[0])+543;
        return($myDay . " " . $myMonth . " " . $myYear);	
	}
}

/**
*
* Block comment
*
**/
function show_date($date_create){
	
	$date_m = explode(' ',$date_create);
	$ex_date = explode('-',$date_m[0]);

	if($ex_date[1] == '01'){
		$month = 'Jan';
	}else if($ex_date[1] == '02'){
		$month = 'Feb';
	}else if($ex_date[1] == '03'){
		$month = 'Mar';
	}else if($ex_date[1] == '04'){
		$month = 'Apr';
	}else if($ex_date[1] == '05'){
		$month = 'May';
	}else if($ex_date[1] == '06'){
		$month = 'Jun';
	}else if($ex_date[1] == '07'){
		$month = 'Jul';
	}else if($ex_date[1] == '08'){
		$month = 'Aug';
	}else if($ex_date[1] == '09'){
		$month = 'Sep';
	}else if($ex_date[1] == '10'){
		$month = 'Oct';
	}else if($ex_date[1] == '11'){
		$month = 'Nov';
	}else if($ex_date[1] == '12'){
		$month = 'Dec';
	}
	 
	echo $month.' '.$ex_date[2];
}

/**
*
* Block comment
*
**/
function preview_error( $info = array() ) 
{

	$html = '';

	if ( ! empty( $info ) ) 
	{
	   	$html .= '<div class="alert alert-error">';
	   	$html .=     '<button class="close" data-dismiss="alert"></button>';

	   	foreach ( $info as $key => $value ) 
	   	{
		   	$html .=     '<strong>Error! </strong>';
		   	$html .=     $value;
		   	if ( end($info) != $value ) 
		   	{
		   		$html .= '<br>';
		   	}

	   	}

	   	$html .= '</div>';
	}

	return $html;
}

/**
*
* Block comment
*
**/
function preview_success() 
{
	$html = '';	
	$html .= '<div class="alert alert-success">';
	$html .= '<button class="close" data-dismiss="alert"></button>';
	$html .= '<strong>Success! </strong>';
	$html .= 'The page has been save success.';
	$html .= '</div>';

	return $html;


}

/**
*
* Block comment
*
**/
function reset_format_date( $date = '' , $info_old = '/' , $info_new = '-' , $format_old = 'd-m-y' , $format_new = 'y-m-d' ) 
{
	$array_date = explode( $info_old , $date );

	$format_old = explode( '-' , $format_old );

	$format_new = explode( '-' , $format_new );

	foreach ( $array_date as $key => $value ) 
	{
		$set[ $format_old[$key] ] = $value ;
	}

	foreach ( $format_new as $key => $value ) 
	{
		$new[] = $set[ $value ];
	}	

	return implode( $info_new , $new );
		
}




/**
*
* Block comment
*
**/
function repair_string( $info = '' , $number = 0 ) 
{
	
	$array_info = explode("-", $info);

	$number++;

	if ( ! empty( $number ) )
	{
		$number = '-'.$number;
	}
	else
	{
		$number = '';
	}

	$string = $array_info[0].$number;

	return $string;
}

/**
*
* Block comment
*
**/
function make_url($string, $length = 0, $separator = '-')
{
	$string = make_plain($string);
	$string = preg_replace('~[^a-z0-9ก-๙\s\-]~iu', '', $string);
	
	if (is_numeric($length) AND $length > 0 AND mb_strlen($string, 'UTF-8') > $length)
	{
		$string = mb_substr($string, 0, $length);
	}
		
	$string = trim($string);
	$string = preg_replace('~\s+~', $separator, $string);
	$string = strtolower($string);
	
	return $string;
}

/**
*
* Block comment
*
**/
function make_plain($string)
{
	$string = strip_tags($string);
	$string = html_entity_decode($string, ENT_QUOTES, 'UTF-8');
	// clean whitespace
	$string = preg_replace('~\s+~', ' ', $string);
	// clean whitespace again for heading and trailing whitespace
	$string = trim($string, ' '.chr(194).chr(160));
	$string = htmlspecialchars($string, ENT_QUOTES, 'UTF-8');
	
	return $string;
}

/**
*
* Block comment
*
**/
function remove_underscore( $string )
{
	$string = str_replace("_", " ", $string );		
	return $string;
}


/**
*
* functon alphanumeric_rand has return random char A-z and 0-9
*
**/
function alphanumeric_rand($num_require=8) {
	$randomstring = '';

	$arr1 = range( 'A' , 'Z');
	$arr2 = range( 'a' , 'z');
	$arr3 = range( '0' , '9');
    $alphanumeric =	array_merge( $arr1 , $arr2 , $arr3 );

	if($num_require > sizeof($alphanumeric)){
		echo "Error alphanumeric_rand(\$num_require) : \$num_require must less than " . sizeof($alphanumeric) . ", $num_require given";
		return;
	}

	// set string
	$randomstring = '';
	for ( $i=0; $i < $num_require; $i++ ) 
	{ 
		$index_arr = array_rand( $alphanumeric );
		$randomstring .= $alphanumeric[$index_arr];
	}

	return $randomstring;
}


?>