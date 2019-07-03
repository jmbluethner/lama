<script type="text/javascript">
  function expandSbox() {
    var sbox = document.getElementById('sbox');
    if(sbox.style.height == '280px') {
      sbox.style.overflow = 'hidden';
      sbox.style.height = '0px';
    } else {
      sbox.style.overflow = 'auto';
      sbox.style.height = '280px';
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
</div>
