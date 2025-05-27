document.getElementById("login-form").addEventListener("submit", function(event) {
  event.preventDefault(); // Impede o envio do formulário padrão

  // Pegando os valores
  const username = document.getElementById("username").value.trim();
  const email = document.getElementById("email").value.trim();
  const password = document.getElementById("password").value.trim();
  const confirmPassword = document.getElementById("confirm-password").value.trim();
  const phone = document.getElementById("phone").value.trim();

  // Verificações básicas
  if (!username || !email || !password || !confirmPassword || !phone) {
    alert("Por favor, preencha todos os campos.");
    return;
  }

  if (password !== confirmPassword) {
    alert("As senhas não coincidem.");
    return;
  }

  // Redireciona para a página de tutorial se tudo estiver correto
  window.location.href = "tutorial.html";
});
