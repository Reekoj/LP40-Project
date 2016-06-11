<?php
//header ( 'Content-Type: text/html; charset=utf-8' );

require_once ('TwitterAPIExchange.php');
require_once ('time.php');

/**
 * Set access tokens here - see: https://dev.twitter.com/apps/ *
 */
$settings = array (
		'oauth_access_token' => "736213356932173824-GAjTPrbq9rxTsakXN9PjXAG6OaK2ThS",
		'oauth_access_token_secret' => "UpylTFefIRPnk5SPdLCsEsmtlt4PjLxs3DJASNQyU0M6s",
		'consumer_key' => "sESUvwSRWvc05uj4DwmW8b3sM",
		'consumer_secret' => "igYAWAJnOU0FMACVMvs5kDbkvVtLD6hx19n8dp9sBg5BByOQ0N" 
);
$url = 'https://api.twitter.com/1.1/search/tweets.json';
$getfield = '?q=%23cinema&result_type=popular&count=100';
$requestMethod = 'GET';
$twitter = new TwitterAPIExchange ( $settings );
$strJson = $twitter->setGetfield ( $getfield )->buildOauth ( $url, $requestMethod )->performRequest ();
$arrTweets = json_decode ( $strJson, true );
$cptline = 0;
echo '<aside id="twitteraside"><div class="tweethead" align="center"><a target=\"_new\" href="http://twitter.com"><img src="img/Twitterhashtag.svg.png" /></a></div><div id="twitterdiv">';
foreach ( $arrTweets ["statuses"] as $tweet ) {
	$cptline ++;
	$date = $tweet ['created_at'];
	$img = $tweet ["user"] ['profile_image_url'];
	$time = strtotime ( $date );
	$h_time = human_time_diff ( $time );
	echo '<div><a target="_new" href="http://twitter.com/' . $tweet ["user"] ["screen_name"] . '/status/' . $tweet ["id_str"] . '"><img alt="qsd" class="imgtweet"  align="left" border="0" src="' . $img . '"></a>';
	echo '<span><a  target=\"_new\" href="http://twitter.com/' . $tweet ["user"] ["screen_name"] . '">' . $tweet ["user"] ["name"] . '</a></span> : ';
	if (isset ( $tweet ["retweeted_status"] ))
		echo linkify_tweet ( $tweet ["retweeted_status"] ["text"] ) . "<br/>" . $h_time . "</div>";
	else
		echo linkify_tweet ( $tweet ["text"] ) . "<br/>" . $h_time . "</div>";
	echo '<div id="bottom"><a target=\"_new\" href="http://twitter.com/' . $tweet ["user"] ["screen_name"] . '"><img src="img/follow.png" alt="follow me" class="follow-me" /></a></div>';
	if ($cptline < sizeof ( $arrTweets ["statuses"] ))
		echo '<hr class="linetweet" size="1"> ';
}
echo "</div></aside>";

function linkify_tweet($tweet) {
	// Convert urls to <a> links
	$tweet = preg_replace ( "/([\w]+\:\/\/[\w-?&;#~=\.\/\@]+[\w\/])/", "<br/><a target=\"_new\" href=\"$1\">$1</a>", $tweet );
	// Convert hashtags to twitter searches in <a> links
	$tweet = preg_replace ( "/#([A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\/]*)/", "<a target=\"_new\" href=\"http://twitter.com/search?q=$1\">#$1</a>", $tweet );
	// Convert attags to twitter profiles in <a> links
	$tweet = preg_replace ( "/@([A-Za-z0-9ÀÁÂÃÄÅàáâãäåÒÓÔÕÖØòóôõöøÈÉÊËèéêëÇçÌÍÎÏìíîïÙÚÛÜùúûüÿÑñ\/\_]*)/", "<a target=\"_new\" href=\"http://www.twitter.com/$1\">@$1</a>", $tweet );
	return $tweet;
}
?>