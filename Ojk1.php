<?php
//Indarti Anggraini (12201803)
$ojk=file_get_contents("https://ojk-invest-api.vercel.app/api/illegals");
$ojk1=json_decode($ojk, TRUE);
//echo "<pre>";print_r($ojk);
$table = "<h3>Perusahaan di OJK</h3>";
$table .= "<table border=1>
            <tr><td>No</td>
			    <td>Nama Perusahaan</td>
				<td>Alamat</td>
				<td>Telephone</td>
				<td>Tipe</td>
				<td>Web</td></tr>";
for($i=0;$i<count($ojk1["data"]["illegals"]);$i++){

    if (empty($ojk1["data"]["illegals"][$i]["number"]))
    {
        $telepon = null;
    } 
    else for($a=0;$a<count($ojk1["data"]["illegals"][$i]["number"]);$a++)
    {
        $telepon = $ojk1["data"]["illegals"][$i]["number"][$a];
    }

    if (empty($ojk1["data"]["illegals"][$i]["urls"]))
    {
        $web = null;
    } 
    else for($b=0;$b<count($ojk1["data"]["illegals"][$i]["urls"]);$b++)
    {
        $web = $ojk1["data"]["illegals"][$i]["urls"][$b];
    }

	$no=$i+1;
	$table .= "<tr>
                <td>{$no}</td>
			    <td>{$ojk1["data"]["illegals"][$i]["name"]}</td>
				<td>{$ojk1["data"]["illegals"][$i]["address"]}</td>
				<td>{$telepon}</td>
				<td>{$ojk1["data"]["illegals"][$i]["type"]}</td>
				<td>{$web}</td>
				</tr>";
}
$table .= "</table>";
echo $table;				
?>