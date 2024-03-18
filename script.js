document.addEventListener("DOMContentLoaded", function () {
  const emailInput = document.getElementById("email");
  const passwordInput = document.getElementById("password");
  const emailMessage = document.getElementById("emailMessage");
  const passwordMessage = document.getElementById("passwordMessage");
  const loginBtn = document.getElementById("loginBtn");

  // Add input event listeners for real-time validation
  emailInput.addEventListener("input", validateEmail);
  passwordInput.addEventListener("input", validatePassword);
  function validateEmail() {
    const email = emailInput.value.trim();
    emailMessage.innerHTML = "";
    emailMessage.className = "message";

    // Regular expression for email validation
    const emailRegex = /^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,4}$/;

    const span = document.createElement("span");
    span.textContent = "Enter a valid email address";
    span.className = emailRegex.test(email) ? "success" : "error";
    emailMessage.appendChild(span);

    toggleLoginButton();
  }

  function validatePassword() {
    const password = passwordInput.value;
    passwordMessage.innerHTML = ""; // Use innerHTML to append multiple messages
    passwordMessage.className = "message";

    // Define the conditions
    const conditions = [
      { regex: /.{8,}/, message: "Minimum 8 characters" },
      { regex: /[A-Z]/, message: "At least one uppercase letter" },
      { regex: /[a-z]/, message: "At least one lowercase letter" },
      { regex: /\d/, message: "At least one digit" },
    ];

    // Check each condition
    conditions.forEach((condition) => {
      const span = document.createElement("span");
      span.textContent = condition.message;
      span.className = condition.regex.test(password) ? "success" : "error";
      passwordMessage.appendChild(span);
    });

    toggleLoginButton();
  }

  function toggleLoginButton() {
    const email = emailInput.value.trim();
    const password = passwordInput.value;

    // Update the condition to include email validation
    loginBtn.disabled = !(
      email.match(/^[a-zA-Z0-9._-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,6}$/) &&
      password.match(/^(?=.*\d)(?=.*[a-z])(?=.*[A-Z]).{8,}$/)
    );
  }
});

function showLogin() {
  var loginContainer = document.getElementById("loginContainer");
  var registerContainer = document.getElementById("registerContainer");

  registerContainer.classList.remove("active");
  setTimeout(function () {
    registerContainer.style.display = "none";
    loginContainer.style.display = "block";
    loginContainer.classList.add("active");
  }, 500); // Match the timeout to the CSS transition time
}

function showRegister() {
  var loginContainer = document.getElementById("loginContainer");
  var registerContainer = document.getElementById("registerContainer");

  loginContainer.classList.remove("active");
  setTimeout(function () {
    loginContainer.style.display = "none";
    registerContainer.style.display = "block";
    registerContainer.classList.add("active");
  }, 500); // Match the timeout to the CSS transition time
}

// Initialize to show login form by default
setTimeout(showLogin, 0);
