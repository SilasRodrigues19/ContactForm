function showNotification(element, type) {
  let toastMessageJson = element.dataset[type + 'Msg'];
  let message = JSON.parse(toastMessageJson);
  let notyf = new Notyf({
    duration: 10000,
    position: {
      x: 'left',
      y: 'top',
    },
  });
  notyf[type](message);
}

let formError = document.querySelector('.form-error');
if (formError) {
  showNotification(formError, 'error');
}

let formSuccess = document.querySelector('.form-success');
if (formSuccess) {
  showNotification(formSuccess, 'success');
}
