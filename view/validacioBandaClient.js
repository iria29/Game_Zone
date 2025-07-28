const correu = document.getElementById('correu');
  const poble = document.getElementById('poble');
  const codiPostal = document.getElementById('codiPostal');
  
  const errorCorreu = document.getElementById('errorCorreu');
  const errorPoblacio = document.getElementById('errorPoblacio');
  const errorCP = document.getElementById('errorCP');

  // Validación en tiempo real
  correu.addEventListener('input', () => {
    if (correu.validity.patternMismatch) {
      correu.setCustomValidity('Introdueix el correu amb format nom@domini (extensió de 2-5 caràcters)');
    } else {
      correu.setCustomValidity('');
    }
    errorCorreu.textContent = correu.validationMessage;
  });

  poble.addEventListener('input', () => {
    if (poble.validity.patternMismatch) {
      poble.setCustomValidity('Només s\'accepten lletres per la població.');
    } else {
      poble.setCustomValidity('');
    }
    errorPoblacio.textContent = poble.validationMessage;
  });

  codiPostal.addEventListener('input', () => {
    if (codiPostal.validity.patternMismatch) {
      codiPostal.setCustomValidity('El codi postal ha de contenir només números.');
    } else if (codiPostal.value.length !== 5) {
      codiPostal.setCustomValidity('El codi postal ha de tenir exactament 5 dígits.');
    } else {
      codiPostal.setCustomValidity('');
    }
    errorCP.textContent = codiPostal.validationMessage;
  });

  // Validación en el envío del formulario
  document.querySelector('.formulari').addEventListener('submit', (e) => {
    if (!correu.validity.valid) {
      e.preventDefault();
      errorCorreu.textContent = correu.validationMessage;
    }
    if (!poble.validity.valid) {
      e.preventDefault();
      errorPoblacio.textContent = poble.validationMessage;
    }
    if (!codiPostal.validity.valid) {
      e.preventDefault();
      errorCP.textContent = codiPostal.validationMessage;
    }
  });