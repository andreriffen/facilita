let idleTimer;
const idleTimeout = 40000; // 10 segundos de inatividade (em milissegundos)

// Função que será chamada quando o usuário estiver inativo
function showIdleModal() {
    // Verifique se o modal já foi mostrado para evitar múltiplas exibições
    const modal = new bootstrap.Modal(document.getElementById('idleModal'));
    modal.show();
}

// Resetar o timer sempre que o usuário interagir com a página
function resetIdleTimer() {
    clearTimeout(idleTimer);
    idleTimer = setTimeout(showIdleModal, idleTimeout); // Define o timeout de 10 segundos
}

// Detecta interações do usuário ( cliques, teclas pressionadas)
window.onload = function () {
    resetIdleTimer();
    document.addEventListener('keypress', resetIdleTimer);
    document.addEventListener('click', resetIdleTimer);
};