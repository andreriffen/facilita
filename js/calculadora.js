// Executa ao carregar a página
window.addEventListener('DOMContentLoaded', preencherFormularioComURL, atualizarBotaoWhatsApp);

// Função para calcular a penalidade progressiva
function calcularPenalidadeProgressiva(parcelasAtrasadas, valorParcela, saldoDevedor) {
    let penalidade = 0;

    if (parcelasAtrasadas > 0) {
        // Penalidade fixa por parcela atrasada
        if (parcelasAtrasadas <= 2) {
            penalidade = parcelasAtrasadas * valorParcela * 0.12; // 6% por parcela atrasada
        } else if (parcelasAtrasadas <= 3) {
            penalidade = parcelasAtrasadas * valorParcela * 0.16; // 8% por parcela atrasada
            penalidade += saldoDevedor * 0.020; // 2% sobre o saldo devedor
        } else {
            penalidade = parcelasAtrasadas * valorParcela * 0.24; // 1,2% por parcela atrasada
            penalidade += saldoDevedor * 0.04; // 4% sobre o saldo devedor
        }
    }

    return penalidade;
}

function calcularSaldoDevedor(valorFinanciamento, totalParcelas, parcelasPagas, taxaJuros = 0, parcelasAtrasadas = 0) {
    
    // Fator de ajuste progressivo baseado no total de parcelas
    let fatorDeAjuste = 1; // Inicialmente, sem ajuste para pagamento à vista ou poucas parcelas

    if (totalParcelas > 12 && totalParcelas <= 24) {
        fatorDeAjuste = 1.05; // 5% de aumento para até 24 parcelas
    } else if (totalParcelas > 24 && totalParcelas <= 36) {
        fatorDeAjuste = 1.1; // 10% de aumento para até 36 parcelas
    } else if (totalParcelas > 36) {
        fatorDeAjuste = 1.15; // 15% de aumento para financiamentos muito longos
    }


    // Ajusta o valor do financiamento com base no número de parcelas
    const valorAjustado = valorFinanciamento * fatorDeAjuste;

    // Calcula o valor base da parcela
    const valorBaseParcela = valorAjustado / totalParcelas;

    // Calcula o saldo devedor com base nas parcelas restantes
    const saldoDevedorBasico = valorBaseParcela * (totalParcelas - parcelasPagas);

    // Calcula os juros acumulados sobre o saldo devedor
    // Juros são aplicados de forma composta ao saldo devedor restante
    const juros = saldoDevedorBasico * Math.pow(1 + taxaJuros / 100, totalParcelas - parcelasPagas) - saldoDevedorBasico;

    // Calcula a penalidade com base nas parcelas atrasadas
    const penalidade = calcularPenalidadeProgressiva(parcelasAtrasadas, valorBaseParcela, saldoDevedorBasico);

    // Soma tudo para calcular o saldo devedor final
    const saldoDevedor = saldoDevedorBasico + juros + penalidade;

    return {
        saldoDevedor: Math.max(saldoDevedor, 0), // Garante que o saldo devedor não seja negativo
        valorBaseParcela,
        jurosEstimados: juros + penalidade, // Mostra juros e penalidades como "estimados"
    };
}



// Função para exibir os resultados na tela
function exibirResultados(dadosFormulario, calculos) {
    const { saldoDevedor, valorBaseParcela, jurosEstimados } = calculos;

    const resultadoTexto = `
        <h2 class="text-light section-title position-relative pb-1 mb-3">Resultados da simulação:</h2><br>
        <h3 class="text-light">Valor do financiamento:R$ ${dadosFormulario.valorFinanciamento.toFixed(2)}</h3>
        <p>
            <b>Parcelas totais:</b> ${dadosFormulario.totalParcelas}<br>
            <b>Parcelas pagas:</b> ${dadosFormulario.parcelasPagas}<br>
            <b>Parcelas em atraso:</b> ${dadosFormulario.parcelasAtrasadas}<br>
            <b>Saldo devedor:</b> R$ ${saldoDevedor.toFixed(2)}<br>
            <b>Valor da parcela:</b> R$ ${valorBaseParcela.toFixed(2)}<br>
            <b>Valor que gostaria de pagar:</b> R$ ${dadosFormulario.quantoPagar.toFixed(2)}
        </p>
    `;
    console.log('Juros Estimados: R$ ' + jurosEstimados.toFixed(2) + '');
    document.getElementById('resultados').innerHTML = resultadoTexto;
}

// Função para capturar os dados do formulário
function capturarDadosFormulario() {
    const form = document.getElementById('calculadoraRefin');
    return {
        valorFinanciamento: parseFloat(form.querySelector('#valorFinanciamento').value || 0),
        taxaJuros: parseFloat(form.querySelector('#taxaJuros').value || 0), // Adiciona a taxa de juros
        totalParcelas: parseInt(form.querySelector('#totalParcelas').value || 0, 10),
        parcelasPagas: parseInt(form.querySelector('#parcelasPagas').value || 0, 10),
        parcelasAtrasadas: parseInt(form.querySelector('#parcelasAtrasadas').value || 0, 10),
        quantoPagar: parseFloat(form.querySelector('#quantoPagar').value || 0),
    };
}


// Função para gerar a URL com os dados do formulário
function gerarURLComDados() {
    const dadosFormulario = capturarDadosFormulario();
    const queryParams = new URLSearchParams(dadosFormulario).toString();
    return `${window.location.origin}${window.location.pathname}?${queryParams}`;
}

// Função para copiar a URL gerada
function copiarURL() {
    const urlGerada = gerarURLComDados();

    navigator.clipboard.writeText(urlGerada)
        .then(() => {
            const mensagemSucesso = document.getElementById('copySuccess');
            mensagemSucesso.style.display = 'block';

            setTimeout(() => {
                mensagemSucesso.style.display = 'none';
            }, 3000);
        })
        .catch(err => console.error('Erro ao copiar a URL: ', err));
}

// Event listener para o botão de copiar
document.getElementById('copyButton').addEventListener('click', copiarURL);



// Função para preencher o formulário com base na URL
function preencherFormularioComURL() {
    const urlParams = new URLSearchParams(window.location.search);
    const form = document.getElementById('calculadoraRefin');

    form.querySelector('#valorFinanciamento').value = urlParams.get('valorFinanciamento') || '';
    form.querySelector('#taxaJuros').value = urlParams.get('taxaJuros') || ''; // Preenche taxa de juros
    form.querySelector('#totalParcelas').value = urlParams.get('totalParcelas') || '';
    form.querySelector('#parcelasPagas').value = urlParams.get('parcelasPagas') || '';
    form.querySelector('#parcelasAtrasadas').value = urlParams.get('parcelasAtrasadas') || '';
    form.querySelector('#quantoPagar').value = urlParams.get('quantoPagar') || '';

    const todosPreenchidos = ['valorFinanciamento', 'taxaJuros', 'totalParcelas', 'parcelasPagas', 'quantoPagar']
        .every(campo => urlParams.get(campo));

    if (todosPreenchidos) {
        const dadosFormulario = capturarDadosFormulario();
        const calculos = calcularSaldoDevedor(
            dadosFormulario.valorFinanciamento,
            dadosFormulario.totalParcelas,
            dadosFormulario.parcelasPagas,
            dadosFormulario.taxaJuros, // Passa a taxa de juros
            dadosFormulario.parcelasAtrasadas
        );
        exibirResultados(dadosFormulario, calculos);
        document.getElementById('result').style.display = 'block';
        document.getElementById('whatsappButton').style.display = 'block';
    }
}

// Função para atualizar o botão do WhatsApp com os dados da simulação
function atualizarBotaoWhatsApp(dadosFormulario, calculos) {
    const { saldoDevedor, valorBaseParcela, jurosEstimados } = calculos;

    const mensagemWhatsApp = encodeURIComponent(
        `Olá, *Facilita*! Tenho um financiamento no valor de R$ ${dadosFormulario.valorFinanciamento.toFixed(2)}\n` +
        `Parcelas totais: ${dadosFormulario.totalParcelas}\n` +
        `Parcelas pagas: ${dadosFormulario.parcelasPagas}\n` +
        `Parcelas em atraso: ${dadosFormulario.parcelasAtrasadas}\n` +
        `Saldo devedor: R$ ${saldoDevedor.toFixed(2)}\n` +
        `Valor da parcela: R$ ${valorBaseParcela.toFixed(2)}\n` +
        `Juros estimados: R$ ${jurosEstimados.toFixed(2)}\n` +
        `Valor sugerido por mês: R$ ${dadosFormulario.quantoPagar.toFixed(2)}`
    );

    const botaoWhatsApp = document.getElementById('whatsappButton');
    botaoWhatsApp.href = `https://wa.me/554833809837/?text=${mensagemWhatsApp}`;
    botaoWhatsApp.style.display = 'block'; // Exibe o botão
}

// Atualizando a lógica para capturar e exibir os cálculos corretamente
document.getElementById('calculadoraRefin').addEventListener('input', function () {
    const dadosFormulario = capturarDadosFormulario();

    if (dadosFormulario.valorFinanciamento &&
        dadosFormulario.taxaJuros && // Verifica taxa de juros
        dadosFormulario.totalParcelas &&
        dadosFormulario.parcelasPagas &&
        dadosFormulario.quantoPagar) {

        const calculos = calcularSaldoDevedor(
            dadosFormulario.valorFinanciamento,
            dadosFormulario.totalParcelas,
            dadosFormulario.parcelasPagas,
            dadosFormulario.taxaJuros, // Passa a taxa de juros
            dadosFormulario.parcelasAtrasadas
        );
        exibirResultados(dadosFormulario, calculos);
        atualizarBotaoWhatsApp(dadosFormulario, calculos); // Atualiza o botão WhatsApp
        document.getElementById('result').style.display = 'block';
        document.getElementById('whatsappButton').style.display = 'block';
    } else {
        document.getElementById('result').style.display = 'none';
        document.getElementById('whatsappButton').style.display = 'none'; // Oculta o botão se os dados não forem válidos
    }
});
