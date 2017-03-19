<html>
	<head>
		<meta http-equiv="cache-control" content="max-age=0" />
		<meta http-equiv="cache-control" content="no-cache" />
		<meta http-equiv="expires" content="0" />
		<meta http-equiv="expires" content="Tue, 01 Jan 1980 1:00:00 GMT" />
		<meta http-equiv="pragma" content="no-cache" />
		<meta charset="utf-8">
		<title>153 Oakwood Drive</title>
		<link rel="stylesheet" href='//cdn.jsdelivr.net/font-hack/2.020/css/hack-extended.min.css'>    
		<link rel="stylesheet" href="assets/stylesheets/homepage.css">
<?php
header("Last-Modified: " . gmdate("D, d M Y H:i:s") . " GMT");
header("Cache-Control: no-store, no-cache, must-revalidate");
header("Cache-Control: post-check=0, pre-check=0", false);
header("Pragma:no-cache");
header("Expires: Sat, 26 Jul 1997 05:00:00 GMT");
?>
	</head>
	<ul class="topnav" id="myTopnav">
		<li><a href="https://153.duckdns.org/transmission">Transmission</a></li>
		<li><a href="https://153.duckdns.org/guac">Guacamole</a></li>
		<li><a href="https://vbox.153.duckdns.org/">Virtualbox</a></li>
		<li><a href="https://git.153.duckdns.org/">Git</a></li>
		<li><a href="https://photos.153.duckdns.org/">Photos</a></li>
		<li><a href="https://freenas.153.duckdns.org/">FreeNAS</a></li>
	</ul>
	<body>
<script>
var d = new Date();
var n = d.getHours();
if (n > 19 || n < 6)
				document.body.className = "night";
else
				document.body.className = "day";
</script>
<form method="post" action="https://search.153.duckdns.org/">
	<div class="input-group col-md-8 col-md-offset-2">
		<input type="search" name="q" class="form-control input-lg autofocus" id="q" placeholder="Search for..." autocomplete="off" value="">
			<button type="submit" class="btn btn-default input-lg">
				<span class="hide_if_nojs">
					<span class="glyphicon glyphicon-search"></span>
				</span>
				<span class="hidden active_if_nojs">Start search</span>
			</button>
	</div>
</form>
<canvas id='gc' width='640' height='480'><\canvas>
<script>
p1y=p2y=40;
pt=10;
ph=100;
bx=by=50;
bd=6;
vx=vy=4;
score1=score2=0;
vai=2;
window.onload=function() {
	c=document.getElementById('gc');
	cc=c.getContext('2d');
	setInterval(update, 1000/30);
	c.addEventListener('mousemove',function(e) {
		p1y = e.clientY-ph/2;
	}
}
function reset() {
	bx=c.width/2;
	by=c.height/2;
	xv=-xv;
	yv=3;
}
function update() {
	bx += xv;
	by += yv;
	if(by<0 && yv<0) {
		yv=-yv;
	}
	if(by>c.height && yv>0) {
		yv=-yv;
	}
	if(bx<0) {
		if(by>p1y && by<p1y+ph) {
			xv=-xv;
			dy=by-(p1y+ph/2);
			yv=dy*0.3;
		} else {
			score2++;
			reset();
		}
	}
	if(bx>c.width) {
		if(by>p2y && by<p2y+ph) {
			xv=-xv;
			dy=by-(p2y+ph/2);
			yv=dy*0.3;
		} else {
			score2++;
			reset();
		}
	}
	if(by<0 && yv<0) {
		yv=-yv;
	}
	
	if(p2y+ph/2<by) {
		p2y+=vai;
	} else {
		p2y -= vai;
	}


	cc.fillStyle='black';
	cc.fillRect(0,0,c.width,c.height);
	cc.fillStyle='white';
	cc.fillRect(0,p1y,pt,ph);
	cc.fillRect(c.width-pt,p2y,pt,ph);
	cc.fillRect(bx-bd/2,by-bd/2,bd,bd);
	cc.fillText(score1,100,100);
	cc.fillText(score2,c.width-100,100);
}
</script>
</body>
</html>