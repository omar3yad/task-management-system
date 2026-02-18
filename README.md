Project Assignment: Tasks Management System
Overview
Create a prototype for an internal Task & Project Tracker. This system will allow the user to manage departments, the employees within them, and the specific tasks assigned to those employees.
Functional Requirements
1. Data Architecture
You are responsible for designing a database that can handle:
●	Departments: (e.g., Development, Marketing, HR).
●	Employees: Each employee must belong to one department.
●	Tasks: Each task is assigned to a specific employee and must have a status (e.g., Pending, In Progress, Completed) and a priority level.
Note: You must decide on the table structures, data types, and the relationships (Foreign Keys) between these entities.
2. System Logic (Backend)
Implement the core engine of the application using Object-Oriented Programming. I expect to see a clean structure where:
●	Data is fetched, created, and updated through Classes.
●	The system handles errors gracefully (e.g., what happens if a user tries to delete a department that still has employees?).
●	Actions are secure and validated before reaching the database.
3. User Interface & Interaction
Build a dashboard that provides the following:
●	The Overview: A view that shows all tasks, which employee is doing them, and which department they belong to.
●	Management Tools: Interfaces to add new employees and assign new tasks.
●	Client-Side Logic: Use your frontend skills to ensure the UI is responsive. Use jQuery to handle dynamic elements (like showing/hiding forms or confirming deletions).
________________________________________
Project Constraints
●	No Frameworks: You must write this in native PHP.
●	No AI Assistance: Use of ChatGPT, Claude, Copilot, or similar AI tools is strictly prohibited. I want to see your personal logic, your research process, and how you handle bugs manually.
●	Architecture: I am looking for a clear "Separation of Concerns." Logic should not be mixed with the visual HTML.
●	Security: Ensure the system is protected against common web vulnerabilities.

