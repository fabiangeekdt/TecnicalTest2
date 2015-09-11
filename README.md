# TecnicalTest2
  <ul>
    <li>Fixed Bugs</li>
    <li>New functions implemented(netmas2bits)</li>
    <li>Develop the features of the Website according to client's requeriments</li>
  </ul>
  
# Comments and Descriptions

<ul>
  <li><b>Defect Discovery and Solution One:</b> 
    </br>
      <b>File: Host.php</b>
    </br>
      <b>Comment:</b>The defect was that the query was doing a inner join between this two tables: "credentials" and "hosts" 
      so it's result was the records that match this condition "hos.credential_id = cre.credential_id"
      According to the defect discovery context, it is possible to add them now, but the previous 
      select was not capable to show all the results
      with this solution the select is capable to show the records that match and those that doesn't.
    </br></br>
      <b>File: Host.php</b>
    </br>
      <b>Comment:</b>I would not declare this variable as static and also i would erase the validation located at the next line.
      static $result;                
      if (!empty($result)) return $result;
      Why?, its quite simple; the static variable "result", its holding the result of the query for the
      program life's time execution, making th value of the variable unique while the program is running as consecuence
      the program will return the same result of the query, once and once again.
    </br></br></br>  
  </li>
  <li><b>Defect Discovery and Solution Two:</b>
    </br>
      <b>File:</b> index.html
    </br>
      <b>Comment:</b>
      Doing the debug in mozilla firefox i realize that the variable responseJSON is empty
      so i decide to change the header for receiving an application/xml instead of application/JSON
      and receive the request as req.responseXML, then i do a loop in the etElementsByTagName("host")
      and find the childnodes that contains all the data to show.
  </li>
</ul>

</br>
<b><i>You also can find alld these comments in the code.</i></b>
