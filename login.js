const loginForm = document.getElementById('loginForm');
const loginEmail = document.getElementById('loginEmail');
const loginPassword = document.getElementById('loginPassword');
const toRegister = document.getElementById('toRegister');

toRegister.addEventListener('click', () => {
  window.location.href = 'registation.html';
});

loginForm.addEventListener('submit', (e) => {
  e.preventDefault();
  const email = loginEmail.value.trim();
  const password = loginPassword.value;

  const users = JSON.parse(localStorage.getItem('users') || '[]');
  const user = users.find(u => u.email === email && u.password === password);
  if (!user) {
    alert('Invalid email or password. If you do not have an account, click Create account.');
    return;
  }

  // set a simple logged-in flag (store full user object)
  localStorage.setItem('loggedInUser', JSON.stringify(user));
  // navigate to dashboard
  window.location.href = 'dashboard.html';
});