<?php
/*
Plugin Name: EasyTwitter
Plugin URI: http://wordpress.org/extend/plugins/easytwitter/ 
Description: Provides a super easy way to add twitter information to your blog. No javascript needed. I needed a way to add twitter info to my wordpress templates so I wrote this. This is an API and not meant to be used as a stand alone plugin. You'll need to know basic PHP Object Oriented programmign to use this library.  Developed by: <a href="http://www.techburnett.com">Jim Burnett</a>
Version: 1.9.1 
Author: Jim Burnett 
Author URI: http://www.techburnett.com
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


function EasyTwitter($username){
   $this->api_call = 'http://twitter.com/users/show/'.$username.'.json';
   $this->results = json_decode(file_get_contents( $this->api_call ));
}

public function debug(){
echo $this->name();
echo $this->time_zone();
echo $this->url();
echo $this->status_text();
echo $this->friends_count();
echo $this->followers_count();
echo $this->description();
echo $this->profile_image_url();
echo $this->location();
}

public function time_zone(){
	return $this->results->{'time_zone'};
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
