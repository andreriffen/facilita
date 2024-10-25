document.addEventListener('DOMContentLoaded', function () {
    const activePage = getActivePage(); // Obtém o nome da página ativa
    loadHeader(activePage); // Carrega o cabeçalho
});

function getActivePage() {
    const path = window.location.pathname;
    if (path.includes('index')) return 'home';
    if (path.includes('about')) return 'about';
    if (path.includes('service')) return 'service';
    if (path.includes('blog')) return 'blog';
    if (path.includes('contact')) return 'contact';
    return '';
}

function loadHeader(activePage) { // Recebe activePage como parâmetro
    let title = '';
    let subtitle1 = '';
    let subtitle2 = '';

    switch (activePage) {
        case 'home':
            title = 'Bem-vindo à Facilita';
            subtitle1 = 'Home';
            subtitle2 = 'Sobre';
            break;
        case 'about':
            title = 'Sobre a Facilita';
            subtitle1 = 'Home';
            subtitle2 = 'Quem somos';
            break;
        case 'service':
            title = 'Nossos Serviços';
            subtitle1 = 'Home';
            subtitle2 = 'Serviços';
            break;
        case 'blog':
            title = 'Blog';
            subtitle1 = 'Blog';
            subtitle2 = 'Ultimas Postagens';
            break;
        case 'contact':
            title = 'Entre em Contato';
            subtitle1 = 'Contato';
            subtitle2 = 'Canais';
            break;
        default:
            title = 'Facilita Assessoria Financeira';
            subtitle1 = 'Home';
            subtitle2 = '';
            break;
    }

/* 
<!-- Spinner -->

    <div id="spinner"
        class="show bg-white position-fixed translate-middle w-100 vh-100 top-50 start-50 d-flex align-items-center justify-content-center">
        <div class="spinner"></div>
    </div>

<!-- Spinner --> 
*/

    const headerHTML = `
        <!-- Topbar Start -->
                <div id="topbar" class="container-fluid bg-secondary px-5 d-none d-lg-block ">
                    <div class="row gx-0">
                        <div class="col-lg-12 text-center text-lg-start mb-2 mb-lg-0">
                            <div class="d-inline-flex align-items-center" style="height: 45px;">
                                <marquee scrollamount="10">
                                    <small class="me-3 text-primary">Visite nosso escritório em:&nbsp&nbsp
                                        <i class="fa fa-map-marker-alt me-2"></i>
                                        <a href="https://maps.app.goo.gl/vLjpFyQ4j4Dsp4CF8"
                                            aria-label="Visite nosso escritório em Florianópolis">Sapiens Parque -
                                            Av. Luiz Boiteux Piazza, 1302, Canasvieiras Florianópolis
                                        </a><i class="bi bi-box-arrow-up-right"></i>
                                    </small>
                                    <small class="me-3 text-primary">
                                        <i class="bi bi-whatsapp"></i>
                                        Atendimento :
                                        <a href="https://wa.me/554833809837" target="_blank" aria-label="Contato via WhatsApp">
                                            (48) 3380-9837 ↗
                                        </a>

                                        &nbsp&nbspSeg à Sex - 08:00 às 17:00
                                    </small>
                                    <small class="text-primary"><i class="fa fa-envelope-open me-2"></i>
                                        <a href="mailto:contato@assessoriafacilita.com" target="_blank"
                                            aria-label="Endereço de e-mail">contato@assessoriafacilita.com ↗
                                        </a>
                                    </small>
                                    <small>&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <a aria-label="Reduza agora suas parcelas do financiamento do seu veículo">
                                            ➜ Descontos de até 80% OFF no refinanciamento de seu veículo!</a>
                                    </small>
                                    <small>
                                        &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp
                                        <a href="#" aria-label="FACILITA ASSESSORIA JURIDICA - A maior especialista em negociação de dívidas
                                        bancárias do Brasil. CNPJ: 54.906.530/0001-22"
                                            style="text-decoration: none; color: #001348;">
                                            &copy; FACILITA ASSESSORIA JURIDICA - A maior especialista em negociação de dívidas
                                            bancárias do Brasil. CNPJ: 54.906.530/0001-22</a>
                                    </small>
                                </marquee>
                            </div>
                        </div>

                    </div>
                </div>
        <!-- Topbar End -->

        <!-- Navbar Start -->
        <div class="container-fluid position-relative p-0">
            <nav class="navbar navbar-expand-lg navbar-dark px-5 py-3 py-lg-0">
                <div id="brand">
                    <a href="index.html" class="navbar-brand p-0">
                        <h1 class="mt-4">
                            <svg xmlns="http://www.w3.org/2000/svg" id="logo-facilita" width="50" height="50"
                                viewBox="0 -1 25 27" fill="currentColor" stroke="none" stroke-width="1"
                                stroke-linecap="round" stroke-linejoin="round">
                                <rect width="5" height="5" x="9" y="3.5" rx="1" transform="rotate(45)" />
                                <rect width="5" height="5" x="9" y="-3" rx="1" transform="rotate(45)" />
                                <rect width="5" height="5" x="9" y="-9.5" rx="1" transform="rotate(45)" />
                                <rect width="5" height="5" x="15.5" y="3.5" rx="1" transform="rotate(45)" />
                                <rect width="5" height="5" x="15.5" y="-3" rx="1" transform="rotate(45)" />
                                <rect width="5" height="5" x="22" y="3.5" rx="1" transform="rotate(45)" />
                            </svg>
                            <b style="font-family: 'Bebas Neue'; font-weight: 400;">FACILITA</b>
                            <b style="font-family: 'Bebas Neue'; font-weight: 400; letter-spacing: 0.1rem;">ASSESSORIA</b>
                        </h1>
                    </a>
                </div>

                <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
                    <span class="fa fa-bars"></span>
                </button>
                <div class="collapse navbar-collapse" id="navbarCollapse">
                    <div class="navbar-nav ms-auto py-3">
                        <a href="index.html" class="nav-item nav-link ${activePage === 'home' ? 'active' : ''}">Home</a>
                        <a href="about.html" class="nav-item nav-link ${activePage === 'about' ? 'active' : ''}">Sobre</a>
                        <div class="nav-item dropdown">
                            <a href="#" class="nav-link dropdown-toggle ${activePage === 'service' ? 'active' : ''}" data-bs-toggle="dropdown">Serviços</a>
                            <div class="dropdown-menu m-0">
                                <a href="service.html#especialidades" class="dropdown-item">Especialidades</a>
                                <a href="service.html#negociacao-amigavel" class="dropdown-item">Negociação Amigável</a>
                                <a href="service.html#negociacao-judicial" class="dropdown-item">Negociação Jurídica</a>
                                <a href="service.html#limpa-nome" class="dropdown-item">Limpa Nome</a>
                                <a href="service.html#representacao-juridica" class="dropdown-item">Representação jurídica</a>
                            </div>
                        </div>
                        <a href="blog.html" class="nav-item nav-link ${activePage === 'blog' ? 'active' : ''}">Blog</a>
                        <a href="contact.html" class="nav-item nav-link ${activePage === 'contact' ? 'active' : ''}">Contato</a>
                    </div>
                </div>
            </nav>

        <div id="header-carousel" class="carousel slide carousel-fade" data-bs-ride="carousel">
                <div class="carousel-inner">
                    <div class="carousel-item active">
                        <img class="w-100" src="img/carousel-2.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Não complica...</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">
                                    <i>... facilita!</i>
                                </h1>
                                <a href="https://wa.me/554833809837"
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft"
                                    target="_blank">Análise Gratuita</a>
                                <a href="https://wa.me/554833809837"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight" target="_blank">
                                    Atendimento via WhatsApp</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/carousel-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Refinanciamento de
                                    parcelas
                                    em atraso</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Até 80% de desconto</h1>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft">Análise
                                    Gratuita</a>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Mande um
                                    WhatsApp para a gente!</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/blog-3.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Suporte Jurídico</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Juros abusivos?</h1>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft">Reduza agora!</a>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Atendemos via WhatsApp</a>
                            </div>
                        </div>
                    </div>
                    <div class="carousel-item">
                        <img class="w-100" src="img/blog-1.jpg" alt="Image">
                        <div class="carousel-caption d-flex flex-column align-items-center justify-content-center">
                            <div class="p-3" style="max-width: 900px;">
                                <h5 class="text-white text-uppercase mb-3 animated slideInDown">Refinanciamento</h5>
                                <h1 class="display-1 text-white mb-md-4 animated zoomIn">Bloqueio por Renajud</h1>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft">Remova agora</a>
                                <a href="https://wa.me/554833809837" target="_blank"
                                    class="btn btn-outline-light py-md-3 px-md-5 animated slideInRight">Garanta valores justos</a>
                            </div>
                        </div>
                    </div>
                </div>
                <button class="carousel-control-prev" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="prev">
                    <span class="carousel-control-prev-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Slide Anterior</span>
                </button>
                <button class="carousel-control-next" type="button" data-bs-target="#header-carousel"
                    data-bs-slide="next">
                    <span class="carousel-control-next-icon" aria-hidden="true"></span>
                    <span class="visually-hidden">Próximo </span>
                </button>
            </div>

        </div>
        <!-- Navbar End-->
    `;

    document.getElementById('header').innerHTML = headerHTML;
}
