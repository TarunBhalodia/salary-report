# salary-report
Test result based on Symfony for https://gist.github.com/DragonBe/10521ac163824e3cdc85e0d71527d118 - The assignment (max 1h30): Salary Payment Date tool


Framework : 

	-------------------- ------------------------------------------- 
	  Symfony                                                         
	-------------------- ------------------------------------------- 
	  Version              3.4.17  


	-------------------- ------------------------------------------- 
	  PHP                                                             
	-------------------- -------------------------------------------
	  Version              7.1.13


Reason for using symfony : 

	The Console component of symfony eases the creation of beautiful and testable command line interfaces.



Database :

	We don't need it as we generate reports to CSV file, so it does not require to save any data.




Command Help : php bin/console generate:salary-report --help

Output:

	Usage:
	  generate:salary-report <filename>

	Arguments:
	  filename              Name of salary report file



Example :- generate:salary-report report2018

This will generate csv file on path defined in parameter.yml of symfony framework. We have set this path to project's root var/report. You can change it later as you want. Based on current configuration report file will be generated in var/report/report2018.csv.

When user enters the file name which already exists, we have shown error message.
