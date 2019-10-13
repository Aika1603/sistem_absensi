<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu.php"><h4>Sistem Absensi</h4></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar" data-toggle="dropdown"><img src="images/<?php echo $_SESSION["avatar"];?>"><span class="badge">9</span></a>
	        		<ul class="dropdown-menu">
						<li class="dropdown-menu-header text-center">
							<strong>Settings</strong>
						</li>
						<li class="m_2"><a href="profil.php"><i class="fa fa-user"></i> Profile</a></li>
						<li class="m_2"><a href="edit_profil.php"><i class="fa fa-wrench"></i> Settings</a></li>
						<li class="divider"></li>
						<li class="m_2"><a href="#"><i class="fa fa-shield"></i> Lock Profile</a></li>
						<li class="m_2"><a href="logout.php"><i class="fa fa-lock"></i> Logout</a></li>	
	        		</ul>
	      		</li>
			</ul>
			<form class="navbar-form navbar-right">
              <input type="text" class="form-control" value="Search..." onfocus="this.value = '';" onblur="if (this.value == '') {this.value = 'Search...';}">
            </form>
            <div class="navbar-default sidebar" role="navigation">
			
		   	 
                <div class="sidebar-nav navbar-collapse">
			<!--
		   	 	<div class="coffee">
				<div class="coffee-top">
					<a href="#"><img class="img-responsive" src="images/pic4.jpg" alt="">
					<div class="doe">
						<h6>Lorem Ipusm</h6>
						<p>Web Designer</p>
					</div>
					<i></i></a>
				</div>
				
		       </div>
			-->   
			   <div class="down">	
			   <a href="avatar_profil.php?user_id=<?php echo $_SESSION["user_id"]?>"><style> 
 </style><div id="avatar">
<img src="images/<?php echo $_SESSION["avatar"];?>" alt="" style=" 
 height: 100px;
  width: 105px;
  -webkit-border-radius: 50em;
  -moz-border-radius: 50em;
  border-radius: 5em;
  border: 5px solid #c0caff;
  margin-top: 0px;
  margin-bottom: 0px;
  margin-left: 0px;
  position:center;"/></a>
									 
									  <a href="profil.php?user_name=<?php echo $_SESSION["user_name"]?>"><span class=" name-caret"><?php echo $_SESSION["user_name"];?></span></a>
									 <p>Status : <?php echo $_SESSION["user_akses"];?></p>
									<ul>
									<li><a href="profil.php" title="Lihat Detail"><i class="fa fa-user" alt="profil"></i> </a></li><i class="lnr lnr-user"></i></a></li>
										<li><a href="edit_profil.php" title="Pengaturan"><i class="fa fa-wrench"></i> </a></li>
										<li><a href="logout.php" title="Logout"><i class="fa fa-lock"></i> </a></li>
										</ul>
							</div>
							</div>
			   
                    <ul class="nav" id="side-menu">
                        <li>
                            <a href="menu.php"><i class="fa fa-dashboard fa-fw nav_icon"></i>Dashboard</a>
                        </li>
                        <li>
                            <a href="datasiswa.php"><i class="fa fa-laptop nav_icon"></i>Data Siswa<span class="fa arrow"></span></a>
                         <ul class="nav nav-second-level">
							<!-- kelas X -->
							   <li>
						   <a href="#"><i class="fa fa-laptop nav_icon"></i>Kelas X<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="datasiswa.php?kelas=X IPA '.$x.'">X IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="datasiswa.php?kelas=X IPS '.$x.'">X IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
                                </li>
                            <!-- kelas XI-->   
							   <li>
									<a href="#"><i class="fa fa-laptop nav_icon"></i>Kelas XI<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="datasiswa.php?kelas=XI IPA '.$x.'">XI IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XI IPS '.$x.'">XI IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
									
							<!-- kelas XII-->   
							   <li>
									<a href="#"><i class="fa fa-laptop nav_icon"></i>Kelas XII<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XII IPA '.$x.'">XII IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XII IPS '.$x.'">XII  IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
                                </li>
							</li>
						   </ul>
						   
						   
                        </li>
						<li>
                            <a href="dataguru.php"><i class="fa fa-laptop nav_icon"></i>Data Guru</a>
                         </li>
                        <li>
                            <a href="user.php"><i class="fa fa-laptop nav_icon"></i>Manajemen User</a>
                         </li>
						  <li>
                            <a href="kelas.php"><i class="fa fa-laptop nav_icon"></i>Manajemen Kelas</a>
                         </li>
						<li>
                            <a href="dataabsen.php"><i class="fa fa-indent nav_icon"></i>Data Absensi</a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="#"><i class="fa fa-envelope nav_icon"></i>Rekapitulasi<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
							<!-- kelas X -->
							   <li>
									<a href="#"><i class="fa fa-envelope nav_icon"></i>Kelas X<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="rekapabsen.php?kelas=X IPA '.$x.'">X IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="rekapabsen.php?kelas=X IPS '.$x.'">X IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
                                </li>
                            <!-- kelas XI-->   
							   <li>
									<a href="#"><i class="fa fa-envelope nav_icon"></i>Kelas XI<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XI IPA '.$x.'">XI IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XI IPS '.$x.'">XI IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
									
							<!-- kelas XII-->   
							   <li>
									<a href="#"><i class="fa fa-envelope nav_icon"></i>Kelas XII<span class="fa arrow"></span></a>
									<ul class="nav nav-second-level">
										<li>
										<a href="#">Kelas IPA<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=5;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XII IPA '.$x.'">XII IPA '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
										<li>
										<a href="#">Kelas IPS<span class="fa arrow"></span></a>
											<ul class="nav nav-second-level">
												<li>
										<?php
										for($x=1;$x<=3;$x++){
										echo '
										<a href="rekapabsen.php?kelas=XII IPS '.$x.'">XII  IPS '.$x.'</a>
										';};?>
										</li>
											</ul>
												</li>
									</ul>
                                </li>
									
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                        
						<li>
                            <a href="jadwal.php"><i class="fa fa-table nav_icon"></i>Jadwal Mengajar</a>
                        </li>
						
                        <li>
                            <a href="#"><i class="fa fa-sitemap fa-fw nav_icon"></i>Pengaturan<span class="fa arrow"></span></a>
                            <ul class="nav nav-second-level">
                                
                                <li>
                                    <a href="logout.php">Keluar</a>
                                </li>
                            </ul>
                            <!-- /.nav-second-level -->
                        </li>
                    </ul>
                </div>
                <!-- /.sidebar-collapse -->
            </div>
            <!-- /.navbar-static-side -->
        </nav>