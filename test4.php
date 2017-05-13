	<script type="text/javascript" src="jquery-1.9.1.min.js">
    		$(".insert").click(function () {
    var insertText = $(this).text();
       $('#targetText').append(" "+insertText);
});
</script>
<div id="var1" class="insert">Name</div>
<div id="var2" class="insert">Street address</div>

<textarea id="targetText">some text already here</textarea>
