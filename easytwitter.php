<?php
/*
Plugin Name: EasyTwitter
Plugin URI: http://www.jimblogger.com/projects/easytwitter
Description: Provides a super easy way to add twitter information to your blog. No javascript needed.
Version: 1.4
Author: Jim Blogger
Author URI: http://www.jimblogger.com
License: GPL2
*/

function getFollowerCount($twitter_user)
{
 $et = new EasyTwitter($twitter_user);
 return $et->followers_count();
}

class EasyTwitter
{

private $api_call;
private $results;
 //print_r($results,false);


function EasyTwitter($username){
   $this->api_call = 'http://twitter.com/users/show/'.$username.'.json';
   $this->results = json_decode(file_get_contents( $this->api_call ));
}

public function debug(){
echo $this->name();
echo $this->url();
echo $this->status_text();
echo $this->friends_count();
echo $this->followers_count();
echo $this->description();
echo $this->profile_image_url();
echo $this->location();
}

public function retweet_count(){
	return $this->results->{'retweet_count'};
}

public function name(){
	return $this->results->{'name'};
}

public function url(){
	return $this->results->{'url'};
}

public function status_text(){
	return $this->results->{'status'}->{'text'};
}

public function friends_count(){
	return $this->results->{'friends_count'};
}


public function followers_count(){
	return $this->results->{'followers_count'};
}


public function description(){
	return $this->results->{'description'};
}


public function profile_image_url(){
	return $this->results->{'profile_image_url'};
}

public function location(){
	return $this->results->{'location' };
}


}

?>

