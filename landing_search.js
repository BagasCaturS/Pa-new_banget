document.getElementById('cari').addEventListener('input', function() {
    const query = this.value;

    if (query.length > 2) {
        fetch('search.php?query=' + query)
            .then(response => response.json())
            .then(data => {
                const suggestionsList = document.getElementById('suggestions');
                suggestionsList.innerHTML = '';

                data.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    li.className = 'p-2 cursor-pointer hover:bg-gray-200';
                    li.addEventListener('click', function() {
                        insertSuggestionIntoInput(item);
                    });
                    suggestionsList.appendChild(li);
                });
            });
    }
});

function insertSuggestionIntoInput(suggestion) {
    const inputField = document.getElementById('cari');
    inputField.value = suggestion;

    // Clear the suggestions list after the selection
    const suggestionsList = document.getElementById('suggestions');
    suggestionsList.innerHTML = '';
}
