# Change Log
Team membership: Daniel Capacio (Captain), Hansol Lee (Mate)  
Team conventions: Allman notation  
Changelog format: [Markdown](https://github.com/adam-p/markdown-here/wiki/Markdown-Cheatsheet)  
Additions: Newest last  
Date format: YYYY-MM-DD

## 2017-10-12  
- Inital project setup  
- Added a task model specifying table and column in constructor  
- Pre-loaded the task model in autoload  
- Base controller tweaking
- Added Homepage detail
- Setup second template  
- Created views controller to interact with secondary template  
- Fleshed out prioritized view  
- Fleshed out categorized view  
- Added a markdown processor
- Wrote a help wanted ad
- Added Helpme Controller
- Processed the markdown  

## 2017-10-19  
- Fixed class name to reflect Bootstrap2  
- Made the Maintenance page
- Added itemlist view to show Basic item list
- Added Mtce controller 
- Added oneitem view to show Individual item view fragments
- Item page extraction  
- Added pagination  
- Added Simple User Roles
- Defined Our User Roles in constants.php
- Added the user role to the navbar
- Added the role switching controller
- Made the owner role visible on the maintenance page
- Make the task list into a form
- Start completion handling
- Add checkboxes
- Fixed duplicate table list in itemlist view
- Added Role-specific maintenance list
- Added New item button in itemadd.php
- Added Make the Task ID a link in oneitemx view
- Fixed bug in App model  
- Added task validation rules  
- Added add and edit functions to maintenance controller  
- Display TODO item being worked with  
- Fixed Memory_Model bug  
- Handle canceling edit  
- Handle task deletion  
- Made size, group, and status form field
- Edited itemedit view  

## 2017-11-02  
- Built the Task entity class, with setter methods for each task property  
- Added tests folder to repo  
- Added bootstrap file to the newly created tests folder  
- Added phpunit.xml.dist to the root of the project  

## 2017-11-03  
- Refactored task entity class setter methods  
- Changed mtce controller name to Mtce
- Added TaskTest class to verify that your task entity accepts property values
- Edit task model  

## 2017-11-04  
- Added a TaskListTest class to verify that your collection of tasks  
- Run and pass the unit tests  
- Code coverage report logging  
- Added reports subfolder to .gitignore  
- Added .travis.yml to the root directory  

## 2017-11-16  
- Created a tasks.xml document to hold the same kind of data as our existing CSV file  
- Created initial XML_Model.php with load() function to populate record objects from tasks.xml  

## 2017-11-17
- Replace the store() logic in your model with code to rebuild the collection as a SimpleXMLElement, and save it

## 2017-12-01
- Removed xml file containing todo items in data folder  
- Added package restful and third_party to autoload  
- Added server configuration settings to model Tasks.php  
- Curl, format, rest added to autoload  
- Added store method
- Added get method  
- Added delete method  
- Added update method  
- Added add method  
- Added load method  
- Fixed previous crud methods  
