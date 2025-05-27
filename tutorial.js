const steps = [
  {
    title: "🌐 Página Inicial",
    description: "Visão geral do projeto e entrada principal para explorar o site."
  },
  {
    title: "🤖 Sobre o App",
    description: "Conheça a IA que ajuda a reduzir seu consumo de água e energia."
  },
  {
    title: "📊 Painel do Usuário",
    description: "Acompanhe seus dados em tempo real com gráficos, economia e dicas personalizadas."
  },
  {
    title: "💡 Dicas Diárias",
    description: "Receba notificações com ideias práticas de economia todos os dias."
  },
  {
    title: "📄 Relatórios e Histórico",
    description: "Veja seu histórico de consumo e baixe relatórios em PDF."
  },
  {
    title: "🧑‍🏫 Educação e Sustentabilidade",
    description: "Aprenda mais sobre a ODS 12 e como aplicar hábitos sustentáveis."
  },
  {
    title: "📱 Baixe o App / Acesse o App Web",
    description: "Acesse rapidamente o app web ou baixe para seu celular."
  },
  {
    title: "📬 Contato / Suporte",
    description: "Tire dúvidas e entre em contato com nossa equipe de suporte."
  },
  {
    title: "🔐 Área do Administrador (Opcional)",
    description: "Área exclusiva para gerenciar dados e usuários."
  },
];

let currentStep = 0;

const titleEl = document.getElementById("tutorial-title");
const descEl = document.getElementById("tutorial-description");
const prevBtn = document.getElementById("prevBtn");
const nextBtn = document.getElementById("nextBtn");
const skipBtn = document.getElementById("skipBtn");
const modal = document.getElementById("tutorialModal");

function showStep(index) {
  titleEl.textContent = steps[index].title;
  descEl.textContent = steps[index].description;

  prevBtn.style.display = index === 0 ? "none" : "inline-block";
  nextBtn.textContent = index === steps.length - 1 ? "Concluir" : "Próximo →";
}

// Botão Próximo
nextBtn.addEventListener("click", () => {
  if (currentStep < steps.length - 1) {
    currentStep++;
    showStep(currentStep);
  } else {
    window.location.href = "principal.html"; // Redireciona após concluir o tutorial
  }
});

// Botão Anterior
prevBtn.addEventListener("click", () => {
  if (currentStep > 0) {
    currentStep--;
    showStep(currentStep);
  }
});

// Botão Pular Tutorial
skipBtn.addEventListener("click", () => {
  window.location.href = "principal.html"; // Redireciona ao pular o tutorial
});

window.onload = () => {
  showStep(currentStep);
};
