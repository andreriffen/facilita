document.addEventListener("DOMContentLoaded", function() {
    const footerHTML = `
    <div class="container-fluid bg-dark text-light mt-5 wow fadeInUp" data-wow-delay="0.1s">
        <div class="container">
            <div class="row gx-5">
                <div class="col-lg-4 col-md-4 footer-about">
                    <div class="d-flex flex-column align-items-center justify-content-center text-center h-100">
                        <a href="index.html" class="navbar-brand">
                            <h1 class="m-0 text-warning" >
                                <i>
                                    <svg xmlns="http://www.w3.org/2000/svg" width="50" height="50"
                                        viewBox="0 -1 25 27" fill="currentColor" stroke="none" stroke-width="1"
                                        stroke-linecap="round" stroke-linejoin="round"
                                        className="lucide lucide-layout-grid">
                                        <rect width="5" height="5" x="9" y="3.5" rx="1" transform="rotate(45)" />
                                        <rect width="5" height="5" x="9" y="-3" rx="1" transform="rotate(45)" />
                                        <rect width="5" height="5" x="9" y="-9.5" rx="1" transform="rotate(45)" />
                                        <rect width="5" height="5" x="15.5" y="3.5" rx="1" transform="rotate(45)" />
                                        <rect width="5" height="5" x="15.5" y="-3" rx="1" transform="rotate(45)" />
                                        <rect width="5" height="5" x="22" y="3.5" rx="1" transform="rotate(45)" />
                                    </svg>
                                </i> <b style="font-family: 'Bebas Neue'; font-weight: 400;">Facilita Assessoria</b>
                            </h1>
                        </a>
                        <p>
                            <b>FACILITA ASSESSORIA<br />
                            </b>
                            <i>CNPJ: 54.906.530/0001-22 <br /><br />
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
                                    <a class="text-light text-decoration-underline" href="https://maps.app.goo.gl/vLjpFyQ4j4Dsp4CF8" aria-label="Endereço da Facilita no Google Maps" target="_blank">Sala B2 e B3
                                        Sapiens Parque Florianópolis </a>&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i>
                                </p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-envelope-open text-light me-2"></i>
                                <p class="mb-0">E-mail: 
                                    <a class="text-light text-decoration-underline"
                                    href="mailto:contato@assessoriafacilita.com" aria-label="E-mail da Facilita"
                                        target="_blank"><br/>contato@assessoriafacilita</a>&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i>
                                </p>
                            </div>
                            <div class="d-flex mb-2">
                                <i class="bi bi-telephone text-light me-2"></i>
                                <p class="mb-0">
                                    <a class="text-light text-decoration-underline"
                                    href="https://wa.me/554833809837" aria-label="Telefone da Facilita" target="_blank">(48) 3380-9837
                                    </a>&nbsp;&nbsp;<i class="bi bi-box-arrow-up-right"></i>
                                </p>
                            </div>
                            <div class="d-flex mt-4 link-animated ">
                                <!-- <a class="btn btn-primary btn-square me-2" href="#" target="_blank"><i
                                            class="fab fa-twitter fw-normal"></i></a> -->
                                <a class="btn btn-light btn-square me-2 "
                                    href="https://www.facebook.com/profile.php?id=61558258871594" aria-label="Facebook da Facilita" target="_blank">
                                    <i class="fab fa-facebook-f fw-normal"></i>
                                </a>
                                <!-- <a class="btn btn-primary btn-square me-2" href="#" target="_blank"><i
                                            class="fab fa-linkedin-in fw-normal"></i></a> -->
                                <a class="btn btn-light btn-square me-2"
                                    href="https://www.instagram.com/assessoria_facilita/" aria-label="Instagram da Facilita" target="_blank">
                                    <i class="fab fa-instagram fw-normal"></i>
                                </a>
                                <!-- Botão WhatsApp -->

                                <a class="btn btn-light btn-square me-2"
                                    href="https://wa.me/554833809837/" aria-label="WhatsApp da Facilita" target="_blank">
                                    <i class="fab fa-whatsapp fw-normal"></i>
                                </a>
                                
                                
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Site</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start text-decoration-underline">
                                <a class="text-light mb-2" href="index.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Home </a>
                                <a class="text-light mb-2" href="about.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Sobre nós </a>
                                <a class="text-light mb-2" href="service.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Serviços </a>
                                <a class="text-light mb-2" href="blog.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Artigos Blog </a>
                                <a class="text-light mb-2" href="contact.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Contato </a>
                            </div>
                        </div>
                        <div class="col-lg-4 col-md-12 pt-0 pt-lg-5 mb-5">
                            <div class="section-title section-title-sm position-relative pb-3 mb-4">
                                <h3 class="text-light mb-0">Informações</h3>
                            </div>
                            <div class="link-animated d-flex flex-column justify-content-start text-decoration-underline">
                                <a class="text-light mb-2" href="privacy-policy.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Política de Privacidade </a>
                                <a class="text-light mb-2" href="cookies-policy.html">
                                    <i class="bi bi-arrow-right text-light me-2"></i>Política de Cookies </a>
                                <a class="text-light mb-2" href="lgpd.html">
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
            <div class="row justify-content-end">
                <div class="col-lg-8 col-md-6">
                    <div class="d-flex align-items-center justify-content-center" style="height: 75px;">
                        <p class="mb-0">2024 &copy; <a class="text-white border-bottom" href="#">Facilita
                                Assessoria</a>. Todos os direitos reservados | <a class="text-white border-bottom"
                                href="#">Advanced </a>⚡ </p>
                    </div>
                </div>
            </div>
        </div>
    </div>
        `;
    document.getElementById('footer').innerHTML = footerHTML;

});