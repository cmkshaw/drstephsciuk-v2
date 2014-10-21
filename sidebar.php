<?php
/**
 * The Sidebar containing the main widget area
 *
 * @package WordPress
 * @subpackage Twenty_Fourteen
 * @since Twenty Fourteen 1.0
 */
?>

<?php
ini_set('display_errors', 1);
require_once('inc/twitter-api.php');

/** Set access tokens here - see: https://dev.twitter.com/apps/ **/
$settings = array(
    'oauth_access_token' => "522761495-BOe1b5SbXCjzuocToYDDt8pIoEuhQh05YpIJ09at",
    'oauth_access_token_secret' => "98BIwr32bre8Qi4KjdEoqNApg5iUg6fe37SuUaO0es",
    'consumer_key' => "vMF98tjfOyDnlX9cOCA",
    'consumer_secret' => "qIZ5xYuSi31KWqLZfMckA5GDGZvHq453tYLTqvzmHR0"
);

/** URL for REST request, see: https://dev.twitter.com/docs/api/1.1/ **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$requestMethod = 'POST';

/** POST fields required by the URL above. See relevant docs as above **/
$postfields = array(
    'screen_name' => 'stephsciuk', 
    'skip_status' => '1'
);

/** Perform a GET request and echo the response **/
/** Note: Set the GET field BEFORE calling buildOauth(); **/
$url = 'https://api.twitter.com/1.1/statuses/user_timeline.json';
$getfield = '?screen_name=stephsciuk';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange($settings);
            
         $json = $twitter->setGetfield($getfield)
             ->buildOauth($url, $requestMethod)
             ->performRequest();
             
$twitter_feed = json_decode($json, true);

//var_dump($twitter_feed);
?>

<div id="secondary">
	

	<?php if ( has_nav_menu( 'secondary' ) ) : ?>
	<nav role="navigation" class="navigation site-navigation secondary-navigation">
		<?php wp_nav_menu( array( 'theme_location' => 'secondary' ) ); ?>
	</nav>
	<?php endif; ?>

	<?php if ( is_active_sidebar( 'sidebar-1' ) ) : ?>
	<div id="primary-sidebar" class="primary-sidebar widget-area" role="complementary">
		<?php dynamic_sidebar( 'sidebar-1' ); ?>
	</div><!-- #primary-sidebar -->
	<?php endif; ?>

					<div class="tweet-wrap col-xs-9">
					<ul class="twitter_social">
						<li><a class="twitter" href="https://twitter.com/stephsciuk"><span class="hide">Twitter</span></a></li>
					</ul>
						<a href="https://twitter.com/stephsciuk">
						<?php 
						echo $twitter_feed[0]['text']; 
						?> &ndash;
						<?php
						$date = $twitter_feed[0]['created_at']; 
						echo date("m/d/Y", strtotime($date));
						?>
						</a>
						</div>

	
</div><!-- #secondary -->
