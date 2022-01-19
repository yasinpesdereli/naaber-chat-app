// searchBar = document.querySelector(".users .search input"),
//	searchButton = document.querySelector(".users .search button"),
const usersList = document.querySelector(".users .users-list");
/*
searchButton.onclick = () => {
	searchBar.classList.toggle("active");
	searchBar.focus();
	searchButton.classList.toggle("active");
};
*/

searchBar.onkeyup = ()=>{
	let searchTerm = searchBar.value;
	if (searchTerm != "") {
		searchBar.classList.add("active");
	}else{
		searchBar.classList.remove("active");
	}
	let xhr = new XMLHttpRequest();
	xhr.open("POST", "search.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				
				usersList.innerHTML = data;
			}
		}
	};
	xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");
	xhr.send("searchTerm=" + searchTerm);
}
setInterval(() => {
	let xhr = new XMLHttpRequest();
	xhr.open("GET", "function_main.php", true);
	xhr.onload = () => {
		if (xhr.readyState === XMLHttpRequest.DONE) {
			if (xhr.status === 200) {
				let data = xhr.response;
				if(!searchBar.classList.contains("active")){
					usersList.innerHTML = data;
				}
				
			}
		}
	};
	xhr.send();
}, 500);
