const notifyDuration = 10000;

showMailNotification = (element, type) => {
  let toastMessageJson = element.dataset[type + 'Msg'];
  let message = JSON.parse(toastMessageJson);
  let notyf = new Notyf({
    duration: notifyDuration,
    position: {
      x: 'left',
      y: 'top',
    },
  });
  notyf[type](message);
};

const redirect = () => {
  setTimeout(() => {
    window.location.href = '/ContactForm';
  }, notifyDuration + notifyDuration / 4);
};

let formError = document.querySelector('.form-error');
if (formError) {
  showMailNotification(formError, 'error');
  redirect();
}

let formSuccess = document.querySelector('.form-success');
if (formSuccess) {
  showMailNotification(formSuccess, 'success');
  redirect();
}
