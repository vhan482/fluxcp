<?php if (!defined('FLUX_ROOT')) exit; ?>
<!DOCTYPE html>
<html lang="en">
<head>

  <!-- Basic Page Needs
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta charset="utf-8">
  <meta http-equiv="Content-Type" content="text/html; charset=utf-8" />
  <?php if (isset($metaRefresh)): ?>
  <meta http-equiv="refresh" content="<?php echo $metaRefresh['seconds'] ?>; URL=<?php echo $metaRefresh['location'] ?>" />
  <?php endif ?>
  <title><?php echo Flux::config('SiteTitle'); if (isset($title)) echo ": $title" ?></title>

  <!-- Mobile Specific Metas
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <meta name="viewport" content="width=device-width, initial-scale=1.0, maximum-scale=1.0, user-scalable=no, height=device-height"/>

  <!-- FONT
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="//fonts.googleapis.com/css?family=Raleway:400,300,600" rel="stylesheet" type="text/css">

  <!-- CSS
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link href="<?php echo $this->themePath('css/flux/unitip.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
  <?php if (Flux::config('EnableReCaptcha')): ?>
  <link href="<?php echo $this->themePath('css/flux/recaptcha.css') ?>" rel="stylesheet" type="text/css" media="screen" title="" charset="utf-8" />
  <?php endif ?>
  <!--[if IE]>
  <link rel="stylesheet" href="<?php echo $this->themePath('css/flux/ie.css') ?>" type="text/css" media="screen" title="" charset="utf-8" />
  <![endif]-->
  <link rel="stylesheet" href="<?php echo $this->themePath('includes/css/styles.css') ?>" type="text/css" charset="utf-8">
  <link rel="stylesheet" href="<?php echo $this->themePath('includes/css/fireworks.css') ?>" type="text/css" charset="utf-8">

  <!-- Favicon
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <link rel="icon" type="image/png" href="<?php echo $this->themePath('includes/img/favicon.png') ?>">

<script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery-3.4.1.min.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery-migrate-1.2.1.min.js') ?>"></script>
<!-- <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script> -->
<!-- <script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.14.7/umd/popper.min.js" integrity="sha384-UO2eT0CpHqdSJQ6hJty5KVphtPhzWj9WO1clHTMGa3JDZwrnQq4sF86dIHNDz0W1" crossorigin="anonymous"></script> -->
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/bootstrap.bundle.min.js') ?>"></script>

<script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery.scrollpointer.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery.slick.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/jquery.ellipsis.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/datatables.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/time.js') ?>"></script>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/fireworks.js') ?>"></script>
<!--[if lt IE 9]>
<script src="<?php echo $this->themePath('js/ie9.js') ?>" type="text/javascript"></script>
<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitpngfix.js') ?>"></script>
<![endif]-->
<script type="text/javascript" src="<?php echo $this->themePath('js/flux.unitip.js') ?>"></script>

<?php if (Flux::config('EnableReCaptcha')): ?>
<script src='https://www.google.com/recaptcha/api.js'></script>
<?php endif ?>
<script type="text/javascript" src="<?php echo $this->themePath('includes/js/scripts.js') ?>"></script>
<script type="text/javascript">
  function updatePreferredTheme(sel){
    var preferred = sel.options[sel.selectedIndex].value;
    document.preferred_theme_form.preferred_theme.value = preferred;
    document.preferred_theme_form.submit();
  }

  // Preload spinner image.
  var spinner = new Image();
  spinner.src = '<?php echo $this->themePath('img/spinner.gif') ?>';

  function refreshSecurityCode(imgSelector){
    $(imgSelector).attr('src', spinner.src);

    // Load image, spinner will be active until loading is complete.
    var clean = <?php echo Flux::config('UseCleanUrls') ? 'true' : 'false' ?>;
    var image = new Image();
    console.log(clean)
    image.src = "<?php echo $this->url('captcha') ?>"+(clean ? '?nocache=' : '&nocache=')+Math.random();
    console.log(image)
    console.log("<?php echo $this->url('captcha') ?>")

    $(imgSelector).attr('src', image.src);
  }
  function toggleSearchForm()
  {
    //$('.search-form').toggle();
    $('.search-form').slideToggle('fast');
  }

  function setCookie(key, value) {
      var expires = new Date();
      expires.setTime(expires.getTime() + expires.getTime()); // never expires
      document.cookie = key + '=' + value + ';expires=' + expires.toUTCString();
  }

  <?php if (Flux::config('EnableReCaptcha') && Flux::config('ReCaptchaTheme')): ?>
       var RecaptchaOptions = {
        theme : '<?php echo Flux::config('ReCaptchaTheme') ?>'
       };
  <?php endif ?>

  $(document).ready(function(){

    if($('.data-tables').length > 0) {
      $('.data-tables').DataTable( {
          "pagingType": "numbers",
          "responsive": true
      });
    }

    <?php if(isset($news)): ?>
    if($('#news-slider').length > 0) {
      $('#news-slider').slick({
        arrows: true,
        centerMode: true,
        focusOnSelect: true,
        centerPadding: '40px',
        slidesToShow: <?php echo (count($news) >= 5 ? 5 : count($news)); ?>,
        responsive: [
        {
          breakpoint: 1200,
          settings: {
            arrows: true,
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 992,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '30px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 768,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 3
          }
        },
        {
          breakpoint: 576,
          settings: {
            arrows: false,
            centerMode: true,
            centerPadding: '20px',
            slidesToShow: 1
          }
        }
        ]
      });
    }
    <?php endif ?>

    if($('#job-sprite li').length > 0) {
      $('#job-sprite li').click(function (e) {
        var t = ''
        var el = $(this);
        $('#section-job h2').text(el.find('.subs').text());
        $('.job-text').slideUp(400);
        var job = el.attr('data-job');
        $('#job-sprite li').removeClass('active');
        $(this).addClass('active');

        $('#'+ job + '-text').slideDown(400);
        var getUrl = window.location;
        var baseUrl = getUrl.protocol + "//" + getUrl.host + "/" + getUrl.pathname.split('/')[1];
        $('#job-img').fadeOut(400, function(){
          $('#job-img').css('background-image', "url('<?php echo $this->themePath('includes/img/job/') ?>"+ job +".png')");
          $('#job-img').fadeIn(400);
        })
      });
    }

    $('.money-input').keyup(function() {
      var creditValue = parseInt($(this).val() / <?php echo Flux::config('CreditExchangeRate') ?>, 10);
      if (isNaN(creditValue))
        $('.credit-input').val('?');
      else
        $('.credit-input').val(creditValue);
    }).keyup();
    $('.credit-input').keyup(function() {
      var moneyValue = parseFloat($(this).val() * <?php echo Flux::config('CreditExchangeRate') ?>);
      if (isNaN(moneyValue))
        $('.money-input').val('?');
      else
        $('.money-input').val(moneyValue.toFixed(2));
    }).keyup();
  });

  function reload(){
    window.location.href = '<?php echo $this->url ?>';
  }
</script>
</head>
<body>
<canvas id="canvas"></canvas>
  <?php include $this->themePath('main/sidenav.php', true) ?>
  <?php include $this->themePath('main/navbar.php', true) ?>

  <?php  if(! ($params->get('module') == 'main' && $params->get('action') == 'index')) { ?>
  <!-- Section Start Layout
  –––––––––––––––––––––––––––––––––––––––––––––––––– -->
  <div class="sections-container" data-fs-scroll>
    <div class="sections">
        <div class="core section section-main" id="section-main">
          <div id="core-logo"></div>

          <div class="container">
            <!-- Sub menu -->
            <?php include $this->themePath('main/submenu.php', true) ?>
          </div>
          <?php require_once (FLUX_THEME_DIR."/kiss/main/config.php"); ?>
          <?php if (isset($core['fluid'][$params->get('module')]) && $core['fluid'][$params->get('module')] == $params->get('action')): ?>

          <div class="row justify-content-md-center">
          <div class="col-12 col-lg-11">
          <div class="container-fluid extended-container">
          <?php else: ?>
          <div class="container core-inner">
          <?php endif ?>
            <?php if (Flux::config('DebugMode') && @gethostbyname(Flux::config('ServerAddress')) == '127.0.0.1'): ?>
              <div class="alert alert-warning" role="alert">
                Please change your <strong>ServerAddress</strong> directive in your application config to your server's real address (e.g., myserver.com).
              </div>
            <?php endif ?>

            <!-- Messages -->
            <?php if ($message=$session->getMessage()): ?>
              <div class="alert alert-primary" role="alert">
                <?php echo htmlspecialchars($message) ?>
              </div>
            <?php endif ?>

            <!-- Page menu -->
            <?php include $this->themePath('main/pagemenu.php', true) ?>
  <?php } ?>