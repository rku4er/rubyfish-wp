<?php
    use Roots\Sage\Nav\NavWalker;
?>
<header id="masthead" class="site-header" role="banner" data-anchor-target=".hero-bg" data-top="background: rgba(255,255,255,0); border-bottom-color: rgba(204,204,204,0.4);" data-70-top-bottom="background: rgba(255,255,255,1); border-bottom-color: rgba(204,204,204,1);">

    <div class="container">

        <!-- Site title / logo -->
        <h1 class="site-title">
            <a href="<?php echo esc_url(home_url('/')); ?>" rel="home">
                <svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve" data-top="fill: rgba(255,255,255,1);" data-70-top-bottom="fill: rgba(0,0,0,1);" data-anchor-target=".hero-bg">
                    <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35 l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
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
            <p class="copyright"><a href="index.php"><svg class="svg-logo" xmlns="http://www.w3.org/2000/svg" x="0px" y="0px" width="39px" height="23px" viewBox="0 0 39 23" enable-background="new 0 0 39 23" xml:space="preserve">
                <path d="M28.65,0H4.61l10.35,11.5L4.61,23H28.65L39,11.5L28.65,0z M27,3h0.31l6.311,7H27V3z M24,20H11.35l6.3-7H24V20z M24,10h-6.35 l-6.3-7H24V10z M27.31,20H27v-7h6.62L27.31,20z M0,1v21l9.62-10.5L0,1z M3,9l2.38,2.5L3,14V9z"/>
            </svg></a><span> &copy; Rubyfish Digital 2015</span></p>

        </nav>

    </div>

</header><!-- /#header -->

