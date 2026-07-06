const app = document.getElementById("app");

app.innerHTML = `
<div class="bg-white shadow-lg rounded-xl p-8">

        <div style="display:flex;justify-content:space-between;align-items:center;margin-bottom:12px">
            <a href="index.html" style="background:#fff;padding:6px 10px;border-radius:8px;color:#333;text-decoration:none;box-shadow:0 6px 18px rgba(0,0,0,.06)">Home</a>
            <h1 class="text-3xl font-bold text-center text-blue-900" style="flex:1;margin:0">&nbsp;</h1>
        </div>

    <p class="text-center text-gray-500 mt-2 mb-8">
        Create Your Account
    </p>

    <form id="registerForm" class="space-y-5">

        <div>
            <label class="block font-semibold mb-2">Full name</label>
            <input type="text" id="name" placeholder="Your full name" class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-2">Mobile</label>
            <input type="tel" id="mobile" placeholder="e.g. 8801XXXXXXXXX" class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">
        </div>

        <div>
            <label class="block font-semibold mb-2">
                Email
            </label>

            <input
                type="email"
                id="email"
                placeholder="Enter Email"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <small
                id="emailError"
                class="text-red-500 hidden">
                Invalid Email Address
            </small>

        </div>

        <div>

            <label class="block font-semibold mb-2">
                Password
            </label>

            <input
                type="password"
                id="password"
                placeholder="Enter Password"
                class="w-full border rounded-lg p-3 focus:outline-none focus:ring-2 focus:ring-blue-500">

            <div class="w-full h-2 bg-gray-200 rounded mt-3">

                <div
                    id="meter"
                    class="h-2 w-0 bg-red-500 rounded duration-300">
                </div>

            </div>

            <small id="strength">
                Strength : Empty
            </small>

        </div>

                <div style="display:flex;gap:10px;align-items:center">
                    <button
                            type="submit"
                            style="flex:1"
                            class="bg-blue-900 hover:bg-blue-800 text-white py-3 rounded-lg">

                            Register

                    </button>
                    <a href="index.html" style="padding:10px 12px;border-radius:8px;border:1px solid #ddd;background:#fff;color:#333;text-decoration:none;white-space:nowrap">Home</a>
                </div>

    </form>

</div>
`;

const form = document.getElementById("registerForm");
const email = document.getElementById("email");
const password = document.getElementById("password");
const nameInput = document.getElementById('name');
const mobile = document.getElementById('mobile');
const emailError = document.getElementById("emailError");
const meter = document.getElementById("meter");
const strength = document.getElementById("strength");

// =======================
// Email Validation
// =======================

email.addEventListener("input", () => {

    const regex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

    if (regex.test(email.value.trim())) {

        email.classList.remove("border-red-500");
        email.classList.add("border-green-500");

        emailError.classList.add("hidden");

    } else {

        email.classList.remove("border-green-500");
        email.classList.add("border-red-500");

        emailError.classList.remove("hidden");

    }

});

// =======================
// Password Strength
// =======================

password.addEventListener("input", () => {

    const value = password.value.trim();
    let score = 0;

    if (value.length >= 8) score++;
    if (/[A-Z]/.test(value)) score++;
    if (/[0-9]/.test(value)) score++;
    if (/[^A-Za-z0-9]/.test(value)) score++;

    if (value.length === 0) {

        meter.style.width = "0%";
        meter.className = "h-2 w-0 bg-red-500 rounded duration-300";
        strength.innerText = "Strength : Empty";

    }

    else if (score <= 1) {

        meter.style.width = "25%";
        meter.className = "h-2 bg-red-500 rounded duration-300";
        strength.innerText = "Strength : Weak";

    }

    else if (score <= 3) {

        meter.style.width = "60%";
        meter.className = "h-2 bg-yellow-500 rounded duration-300";
        strength.innerText = "Strength : Medium";

    }

    else {

        meter.style.width = "100%";
        meter.className = "h-2 bg-green-500 rounded duration-300";
        strength.innerText = "Strength : Strong";

    }

});

// =======================
// Form Submit
// =======================

form.addEventListener("submit", function (e) {

    e.preventDefault();

    const emailValue = email.value.trim();
    const passwordValue = password.value.trim();
    const nameValue = nameInput.value.trim();
    const mobileValue = mobile.value.trim();

    const validEmail = /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(emailValue);

    if (!validEmail) {
        alert("Please enter a valid email address.");
        return;
    }

    if (passwordValue.length < 8) {
        alert("Password must be at least 8 characters.");
        return;
    }

    // basic name + mobile validation
    if (nameValue.length < 2) {
        alert('Please enter your full name.');
        return;
    }

    const mobileDigits = mobileValue.replace(/\D/g, '');
    if (mobileDigits.length < 7 || mobileDigits.length > 15) {
        alert('Please enter a valid mobile number (7-15 digits).');
        return;
    }

    // Save user to localStorage (simple demo storage)
    const users = JSON.parse(localStorage.getItem('users') || '[]');
    // prevent duplicate emails
    if (users.find(u => u.email === emailValue)) {
        alert('An account with this email already exists. Please login.');
        window.location.href = 'login.html';
        return;
    }

    users.push({ name: nameValue, mobile: mobileDigits, email: emailValue, password: passwordValue });
    localStorage.setItem('users', JSON.stringify(users));

    alert("Registration Successful! You will be redirected to login.");
    window.location.href = "login.html";

});