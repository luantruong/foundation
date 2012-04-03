<style>
    .example .block-grid li {
    background: none repeat scroll 0 0 #DDDDDD;
    padding: 10px 0;
}

</style>
<div class="example">
<h3>Layout</h3>
<h4 class="subheader">Reusable, easy to modify layout conventions, for when the Grid isn't quite enough.</h4>
<hr />
<h4>Mobile Visibility</h4>
<p>
	With Foundation 2.0 we've included various mobile visibility affordance classes. Want to hide something on phones, or show it only on tablets? Got you covered.
</p>
<p>
	For example, the following text should describe the device you're using: <strong class="show-on-desktops">You are on a desktop machine.</strong>
	<strong class="show-on-tablets">You are on a tablet device.</strong>
	<strong class="show-on-phones">You are on a smartphone like an iPhone or Android phone.</strong>
</p>
<p>
	That example uses the 'show-on-x' classes seen here:
</p>
<script src="http://snipt.net/embed/a7968083577a212d09620877721886ab"></script>
<p>
	This example uses the opposite rules, so the following text should describe the device you're using: <strong class="hide-on-desktops">You are not on a desktop machine.</strong>
	<strong class="hide-on-tablets">You are not on a tablet device.</strong>
	<strong class="hide-on-phones">You are not on a smartphone like an iPhone or Android phone.</strong>
</p>
<script src="http://snipt.net/embed/130c5ea301ed6dee9b79dd188c2e1b5b"></script>
<p>
	Each of these classes have an implied 'only' as in 'show <strong>only</strong> on tablet' or 'hide <strong>only</strong> on phones'.
</p>
<hr />
<h4>Block Grids</h4>
<p>
	Block grids are ULs with 2-up, 3-up, 4-up and 5-up styles. These are ideal for blocked-in content generated by an application, as they do not require rows or even numbers of elements to display correctly.
</p>
<p>
	By default these blocks will stay in their N-up configuration on mobile devices, but you can add a class of 'mobile' to have them reshuffle on smartphones into one element per line, just like the Grid.
</p>
<h5>Two-up</h5>
<ul class="block-grid two-up">
	<li>
		Two-up element
	</li>
	<li>
		Two-up element
	</li>
	<li>
		Two-up element
	</li>
	<li>
		Two-up element
	</li>
	<li>
		Two-up element
	</li>
</ul>
<h5>Three-up</h5>
<ul class="block-grid three-up">
	<li>
		Three-up element
	</li>
	<li>
		Three-up element
	</li>
	<li>
		Three-up element
	</li>
	<li>
		Three-up element
	</li>
	<li>
		Three-up element
	</li>
</ul>
<h5>Four-up (Mobile)</h5>
<ul class="block-grid mobile four-up">
	<li>
		Four-up element
	</li>
	<li>
		Four-up element
	</li>
	<li>
		Four-up element
	</li>
	<li>
		Four-up element
	</li>
	<li>
		Four-up element
	</li>
	<li>
		Four-up element
	</li>
</ul>
<h5>Five-up</h5>
<ul class="block-grid five-up">
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
	<li>
		Five-up element
	</li>
</ul>

</div>