# Test Plan

## Description

The first feature that I will be testing is the login form, because the only way to use the page is by loggin in to it. Therefore it is an important feature to be tested, to see that it is always working.

The second feature I will be testing is if the model page loads the 3D model of the building. It's important, because it is used to display where the rooms in the building are located, so you could choose a specific room and by clicking on it, you can see it's temperature data.

The feature that I decided not to test was the logout feature, since I consider it to be a low impact functionality for the the application. I wanted to focus on the features that are critical or high-priority.

## Requirements:

### User stories:
1. **User Login**
- As a user, I want to be able to log in so that I can access the application features.

2. **View 3D Model**
- As a logged-in user, I want to view a 3D model of a building so that I could choose a room to view it's temperature data.

### System Tests

**User Story 1**
- Happy path: Given that I am a building manager and I want to login to the 3D model website, when I fill in my user credentials, I am successfuly redirected to the model page.
- Unhappy path: Given that I am a building manager and I want to login to the 3D model website, when I fill in my user credentials, I get an error stating that my user credentials are wrong.

**User Story 2**
- Happy path: Given that I am a maintenance worker and I want to check if all of the thermostats in the building are working, when I go to the model page, I can see the building model, so I could press on the room to see it's temperature data.
- Unhappy path: Given that I am a maintenance worker and I want to check if all of the thermostats in the building are working, when I go to the model page, I cannot see the building model and thus I cannot check the room data.

### Unit Tests

**User Story 1**
- Testing the functionality of the login controller to ensure it authenticates the user correctly.
This test will create a new fake user, hash their password, and then simulate a login request with the user's credentials. The test checks if the user is authenticated and that the response redirects to the expected post-login route.

**User Story 2**
- Testing the route that should return a 3D model.
This test will redirect the user to the "/model" route and checks if the 3D model page loads by making a GET request. It asserts that the response status is 200, indicating a successful page load.

## Results

### System Tests

#### User story 1
1. Test Scenario: Login with correct credentials
   - Expected Result: Successful login and redirection to the model page.
   - Actual Result: Passed
2. Test Scenario: Login with incorrect password
   - Expected Result: Login failure with an error message indicating incorrect credentials.
   - Actual Result: Passed
3. Test Scenario: Login with non-existent email
   - Expected Result: Login failure with an error message indicating incorrect credentials.
   - Actual Result: Passed
4. Test Scenario: Login with empty email and password
   - Expected Result: Login failure with an error message indicating missing credentials.
   - Actual Result: Passed

#### User story 2
System Test Results:
1. Test Scenario: 3D model page loads
   - Expected Result: The 3D model page should load successfully.
   - Actual Result: Passed


  ### Unit tests

  #### User story 1
![image](https://github.com/vais0001/testingassignment/assets/112856221/e3bf52f1-0a59-45f3-806d-2282437afc97)
This test focuses on the login controller's functionality to verify if it correctly authenticates the user. It follows these steps:

1. Create a new user using fake data.
2. Hash the user's password for security purposes.
3. Simulate a login request by providing the user's email and password.
4. Check if the user is successfully authenticated.
5. Verify that the response redirects to the expected post-login route.

By performing these steps, the test ensures that the login controller works as intended, securely authenticating users and redirecting them to the appropriate page after successful login.

A screenshot of the test result

![image](https://github.com/vais0001/testingassignment/assets/112856221/5beebbfc-086e-4e51-beac-e15b3e57a50e)

#### User story 2
![image](https://github.com/vais0001/testingassignment/assets/112856221/8aeac7fe-a273-4873-ba68-9711d30d19a5)

This test focuses on verifying the functionality of the route responsible for returning the 3D model page. The purpose is to ensure that when a user is redirected to the /model route, the 3D model page loads successfully.

The test performs a GET request to the /model route and checks the response status. If the response status is 200, it indicates that the page loaded successfully, confirming the expected behavior of the route.

The test also checks if the page containes the right JavaScript import.

By executing this test, you can ensure that the route for the 3D model page is functioning as intended and providing the expected response.


A screenshot of the test result

![image](https://github.com/vais0001/testingassignment/assets/112856221/0e308771-b309-490b-84b3-9cce90fbafe5)

## Evaluation

### A possible mistake/error that can be detected by the test.
Errors that can be detected by the tests include incorrect user validation during login, and unauthorized access to the 3D model. 

### A possible mistake/error that can not be detected by the test.
The tests may not detect errors such as server-related issues or 3D model loading failures due to file corruption or format mismatch. 

### To what extent can I conclude that "everything works correctly".
Since the project passed the System and Unit tests for the most important features I can say that it is working correctly. However, there were features which I didn't test and there is a possibility that some of them don't work. The only way to be sure that everything works is only by testing every single added feature. Therefore, we can say that everything works only because the most important features have passed the testing, but to be sure of it, the same type of testing should be applied to all other features.
