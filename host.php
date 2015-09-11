<?php
include 'db.php';

class Host
{
    public static function getList($only_active = false)
    {
        //Defect Discovery and Solution One
        /*i would not declare this variable as static and also i would erase the validation located at the next line.
        static $result;                
        if (!empty($result)) return $result;
        Why?, its quite simple; the static variable "result", its holding the result of the query for the
        program life's time execution, making th value of the variable unique while the program is running as consecuence
        the program will return the same result of the query, once and once again.        
        */
        $result;                
                
        //Defect Discovery and Solution One
        /*the defect was that the query was doing a inner join between this two tables: "credentials" and "hosts" 
        so it's result was the records that match this condition "hos.credential_id = cre.credential_id"
        According to the defect discovery context, it is possible to add them now, but the previous 
        select was not capable to show all the results
        with this solution the select is capable to show the records that match and those that doesn't*/
        $stmt = "SELECT
                    hos.host_id,
                    hos.host_name,
                    hos.ip_address,
                    cre.username
                 FROM
                    hosts hos left outer join
                    credentials cre
                    on hos.credential_id = cre.credential_id
                 WHERE
                   hos.deleted = 0";
        if ($only_active === true) {
            $stmt .= " AND hos.active = 1";
        }
        
        $result = DB::getAll($stmt);
        //echo "<pre> stmt".print_r($stmt, true)."</pre>";
        //echo "<pre> result</pre>";
        //echo var_dump($result, true);
        
        return $result;
    }
}
?>