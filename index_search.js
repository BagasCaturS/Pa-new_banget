document.getElementById('university2').addEventListener('input', function() {
    const query = this.value;

    if (query.length > 2) {
        fetch('search.php?query=' + query)
            .then(response => response.json())
            .then(data => {
                const suggestionsList = document.getElementById('suggestions2');
                suggestionsList.innerHTML = '';

                data.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    li.className = 'p-2 cursor-pointer hover:bg-gray-200';
                    li.addEventListener('click', function() {
                        insertSuggestionIntoInput2(item);
                    });
                    suggestionsList.appendChild(li);
                });
            });
    }
});

function insertSuggestionIntoInput2(suggestion) {
    const inputField = document.getElementById('university2');
    inputField.value = suggestion;

    // Clear the suggestions list after the selection
    const suggestionsList = document.getElementById('suggestions2');
    suggestionsList.innerHTML = '';
}




document.getElementById('university3').addEventListener('input', function() {
    const query = this.value;

    if (query.length > 2) {
        fetch('search.php?query=' + query)
            .then(response => response.json())
            .then(data => {
                const suggestionsList = document.getElementById('suggestions3');
                suggestionsList.innerHTML = '';

                data.forEach(item => {
                    const li = document.createElement('li');
                    li.textContent = item;
                    li.className = 'p-2 cursor-pointer hover:bg-gray-200';
                    li.addEventListener('click', function() {
                        insertSuggestionIntoInput3(item);
                    });
                    suggestionsList.appendChild(li);
                });
            });
    }
});

function insertSuggestionIntoInput3(suggestion) {
    const inputField = document.getElementById('university3');
    inputField.value = suggestion;

    // Clear the suggestions list after the selection
    const suggestionsList = document.getElementById('suggestions3');
    suggestionsList.innerHTML = '';
}


