<?php 
session_start();

// Verificar se o usuário não está logado
if (empty($_SESSION['usuario_logado'])) {
    // Redirecionar para a página de login
    header("Location: login.php");
    exit;
}

// Verificar se o usuário clicou no botão de logout
if (isset($_POST['logout'])) {
    session_unset();
    session_destroy();
    header("Location: login.php");
    exit;
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<!-- 
======================================================
2025 © Future Company Digital 🚀
Todos os direitos reservados

https://futurecompany.com.br/

======================================================
-->
<head>
    <meta charset="UTF-8">
    <title>Pesquisar</title>
    <link href="../img/favicon.ico" rel="icon">
    <link rel="preconnect" href="https://fonts.googleapis.com">
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
    <link href="https://fonts.googleapis.com/css2?family=Bebas+Neue&family=Montserrat:ital,wght@0,100..900;1,100..900&display=swap" rel="stylesheet">
    <link href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.10.0/css/all.min.css" rel="stylesheet">
    <link href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.4.1/font/bootstrap-icons.css" rel="stylesheet">
    <link href="../lib/owlcarousel/assets/owl.carousel.min.css" rel="stylesheet">
    <link href="../lib/animate/animate.min.css" rel="stylesheet">
    <link href="../css/bootstrap.min.css" rel="stylesheet">
    <link href="../css/style.css" rel="stylesheet">
  </head>

<body>
    <header><!-- Topbar Start -->
        <div id="topbar" class="container-fluid bg-secondary px-5 d-none d-lg-block ">
          <div class="row gx-0">
            <div class="col-lg-12 text-center text-lg-start mb-2 mb-lg-0">
              <div class="d-inline-flex align-items-center" style="height: 45px;">
                <marquee scrollamount="6">
                  <small class="me-3 text-primary"> Bem-vindo, 
                    <?php echo htmlspecialchars($_SESSION['usuario_logado']['nome']); ?> (
                    <?php echo htmlspecialchars($_SESSION['usuario_logado']['email']); ?>) 
                  </small>
                  <small> &nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp&nbsp<a href="#" aria-label="ASSESSORIA FACILITA JURIDICA - A maior especialista em negociação de dívidas
                                bancárias do Brasil. CNPJ: 54.906.530/0001-22" style="text-decoration: none; color: #001348;"> &copy; ASSESSORIA FACILITA JURIDICA - A maior especialista em negociação de dívidas bancárias do Brasil. CNPJ: 54.906.530/0001-22</a>
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
              <a href="#" class="navbar-brand p-0">
                <h1 class="mt-4">
                  <svg xmlns="http://www.w3.org/2000/svg" id="logo-facilita" width="50" height="50" viewBox="0 -1 25 27" fill="currentColor" stroke="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round">
                    <rect width="5" height="5" x="9" y="3.5" rx="1" transform="rotate(45)" />
                    <rect width="5" height="5" x="9" y="-3" rx="1" transform="rotate(45)" />
                    <rect width="5" height="5" x="9" y="-9.5" rx="1" transform="rotate(45)" />
                    <rect width="5" height="5" x="15.5" y="3.5" rx="1" transform="rotate(45)" />
                    <rect width="5" height="5" x="15.5" y="-3" rx="1" transform="rotate(45)" />
                    <rect width="5" height="5" x="22" y="3.5" rx="1" transform="rotate(45)" />
                  </svg>
                  <b style="font-family: 'Bebas Neue'; font-weight: 400;">ASSESSORIA</b>
                  <b style="font-family: 'Bebas Neue'; font-weight: 400; letter-spacing: 0.1rem;">FACILITA</b>
                </h1>
              </a>
            </div>
            <button class="navbar-toggler" type="button" data-bs-toggle="collapse" data-bs-target="#navbarCollapse">
              <span class="fa fa-bars"></span>
            </button>
                    <div class="collapse navbar-collapse" id="navbarCollapse">
                      <div class="navbar-nav ms-auto py-3">
                        <!-- Exibir os links de Login e Registrar se o usuário NÃO estiver logado -->
                        <?php if (empty($_SESSION['usuario_logado'])): ?>
                            <a href="login.php" class="nav-item nav-link">Login</a>
                        <?php else: ?>
                            <!-- Se o usuário estiver logado, exibir os links -->
                            <a href="pesquisar.php" class="nav-item nav-link active">Pesquisar</a>
                            <?php if (!empty($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['admin'] == 1): ?>
                                <a href="cadastrar.php" class="nav-item nav-link">Cadastrar Funcionário</a>
                            <?php endif; ?>
                            <form action="" method="post" style="display:inline;">
                                <input type="hidden" name="logout" value="1">
                                <a href="javascript:void(0);" onclick="this.closest('form').submit();" class="nav-item nav-link">Sair</a>
                            </form>
                        <?php endif; ?>
                      </div>
                    </div>
          </nav>
          <!-- TÍTULO AQUI -->
          <div class="container-fluid bg-dark py-3 bg-header" style="margin-bottom: 90px; user-select:none;">
            <div class="row py-5">
              <div class="col-12 pt-lg-5 mt-lg-5 text-center">
                <h2 class="display-4 text-white animated zoomIn">Staff</h2>
                <p href="#" class="h5 text-white">Área restrita</p>
              </div>
            </div>
          </div>
          <!-- TÍTULO AQUI -->
        </div>
        <!-- Navbar End-->
    </header>
    
    
    <main>
        
        <section>
        
            <div class="container-fluid py-5 wow fadeInUp" data-wow-delay="0.1s">
                <div class="container col-lg-9">
                        
                        <!-- CLIENTE -->
                        <form class="form-control p-5" action="cliente.php" method="POST">
                            <h3><i class="bi bi-person"></i> Pesquisar Cliente</h3>
                            
                            <!-- Critério -->
                            
                            <select class="py-md-3 px-md-3 me-3" name="tipo_criterio_cliente" id="tipo_criterio_cliente" required>
                                <option value="" disabled selected>Pesquisar por...↓</option>
                                <option value="nome">Nome</option>
                                <option value="telefone">Telefone</option>
                                <option value="email">E-mail</option>
                            </select>
                        
                            <!-- Input busca -->
                            <input class="py-md-3 px-md-3 me-3" placeholder="Insira o termo da pesquisa" type="text" id="criterio_cliente" name="criterio_cliente" required>
                            
                            <button class="btn btn-warning py-md-3 px-md-5 me-3 mt-2 animated slideInLeft" type="submit">
                                Pesquisar Cliente
                            </button>
                        </form>

                        
                        <br><hr><br>
                    
                        <!-- VEÍCULO -->
                        <form class="form-control p-5" action="veiculo.php" method="POST">
                            <h3><svg xmlns="http://www.w3.org/2000/svg" width="32" height="32" fill="currentColor" class="bi bi-car-front" viewBox="0 0 16 16">
                                  <path d="M4 9a1 1 0 1 1-2 0 1 1 0 0 1 2 0m10 0a1 1 0 1 1-2 0 1 1 0 0 1 2 0M6 8a1 1 0 0 0 0 2h4a1 1 0 1 0 0-2zM4.862 4.276 3.906 6.19a.51.51 0 0 0 .497.731c.91-.073 2.35-.17 3.597-.17s2.688.097 3.597.17a.51.51 0 0 0 .497-.731l-.956-1.913A.5.5 0 0 0 10.691 4H5.309a.5.5 0 0 0-.447.276"/>
                                  <path d="M2.52 3.515A2.5 2.5 0 0 1 4.82 2h6.362c1 0 1.904.596 2.298 1.515l.792 1.848c.075.175.21.319.38.404.5.25.855.715.965 1.262l.335 1.679q.05.242.049.49v.413c0 .814-.39 1.543-1 1.997V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.338c-1.292.048-2.745.088-4 .088s-2.708-.04-4-.088V13.5a.5.5 0 0 1-.5.5h-2a.5.5 0 0 1-.5-.5v-1.892c-.61-.454-1-1.183-1-1.997v-.413a2.5 2.5 0 0 1 .049-.49l.335-1.68c.11-.546.465-1.012.964-1.261a.8.8 0 0 0 .381-.404l.792-1.848ZM4.82 3a1.5 1.5 0 0 0-1.379.91l-.792 1.847a1.8 1.8 0 0 1-.853.904.8.8 0 0 0-.43.564L1.03 8.904a1.5 1.5 0 0 0-.03.294v.413c0 .796.62 1.448 1.408 1.484 1.555.07 3.786.155 5.592.155s4.037-.084 5.592-.155A1.48 1.48 0 0 0 15 9.611v-.413q0-.148-.03-.294l-.335-1.68a.8.8 0 0 0-.43-.563 1.8 1.8 0 0 1-.853-.904l-.792-1.848A1.5 1.5 0 0 0 11.18 3z"/>
                                </svg> Pesquisar Veículo</h3>
                            <input class="py-md-3 px-md-3 me-3" placeholder="Placa do veículo" type="text" id="placa" name="placa" required>
                            <button class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft" type="submit">
                                Pesquisar Veículo
                                </button>
                        </form>
                        
                        <br><hr><br>
                    
                        <!-- Formulário para Financiamento -->
                        <form class="form-control p-5" action="financiamento.php" method="POST">
                            <h3><i class="bi bi-calendar3"></i> Financiamento </h3>
                            <input class="py-md-3 px-md-3 me-3" placeholder="Identificador" type="number" id="id_financiamento" name="id_financiamento" required>
                            <button class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft" type="submit">
                                Pesquisar Financiamento 
                            </button>
                        </form>
                    
                </div>
                
            </div>

        </section>

    </main>

    <!-- FOOTER -->
    <footer>
      <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.3s">
        <div class="container">
          <div class="row gx-3">
            <div class="col-lg-4 col-md-4 footer-about">
              <div class="d-flex flex-column align-items-center justify-content-center text-center h-100">
                <a href="index" class="navbar-brand mt-2">
                  <h1 class="m-0 text-warning">
                    <i>
                      <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50" viewBox="0 -1 25 27" fill="currentColor" stroke="none" stroke-width="1" stroke-linecap="round" stroke-linejoin="round" className="lucide lucide-layout-grid">
                        <rect width="5" height="5" x="9" y="3.5" rx="1" transform="rotate(45)" />
                        <rect width="5" height="5" x="9" y="-3" rx="1" transform="rotate(45)" />
                        <rect width="5" height="5" x="9" y="-9.5" rx="1" transform="rotate(45)" />
                        <rect width="5" height="5" x="15.5" y="3.5" rx="1" transform="rotate(45)" />
                        <rect width="5" height="5" x="15.5" y="-3" rx="1" transform="rotate(45)" />
                        <rect width="5" height="5" x="22" y="3.5" rx="1" transform="rotate(45)" />
                      </svg>
                    </i>
                    <b style="font-family: 'Bebas Neue'; font-weight: 400;">Assessoria Facilita</b>
                  </h1>
                </a>
                <p>
                  <b>Assessoria Facilita <br />
                  </b>
                  <i>CNPJ: 54.906.530/0001-22 <br />
                    <br />
                  </i> A maior especialista em negociação de dívidas bancárias do Brasil.
                </p>
              </div>
            </div>
            <div class="col-lg-8 col-md-6">
              <div class="row gx-5 ">
                <div class="col-lg-4 col-md-12 pt-5 mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="text-light mb-0">Atendimento</h3>
                  </div>
                  <div class="d-flex mb-2">
                    <i class="bi bi-geo-alt text-light me-2"></i>
                    <p class="mb-0">
                      <a class="text-light text-decoration-underline" href="https://maps.app.goo.gl/fHNw7bYhxjiyqxRN7" aria-label="Endereço da Facilita no Google Maps" target="_blank">  ACATEFlorianópolis </a>&nbsp;&nbsp; <i class="bi bi-box-arrow-up-right"></i>
                    </p>
                  </div>
                  <div class="d-flex mb-2">
                    <i class="bi bi-envelope-open text-light me-2"></i>
                    <p class="mb-0">E-mail: <a class="text-light text-decoration-underline" href="mailto:contato@assessoriafacilita.com" aria-label="E-mail da Facilita" target="_blank">
                        <br />contato@assessoriafacilita </a>&nbsp;&nbsp; <i class="bi bi-box-arrow-up-right"></i>
                    </p>
                  </div>
                  <div class="d-flex mb-2">
                    <i class="bi bi-telephone text-light me-2"></i>
                    <p class="mb-0">
                      <a class="text-light text-decoration-underline" href="https://wa.me/554833809837" aria-label="Telefone da Facilita" target="_blank">(48) 3380-9837 </a>&nbsp;&nbsp; <i class="bi bi-box-arrow-up-right"></i>
                    </p>
                  </div>
                  <div class="d-flex mt-4 link-animated ">
                    <!-- <a class="btn btn-primary btn-square me-2" href="#" target="_blank"><i
                                class="fab fa-twitter fw-normal"></i></a> -->
                    <a class="btn btn-light btn-square me-2 " href="https://www.facebook.com/profile.php?id=61558258871594" aria-label="Facebook da Facilita" target="_blank">
                      <i class="fab fa-facebook-f fw-normal"></i>
                    </a>
                    <!-- <a class="btn btn-primary btn-square me-2" href="#" target="_blank"><i
                                class="fab fa-linkedin-in fw-normal"></i></a> -->
                    <a class="btn btn-light btn-square me-2" href="https://www.instagram.com/assessoria_facilita/" aria-label="Instagram da Facilita" target="_blank">
                      <i class="fab fa-instagram fw-normal"></i>
                    </a>
                    <!-- Botão WhatsApp -->
                    <a class="btn btn-light btn-square me-2" href="https://wa.me/554833809837/" aria-label="WhatsApp da Facilita" target="_blank">
                      <i class="fab fa-whatsapp fw-normal"></i>
                    </a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="text-light mb-0">Site</h3>
                  </div>
                  <div class="link-animated d-flex flex-column justify-content-start text-decoration-underline">
                    <a class="text-light mb-2" href="index">
                      <i class="bi bi-arrow-right text-light me-2"></i>Home </a>
                    <a class="text-light mb-2" href="about">
                      <i class="bi bi-arrow-right text-light me-2"></i>Sobre nós </a>
                    <a class="text-light mb-2" href="service">
                      <i class="bi bi-arrow-right text-light me-2"></i>Serviços </a>
                    <a class="text-light mb-2" href="blog">
                      <i class="bi bi-arrow-right text-light me-2"></i>Artigos Blog </a>
                    <a class="text-light mb-2" href="contact">
                      <i class="bi bi-arrow-right text-light me-2"></i>Contato </a>
                  </div>
                </div>
                <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                  <div class="section-title section-title-sm position-relative pb-3 mb-4">
                    <h3 class="text-light mb-0">Informações</h3>
                  </div>
                  <div class="link-animated d-flex flex-column justify-content-start text-decoration-underline">
                    <a class="text-light mb-2" href="privacy-policy">
                      <i class="bi bi-arrow-right text-light me-2"></i>Política de Privacidade </a>
                    <a class="text-light mb-2" href="cookies-policy">
                      <i class="bi bi-arrow-right text-light me-2"></i>Política de Cookies </a>
                    <a class="text-light mb-2" href="lgpd">
                      <i class="bi bi-arrow-right text-light me-2"></i>LGPD </a>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="container-fluid text-white" style="background: #061429;">
        <div class="container text-center">
          <div class="row justify-content-center">
            <div class="col-lg-8 col-md-6">
              <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                <p class="mb-0">2025 &copy; <a class="text-white border-bottom" href="#">Assessoria Facilita </a>. Todos os direitos reservados | <a class="text-white border-bottom" target="_blank" href="https://futurecompany.com.br/">Future Company Digital🚀</a>
                </p>
              </div>
            </div>
          </div>
        </div>
      </div>
    </footer>
    <!-- Back to Top -->
    <a href="#" class="btn btn-lg btn-warning btn-lg-square rounded back-to-top">
      <i class="bi bi-arrow-up"></i>
    </a>
    <!-- Schema.org Markup -->
    <script type="application/ld+json">
      {
        "@context": "https://schema.org",
        "@type": "LocalBusiness",
        "name": "Assessoria Facilita",
        "url": "https://www.assessoriafacilita.com",
        "logo": "https://assessoriafacilita.com/img/logo.jpg",
        "contactPoint": {
          "@type": "ContactPoint",
          "telephone": "+55 48 3380-9837",
          "contactType": "customer service",
          "areaServed": "BR",
          "availableLanguage": "Portuguese"
        },
        "address": {
          "@type": "PostalAddress",
          "streetAddress": "Av. Luiz Boiteux Piazza, 1302",
          "addressLocality": "Canasvieiras",
          "addressRegion": "Florianópolis",
          "postalCode": "88056-000",
          "addressCountry": "BR"
        },
        "taxID": "54.906.530/0001-22"
      }
    </script>
    <!-- JavaScript Libraries -->
    <script src="https://code.jquery.com/jquery-3.4.1.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.0.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="../lib/wow/wow.min.js"></script>
    <script src="../lib/easing/easing.min.js"></script>
    <script src="../lib/waypoints/waypoints.min.js"></script>
    <script src="../lib/counterup/counterup.min.js"></script>
    <script src="../lib/owlcarousel/owl.carousel.min.js"></script>
    <!-- Template Javascript -->
    <script src="../js/main.js"></script>
  </body>
</html>