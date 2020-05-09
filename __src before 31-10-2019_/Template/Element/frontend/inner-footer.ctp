<footer>

    <div class="container footer-content">

        <div class="row text-center text-md-left">
            <div class="col-sm-12 col-md-3">
                <div class="logo">
                    <img src="<?php echo HTTP_ROOT . 'img/footer-logo.png' ?>" width="130"/>
                </div>
                <div class="footer-text footer-text-logo">
                    <?php echo __('ALEGRO is part of Alegro Holdings, LDA. Your first choice for online travel & related services.'); ?>
                </div>
                <div class="social-logos">
                    <ul class="list-inline color-white">
                        <li class="list-inline-item">
                            <a target="_blank" href="https://www.facebook.com/AlegroAO">
                                <i class="fab fa-facebook-f"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a  target="_blank" href="https://twitter.com/AlegroAO">
                                <i class="fab fa-twitter"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a  target="_blank" href="https://www.instagram.com/alegro_ao/">
                                <i class="fab fa-instagram"></i>
                            </a>
                        </li>
                        <li class="list-inline-item">
                            <a  target="_blank" href="https://www.youtube.com/channel/UCUQ4iZ5fNQEEHCT9Imc3dvA">
                                <i class="fab fa-youtube"></i>
                            </a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-md-2 offset-xl-1">
                <div class="footer-menu-title">
                    <?php echo __('ALEGRO');?>
                </div>
                <div class="footer-menu-links-list footer-text">
                    <ul>
                        <li>
                            <a href="<?php echo HTTP_ROOT.'about-us'?>"><?php echo __('Aboutio');?></a>
                        </li>
                        <li>
                            <a href="<?php echo HTTP_ROOT.'contact-us'?>"><?php echo __('Lets Talk');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Jobs');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Blog');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Site Map');?></a>
                        </li>
                    </ul>
                </div>
            </div>

            <div class="col-6 col-md-2">
                <div class="footer-menu-title">
                    <?php echo __('SERVICES');?>
                </div>
                <div class="footer-menu-links-list footer-text">
                    <ul>
                        <li>
                            <a href="<?=HTTP_ROOT;?>extranets"><?php echo __('Add Property');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Advertising');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Go Mobile');?></a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-6 col-md-2">
                <div class="footer-menu-title">
                    <?php echo __('MORE');?>
                </div>
                <div class="footer-menu-links-list footer-text">
                    <ul>
                        <li>
                            <a href="#"><?php echo __('Airlines');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Properties');?></a>
                        </li>
                    </ul>
                </div>
            </div>
            
            <div class="col-6 col-md-2">
                <div class="footer-menu-title">
                    <?php echo __('SITE/CURRENCY');?>
                </div>
                <div class="footer-menu-links-list footer-text">
                    <ul>
                    <li>
                            <a href="#"><?php echo __('Investors');?></a>
                        </li>
                        <li>
                            <a href="#"><?php echo __('Press');?></a>
                        </li>
                    </ul>
                </div>
            </div>
            
        </div>

    </div>

    <section id="copyright" class="main-yellow-bg">
        <div class="copyright-content">
            <div class="container">
                <div class="row justify-content-between text-center">
                    <div class="col-lg-3 col-md-4 copyright-text text-left nav-link">
                        <?php echo __('copyright');?>
                        
                    </div>

                    <div class="col-lg-6 col-md-8 col-sm-12">
                        <div class="row justify-content-end">
                            <div class="col-sm-3 col-3">
                                <a class="nav-link" href="<?php echo HTTP_ROOT.'privacy-policy'?>"><?php echo __('Privacy Policy');?></a>
                            </div>
                            <div class="col-sm-3 col-3">
                                <a class="nav-link" href="<?php echo HTTP_ROOT.'cookies-policy'?>"><?php echo __('Cookies Policy');?></a>
                            </div>
                            <div class="col-sm-3 col-3">
                                <a class="nav-link" href="<?php echo HTTP_ROOT.'terms-conditions'?>"><?php echo __('Terms of Use');?></a>
                            </div>
                            <div class="col-sm-3 col-3">
                                <a class="nav-link" href="<?php echo HTTP_ROOT.'faq'?>"><?php echo __('FAQ');?></a>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
</footer>
<script>
$(document).ready(function(){
  $(".navbar-toggler").click(function(){
    $(".navbar-collapse").toggleClass("show");
  });
});
</script>