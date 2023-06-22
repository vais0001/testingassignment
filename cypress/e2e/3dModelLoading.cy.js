describe('Login Test', function () {
    it('Logs In', function () {
        // Visit your login page
        cy.visit('http://localhost:8000/login');

        // Get the email input and type the email
        cy.get('input[name=email]').type('vais0001@hz.nl');

        // Get the password input and type the password
        cy.get('input[name=password]').type('0123456789');

        // Find the form on the page and submit it
        cy.get('form').submit();

        // Verify that you've logged in successfully. This can vary depending on your application.
        // You could check for a specific URL, an element that only appears when logged in, etc.
        cy.url().should('include', '/model');

        cy.route({
            method: 'GET',      // Route all GET requests
            url: '/ground_floor.fbx',    // that have a URL that matches '/ground_floor.fbx'
        }).as('getGroundFloor'); // Alias the route to identify in the test below

        cy.route({
            method: 'GET',
            url: '/1_floor.fbx',
        }).as('get1Floor');

        // ... define other routes similarly ...

        // Interact with the page
        cy.get('.button[value="ground"]').click();

        // Assert that the right network request has happened
        cy.wait('@getGroundFloor').its('status').should('eq', 200);

        // Repeat for other buttons
        cy.get('.button[value="1"]').click();
        cy.wait('@get1Floor').its('status').should('eq', 200);
    });
});
