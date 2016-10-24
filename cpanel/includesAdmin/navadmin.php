		<section class="row">
			<div class="col-md-2">
				<div class="logoAdmin">
					<img class="img-responsive" src="../img/logoSF.png">
				</div>
			</div>
			<div class="col-md-10">
				<!-- Single button -->
				<div class="btnadmin">
					<ul class="nav nav-pills">
					    <li class="dropdown">
					        <a href="#" data-toggle="dropdown" class="dropdown-toggle"><i class="fa fa-user faSpace" aria-hidden="true"></i><?php echo $_SESSION['nameuseryaxk'] ?> <b class="caret"></b></a>
					        <ul class="dropdown-menu">
					            <li><a href="../servidor/enviosPost/destroysession.php?useryaxkin=<?php echo $_SESSION['nameuseryaxk'];?>"  onclick=" return confirmaDelete()"><i class="fa fa-sign-out faSpace" aria-hidden="true"></i>Cerrar Sesión</a></li>
					        </ul>
					    </li>
					</ul>
				</div>
			</div>
		</section>
