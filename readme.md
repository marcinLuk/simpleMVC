# Simple MVC
Simple MVC Framework

## Table of contents
* [General info](#general-info)
* [Technologies](#technologies)
* [Setup](#setup)
* [Examples of use](#Examples-of-use)

## General info
This project is a simple MVC framework
	
## Technologies
Project is created with:
* PHP version 7.4.1
	
## Setup
To run this project, download or clone it.
You need to change database configuration in config.php to work properly.  

## Launch
1. Create a new file in app/controllers (it must contain index() method, this will be the first method that will be automatically loaded) 
2. Create a new model in app/model 
3. Create a new folder in app/views ( name of the folder must be equal to the controller name )
4. Add new views in the created folder, the name of the view must end at .html.php. To displays additional data ( results from database etc. ) you need to pass an array as the second argument in get_view() method in the controller. You can display data in view file with $display array; 
5. Home is default home page, without it page won't work properly   
