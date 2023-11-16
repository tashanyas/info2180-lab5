window.onload=function(){
	let search = document.getElementById("lookup");
    let citylookup = document.getElementById("citylookup");
	search.addEventListener('click', function(e){
		e.preventDefault();
		let country = document.getElementById("country").value;
		let h_req = new XMLHttpRequest();


		h_req.onreadystatechange = function() {
			if (h_req.readyState == XMLHttpRequest.DONE) {
				if (h_req.status == 200){	
					let r = h_req.responseText;
					let result = document.getElementById('result');
					result.innerHTML = r;
				}else{
					alert("Error!");
				}
			}
		}
		console.log(country);
		h_req.open('GET', 'http://localhost/info2180-lab5/world.php?country='+country, true);
		h_req.send();
	});
    citylookup.addEventListener('click',function(e){
		e.preventDefault();
		let search = document.getElementById("country").value;
		let h_req = new XMLHttpRequest();
		h_req .onreadystatechange = function() {
			if (h_req .readyState == XMLHttpRequest.DONE) {
				if (h_req .status == 200){	
					let r = h_req .responseText;
					let result = document.getElementById('result');
					result.innerHTML = r;
				}else{
					alert("Error!");
				}
			}
		}
		console.log(search);
		h_req .open('GET', 'http://localhost/info2180-lab5/world.php?country='+search+'&context=cities', true);
		h_req .send();
	});
}