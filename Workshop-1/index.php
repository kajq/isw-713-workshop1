<?php
if(isset($_POST['submit']))
{
    echo "<meta http-equiv='refresh' content='0'>";
}

$data = json_decode( file_get_contents('https://dog.ceo/api/breeds/image/random'), true );
echo  "<img src=". $data['message'] ." width='500' height='400'>";
?>
<form method="post" action="">
   <br />
   <input type="submit"  value=" Update "  id="update_button"  class="update_button"/>
</form>