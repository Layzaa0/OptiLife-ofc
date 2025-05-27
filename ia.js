document.getElementById("enviar").addEventListener("click", () => {
    const entrada = document.getElementById("entrada");
    const mensagens = document.getElementById("mensagens");

    const texto = entrada.value.trim().toLowerCase(); // Converter para minúsculo para facilitar a comparação
    if (texto === "") return;

    // Bolha do usuário
    const bolhaUsuario = document.createElement("div");
    bolhaUsuario.className = "mensagem usuario";
    bolhaUsuario.textContent = texto;
    mensagens.appendChild(bolhaUsuario);

    entrada.value = "";

    // Respostas da Lumi
    setTimeout(() => {
        const bolhaLumi = document.createElement("div");
        bolhaLumi.className = "mensagem lumi";
        let respostaLumi = "";

        if (texto.includes("economizar energia em casa")) {
            respostaLumi = "Para economizar energia em casa, você pode começar desligando as luzes ao sair de um cômodo, usar lâmpadas LED, evitar deixar aparelhos em stand-by e usar a máquina de lavar e a lava-louças com carga total.";
        } else if (texto.includes("economizar água no banheiro")) {
            respostaLumi = "No banheiro, você pode economizar água fechando a torneira ao escovar os dentes e ao se ensaboar, tomar banhos mais curtos e verificar se há vazamentos.";
        } else if (texto.includes("importância de economizar água")) {
            respostaLumi = "Economizar água é crucial para preservar os recursos naturais, garantir o abastecimento para as futuras gerações e reduzir os custos em sua conta.";
        } else if (texto.includes("energias renováveis")) {
            respostaLumi = "Energias renováveis são fontes de energia que se regeneram naturalmente, como a solar, eólica, hidrelétrica e biomassa, sendo importantes para reduzir a emissão de gases de efeito estufa.";
        } else if (texto.includes("consumo de energia do chuveiro")) {
            respostaLumi = "Para reduzir o consumo de energia do chuveiro, procure tomar banhos mais rápidos e, se possível, utilize a chave na posição 'verão', que geralmente consome menos energia.";
        } else if (texto.includes("reutilizar a água da chuva")) {
            respostaLumi = "Você pode reutilizar a água da chuva para regar plantas, lavar o carro e limpar áreas externas. Existem sistemas simples de captação que podem ser instalados em casa.";
        } else if (texto.includes("economizar água na cozinha")) {
            respostaLumi = "Na cozinha, evite lavar a louça com a torneira aberta continuamente, utilize a lava-louças com carga total e aproveite a água do cozimento de legumes para regar as plantas depois de fria.";
        } else if (texto.includes("impacto do desperdício de energia")) {
            respostaLumi = "O desperdício de energia contribui para o aumento da demanda por fontes não renováveis, a emissão de poluentes e o aquecimento global, além de aumentar os gastos com eletricidade.";
        } else if (texto.includes("dinheiro")) {
            respostaLumi = "Infelizmente não posso fazer nada sobre isso. :( ";
        } else {
            respostaLumi = "Olá! Como posso ajudar você a economizar energia ou água?"; 
        }

        bolhaLumi.textContent = respostaLumi;
        mensagens.appendChild(bolhaLumi);
        mensagens.scrollTop = mensagens.scrollHeight;
    }, 500);
});