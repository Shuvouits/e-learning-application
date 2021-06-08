<?php 
/* 
| Developed by: Tauseef Ahmad
| Last Upate: 01-19-2021 08:45 PM
| Facebook: www.facebook.com/ahmadlogs
| Twitter: www.twitter.com/ahmadlogs
| YouTube: https://www.youtube.com/channel/UCOXYfOHgu-C-UfGyDcu5sYw/
| Blog: https://ahmadlogs.wordpress.com/
 */ 

session_start();

$con = mysqli_connect('localhost','root','','elearning');
if($con){

	//echo "connected";
	
}else{
	echo "Not Connected";
}


$topics = session()->get('topics');
$password = session()->get('password');
$meeting_email = session()->get('meeting_email');
$course = session()->get('course');
$meeting_duration = session()->get('meeting_duration');
$api_key = session()->get('api_key');
$api_secret = session()->get('api_secret');
$api_url = session()->get('api_url');

echo $topics;
echo "<br>";
echo $password;
echo "<br>";
echo $meeting_email;
echo "<br>";
echo $course;
echo "<br>";
echo $meeting_duration;
echo "<br>";
echo $api_key;
echo "<br>";
echo $api_secret;
echo "<br>";
echo $api_url;
 
 
include_once 'Zoom_Api.php';

$zoom_meeting = new Zoom_Api();

$data = array();
$data['topic'] 		= $topics;
$data['start_date'] = date("Y-m-d h:i:s", strtotime('tomorrow'));
$data['duration'] 	= $meeting_duration;
$data['type'] 		= 2;
$data['password'] 	= $password;

try {
	$response = $zoom_meeting->createMeeting($data);
	
	//echo "<pre>";
	//print_r($response);
	//echo "<pre>";

	$meeting_id = $response->id;
	$owner_id = $response->host_email;
	$meeting_topic = $response->topic;
	$meeting_url = $response->join_url;
	$meeting_password = $response->password;
	$start_time = $response->start_time;

	$insert_data = "INSERT INTO zooms (meeting_id,owner_id,meeting_topic,meeting_url,meeting_password,start_time,course_name) VALUES ('$meeting_id','$owner_id','$meeting_topic','$meeting_url','$meeting_password','$start_time', '$course')";
  	$run_data = mysqli_query($con,$insert_data);

	if($run_data)
	{
		header("Location: http://127.0.0.1:8000/zoom_meeting"); 
		exit();

	}else{
		echo "Data Is Not Inserted";
	}

	 
	
	echo "Meeting ID: ". $response->id;
	echo "<br>";
	echo "Topic: "	. $response->topic;
	echo "<br>";
	echo "Join URL: ". $response->join_url ."<a href='". $response->join_url ."'>Open URL</a>";
	echo "<br>";
	echo "Meeting Password: ". $response->password;

	
    
	
} catch (Exception $ex) {
    echo $ex;
}


?>