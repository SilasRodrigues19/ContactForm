showNotification = (type, message) => {
  const notyf = new Notyf({
    duration: 3000,
    position: { x: 'right', y: 'top' },
    ripple: true,
  });

  switch (type) {
    case 'success':
    case 'sucesso':
      notyf.success(message);
      break;
    case 'error':
    case 'erro':
      notyf.error(message);
      break;
    default:
      notyf.success({ type: type, message: message });
      break;
  }
}

const name = document.querySelector('#name');
const email = document.querySelector('#email');
const message = document.querySelector('#message');
const file = document.querySelector('#file');
const formContact = document.querySelector('#submit');

let isFormValid = true;

formContact.addEventListener('click', (e) => {

  const minNameLength = 3;
  const emailRegex = /^[a-zA-Z0-9._%+-]+@[a-zA-Z0-9.-]+\.[a-zA-Z]{2,}$/;

  if (name.value.trim().length < minNameLength) {
    showNotification('error', `Nome deve conter pelo menos ${minNameLength} caracteres`);
    isFormValid = false;
  }
  
  else if (!emailRegex.test(email.value.trim()) || email.value.trim().length === 0) {
    showNotification('error', 'Informe um e-mail válido');
    isFormValid = false;
  }

  else if (file.files.length === 0) {
    showNotification('error', 'Selecione pelo menos um arquivo');
    isFormValid = false;
  }
  
  else {
    isFormValid = true; 
    showNotification('success', 'Envio de e-mail processado');
  }

  if (!isFormValid) {
    e.preventDefault();
  }

});


message.addEventListener('keyup', () => {
  const maxMessageLength = 255;

  if (message.value.trim.length > maxMessageLength) {
    message.classList.add('border', 'focus:border-red-500', 'border-red-500');
    showNotification('error', `Limite de ${maxMessageLength} caracteres`);
    isFormValid = false;
  } else {
    message.classList.remove('focus:border-red-500', 'border-red-500');
  }

})