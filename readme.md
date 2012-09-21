### about 

This is DOS ( Denial of Service ) Shield for CodeIgniter ,originally developed by Tweetycoaster and Saturngod . But I wrote as CodeIgniter helper 
in order to useful for CodeIgniter developers .

### History 


During around 2007-09, some of Myanmar sites faced with by some DoS like attacks and some sites are temporatily down by cause of huge CPU usage and bandwidth usage.
All sit admins and developers find out some ways which can escape or prevent to that DoS attack. Actually it's difficult to prevent. It's use ordinary HTTP request and vary IP addresses except
sending forge large packet size. 

###Objectives

to prevent DoS or DDoS attack
to prevent from Traffic Jamming
to prevent Large amount of CPU usage


###How it works

PHP DoS Shield work on a concept of different accessing time by human visitor and bot attacker.
You can set it up minimum average time between one visitor visits and maximum visits in minimum time.
That is main point of this code. No human visitors may never visit 90 times during 30 seconds.
But bot visitors can visit more than that. :-) 
When some bot trip our trigger of time trap, our shied a error 503 header to their request 
and display human readable warning message. If bot was gone shield will automatically remove.
And it will send Alert mesages to site admin as ur setup in source code.
We record attacker's IP in a Log file under Log folder.
We use different error message with PHP brute force detector's 200 message.
We want close connection from current attack and prevent large amount of CPU usage and Traffic flooding.

This program based on a PHP timer code which we collected from web
written by who-we-don't-remember-name. Special thanks to him/her from here !!!



###Usage

First and foremost you may need to put this Littlebaby_helper.php to your project folder ( to be accurate ,  application/helper/ ) . 
Then you may need to  load from autoload.php ( from config/autoload.php )  

$autoload['helper'] = array('littlebaby');

Then complete your setup . otherwise you can call from your constructor or anywhere you wish .  example 

$this->load->helper('littlebaby');


### Credit 


Special thanks to original developers

Tweetycoaster 
Saturngod

