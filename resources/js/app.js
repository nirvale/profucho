// resources/js/app.js


// Cambia el icono
document.addEventListener('DOMContentLoaded', () => {
  const checkbox = document.querySelector('.theme-controller');
  const savedTheme = localStorage.getItem('theme') === 'mexaDark';
  // console.log(savedTheme);
  if (checkbox) {
    checkbox.checked = savedTheme;
  }
});

// On checkbox change: save state and update theme
document.querySelector('.theme-controller').addEventListener('change', (e) => {
  const theme = e.target.checked ? 'mexaDark' : 'mexa';
  localStorage.setItem('theme', theme);
  document.documentElement.setAttribute('data-theme', theme);
});
