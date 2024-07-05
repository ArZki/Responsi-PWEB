function pilihJudul() {
	const selectElement = document.getElementById("judulBuku")

	Books.forEach((book) => {
		const option = document.createElement("option")
		option.value = book
		option.textContent = book
		selectElement.appendChild(option)
	})
}

window.onload = pilihJudul
