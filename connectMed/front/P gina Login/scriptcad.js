/*document.getElementById('imageInput').addEventListener('change', function (event) {
    const imageContainer = document.getElementById('imageContainer');
    const selectedImage = document.getElementById('selectedImage');
  
    const file = event.target.files[0];
  
    if (file) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        selectedImage.src = e.target.result;
        imageContainer.style.display = 'block';
      };
  
      reader.readAsDataURL(file);
    } else {
      selectedImage.src = '';
      imageContainer.style.display = 'none';
    }
  });*/

  const imageLabel = document.getElementById('imageLabel');
  const imageInput = document.getElementById('imageInput');
  const selectedImage = document.getElementById('selectedImage');
  
  imageLabel.addEventListener('click', function () {
    imageInput.click();
  });
  
  imageInput.addEventListener('change', function (event) {
    const file = event.target.files[0];
  
    if (file) {
      const reader = new FileReader();
  
      reader.onload = function (e) {
        selectedImage.src = e.target.result;
      };
  
      reader.readAsDataURL(file);
    } else {
      selectedImage.src = '';
    }
  });
  
  
  
  

//especialidades
  function addSpecialty() {
    const specialtyInput = document.getElementById('specialtyInput');
    const specialtyList = document.getElementById('specialtyList');
  
    const specialtyText = specialtyInput.value.trim();
  
    if (specialtyText !== '') {
      const specialtyItem = document.createElement('div');
      specialtyItem.className = 'specialtyItem';
  
      const specialtyTextElement = document.createElement('span');
      specialtyTextElement.className = 'specialtyText';
      specialtyTextElement.textContent = specialtyText;
  
      const removeSpecialtyIcon = document.createElement('span');
      removeSpecialtyIcon.className = 'removeSpecialty';
      removeSpecialtyIcon.textContent = 'x';
      removeSpecialtyIcon.addEventListener('click', function () {
        specialtyItem.remove();
      });
  
      specialtyItem.appendChild(specialtyTextElement);
      specialtyItem.appendChild(removeSpecialtyIcon);
  
      specialtyList.appendChild(specialtyItem);
      specialtyInput.value = '';
    }
  }
  
  function removeSpecialty(element) {
    element.parentNode.remove();
  }

  document.getElementById('specialtyForm').addEventListener('submit', function (event) {
    event.preventDefault(); // Previne o comportamento padrão de recarregar a página
  
    // Adiciona a especialidade
    addSpecialty();
  });


  
  