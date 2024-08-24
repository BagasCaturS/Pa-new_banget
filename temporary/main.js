document.addEventListener('DOMContentLoaded', function() {
    const searchInput = document.getElementById('search');
    const suggestionList = document.getElementById('suggestion-list');
  
    searchInput.addEventListener('input', function() {
      const searchTerm = this.value.toLowerCase();
      fetchUniversities(searchTerm);
    });
  
    function fetchUniversities(searchTerm) {
      fetch('univ.json')
        .then(response => response.json())
        .then(data => {
          const filteredUniversities = data.filter(university =>
            university.nama_univ.toLowerCase().includes(searchTerm)
          );
          displaySuggestions(filteredUniversities);
        })
        .catch(error => {
          console.error('Error fetching university data:', error);
        });
    }
  
    function displaySuggestions(universities) {
      suggestionList.innerHTML = '';
  
      universities.forEach(university => {
        const suggestion = document.createElement('li');
        suggestion.classList.add('suggestion');
        suggestion.textContent = university.nama_univ;
        suggestion.addEventListener('click', function() {
          searchInput.value = university.nama_univ;
          suggestionList.innerHTML = '';
        });
        suggestionList.appendChild(suggestion);
      });
    }
  });