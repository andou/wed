<?php
/**
 * Template Name: Homepage
 *
 * 
 * @package WordPress
 */
get_header();

$page = get_post();
echo apply_filters('the_content', $page->post_content);
?>
<section id="header">
  <header>
    <h1><?php echo get_field("hp_first_titolo") ?></h1>
    <p><?php echo get_field("hp_first_data") ?></p>
    <p><?php echo get_field("hp_first_mancano") ?></p>
    <div id="clockdiv">
      <div>
        <span class="days"></span>
        <div class="smalltext">Giorni</div>
      </div>
      <div>
        <span class="hours"></span>
        <div class="smalltext">Ore</div>
      </div>
      <div>
        <span class="minutes"></span>
        <div class="smalltext">Minuti</div>
      </div>
      <div>
        <span class="seconds"></span>
        <div class="smalltext">Secondi</div>
      </div>
    </div>
  </header>
  <footer>
    <a href="#banner" class="button style2 scrolly-middle"><?php echo get_field("hp_first_pulsante_scroll") ?></a>
  </footer>
</section>
<!-- Banner -->
<section id="banner">
  <header>
    <h2><?php echo get_field("hp_second_titolo") ?></h2>
  </header>
  <p><?php echo get_field("hp_second_descrizione") ?></p>
  <footer>
    <a href="#first" class="button style2 scrolly"><?php echo get_field("hp_second_pulsante_scroll") ?></a>
  </footer>  
  <footer>
    <a href="#confirm_section" class="button style2 scrolly bottom">Conferma la tua partecipazione</a>
  </footer>
</section>

<?php
$boxes = get_field("hp_info_elenco_boxes");
$counter = 0;
?>

<?php foreach ($boxes as $box): ?>
  <article<?php if ($counter == 0): ?> id="first"<?php endif; ?> class="container box <?php echo $box['hp_boxes_stile'] ?> <?php echo $box['hp_boxes_allineamento'][0] ?>">
    <?php if ($box['hp_boxes_stile'] == "style1"): ?> 
      <?php if (!empty($box['hp_boxes_immagine'])): ?> 
        <a href="#" class="image fit"><img src="<?php echo $box['hp_boxes_immagine'] ?>" alt="" /></a>
        <div class="inner">
        <?php else: ?>
          <div class="inner-noimage">
          <?php endif; ?>
          <header>
            <h2><?php echo $box['hp_boxes_header'] ?></h2>
          </header>
          <?php if ($box['hp_boxes_testo_interno']): ?>
            <p><?php echo $box['hp_boxes_testo_interno'] ?></p>
          <?php endif; ?>
        </div>
      <?php elseif ($box['hp_boxes_stile'] == "style2"): ?>
        <header>
          <h2><?php echo $box['hp_boxes_header'] ?></h2>
          <p><?php echo $box['hp_boxes_descrizione_titolo'] ?></p>
        </header>
        <div class="inner gallery">
          <?php $counter = 1; ?>
          <?php $total = count($box['hp_boxes_gallery']); ?>
          <div class="row 0%">
            <?php foreach ($box['hp_boxes_gallery'] as $image): ?>
              <div class="3u 12u(mobile)"><a href="<?php echo $image['hp_boxes_gallery_image']['sizes']['large']; ?>" class="image fit"><img src="<?php echo $image['hp_boxes_gallery_image']['sizes']['medium']; ?>" alt="" title="<?php echo $image['hp_boxes_gallery_image']['title'] ?>" /></a></div>
              <?php if ($counter != 1 && $counter != $total && $counter % 4 == 0): ?></div><div class="row 0%"><?php endif; ?>
              <?php $counter++; ?>
            <?php endforeach; ?>
          </div>
        </div>
      <?php endif; ?>
  </article>
  <?php $counter++; ?>
<?php endforeach; ?>


<!-- Contact -->
<article class="container box style3">
  <header>
    <h2 id="confirm_section" >Conferma</h2>
    <p>Scrivete qui il vostro nome, la mail, il numero di persone che parteciperanno al ricevimento, specificando nelle note: quanti adulti, quanti bambini (indicando l’età), eventuali intolleranze o scelte alimentari.</p>
  </header>
  <form id="confirm" method="post" action="submit.php">
    <div class="row 50%">
      <div class="6u 12u$(mobile)"><input id="confirm_namel" type="text" class="text" name="name" placeholder="Nome" /></div>
      <div class="6u$ 12u$(mobile)"><input id="confirm_email" type="text" class="text" name="email" placeholder="Email" /></div>
      <div class="12u$">
        <textarea id="confirm_message" name="message" placeholder="Note"></textarea>
      </div>
      <div class="12u$">
        <ul class="actions">
          <li><input type="submit" value="Conferma!" /></li>
        </ul>
      </div>
      <?php wp_nonce_field('submit_participation', '_sp'); ?>
    </div>
  </form>
  <div class="12u$">
    <ul class="actions">
      <li><a href="#first" class="button style2 scrolly bottom">Torna in cima</a></li>
    </ul>
  </div>
</article>

<button id="ez-modal-button" type="button" ezmodal-target="#ez-modal" style="display:none"></button>
<div id="ez-modal" class="ezmodal">
  <div class="ezmodal-container">
    <div class="ezmodal-header">
      <div class="ezmodal-close" data-dismiss="ezmodal">x</div>
      <span id="ezmodal-header">...</span>
    </div>
    <div class="ezmodal-content">
      ...
    </div>
    <div class="ezmodal-footer">
      <button type="button" data-dismiss="ezmodal">Close</button>       			
    </div>
  </div>
</div>


<script type="text/javascript">
  var deadline = 'September 03 2016 11:30:00 UTC+0100';
</script>
<?php
get_footer();