document.getElementById("login-form").addEventListener("submit", function(event) {
    const email = document.getElementById("email").value.trim();
    const password = document.getElementById("password").value.trim();
  
    if (!email || !password) {
      alert("Por favor, preencha todos os campos.");
      event.preventDefault(); // Impede o envio somente se estiver incompleto
    }
  });
  