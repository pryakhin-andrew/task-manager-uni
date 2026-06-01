const inputBox = document.getElementById('input-box')
const listContainer = document.getElementById('list-container')

function addTask() {
	if (inputBox.value === '') {
		alert('Task name is empty')
	} else {
		let li = document.createElement('li')
		li.innerHTML = inputBox.value
		listContainer.appendChild(li)

		let editButton = document.createElement('span')
		editButton.innerHTML = '&#9881'
		editButton.id = 'edit'
		editButton.classList.add('edit-button')
		li.appendChild(editButton)

		let removeButton = document.createElement('span')
		removeButton.classList.add('remove-button')
		removeButton.id = 'remove'
		removeButton.innerHTML = '\u00d7'
		li.appendChild(removeButton)
	}
	inputBox.value = '' // Отчищаем название задачи, которая уже была добавлена
	saveData() // Сохраняем задачи в Local Storage
}

listContainer.addEventListener('click', function (event) {
	if (event.target.tagName === 'LI') {
		event.target.classList.toggle('checked')
		saveData()
	} else if (event.target.id === 'remove') {
		event.target.parentElement.remove()
		saveData()
	} else if (
		event.target.id === 'edit' &&
		!event.target.parentElement.classList.contains('checked')
	) {
		const li = event.target.parentElement // Получаем задачу по которой произошло нажатие
		const currentText = li.childNodes[0].nodeValue // Вытаскиваем текст задачи

		const input = document.createElement('input')
		input.classList.add('edit-input')
		input.type = 'text'
		input.value = currentText // Устанавливаем текст задачи как значение по умолчанию

		li.insertBefore(input, event.target) // Добавляем input для смены текста задачи
		li.childNodes[0].nodeValue = '⠀' // Обнуляем текст (пустой символ)

		input.focus() //Устанавливаем фокус на поле ввода

		// Blur срабатывает при потере фокуса
		input.addEventListener('blur', function () {
			if (input.value.trim() !== '') {
				li.insertBefore(document.createTextNode(input.value), event.target) // Если значение не пустое,
				// вставляем его
				li.removeChild(li.childNodes[0]) // Удаляем прошлый текст задачи
			} else {
				li.insertBefore(document.createTextNode(currentText), event.target) // Если значение пустое,
				// возвращаем старое значение
				li.removeChild(li.childNodes[0]) // Удаляем прошлый текст задачи
			}

			li.removeChild(input) // Удаляем input
			saveData()
		})

		// Срабатывает при нажатии кнопки Enter
		input.addEventListener('keypress', function (event) {
			if (event.key === 'Enter') {
				input.blur() // Симулируем потерю фокуса
			}
		})
	}
})

function saveData() {
	localStorage.setItem('data', listContainer.innerHTML)
}

function showTask() {
	listContainer.innerHTML = localStorage.getItem('data')
}

showTask()
