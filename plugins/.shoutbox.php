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
<div class="sbox_wrapper">
  <div class="sbox_top" onclick="expandSbox()">
    Shoutbox
  </div>
  <div class="sbox_inner" id="sbox">
    <div class="sbox_message">
      <span>Username</span><br>Hey there!
    </div>
    <input type="text" placeholder="Shout!" class="sbox_input"></input>
  </div>
</div>
