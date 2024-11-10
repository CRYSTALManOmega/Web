// Function to load Tasks section with modules assigned to the department
function loadTasks() {
    fetch('getDepartmentModules.php')
        .then(response => response.json())
        .then(data => {
            const modules = data.modules || [];
            document.getElementById('main-content').innerHTML = `
                <h1>Tasks</h1>
                ${modules.map(module => `
                    <div class="task-box" onclick="viewModule(${module.id})">
                        <span class="task-name">${module.title}</span>
                        <p class="task-short-description">${module.description}</p>
                    </div>
                `).join('')}
            `;
        })
        .catch(error => console.error("Error loading modules:", error));
}

// Function to navigate to the module details page
function viewModule(moduleId) {
    window.location.href = `moduleView.html?moduleId=${moduleId}`;
}
