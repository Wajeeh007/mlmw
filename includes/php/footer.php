<footer class="row text-align-center">
<div class="col-md-2 col-md-offset-1 col-sm-3 col-sm-offset-1 col-xs-offset-4">
<ul class="no_bullet">
<li>Learn More</li>
<li><a href="#"><span class="glyphicon glyphicon-home"> Home</span></a></li>
<li><a href="#"><span class="glyphicon glyphicon-phone-alt"> Call</span></a></li>
<li><a href="#"><span class="glyphicon glyphicon-arrow-up"> Up</span></a></li>
</ul>
</div>
<div class="col-md-2 col-md-offset-2 col-sm-3  col-sm-offset-1 col-xs-offset-4">

<ul class="no_bullet">
<li>About Us</li>
<li><a href="#"><span class="glyphicon glyphicon-saved"> Awards</span></a></li>
<li><a href="#"><span class="glyphicon glyphicon-user"> Values</span></a></li>
<li><a href="#"><span class="glyphicon glyphicon-screenshot"> Career</span></a></li>
</ul>
</div>
<div class="col-md-2 col-md-offset-2 col-sm-2 col-sm-offset-1 col-xs-offset-4">

<ul class="no_bullet">
<li>Follow Us</li>
<li><a href="http://www.facebook.com"><img src="img/fb.png"></a></li>
<li><img src="img/twitter.png"></li>
<li><img src="img/google.png"></li>
</ul>
</div>
</footer>

<?php
if(isset($connection)){
mysqli_close($connection);
}
?>