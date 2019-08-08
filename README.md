# CPA-Funding-Application-System
## Team Members: 
	1. Jimish Thakkar - Full-Stack Developer
	2. Kathleen Dunn - Full-Stack Developer
	3. drphamwit - Developer
# Project Description
 ## What?
 	This project is to create a webpage for the City of Boston Community Preservation Act to make the already existing funding application system into its own webpage and improve on what already exists and add features that make it easier for both applicants and reviewers.
## What is Being Used?
### Front End:
	- HTML
	- CSS
	- JavaScript
### Back End:
	- MySQL
	- PHP
### Tools:
	- Git/GitHub
	- XAMPP
	- Sublime 3
## Deliverables:
	1) CPA Funding Webpage
	2) User Management
		a) User Account Features
			- A user creates a new account
			- A user logs into the system using the account created in 1
			- A user edits the account infromation
	3) Application Management
		a) Application Submission Features
			- An applicant creates a new application
			- An applicant opens/fills out application forms
			- An applicant edits/saves/deletes/withdraws/submits an application
			- An applicant uploads files for an application
		b) Application Review Features
			- A manager assigns reviewers for an application
			- A manager sets application staus
			- A manager sees feedback from reviewers
			- A reviewer see review feedback
			- A reviewer accepts/rejects a review request
			- A reviewer edits/saves/submits feedback
		c) Reporting Features (if time allows)
			- A manager generates reports on an application
			- A reviewer downloads accumulated reports on an application for review
	4) Documentation and Testing
## Getting Started

### Install:
	1. Go to https://www.sublimetext.com/3 to install Sublime Text 3
		- If you want you can use any other text editor of your choice. Sublime, however is free.
	2. Go to https://www.apachefriends.org/index.html to install XAMPP.
		- XAMPP is a free software that helps you host the website on your local machine.
	3. Download the soucre code
	4. Once you have downloaded the source code file,
		- Open Folders
		- Click on Local Disk (C:)
		- Click on xampp folder
		- Open the htdocs folder
		- Delete everything in that folder
		- Once you have deleted everything, Create a new folder and name it SeniorProject (Or anything you like).
		- Drag all the source files that you downloaded into the new folder you created in htdocs.
	5. Now go back to the xampp folder and scroll all the way down until you see xampp-control.exe
	6. Open xampp-control.exe
	7. Once you open the program:
		- Click Start next to Apache
		- Click Start next to MySQL
	8. To test if everything is working.
		- Open up any internet browser.
		- In the URL, type 'localhost'
		- You should see a link called SeniorProject/ (Or the name of the folder you created in htdocs)
		- Click on that link
		- Once you click, it should bring you to Login or Registration Page of Community Preservation Website.
		- This means you have successfully hosting the website on your local machine.
	9. However you are not done. You will need to create your own database. In order to have the website fully functioning.
	10. In the URL, type 'localhost/phpmyadmin/'
		- Then click on the Database tab.
		- In the Database field, type 'register'. And click Create.
		- Once you created the register database, open it.
		- Then under where it says Create Table, Enter 'users' for the name and enter 9 for the Number of Columns.
		- Enter the following for each row:
			Name:		Type:		Length/Values:
			
			id		INT		6 		(AUTO INCREMENT)
			username	VARCHAR		30
			password	VARCHAR		225
			email		VARCHAR		100
			activated	ENUM		'0', '1'
			avatar		VARCHAR		225
			reset_link	VARCHAR		2555
			join_date	TIMESTAMP	
			role		ENUM		'user', 'admin'
		
		- Then click on Save
	11. Create anoter Database
		- In the Database field, type 'form'. And click Create.
		- Once you created the form database, open it.
		- Then under where it says Create Table, Enter 'eform' for the name and enter 61 for the Number of Columns.
		- Enter the following for each row:
			Name:				Type:		Length/Values:
			
			id				INT		11		(AUTO INCREMENT)
			eStatus				VARCHAR		50
			email				VARCHAR		100
			projectName			VARCHAR		50
			shortProjectDescription		VARCHAR		1000
			projectStreetAddress		VARCHAR		200
			projectNeighborhood		VARCHAR		200
			projectZip			VARCHAR		5
			applicantOrg			VARCHAR		100
			contactPersonTitle		VARCHAR		100
			phoneNumber			VARCHAR		10
			amountRequested			VARCHAR		10
			totalProjectCost		VARCHAR		10
			fundingNeed			VARCHAR		1000
			fundingSources			VARCHAR		200
			checkfundingRequest		VARCHAR		200
			constructionDesign		VARCHAR		250
			propertyOwner			VARCHAR		50	
			uploadAgreement			VARCHAR		50
			expectedStartDate		VARCHAR		10
			expectedCompleteDate		VARCHAR		10
			pickCategory			VARCHAR		50
			yourProject			VARCHAR		200
			intendedUsers			VARCHAR		250
			generalPublic			VARCHAR		250
			masterPlan			VARCHAR		250
			maintenance			VARCHAR		50
			historicLandscape		VARCHAR		50
			publicArt			VARCHAR		50
			cStatus				VARCHAR		50
			cEmail				VARCHAR		200
			cProjectName			VARCHAR		50
			cProjectNeighborhood		VARCHAR		100
			cProjectZip			VARCHAR		5
			cApplicantOrg			VARCHAR		50
			cContactPersonTitle		VARCHAR		50
			cPhoneNumber			VARCHAR		10
			cPickCategory			VARCHAR		100
			cAmountRequested		VARCHAR		10
			cTotalProjectCost		VARCHAR		10
			cShortProjectDescription2	VARCHAR		1000
			cProjectSummary			VARCHAR		250
			cNeedsAssessment		VARCHAR		200
			cProjectTimeline		VARCHAR		200
			cExperienceCapacity		VARCHAR		200
			cOrganizationalPlan		VARCHAR		200
			cPublicBenefit			VARCHAR		200
			cCommunitySupport		VARCHAR		200
			cSustainability			VARCHAR		200
			cProjectGoals			VARCHAR		200
			cBudgetExplanation		VARCHAR		200
			cUploadPropertyControl		VARCHAR		200
			cUploadCouncilSupport		VARCHAR		200
			cUploadCommunitySupport		VARCHAR		200
			cUploadAppearance		VARCHAR		200
			cUploadDesign			VARCHAR		200
			cUploadResult			VARCHAR		200
			cUploadBudget			VARCHAR		200
			cUploadIRS			VARCHAR		200
			cUploadProfit			VARCHAR		200
			cUploadBalance			VARCHAR		200
		
		- Then click on Save
### Run:
	- In order to run the application, Open up any Internet Browser.
	- In the URL, type 'localhost'
	- Click on the link Senior Project (Or whatever you named the folder in htdocs)
	- You should be able to successfully run the program. If you get errors, then please check the Database to see if the fields 		names match your Database.
## Featurs:
	Users Page Features
		1. User Login / User Registration
		2. Create New Eligibility Form
		3. View Submitted Eligibility Form
		4. Once Admin Approves Eligibilit Form, Create CPA Form
		5. View Submitted CPA Form
		6. View the status for both Eligibility Form and CPA Form
	Admin Page Features
		1. View all submitted forms
		2. Approve or Reject Eligibility Forms
		3. Approve or Reject CPA Forms
		4. View all forms in a PDF Format in order to print.
		
## Demo Video
	- https://www.youtube.com/watch?v=Pr-JMqTkdEM

Senior Project, Summer 2019
Wentworth Institute of Technology
