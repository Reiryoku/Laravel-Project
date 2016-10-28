<style>
footer {
    background: #000;
    color: #fff;
    padding: 20px;
	font-weight:bold;
    font-size: 13px;
}

footer .links {
    margin-bottom: 20px;
}
footer .links:before, 
footer .links:after {
    content: " ";
    display: table;
}
footer .links:after {
    clear: both;
}
footer .links ul {
    list-style-type: none;
    padding: 0;
    margin: 0;
    float: left;
    width: calc(100% - 150px);
}
footer .links ul:before, 
footer .links ul:after {
    content: " ";
    display: table;
}
footer .links ul:after {
    clear: both;
}
footer .links ul li {
    float: left;
    padding: 0 30px 0 0;
    text-transform: uppercase;
}
footer a {
    color: #fff;
}
footer .links .social {
    float: right;
}
footer .links .social .fa {
    font-size: 16px;
    margin-left: 10px;
    vertical-align: middle;
}
footer .copyright {
    color: #777;
    font-size: 11px;
}
footer .copyright:before, 
footer .copyright:after {
    content: " ";
    display: table;
}
footer .copyright:after {
    clear: both;
}
footer .copyright .trakt {
    float: left;
    white-space: nowrap;
}
footer .copyright .trakt .logo {
    margin-right: 13px;
    opacity: .3;
}
footer .copyright .amazon {
    display: block;
    float: right;
    color: #777;
    white-space: nowrap;
    transition: all .5s;
}
footer .copyright .amazon .icon {
    float: right;
    margin-left: 10px;
}
footer .copyright .amazon .icon .fa {
    font-size: 30px;
}
footer .copyright .amazon .text {
    float: right;
    text-align: right;
}
</style>

<footer>
	<div class="links">
		<ul class="left-side">
			<li><a href="/about">About</a></li>
			<li><a target="_blank" href="https://blog.trakt.tv">Blog</a></li>
			<li><a href="/forums/">Forums</a></li>
			<li><a target="_blank" href="http://docs.trakt.apiary.io">API</a></li>
			<li><a href="/oauth/applications">Create an App</a></li>
			<li><a class="import-movie-link" href="#">Import Movie</a></li>
			<li><a class="import-show-link" href="#">Import TV Show</a></li>
			<li><a target="_blank" href="/advertise">Advertise</a></li>
			<li><a target="_blank" href="http://support.trakt.tv">Help</a></li>
			<li><a href="/terms">Terms</a></li>
			<li><a href="/privacy">Privacy</a></li>
		</ul>
		<div class="social">
			<a href="https://blog.trakt.tv">
				<div class="fa fa-medium"></div>
			</a>
			<a href="https://twitter.com/trakt">
				<div class="fa fa-twitter"></div>
			</a>
			<a href="https://facebook.com/trakt.tv">
				<div class="fa fa-facebook"></div>
			</a>
			<a href="https://google.com/+TraktTv">
				<div class="fa fa-google-plus"></div>
			</a>
		</div>
	</div>
	<div class="copyright">
		<div class="trakt">
        	<img align="left" class="logo" height="30" src="http://test.subztv.gr//themes/subztv/assets/bootstrap/img/logo.png" alt="Mini white logo@2x">
            © 2010-2016 trakt, inc. All rights reserved.<br>Hand crafted in San Diego and the Bay Area.
        </div>
		<a target="_blank" class="amazon" href="/amazon">
			<div class="icon">
				<div class="fa fa-amazon"></div>
			</div>
			<div class="text">Shop at Amazon.com<br>to help support us!</div>
		</a>
	</div>
</footer>
