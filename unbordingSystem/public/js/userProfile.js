// Function to load user profile information
function loadUserProfile() {
    // Example data - this should be fetched from the database
    const userProfile = {
        fullname: "Omar",
        email: "omar@example.com",
        address: "123 Main St",
        company: "Tech Corp",
        jobTitle: "Software Engineer"
    };

    // Display the user information
    document.getElementById('user-fullname').textContent = `Full Name: ${userProfile.fullname}`;
    document.getElementById('user-email').textContent = `Email: ${userProfile.email}`;
    document.getElementById('user-address').textContent = `Address: ${userProfile.address}`;
    document.getElementById('user-company').textContent = `Company: ${userProfile.company}`;
    document.getElementById('user-job-title').textContent = `Job Title: ${userProfile.jobTitle}`;

    // Show the user info container
    document.getElementById('user-info-container').style.display = 'block';
}
