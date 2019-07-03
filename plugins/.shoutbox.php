<script type="text/javascript">
  function expandSbox() {
    var sbox = document.getElementById('sbox');
    var sin = document.getElementById('sInput');
    if(sbox.style.height == '280px') {
      sbox.style.overflow = 'hidden';
      sbox.style.height = '0px';
      sbox.style.paddingBottom = '0px';
      sin.style.display = 'none';
      sin.style.opacity = 0;
    } else {
      sbox.style.overflow = 'auto';
      sbox.style.height = '280px';
      sbox.style.paddingBottom = '45px';
      sin.style.display = 'block';
      sin.style.opacity = 1;
    }
  }
</script>
<script>
  $(document).ready(function() {
    jQuery("#sbox").load("./assets/php/load-comments.php",{}).fadeIn("slow");
  });

  setInterval(function(){jQuery("#sbox").load("./assets/php/load-comments.php",{}).fadeIn("slow");},2000)
</script>
<div class="sbox_wrapper">
  <div class="sbox_top" onclick="expandSbox()">
    Shoutbox
  </div>
  <div class="sbox_inner" id="sbox">

  </div>
  <form method="POST" action="./plugins/support/addShout.php">
    <input autocomplete="off" name="message" type="text" placeholder="Shout!" class="sbox_input" id="sInput"></input>
  </form>
</div>
