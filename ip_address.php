<?php
/** 
 * Get the number of netmask bits from a netmask in presentation format 
 * 
 * @param string $netmask Netmask in presentation format 
 *  
 * @return integer Number of mask bits 
 * @throws Exception 
 */ 
function netmask2bitmask($mask)
{
	try{
		if($mask != null){
			//validate if the $mask is IPV4 
			if(filter_var($mask, FILTER_VALIDATE_IP, FILTER_FLAG_IPV4)){
				//get the cidr of the IPV4 Netmask
				//converting  the typed mask to ip2long variable
				$iplong = ip2long($mask);
				$ipbase = ip2long('255.255.255.255');
				$bit =  32-log(($iplong ^ $ipbase)+1,2);
			}
			//validate if the $mask is IPV6
			if(filter_var($mask, FILTER_VALIDATE_IP, FILTER_FLAG_IPV6)){
				//get the cidr of the IPV6 Netmask
				//convert the netmask in binary 
				$binaryNum = '';
				foreach (unpack('C*', inet_pton($mask)) as $byte) {
					$binaryNum .= str_pad(decbin($byte), 8, "0", STR_PAD_LEFT);
				}
				//the convert the binary to a bit
				$bit = base_convert(ltrim($binaryNum, '0'), 2, 10);
				//echo bindec('111010').'</br>';				
			}
		}
		else{
			throw new exception('There`s nothing to validate...');	
		}
		return $bit;	
	}
	catch(Exception $e){
		echo 'Caught exception: ',  $e->getMessage(), "\n";
	}
}
?>