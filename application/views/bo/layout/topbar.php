<style>
    @media only screen and (max-width: 600px) {
        .logo-top-bar {
            margin-left: 300%;
        }
    }
</style>
<!-- Top Bar Start -->
<div class="topbar">
	<!-- LOGO -->
	<div class="topbar-left">
		<div class="text-center">
			<a href="<?=base_url()?>" target="_blank" class="logo logo-top-bar">
                <img style="max-height:30px;" src="<?=base_url().$site["logo"]?>" id="logo-top">
            </a>
		</div>
	</div>
	<!-- Button mobile view to collapse sidebar menu -->
	<div class="navbar navbar-default" role="navigation">
		<div class="container">
			<div class="">
				<ul class="nav navbar-nav navbar-right pull-right">
					
					<li class="dropdown">
						<a href="" class="dropdown-toggle profile" data-toggle="dropdown" aria-expanded="true">
                            <img src="<?=base_url().'assets/'?>images/avatar-1.jpg" alt="user-img" class="img-circle">
                        </a>
						<ul class="dropdown-menu">
							<li><a href="<?=base_url().'backoffice/auth/logout'?>"><i class="md md-settings-power"></i> Keluar</a></li>
						</ul>
					</li>
				</ul>
			</div>
			<!--/.nav-collapse -->
		</div>
	</div>
</div>
<!-- Top Bar End -->

