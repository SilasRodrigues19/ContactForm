const textAreas = document.querySelectorAll('textarea');

textAreas.forEach((textArea) => {
  textArea.addEventListener('keyup', (e) => {
    textArea.style.height = 'auto';

    let scrollHeight = e.target.scrollHeight;
    textArea.style.height = `${scrollHeight}px`;
  });
});
