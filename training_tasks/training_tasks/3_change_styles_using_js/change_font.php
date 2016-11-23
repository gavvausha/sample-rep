<html>
<head>
<script>
function change(font) {
  document.getElementById('p').style.fontFamily = font;
  document.getElementById('p').style.color = font;
}
function color_change(color) {
  document.getElementById('p').style.color = color;
}
function size_change(size) {
  document.getElementById('p').style.fontSize = size;
}
</script>
</head>
<body>
<form name="f">
<select id="color" name="color" onchange="change(this.options[this.selectedIndex].text);">
<option value="">-- SELECT FONT COLOR --</option>
<option value="Red">Red</option>
<option value="Green">Green</option>
<option value="Blue">Blue</option>
</select>
<select id="fonts" name="fonts" onchange="change(this.options[this.selectedIndex].text);">
<option value="">-- SELECT FONT FAMILY --</option>
<option value="Arial">Arial</option>
<option value="Courier">Courier</option>
<option value="Times New Roman">Times New Roman</option>
</select><br /><br />
Colors:
<input id="color" type="radio" name="color" value="Red" onclick="color_change(this.value);">Red
<input id="color" type="radio" name="color" value="Green" onclick="color_change(this.value);">Green
<input id="color" type="radio" name="color" value="Blue" onclick="color_change(this.value);">Blue<br /><br />
Sizes:
<input id="color" type="radio" name="size" value="12px" onclick="size_change(this.value);">12px
<input id="color" type="radio" name="size" value="20px" onclick="size_change(this.value);">20px
<input id="color" type="radio" name="size" value="30px" onclick="size_change(this.value);">30px
</form>
<p id="p">A towel is used in case you are wet and wish to be dry.</p>
</body>
</html>
