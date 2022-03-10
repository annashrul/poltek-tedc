<?php include 'header.php'; ?>
<?php include 'topbar.php'; ?>
<?php include 'sidebar.php'; ?>
	<!-- ============================================================== -->
<!-- Start right Content here -->
<!-- ============================================================== -->
<div class="content-page">
	<!-- Start content -->
	<div class="content">
		<div class="container">
			<!-- Page-Title -->
			<div class="row">
				<div class="col-sm-12">
                    <ol class="breadcrumb pull-right">
                        <li><a href="#"><?=$site["name"]?></a></li>
                        <li class="active"><?=$title?></li>
                    </ol>
				</div>
			</div>
			<!-- Start Content -->
			<?php $this->load->view('bo/pages/'.$content); ?>
			<!-- End Content -->
		</div> <!-- container -->
	</div> <!-- content -->
	<footer class="footer text-right">
		<?=date("Y"); ?> © <?=$site["name"]?>.
	</footer>
</div>
<?php include 'footer.php'; ?>