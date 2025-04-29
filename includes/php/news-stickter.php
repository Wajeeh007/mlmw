<!DOCTYPE html>
<html>
	<head>
		<!-- 
			This carousel example is created with jQuery and the carouFredSel-plugin.
			http://jquery.com
			http://caroufredsel.frebsite.nl
		-->

		<meta http-equiv="content-type" content="text/html;charset=iso-8859-1" />
		<meta name="description" value="A news ticker effect created by scrolling a definition list (DL) linear during a dynamic duration and without pausing between the transitions. The second ticker is non-circular and will therefore go back and forth." />
		<meta name="keywords" value="example, news, ticker, newsticker, javascript, scrolling, text, back, forth" />
		<title>News ticker effect by scrolling a definition list</title>

		<script src="http://code.jquery.com/jquery-1.8.2.min.js" type="text/javascript"></script>
		
		<script src="../../js/jquery.carouFredSel-6.0.4-packed.js" type="text/javascript"></script>
		<script type="text/javascript">
			$(function() {
				var _scroll = {
					delay: 1000,
					easing: 'linear',
					items: 1,
					duration: 0.07,
					timeoutDuration: 0,
					pauseOnHover: 'immediate'
				};
				$('#ticker-1').carouFredSel({
					width: 1000,
					align: false,
					items: {
						width: 'variable',
						height: 35,
						visible: 1
					},
					scroll: _scroll
				});

				$('#ticker-2').carouFredSel({
					width: 1000,
					align: false,
					circular: false,
					items: {
						width: 'variable',
						height: 35,
						visible: 2
					},
					scroll: _scroll
				});

				//	set carousels to be 100% wide
				$('.caroufredsel_wrapper').css('width', '100%');

				//	set a large width on the last DD so the ticker won't show the first item at the end
				$('#ticker-2 dd:last').width(2000);
			});
		</script>
		<style type="text/css">
			

			#wrapper {
				width: 100%;
				margin: -100px 0 0 0;
				position: absolute;
				left: 0;
				top: 10%;
			}
			
			
			#wrapper > div {
				background-color: #eee;
				border-top: 1px solid #ccc;
				border-bottom: 1px solid #ccc;
				width: 100%;
				height: 30px;
				padding: 15px 0;
				overflow: hidden;
			}
			#wrapper > div.first {
				border-bottom: none;
			}
			
			#wrapper dl {
				display: block;
				margin: 0;
			}
			#wrapper dt, #wrapper dd {
				display: block;
				float: left;
				margin: 0 10px;
				padding: 5px 10px;
			}
			#wrapper dt {
				background-color: #f66;
				color: #fff;
			}
			#wrapper dd {
				color: #333;
				margin-right: 50px;
			}

			
			
			
		</style>
	</head>
	<body>
		<div id="wrapper">
			
			<div class="first">
				<dl id="ticker-1">
					<dt>News ticker</dt>
						<dd>A news ticker (sometimes referred to as a &quot;crawler&quot;) resides in the lower third of the television screen space on television news networks dedicated to presenting headlines or minor pieces of news.</dd>
	
					<dt>Scoreboard style</dt>
						<dd>It may also refer to a long, thin scoreboard-style display seen around the front of some offices or public buildings.</dd>
	
					<dt>WWW</dt>
						<dd>Since the growth in usage of the World Wide Web, news tickers have largely syndicated news posts from the websites of the broadcasting services which produce the broadcasts.</dd>
				</dl>
			</div>
			<div>
				
			</div>
		</div>
		
		
	</body>
</html>