<Student's Name>
<Student's Neptun code>
Web Programming - PHP Group Midterm Exam
This solution was submitted and prepared by the above-mentioned student
for the Web Programming course's PHP Group Midterm Exam at Eötvös Loránd University.
I declare that this solution is my own work. I have not copied or used solutions from third parties.
I have not shared the solution with other students, nor have I published it. According to the Regulations 
of Student Conduct and Discipline at Eötvös Loránd University (ELTE Organizational and Operational 
Regulations, Volume II, Section 74/C), until a student presents another student's work - or a significant 
part of it - as their own, it is considered a disciplinary offense. The most serious consequence of 
disciplinary offenses is dismissal from the university.

## Description
The task is to create the server-side code for a rudimentary inventory page for our fridge. The initial files and their functionalities are as follows:
- index.php: Displays the listed foods, highlighting expired items in red.
- addfood.php: Allows users to add a new food item.
- isvalid.php: Indicates whether the addition of food was successful or not. If successful, it saves the data in food.json.
- food.json: Stores the names, types, quantities, refrigeration dates, and expiration dates of foods.

To accomplish the task in the simplest way, only PHP should be used. If necessary, you can modify anything else.

## Preparations
1. Download the initial files from GitHub.
2. Complete the README.md.

Watch the two videos explaining how the page works:

## Tasks

### <span style="color:green">index.php</span>
|Task Number|Task|Points|
|----|----|----|
| 1. | The basic structure of the table is ready. Display the data by retrieving it from the JSON. | <span style="color:red"> 3 points </span>|
| 2. | Add the ".lejart" class to rows of expired food items by comparing the expiration date with today's date (`date('Y-m-d')`). | <span style="color:red"> 1 point </span>|

### <span style="color:green">addfood.php</span>
|Task Number|Task|Points|
|----|----|----|
| 1. | Enhance the form on the page so that it redirects to the appropriate page using a method that doesn’t expose the data in the browser's address bar. | <span style="color:red"> 0.5 point </span>|
| 2.| Check the attributes of the input fields in the form, as you'll need them to retrieve the entered data in isvalid.php using the request method. Retrieve data from each input field similarly to what we did in class. ||

### <span style="color:green">isvalid.php</span>
|Task Number|Task|Points|
|----|----|----|
| 1. | Save the values received from the request into a variable. | <span style="color:red"> 1 point </span>|
| 2. | Validate the name and expiration date: ||
| | a. Accept the name only if it exists and is at least 3 characters long without spaces at the beginning or end (trim: https://www.php.net/manual/en/function.trim.php).|<span style="color:red"> 1 point </span>|
|  | b. The expiration date is valid if it's provided and its length is greater than zero. |<span style="color:red"> 1 point </span>|
|  | c. Add three possible error messages to the `errors` array! |<span style="color:red"> 0.5 point </span>|
| 3. | Assign today's date to the 'date' key using the ` date('Y-m-d')` function, then add the new data to food.json! |<span style="color:red"> 2 points </span>|
|4. | Depending on whether there is an error in validation, display the appropriate sections on the page! |<span style="color:red"> 1 point </span>|
