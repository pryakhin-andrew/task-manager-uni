function checkEmail() {
	let email = document.querySelector("#emailField").value
	if (!email.includes("@")) alert("No symbol @")
	else if (!email.includes(".")) alert("No symbol .")
	else alert("Success")
}
