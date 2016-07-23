<?php
/*
Template Name: Completed Project
*/
?>
<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri().'/style.css'?>" />
<link rel="stylesheet" type="text/css" href="<?=get_template_directory_uri().'/css/style.css'?>" />
<title>Completed Projects</title>
<style>
.completed_projects_title{
	font-family: 'Chewy',cursive !important;
}
.block {
    padding: 9px;
    box-shadow: -1px -1px 8px #ccc;
    height: 235px;
    margin-bottom: 24px;
    font-family: 'Chewy',cursive;
    position: relative;
}
.title a{
	color:#000;
	font-size: 18px
}

</style>
<?php
$data=query_posts('post_type=markers', 'posts_per_page=12'); 
  $data = get_posts(array(
	'post_type' => 'markers',
	'posts_per_page' => -1,
	'post_status' => 'publish',
   
  ));
  ?>
<div class="maps_page_top_bar">
 <div class="text-center"><a href="/">Back To Home </a></div>
</div>
<div class="container">
	<div class="row">
		<div class="col-xs-12 text-center">
			<br/>
			<h1 class="completed_projects_title">Completed Projects</h1>
		</br>
		</div>
	</div>
  	<div class="row">
  		<?php foreach ($data as $key => $value): ?>
  		<div class="col-md-3">
   			<div class="block">
   				<div class="black_overlay"></div>
   				<div class="img-box">
   					<div class="title">
   						<a href="<?=get_post_permalink($value->ID)?>"><?=$value->post_title?></a>
   					</div>
   					<div class="post-image">
   						<a href="<?=get_post_permalink($value->ID)?>"><?=$value->post_content?></a>
   					</div>
   				</div>
   			</div>		
  		</div>
  		<?php endforeach;?>	
  	</div>
</div>
