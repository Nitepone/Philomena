<!doctype html>


<html lang="en">
  <head>
    <title>Night Horse</title>
    <link rel="stylesheet" type="text/css" href="style.css"/>
    <link rel="shortcut icon" type="image/x-icon" href="favicon.ico">
    <link href="https://fonts.googleapis.com/css?family=Roboto" rel="stylesheet">
    <link rel="stylesheet" href="lib/fa/css/all.min.css">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
  </head>

  <body>
    <div class="navbar">
      <a onclick="loadcontent()" style="padding:.5em; padding-right:1em; padding-left:1em;" href="#"><img height=37em src="bird.png"/></a>
      <a onclick="loadcontent('#about')" href="#about">About</a>
      <a onclick="loadcontent('#projects')" href="#projects">Projects</a>
      <a class="btn" href="#contact">Contact</a>
    </div>

    <div id="content" class="content"></div>

    <div class="footer">
      <a href="https://github.com/nitepone">
        <i class="fab fa-github-alt fa-3x"></i>
      </a>
      <a href="https://gitlab.com/Nitepone">
        <i class="fab fa-gitlab fa-3x"></i>
      </a>
    </div>

    <script type="text/javascript" src="https://code.jquery.com/jquery-1.11.0.min.js"></script>
		<script type="text/javascript">
			async function loadcontent(page) {
				var hash = window.location.hash;
				switch (page) {
					case "#about":
						$("#content").load("about.html");
						break;
					case "#contact":
						$("#content").load("contact.html");
						break;
					case "#projects":
						$("#content").load("projects.html");
						break;
					case "#home":
					default:
						$("#content").load("home.html");
						break;
				}
			}
			$(".btn").on('click', loadcontent(e.target.href));
			loadcontent(window.location.hash);
		</script>


  </body>
</html>
