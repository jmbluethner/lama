<head>
  <link rel="stylesheet" href="../assets/css/dashboard.css">
  <script src="https://ajax.googleapis.com/ajax/libs/jquery/1.11.3/jquery.min.js"></script>
  <script src="../assets/js/functions.js"></script>
</head>
<body>
  <script>
    $(document).ready(function() {
      jQuery("#sbox").load("../assets/php/load-comments.php",{}).fadeIn("slow");
    });

    setInterval(function(){jQuery("#sbox").load("../assets/php/load-comments.php",{}).fadeIn("slow");},2000)
  </script>
  <div class="sbox_wrapper">
    <div class="sbox_top" onclick="changeSbox()">
      Shoutbox
    </div>
    <div class="sbox_inner" id="sbox">

    </div>
    <form method="POST" action="../plugins/support/addShout.php" id="sForm">
      <input autocomplete="off" name="message" type="text" placeholder="Shout!" id="sInput" class="sbox_input"></input>
    </form>
  </div>
  <script type="text/javascript">
    var sbox = document.getElementById('sbox');
    var sin = document.getElementById('sInput');
    var form = document.getElementById('sForm');
    //var cont = document.getElementById('sCont');
    function collapseSbox() {
      sbox.style.overflow = 'hidden';
      sbox.style.height = '0px';
      //cont.style.height = '0px';
      sbox.style.paddingBottom = '0px';
      sin.style.display = 'none';
      sin.style.opacity = 0;
      form.style.display = 'none';
    }

    function expandSbox() {
      sbox.style.overflow = 'auto';
      sbox.style.height = '280px';
      //cont.style.height = '280px';
      sbox.style.paddingBottom = '45px';
      sin.style.display = 'block';
      sin.style.opacity = 1;
      form.style.display = 'block';
    }

    function changeSbox() {
      if(sbox.style.height == '280px') {
        // Write to Cookie
        document.cookie = "shoutbox=collapse";
        collapseSbox();
      } else {
        // Write to Cookie
        document.cookie = "shoutbox=expand";
        expandSbox();
      }
    }
    // The below doesn't work as it should .....
    window.onload = function() {
      var shoutC = getCookieByName('shoutbox');
      if(shoutC == 'collapse') {
        collapseSbox();
      } else if(shoutC =='expand') {
        sbox.style.transition = 'none';
        expandSbox();
        sbox.style.transition = '.4s ease';
      }
    };
  </script>
</body>
