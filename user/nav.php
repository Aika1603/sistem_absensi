<nav class="top1 navbar navbar-default navbar-static-top" role="navigation" style="margin-bottom: 0">
            <div class="navbar-header">
                <button type="button" class="navbar-toggle" data-toggle="collapse" data-target=".navbar-collapse">
                    <span class="sr-only">Toggle navigation</span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                    <span class="icon-bar"></span>
                </button>
                <a class="navbar-brand" href="menu.php"><h4>Sistem Absensi </h4></a>
            </div>
            <!-- /.navbar-header -->
            <ul class="nav navbar-nav navbar-right">
				
			    <li class="dropdown">
	        		<a href="#" class="dropdown-toggle avatar"data-toggle="dropdown"><img src="images/<?php echo $_SESSION["avatar"];?>"><span class="badge">9</span></a>
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
			   <a href="avatar_profil.php?user_name=<?php echo $_SESSION["user_name"]?>"><style> 
 </style><div id="avatar">
<img src="images/<?php echo $_SESSION["avatar"];?>" alt="" style=" 
 height: 105px;
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
                            <a href="datasiswa.php"><i class="fa fa-laptop nav_icon"></i>Data Siswa <?php echo $_SESSION['kelas'];?></a>
                         </li>
						   
						   
                        </li>
                        <li>
                            <a href="dataabsen.php"><i class="fa fa-indent nav_icon"></i>Data Absensi <?php echo $_SESSION['kelas'];?></a>
                            
                            <!-- /.nav-second-level -->
                        </li>
                        <li>
                            <a href="rekapabsen.php"><i class="fa fa-envelope nav_icon"></i>Rekapitulasi <?php echo $_SESSION['kelas'];?></a>
                         
                            <!-- /.nav-second-level -->
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