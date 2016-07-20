<?php
	$userName = $account->userName();
?>
<div>
	<ul class="user-menu">
        <li class="dropdown pull-right">
            <a href="#" class="dropdown-toggle" data-toggle="dropdown"><span class="glyphicon glyphicon-user"></span> <?php echo $userName;?> <span class="caret"></span></a>
            <ul class="dropdown-menu" role="menu">
                <li><a href="ProfilePage"><span class="glyphicon glyphicon-user"></span> Profile</a></li>
                <li><a href="AccountPage"><span class="glyphicon glyphicon-usd"></span> Account</a></li>
                <li><a href="logout"><span class="glyphicon glyphicon-log-out"></span> Logout</a></li>
            </ul>
        </li>   
	</ul>
</div>	