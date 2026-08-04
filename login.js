const loginForm = document.getElementById('loginForm');
const loginEmail = document.getElementById('loginEmail');
const loginPassword = document.getElementById('loginPassword');
const toRegister = document.getElementById('toRegister');

toRegister.addEventListener('click', () => {
  window.location.href = 'registation.html';
});

loginForm.addEventListener('submit', async (e) => {
  e.preventDefault();
  const email = loginEmail.value.trim();
  const password = loginPassword.value;

  try {
    const response = await fetch('login.php', {
      method: 'POST',
      headers: {
        'Content-Type': 'application/json'
      },
      body: JSON.stringify({ email, password })
    });

    const result = await response.json();
    if (!response.ok) {
      alert(result.error || 'Invalid email or password. If you do not have an account, click Create account.');
      return;
    }

    window.location.href = 'dashboard.html';
  } catch (error) {
    alert('Unable to login. Please try again later.');
    console.error(error);
  }
});