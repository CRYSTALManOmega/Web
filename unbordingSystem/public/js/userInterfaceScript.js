// Automatically load the Home page when the user interface is opened 
document.addEventListener("DOMContentLoaded", function() {
    loadHome(); // Automatically load the Home page
});

// Function to load Home section
function loadHome() {
    const username = "..\..\src\controller\getUserDataUser.php"; // Example username, replace with actual data
    document.getElementById('main-content').innerHTML = `
        <h1>Welcome, ${username}!</h1>
        <div class="video-box">
            <h2>Message from the Department Manager</h2>
            <video controls width="600">
                <source src="path-to-your-video.mp4" type="video/mp4">
                Your browser does not support the video tag.
            </video>
        </div>
        <div class="task-updates-box">
            <h2>Task Updates</h2>
            <ul id="task-updates">
                <li>Task 'Project A' has been added. (2024-09-20)</li>
                <li>Task 'API Integration' has been updated. (2024-09-21)</li>
            </ul>
        </div>
    `;
}

// Function to load Tasks section
function loadTasks() {
    document.getElementById('main-content').innerHTML = `
        <h1>Tasks</h1>
        <div class="task-box" onclick="toggleTaskDetails('task1-details')">
            <span class="task-name">Project Documentation</span>
            <p class="task-short-description">Prepare documentation for the final project. Click for full details.</p>
            <div id="task1-details" class="task-details">
                <p>Full description: Complete documentation including all project phases and final report.</p>
                <video controls width="400">
                    <source src="path-to-your-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <a href="path-to-your-file.pdf" download>Download File</a>
            </div>
        </div>
        <div class="task-box" onclick="toggleTaskDetails('task2-details')">
            <span class="task-name">API Integration</span>
            <p class="task-short-description">Integrate the API with the frontend. Click for full details.</p>
            <div id="task2-details" class="task-details">
                <p>Full description: Implement API calls and handle data processing for user interface integration.</p>
                <video controls width="400">
                    <source src="path-to-your-video.mp4" type="video/mp4">
                    Your browser does not support the video tag.
                </video>
                <a href="path-to-your-file.zip" download>Download File</a>
            </div>
        </div>
    `;
}

// Function to toggle task details
function toggleTaskDetails(taskId) {
    const taskDetails = document.getElementById(taskId);
    if (taskDetails.style.display === "none" || taskDetails.style.display === "") {
        taskDetails.style.display = "block";
    } else {
        taskDetails.style.display = "none";
    }
}

// Function to load Department Chat section
function loadChat() {
    document.getElementById('main-content').innerHTML = `
        <div class="chat-header">
            <img src="https://cdn-icons-png.flaticon.com/512/552/552721.png" alt="User Icon" class="user-icon">
            <div class="chat-info">
                <h3>Department Chat</h3>
                <p>Select for group info</p>
            </div>
        </div>
        <div class="chat-messages" id="chat-messages">
            <!-- Messages will be dynamically loaded here -->
        </div>
        <div class="chat-input">
            <input type="file" id="file-upload" class="file-upload">
            <input type="text" id="message-input" class="message-input" placeholder="Type a message">
            <button id="send-message" class="send-message">Send</button>
        </div>
    `;
    
    setupChat();
}

// Chat setup function for sending messages
function setupChat() {
    const messageInput = document.getElementById('message-input');
    const sendMessageButton = document.getElementById('send-message');
    const chatMessages = document.getElementById('chat-messages');
    const fileUpload = document.getElementById('file-upload');

    // Function to add a message to the chat
    function addMessage(message) {
        const timestamp = new Date().toLocaleTimeString();
        const messageElement = document.createElement('div');
        messageElement.classList.add('chat-message');
        messageElement.innerHTML = `
            <div class="message-text">${message}</div>
            <div class="timestamp">${timestamp}</div>
        `;
        chatMessages.appendChild(messageElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Function to add a file message to the chat
    function addFileMessage(fileName) {
        const fileElement = document.createElement('div');
        fileElement.classList.add('file-message');
        fileElement.innerHTML = `
            <img src="https://upload.wikimedia.org/wikipedia/commons/8/87/PDF_file_icon.svg" alt="PDF Icon">
            <span>${fileName}</span>
            <button>Open</button>
            <button>Save as...</button>
        `;
        chatMessages.appendChild(fileElement);
        chatMessages.scrollTop = chatMessages.scrollHeight;
    }

    // Event listener for the send message button
    sendMessageButton.addEventListener('click', () => {
        const message = messageInput.value.trim();
        if (message) {
            addMessage(message);
            messageInput.value = ''; // Clear input after sending
        }
    });

    // Event listener for file uploads
    fileUpload.addEventListener('change', (event) => {
        const file = event.target.files[0];
        if (file) {
            addFileMessage(file.name);
        }
    });
}

// Function to toggle settings dropdown menu
function toggleSettingsMenu() {
    const dropdown = document.getElementById('settings-dropdown');
    dropdown.style.display = (dropdown.style.display === 'block') ? 'none' : 'block';
}
