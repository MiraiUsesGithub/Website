<<!DOCTYPE html>
<html>
<body>

<h2>Bad Calculator</h2>

<div id="juan">

<p id="demo">Is 1 + 1 = 3?</p>

<button type="button" onclick="buttonpressone()" id="first">Yes</button>

</div>

<script>
var btn = document.createElement("button");
function buttonpressone() {
  document.getElementById("demo").innerHTML = "Correct";
  btn.innerHTML = "Retry?";
  btn.type = "button";
  btn.setAttribute("onclick","buttonpresstwo()");
  btn.style.backgroundColor = "green";
  document.body.appendChild(btn);
  document.getElementById("juan").appendChild(btn);
}
function buttonpresstwo() {
  document.getElementById("demo").innerHTML = "Is 1 + 1 = 3?";
  btn.remove();
}
</script>

<style>

body{
  background-color:rosybrown;
}

h2{
  text-align: center;
}

#first{
  text-align: center;
  background-color: crimson;
}

#juan{
  text-align: center;
}






</style>

</body>
</html> 
