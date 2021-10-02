<?php if (!defined('FLUX_ROOT')) exit;
require_once (FLUX_MODULE_DIR."/news/index.php");
require_once (FLUX_THEME_DIR."/kiss/main/config.php"); ?>

  <?php if($params->get('module') != 'main'): ?>
    <?php if (isset($config['fluid'][$params->get('module')]) && $config['fluid'][$params->get('module')] == $params->get('action')): ?>
      </div></div></div>
    <?php endif ?>
    </div></div></div></div>
  <?php endif ?>
  <!-- End Sections
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div id="footer">
    <div class="container">
      <div class="row no-gutters">
        <div class="col col-xl-1 d-none d-xl-block"><!-- intentionally left empty --></div>
        <div class="col-6 col-sm-3 col-md-3">
          <ul class="footer-links">
            <?php foreach($config['footer_links'] as $label => $links): ?>
            <li><a href="<?php echo $links;?>"><?php echo $label;?></a></li>
            <?php endforeach;?>
          </ul>
        </div>
        <div class="footer-copy col-6 col-sm-3 col-md-3">
          <?php if (Flux::config('ShowCopyright')): ?>
          <p>Powered by <a href="https://github.com/rathena/FluxCP" target="_blank">FluxCP</a></p>
          <?php endif ?>
          <?php if (Flux::config('ShowRenderDetails')): ?>
          <p>
            Page generated in <strong><?php echo round(microtime(true) - __START__, 5) ?></strong> second(s).<br />
            Number of queries executed: <strong><?php echo (int)Flux::$numberOfQueries ?></strong>.
            <?php if (Flux::config('GzipCompressOutput')): ?>Gzip Compression: <strong>Enabled</strong>.<?php endif ?>
          </p>
          <?php endif ?>
        </div>
        <div class="col col-xl-1 d-none d-xl-block"><!-- intentionally left empty --></div>
        <div class="footer-copy col-11 col-sm-6 col-md-6 col-lg-5 col-xl-4">
          <p>Fanart by: Quirkilicious</p>
          <p>&copy; Copyright 2018 KISS RO<br />
            All Registered Trademarks belong to their Respective Owners and Gravity Co.LTD<br />
            Website Designed by <a href="https://renncgfx.com/" target="_blank">Rennc</a> and Coded by Nubs</p>
          <img src="<?php echo $this->themePath('includes/img/footer-copy.png') ?>" align="right" />

          <?php if(count(Flux::$appConfig->get('ThemeName', false)) > 1): ?>
          <div class="form-group">
            <select class="col-6 form-control form-control-sm" name="preferred_theme" onchange="updatePreferredTheme(this)">
              <?php foreach (Flux::$appConfig->get('ThemeName', false) as $themeName): ?>
              <option value="<?php echo htmlspecialchars($themeName) ?>"<?php if ($session->theme == $themeName) echo ' selected="selected"' ?>><?php echo htmlspecialchars($themeName) ?></option>
              <?php endforeach ?>
            </select>
          </div>
          <?php endif ?>
        </div>
      </div>
    </div>
  </div>
  <form action="<?php echo $this->urlWithQs ?>" method="post" name="preferred_theme_form" style="display: none">
      <input type="hidden" name="preferred_theme" value="" />
  </form>

<!-- End Document
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
</body>
</html>
