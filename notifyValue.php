<?php 
define('BASEPATH', true);

?>

<!DOCTYPE html>
<head>
<style>
 .red {
    background-color:red!important;
}
 .blue {
    background-color: #337ab7!important;
}

</style>
<link href="../../dist/css/bootstrap.min.css" rel="stylesheet">
<script src="https://ajax.aspnetcdn.com/ajax/jQuery/jquery-3.1.1.min.js"></script>
<script>

var old_count = 0;
setInterval(function(){    
    $.ajax({
        type : "POST",
        url : "getValue.php",
        success : function(data){
            if (parseFloat(data) != old_count) {
               document.getElementById("number").innerText=data;
                console.log('new records: '+data);
                old_count = data;
            }
            if(data!=0){
                $("a#indicator").removeClass("blue");
                $("a#indicator").addClass("red");
            }
            if(data==0){
                $("a#indicator").removeClass("red");
                $("a#indicator").addClass("blue");
            }
        }
    });
},5000);

</script>
</head>

<ul  class="nav nav-pills " role="tablist">
    <li  role="presentation" class="active"><a id="indicator"href="#" class="blue">Unlocks: <span id="number"class="badge">0</span></a></li>
</ul>

</html>