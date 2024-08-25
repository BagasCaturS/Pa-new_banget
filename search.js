document.addEventListener('DOMContentLoaded', function() {
  const searchInputs = [
    document.getElementById('university1Input'),
    document.getElementById('university2Input'),
    document.getElementById('university3Input'),
  ];
  const searchInputs2 = [
    document.getElementById('search')
  ];

  searchInputs.forEach(input => {
    input.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const suggestionList = this.nextElementSibling; // Find the suggestion list that corresponds to the current input
      fetchUniversities(searchTerm, suggestionList, input);
    });
  });
  searchInputs2.forEach(input => {
    input.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const suggestionList = this.nextElementSibling; // Find the suggestion list that corresponds to the current input
      fetchUniversities(searchTerm, suggestionList, input);
    });
  });

  function fetchUniversities(searchTerm, suggestionList, inputElement) {
    fetch('univ.json')
      .then(response => response.json())
      .then(data => {
        const filteredUniversities = data.filter(university =>
          university.nama_univ.toLowerCase().includes(searchTerm)
        );
        displaySuggestions(filteredUniversities, suggestionList, inputElement);
      })
      .catch(error => {
        console.error('Error fetching university data:', error);
      });
  }

  function displaySuggestions(universities, suggestionList, inputElement) {
    suggestionList.innerHTML = '';

    universities.forEach(university => {
      const suggestion = document.createElement('li');
      suggestion.classList.add('suggestion');
      suggestion.textContent = university.nama_univ;
      suggestion.addEventListener('click', function() {
        inputElement.value = university.nama_univ;
        suggestionList.innerHTML = ''; // Clear the suggestion list after selection
      });
      suggestionList.appendChild(suggestion);
    });
  }
});

document.addEventListener('DOMContentLoaded', function() {
  const searchInputs = [
    document.getElementById('search'),
  ];
  searchInputs.forEach(input => {
    input.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      const suggestionList = this.nextElementSibling; // Find the suggestion list that corresponds to the current input
      fetchUniversities(searchTerm, suggestionList, input);
    });
  });

  function fetchUniversities(searchTerm, suggestionList, inputElement) {
    fetch('univ.json')
      .then(response => response.json())
      .then(data => {
        const filteredUniversities = data.filter(university =>
          university.nama_univ.toLowerCase().includes(searchTerm)
        );
        displaySuggestions(filteredUniversities, suggestionList, inputElement);
      })
      .catch(error => {
        console.error('Error fetching university data:', error);
      });
  }

  function displaySuggestions(universities, suggestionList, inputElement) {
    suggestionList.innerHTML = '';

    universities.forEach(university => {
      const suggestion = document.createElement('li');
      suggestion.classList.add('suggestion');
      suggestion.textContent = university.nama_univ;
      suggestion.addEventListener('click', function() {
        inputElement.value = university.nama_univ;
        suggestionList.innerHTML = ''; // Clear the suggestion list after selection
      });
      suggestionList.appendChild(suggestion);
    });
  }
});
