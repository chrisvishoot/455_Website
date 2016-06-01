Gabrielle Glynn and Chris Vishoot
TCSS 445: Winter 2016
Phase III of Project
Due: March 13, 2015 @ 11:59PM
README.txt

Project Website URL: http://students.washington.edu/glynng/resume_tracker/index.php

Suggested Login Credentials for Testing Different Features:

	User Type:	Recruiter		Job Seeker
	Email:		recruiter1@gmail.com*	seeker1@gmail.com*
	Password:	password		password
	*emails are fictional/we did not create them if they do exist

We setup the above two users, had the recruiter add a couple jobs from their company, and 
the job seeker added a couple links to personal resume sites.

Features:

	Create User
		-two types (recruiter and job seeker)
		-each user has a different homepage format
	Login into Website Securely
		-each password is hashed with $SALT and encryption algorithm
		-you should not be able to view pages that the other type of user can (or those that are not logged in): not fully implemented
		-Account info is displayed at top of homepage
		-Logout
	All Users:
		-Edit certain user info fields
		-Update password
		-Add a favorite resume page (must in database) by pasting the exact url into the form
		-View all the favorite sites you've added so far, updates if you add a new one during your login session
		-Give feedback and comment about a specific url resume page in database (again by pasting url exactly)
		-Search resume pages by email only (other searches would be possible in fully implemented version)
	Recruiter Features:
		-View jobs that your account has added (pulling up every job added, not checking dates yet in sql/php); also cannot select job to view or edit in this version
		-Add job, your company id is automatically added to job
		-View results of resume page search; at this time cannot select to view directly
	Job Seeker Features:
		-Create a resume page, can choose to add a link to a website you've made on a different system, or you can add one to our website by pasting in html and css code (NOT FULLY IMPLEMENTED: the html/css parser does not actually work; we are saving all text on both the server and database though) Also, when adding a page to our server, the "append to URL" field must be one word. AND all copy and pasted links must be full ie have the http portion: savest to copy and paste directly from website
		-Choose from a drop down menu of links to your personal resume pages that pull up short name
		-Choose from a drop down menu of your resume page names that takes to to a separate page to view detailed info
		-Can view full comments by choosing from a dropdown menu
		-Can edit resume page info, a different form of which is pulled up depending on the type of page (internal or external)
		-Search for open jobs by company name (full version would have more search options)

