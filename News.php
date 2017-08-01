<!DOCTYPE html>
<!--[if IE 8 ]><html class="no-js oldie ie8" lang="en"> <![endif]-->
<!--[if IE 9 ]><html class="no-js oldie ie9" lang="en"> <![endif]-->
<!--[if (gte IE 9)|!(IE)]><!--><html class="no-js" lang="en"> <!--<![endif]-->
<head>

   <!--- basic page needs
   ================================================== -->
   <meta charset="utf-8">
	<title>Abstract</title>
	<meta name="description" content="">  
	<meta name="author" content="">

   <!-- mobile specific metas
   ================================================== -->
	<meta name="viewport" content="width=device-width, initial-scale=1, maximum-scale=1">

 	<!-- CSS
   ================================================== -->
   <link rel="stylesheet" href="css/base.css">
   <link rel="stylesheet" href="css/vendor.css">  
   <link rel="stylesheet" href="css/main.css">
        

   <!-- script
   ================================================== -->
	<script src="js/modernizr.js"></script>
	<script src="js/pace.min.js"></script>

   <!-- favicons
	================================================== -->
	<link rel="shortcut icon" href="favicon.ico" type="image/x-icon">
	<link rel="icon" href="favicon.ico" type="image/x-icon">

</head>

<body id="top">

	<!-- header 
   ================================================== -->
   <header class="short-header">   

   	<div class="gradient-block"></div>	

   	<div class="row header-content">

   		<div class="logo">
	         <a href="index.html">Author</a>
	      </div>

	   	<nav id="main-nav-wrap">
				<ul class="main-navigation sf-menu">
					<li ><a href="index.php" title="">Entertainment</a></li>									
					<li class="current"><a href="News.php" title="">News</a></li>
					<li><a href="sports.php" title="">Sports</a></li>	
					<li><a href="science.php" title="">Science</a></li>										
				</ul>
			</nav> <!-- end main-nav-wrap -->

		

		
   		
   	</div>     		
   	
   </header> <!-- end header -->


   <!-- masonry
   ================================================== -->
   <section id="bricks">

   	<div class="row masonry">

   		<!-- brick-wrapper -->
         <div class="bricks-wrapper">

         	<div class="grid-sizer"></div>

         	

         <?php
			
			
			require_once('TwitterAPIExchange.php');
			error_reporting(0);
$settings = array(
    'oauth_access_token' => "<Enter here>",
    'oauth_access_token_secret' => "<Enter here>",
    'consumer_key' => "<Enter here>",
    'consumer_secret' => "<Enter here>"
);

$url = "https://api.twitter.com/1.1/search/tweets.json";
$requestMethod = "GET";
$getfield = '?q=news&src=typd&count=20';
$twitter =new TwitterAPIExchange($settings);
$string = json_decode($twitter->setGetfield($getfield)
->buildOauth($url, $requestMethod)
->performRequest(),$assoc = TRUE);
/*if($string["errors"][0]["message"] != "") {echo "<h3>Sorry, there was a problem.</h3><p>Twitter returned the following error message:</p><p><em>".$string[errors][0]["message"]."</em></p>";exit();}*/
foreach($string as $item)
    {
	foreach($item as $items){
  	
    
echo '
         	<article class="brick entry format-standard animate-this">

               <div class="entry-thumb">
                  
               </div>

               <div class="entry-text">
               	<div class="entry-header">

               		<div class="entry-meta">
               						
               		</div>

               		<h1 class="entry-title">Tweeted by: '.$items['user']['name'].'</h1>
					<h5>Screen Name:'.$items['user']['screen_name'].'</h5>
					<h5 >Followers:'.$items['user']['followers_count'].'</h5>
					<h5>Friends:'. $items['user']['friends_count'].'</h5>
					<h5>Listed:'.$items['user']['listed_count'].'</h5>
					
               		
               	</div>
						<div class="entry-excerpt">
							'. $items['text'].'
						</div>
               </div>

        		</article>'; 
	}}?>

         

         </div> <!-- end brick-wrapper --> 

   	</div> <!-- end row -->

   	

   </section> <!-- end bricks -->

   
  

  

   <!-- Java Script
   ================================================== --> 
   <script src="js/jquery-2.1.3.min.js"></script>
   <script src="js/plugins.js"></script>
   <script src="js/jquery.appear.js"></script>
   <script src="js/main.js"></script>

</body>

</html>
