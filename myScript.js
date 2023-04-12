var myObj =
{
	init:function()
	{
		this.load_country();
	},
	load_country:function()
	{
		var xhr = new XMLHttpRequest();
		xhr.open('GET', 'https://test.haritaikinokta.com/test/harita/getCities.php',true);
		xhr.onload = function()
		{
			var countries = JSON.parse(xhr.responseText);
			countries.forEach(function(value)
				{
					var op = document.createElement('option');
					op.innerText = value.iladi;
					op.setAttribute('value', value.ilid);
					document.getElementById('country').appendChild(op);
				});
		}
		xhr.send();
	}
		
}
myObj.init();