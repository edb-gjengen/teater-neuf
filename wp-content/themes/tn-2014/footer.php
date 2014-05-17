<?php $footer_about_text = get_theme_mod( 'footer_about_text',""); ?>
<footer id="site-footer">
	<div id="footer-container">
        <div id="footer-about">
            <h2><a href="om-oss/" class="black">Teater Neuf</a></h2>
            <!-- TODO: Move to Theme -> Customize -->
            <a href="https://viteboka.studentersamfundet.no/Den_Hvide_Knap"><img class="knapp-hvit" src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/knapp_hvit.png" /></a>
            <p><?php echo $footer_about_text; ?></p>
            <ul>
                <li class="social-icon"><a id="facebook-icon" href="http://facebook.com/teaterneuf" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/facebook.png" />Besøk oss på Facebook</a></li>
                <li class="social-icon"><a id="twitter-icon" href="http://twitter.com/teater_neuf" target="_blank"><img src="<?php bloginfo( 'stylesheet_directory' ); ?>/img/twitter.png" />eller følg oss Twitter</a>.</li>
            </ul>
        </div> <!-- #footer-about -->
    </div>

	<div id="kolofon">
        <div id="kolofon-text">Teater Neuf er en del av <a href="http://studentersamfundet.no">Det Norske Studentersamfund</a>
        </div>
	</div> <!-- #kolofon -->

	</div>
</footer> <!-- #site-footer -->
<div class="credits-wrap">
    <div class="credits">Laget med <span class="love" title="kærlighed">♥</span> av <a href="http://kak.studentersamfundet.no/" title="Kommunikasjonsavdelingen">KAK</a></div>
</div>

<?php wp_footer(); ?>

</body>
</html>
