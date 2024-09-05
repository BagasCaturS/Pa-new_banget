// function getRandomColor(year) {
//     const random = Math.abs(Math.sin(year) * 16777215) % 16777215;
//     return '#' + ('000000' + Math.floor(random).toString(16)).slice(-6);
// }

// function processWorldRank(rank) {
//     let cleanedRank = rank.replace(/[^\d]/g, '');
//     return cleanedRank ? Math.floor(Number(cleanedRank)) : 0;
// }

// // Ambil data dari elemen yang sudah diberikan atribut data dari PHP
// document.addEventListener("DOMContentLoaded", function () {
//     // Ambil chart data dari atribut data- pada elemen
//     const barChartData = JSON.parse(document.getElementById('barChart').getAttribute('data-chart'));
//     const radarChartData = JSON.parse(document.getElementById('radarChart').getAttribute('data-radar'));

//     // Bar Chart
//     const ctxBar = document.getElementById('barChart').getContext('2d');
//     const barChart = new Chart(ctxBar, {
//         type: 'bar',
//         data: {
//             labels: ['Teaching', 'Research', 'Citation', 'Income', 'International Outlook'],
//             datasets: barChartData.map(data => ({
//                 label: data.year,
//                 data: data.scores,
//                 borderColor: getRandomColor(data.year),
//                 backgroundColor: getRandomColor(data.year) + '33',
//                 borderWidth: 1
//             }))
//         },
//         options: {
//             scales: {
//                 y: { beginAtZero: true }
//             }
//         }
//     });

//     // Radar Chart
//     const ctxRadar = document.getElementById('radarChart').getContext('2d');
//     const radarChart = new Chart(ctxRadar, {
//         type: 'radar',
//         data: {
//             labels: ['Teaching', 'Research', 'Citation', 'Income', 'International Outlook', 'World Rank'],
//             datasets: radarChartData.map(data => ({
//                 label: data.year,
//                 data: [
//                     data.rank_teaching,
//                     data.rank_rsc,
//                     data.rank_ctn,
//                     data.rank_inc,
//                     data.rank_int_outlook,
//                     processWorldRank(data.wrld_rank)
//                 ],
//                 borderColor: getRandomColor(data.year),
//                 backgroundColor: getRandomColor(data.year) + '33',
//                 borderWidth: 1
//             }))
//         },
//         options: {
//             responsive: true,
//             scales: {
//                 r: {
//                     beginAtZero: false,
//                     min: 1,
//                     reverse: true
//                 }
//             }
//         }
//     });
// });


document.getElementById('nama_univ').addEventListener('input', function () {
    const query = this.value;

    if (query.length > 2) {
        fetch('search.php?query=' + encodeURIComponent(query))
            .then(response => response.json())
            .then(data => {
                const suggestionsList = document.getElementById('suggestion4');
                suggestionsList.innerHTML = ''; // Clear previous suggestions

                if (data.length > 0) {
                    data.forEach(item => {
                        const li = document.createElement('li');
                        li.textContent = item;
                        li.className = 'p-2 cursor-pointer hover:bg-gray-200';
                        li.addEventListener('click', function () {
                            insertSuggestionIntoInput4(item);
                        });
                        suggestionsList.appendChild(li);
                    });
                } else {
                    // Optionally display a "no suggestions" message or keep it empty
                    const noResults = document.createElement('li');
                    noResults.textContent = 'No suggestions found';
                    noResults.className = 'p-2';
                    suggestionsList.appendChild(noResults);
                }
            })
            .catch(error => {
                console.error('Error fetching suggestions:', error);
                // Optionally, you could display an error message in the suggestions list
            });
    } else {
        document.getElementById('suggestion4').innerHTML = ''; // Clear if query length <= 2
    }
});

function insertSuggestionIntoInput4(suggestion4) {
    const inputField = document.getElementById('nama_univ');
    inputField.value = suggestion4;

    // Clear the suggestions list after the selection
    const suggestionsList = document.getElementById('suggestion4');
    suggestionsList.innerHTML = '';
}

// Optionally, hide suggestions when input loses focus
document.getElementById('nama_univ').addEventListener('blur', function () {
    setTimeout(() => {
        document.getElementById('suggestion4').innerHTML = '';
    }, 100); // Timeout to allow click on suggestion before clearing
});
