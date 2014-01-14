
<div id="headline">
    <div class="wrapper">
       <h2><a href="<?php echo $this->data['nav_urls']['mainpage']['href']?>"><?php echo $this->text( 'sitename' ); ?></a></h2>
        <div class="portlet" id="p-personal">
		    <p class="login">Codex tools:
		    <?php foreach($this->data['personal_urls'] as $key => $item) {
		        $linkf = '<a href="%s" class="%s" %s>%s</a>';
		        $class = $item['class'] .' '. ($item['active'] ? 'active':'');
		        printf( $linkf, htmlspecialchars($item['href']), $class, $skin->tooltipAndAccesskeyAttribs('pt-'.$key), htmlspecialchars($item['text']) );
		    } ?>
		    </p>
	    </div>
	</div>
</div><!-- #headline -->

<div id="pagebody" <?php $this->html("specialpageattributes"); ?>>
	<div class="wrapper">
	<?php if($this->data['sitenotice']) { ?><div id="siteNotice"><?php $this->html('sitenotice'); ?></div><?php } ?>
        <div id="bodyContent" class="col-10">
		    <h2 class="pagetitle"><?php $this->html('title'); ?></h2>
		    <!-- start content -->
		    <?php $this->html('bodytext'); ?>
		    <?php if($this->data['catlinks']) { $this->html('catlinks'); } ?>
		    <!-- end content -->
		    <?php if($this->data['dataAfterContent']) { $this->html('dataAfterContent'); } ?>
	    </div><!-- #bodyContent -->
	    <div class="col-2">
        
        <h3><label for="searchInput"><?php $this->msg('search') ?></label></h3>
        <ul id="searchBody" class="submenu">
               <li> <form action="<?php $this->text('searchaction') ?>" id="searchform"><div>
                        <input id="searchInput" name="search" type="text"<?php echo $skin->tooltipAndAccesskeyAttribs('search');
                                if( isset( $this->data['search'] ) ) {
                                        ?> value="<?php $this->text('search') ?>"<?php } ?> />
                        <input type='submit' name="go" class="searchButton" id="searchGoButton" value="<?php $this->msg('searcharticle') ?>"<?php echo $skin->tooltipAndAccesskeyAttribs( 'search-go' ); ?> />&nbsp;
                        <input type='submit' name="fulltext" class="searchButton" id="mw-searchButton" value="<?php $this->msg('searchbutton') ?>"<?php echo $skin->tooltipAndAccesskeyAttribs( 'search-fulltext' ); ?> />
                </div></li></form>
        </ul>
	        <?php $this->viewsBox(); ?>
            <?php $this->toolBox(); ?>
            <?php $this->languageBox(); ?>
	    </div>
    </div>
</div><!-- #pagebody -->
<?php
/*
		$sidebar = $this->data['sidebar'];
		if ( !isset( $sidebar['TOOLBOX'] ) ) $sidebar['TOOLBOX'] = true;
		if ( !isset( $sidebar['LANGUAGES'] ) ) $sidebar['LANGUAGES'] = true;
		foreach ($sidebar as $boxName => $cont) {
			if ( $boxName == 'TOOLBOX' ) {
				$this->toolbox();
			} elseif ( $boxName == 'LANGUAGES' ) {
				$this->languageBox();
			} else {
				$this->customBox( $boxName, $cont );
			}
		}
*/
?>

<div id="footer"<?php $this->html('userlangattributes') ?>>
    <div class="wrapper">
<?php 
        // Generate additional footer links
		$footerlinks = array(
			'lastmod', 'viewcount', 'numberofwatchingusers', 'credits', 'copyright',
			'about', 'tagline',
		);
		$validFooterLinks = array();
		
		foreach( $footerlinks as $aLink ) {
			if( isset( $this->data[$aLink] ) && $this->data[$aLink] ) {
				$validFooterLinks[] = $aLink;
			}
		}
		if ( count( $validFooterLinks ) > 0 ) { ?>
		<p>
        <?php
        $i = 1;
        $c = count($validFooterLinks);
		foreach( $validFooterLinks as $aLink )
		{
		    if( isset( $this->data[$aLink] ) && $this->data[$aLink] )
		    {
                $this->html($aLink);
                echo $i < $c ? ' | ':'';
            }
            $i++;
        }
?>      </p>
<?php   } ?>
        
    </div>
</div><!-- #footer -->
<?php
$this->html('bottomscripts'); /* JS call to runBodyOnloadHook */
$this->html('reporttime');

if( $this->data['debug'] ): ?>
<!-- Debug output:
<?php $this->text( 'debug' ); ?>

-->
<?php endif; ?>
</body>
</html>
