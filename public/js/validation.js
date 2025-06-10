const specialChars = /[!@#$%^&*(),.?":{}|<>]/g;

// Obtención de los elementos del formulario
const submitButton = document.getElementById('createTask'); // Botón de envío
const nameCreate = document.getElementById('nameCreate');
const dateCreate = document.getElementById('dateCreate');
const dateEdit = document.getElementById('dateEdit');

function validateField(field, condition) {
    if (condition) {
        field.classList.remove('successForm');
        field.classList.add('dangerForm');
    } else {
        field.classList.remove('dangerForm');
        field.classList.add('successForm');
    }
    validateForm(); // Llamar a la validación del formulario después de cada cambio
}

// Función para verificar si el formulario es válido y habilitar el botón
function validateForm() {
    const isNameValid = nameCreate.classList.contains('successForm');
    const isDateCreateValid = dateCreate.classList.contains('successForm');
    const isDateEditValid = dateEdit ? dateEdit.classList.contains('successForm') : true;

    if (isNameValid && isDateCreateValid && isDateEditValid) {
        submitButton.removeAttribute('disabled'); // Habilitar el botón
    } else {
        submitButton.setAttribute('disabled', 'true'); // Deshabilitar el botón
    }
}

// Deshabilitar el botón por defecto al cargar la página
submitButton.setAttribute('disabled', 'true');

// Validación del campo "Nombre"
nameCreate.addEventListener('input', function() {
    validateField(nameCreate, nameCreate.value.trim() === '' || specialChars.test(nameCreate.value));
});

// Validación del campo "Fecha de Creación"
dateCreate.addEventListener('input', function() {
    const dateValue = new Date(dateCreate.value);
    validateField(dateCreate, isNaN(dateValue.getTime()));
});

// Validación del campo "Fecha de Edición"
if (dateEdit) {
    dateEdit.addEventListener('input', function() {
        const dateValue = new Date(dateEdit.value);
        validateField(dateEdit, isNaN(dateValue.getTime()));
    });
}
