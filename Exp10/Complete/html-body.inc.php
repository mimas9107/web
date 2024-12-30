<?php
  if($conf->template == "bootstrap")
  {
    loadHTMLSegment("html-body-bootstrap.inc.php");
  }
  else if($conf->template == "flatui")
  {
    loadHTMLSegment("html-body-flatui.inc.php");
  }
  else
  {
?>
  <body>
    <header>
      <nav>

      </nav>
    </header>
    <section>
      <article>
        
      </article>
    </section>
    <aside>

    </aside>
    <footer>

    </footer>
  </body>
<?php
  }
?>
