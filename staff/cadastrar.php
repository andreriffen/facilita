<?php 
session_start();

// Verificar se o usuário não está logado
if (empty($_SESSION['usuario_logado'])) {
    // Redirecionar para a página de login
    header("Location: login.php");
    exit;
}

// Verificar se o usuário está logado e se é um administrador
if (empty($_SESSION['usuario_logado']) || $_SESSION['usuario_logado']['admin'] !== 1) {
    // Se o usuário não for administrador, exibe uma mensagem
    $erro = "Você não tem permissão de administrador para cadastrar novos usuários.";
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
    <title>Cadastro de Funcionário</title>
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
    <!-- Topbar Start -->
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
                    <a href="pesquisar.php" class="nav-item nav-link">Pesquisar</a>
                    <?php if (!empty($_SESSION['usuario_logado']) && $_SESSION['usuario_logado']['admin'] == 1): ?>
                        <a href="cadastrar.php" class="nav-item nav-link active">Cadastrar Funcionário</a>
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
    <main>
      <section>
        <div class="container-fluid wow fadeInUp" data-wow-delay="0.1s">
          <div class="container col-lg-9">
            <?php if (!empty($erro)): ?>
                <div style="color: red; font-size: 18px;">
                    <?php echo htmlspecialchars($erro); ?>
                </div>
                <a class="btn btn-warning py-md-3 px-md-5 me-3" href="pesquisar.php"><i class="bi bi-arrow-left"></i> Voltar</a>
            <?php else: ?>
                <!-- Conteúdo da página de cadastro (apenas visível se for administrador) -->
                <h2>Cadastro de Usuário</h2>
                <form class="form-control p-5" action="cadastro-completo.php" method="POST">
              <label for="nome">Nome:</label>
              <input type="text" id="nome" name="nome" required>
              <br>
              <br>
              <label for="email">E-mail:</label>
              <input type="email" id="email" name="email" required>
              <br>
              <br>
              <label for="senha">Senha:</label>
              <input type="password" id="senha" name="senha" required>
              <br>
              <br>
              <label for="confirmar_senha">Confirmar Senha:</label>
              <input type="password" id="confirmar_senha" name="confirmar_senha" required>
              <br>
              <br>
              <button class="btn btn-warning py-md-3 px-md-5 me-3 animated slideInLeft" type="submit">Cadastrar</button>
            </form>
            <?php endif; ?>
            
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