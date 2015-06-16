<?php
    use Roots\Sage\Nav\NavWalker;
?>
<header id="masthead" class="site-header" role="banner" data-anchor-target=".hero-bg" data-top="background: rgba(255,255,255,0); border-bottom-color: rgba(204,204,204,0);" data-70-top-bottom="background: rgba(255,255,255,1); border-bottom-color: rgba(204,204,204,1);">

    <div class="container">

        <!-- Site title / logo -->
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                     width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve"
                     data-top="fill: rgba(255,255,255,1);" data-70-top-bottom="fill: rgba(0,0,0,1);" data-anchor-target=".hero-bg">
                  <path display="none" fill="#ffffff" stroke="#000000" stroke-width="2.318" stroke-miterlimit="10" d="M7.52-0.56
                    c0,2.35-1.4,4.37-3.41,5.28C3.9,4.81,3.68,4.9,3.46,4.97C2.92,5.14,2.33,5.23,1.73,5.23c-0.59,0-1.16-0.09-1.69-0.25
                    C-0.2,4.91-0.43,4.82-0.65,4.72c-2.02-0.91-3.42-2.93-3.42-5.28s1.4-4.38,3.42-5.28c0.22-0.11,0.45-0.2,0.69-0.27
                    c0.53-0.16,1.1-0.25,1.69-0.25c0.6,0,1.19,0.09,1.73,0.26C3.68-6.03,3.9-5.94,4.11-5.84C6.12-4.94,7.52-2.91,7.52-0.56z"/>
                    <path display="none" fill="#ffffff" stroke="#000000" stroke-width="1.518" stroke-miterlimit="10" d="M5.52-0.562
                    c0,1.539-0.917,2.862-2.233,3.458C3.149,2.955,3.005,3.014,2.861,3.06c-0.354,0.111-0.74,0.17-1.133,0.17
                    c-0.387,0-0.76-0.059-1.107-0.164C0.464,3.021,0.313,2.961,0.17,2.896C-1.153,2.3-2.07,0.977-2.07-0.562
                    c0-1.539,0.917-2.869,2.24-3.458C0.313-4.092,0.464-4.15,0.622-4.196C0.969-4.301,1.342-4.36,1.729-4.36
                    c0.393,0,0.779,0.059,1.133,0.17c0.144,0.046,0.288,0.105,0.425,0.17C4.603-3.43,5.52-2.101,5.52-0.562z"/>
                    <path display="none" fill="#ffffff" stroke="#000000" stroke-width="2" stroke-miterlimit="10" d="M2.528,10.529
                    C3.064,1.156,11.097-6.008,20.471-5.472c9.373,0.536,16.538,8.569,16.002,17.943c-0.536,9.373-8.57,16.538-17.943,16.002"/>
                    <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35
                    l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
                </svg>
            </a>
        </h1>


        <div class="responsive-title" data-0="opacity: 0;" data-500="opacity: 1;">
            <?php
                if(is_home() || is_single() || is_404())
                {
                    echo 'Rubyfish';
                }
                else
                {
                    echo str_replace('Archives','',str_replace('Work Types','',str_replace('- Rubyfish','',wp_title( ' ', false, 'right' ))));
                }

            ?>
        </div>


        <div class="responsive-toggle-menu-overlay"></div>

        <!-- Button for opening the responsive menu -->
        <button id="toggle-menu" type="button" role="button" class="lines-button x">
            <span class="lines line-top" data-anchor-target=".hero-bg" data-top="background: rgba(255,255,255,1);" data-70-top-bottom="background: rgba(0,0,0,1);"></span>
            <span class="lines line-middle" data-anchor-target=".hero-bg" data-top="background: rgba(255,255,255,1);" data-70-top-bottom="background: rgba(0,0,0,1);"></span>
            <span class="lines line-bottom" data-anchor-target=".hero-bg" data-top="background: rgba(255,255,255,1);" data-70-top-bottom="background: rgba(0,0,0,1);"></span>
        </button>


        <!-- Main navigation -->
        <nav class="main-nav">

            <?php
            if (has_nav_menu('primary_navigation')) :
                wp_nav_menu(array('theme_location' => 'primary_navigation', 'walker' => new NavWalker(), 'menu_class' => 'menu-nav-ul'));
            endif;
            ?>

            <!-- Responsive menu copyright -->
            <p class="copyright"><a href="index.php"><svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px"
                                                          width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve">
                    <path display="none" fill="#ffffff" stroke="#000000" stroke-width="2.318" stroke-miterlimit="10" d="M7.52-0.56
                    c0,2.35-1.4,4.37-3.41,5.28C3.9,4.81,3.68,4.9,3.46,4.97C2.92,5.14,2.33,5.23,1.73,5.23c-0.59,0-1.16-0.09-1.69-0.25
                    C-0.2,4.91-0.43,4.82-0.65,4.72c-2.02-0.91-3.42-2.93-3.42-5.28s1.4-4.38,3.42-5.28c0.22-0.11,0.45-0.2,0.69-0.27
                    c0.53-0.16,1.1-0.25,1.69-0.25c0.6,0,1.19,0.09,1.73,0.26C3.68-6.03,3.9-5.94,4.11-5.84C6.12-4.94,7.52-2.91,7.52-0.56z"/>
                        <path display="none" fill="#ffffff" stroke="#000000" stroke-width="1.518" stroke-miterlimit="10" d="M5.52-0.562
                    c0,1.539-0.917,2.862-2.233,3.458C3.149,2.955,3.005,3.014,2.861,3.06c-0.354,0.111-0.74,0.17-1.133,0.17
                    c-0.387,0-0.76-0.059-1.107-0.164C0.464,3.021,0.313,2.961,0.17,2.896C-1.153,2.3-2.07,0.977-2.07-0.562
                    c0-1.539,0.917-2.869,2.24-3.458C0.313-4.092,0.464-4.15,0.622-4.196C0.969-4.301,1.342-4.36,1.729-4.36
                    c0.393,0,0.779,0.059,1.133,0.17c0.144,0.046,0.288,0.105,0.425,0.17C4.603-3.43,5.52-2.101,5.52-0.562z"/>
                        <path display="none" fill="#ffffff" stroke="#000000" stroke-width="2" stroke-miterlimit="10" d="M2.528,10.529
                    C3.064,1.156,11.097-6.008,20.471-5.472c9.373,0.536,16.538,8.569,16.002,17.943c-0.536,9.373-8.57,16.538-17.943,16.002"/>
                        <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35
                    l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
                </svg></a><span> &copy; Rubyfish Digital 2015</span></p>

        </nav>

    </div>

</header><!-- /#header -->

