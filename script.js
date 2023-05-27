const form = document.querySelector('form');
const inputs = form.querySelectorAll('input, textarea');
const answeredCount = document.getElementById('answered-count');
let answered = 0;

form.addEventListener('input', () => {
  answered = Array.from(inputs).reduce((count, input) => {
    if (input.value.trim() !== '') {
      return count + 1;
    }
    return count;
  }, 0);

  answeredCount.textContent = `${answered-6} question${answered !== 1 ? 's' : ''} answered`;
});
