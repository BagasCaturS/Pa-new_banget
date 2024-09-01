let myBarChart;
let myRadarChart;
const universityColors = {
    1: { backgroundColor: 'rgba(255, 99, 132, 0.3)', borderColor: 'rgba(255, 99, 132, 1)' },
    2: { backgroundColor: 'rgba(54, 162, 235, 0.3)', borderColor: 'rgba(54, 162, 235, 1)' },
    3: { backgroundColor: 'rgba(0, 255, 47, 0.3)', borderColor: 'rgba(27, 170, 53, 1)' }
};

function fetchUniversityData(searchTerm, universityIndex) {
    if (searchTerm === '') return;

    // Fetch university data based on the search term
    fetch(`./fetch_uni_name.php?q=${encodeURIComponent(searchTerm)}`)
        .then(response => response.json())
        .then(data => {
            if (data.length > 0) {
                // Assuming the data contains only one university per search
                const university = data[0];

                // Update the university details in the HTML
                updateUniversityDetails(university, universityIndex);

                // Update the charts with the university data
                updateChart(university, universityIndex, 'bar');
            } else {
                console.log("No data found");
            }
        })
        .catch(error => console.error('Error fetching data:', error));
}

function updateUniversityDetails(university, index) {
    // Update the HTML elements with the university details
    document.getElementById(`univ${index}`).innerHTML = university.nama_univ || 'N/A';
    document.getElementById(`lokasi${index}`).innerHTML = university.lokasi || 'N/A';
    document.getElementById(`wrld_rank${index}`).innerHTML = university.wrld_rank || 'N/A';
    document.getElementById(`teaching${index}`).innerHTML = university.teaching || 'N/A';
    document.getElementById(`research${index}`).innerHTML = university.research || 'N/A';
    document.getElementById(`citation${index}`).innerHTML = university.citation || 'N/A';
    document.getElementById(`outlook${index}`).innerHTML = university.int_outlook || 'N/A';
    document.getElementById(`tanggal${index}`).innerHTML = university.tanggal || 'N/A';
}

function updateChart(university, index, chartType) {
    const labels = ["Teaching", "Research", "International Outlook", "Citations", "Income"];
    const newData = [
        university.teaching,
        university.research,
        university.int_outlook,
        university.citation,
        university.income,
    ];
    
    const tanggal = [
        university.tanggal,
    ] 

    const labelsRanking = ["Rank Income", " Rank Citation", "Rank Research", "Rank International Outlook", " Rank Teaching", "World Rank"];
    const ranking =[
        university.rank_inc,
        university.rank_ctn,
        university.rank_rsc,
        university.rank_int_outlook,
        university.rank_teaching,
        university.wrld_rank,
    ];
    
    const backgroundColors = universityColors[index].backgroundColor;
    const borderColors = universityColors[index].borderColor;

    // If the chart is not yet initialized, create it
    if (!myBarChart) {
        const ctx = document.getElementById('barChart').getContext('2d');
        myBarChart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: university.nama_univ,
                    data: newData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1
                }]
            },
            options: {
                responsive: true,
                scales: {
                    y: {
                        beginAtZero: true
                    }
                }
            }
        });
    } 
    if (!myRadarChart) {
        const ctxRadar = document.getElementById('radarChart').getContext('2d');
        myRadarChart = new Chart(ctxRadar, {
            type: 'radar',
            data: {
                labels: labelsRanking,
                datasets: [
                    {
                        label: university.nama_univ,
                        data: ranking,
                        backgroundColor: backgroundColors,
                        borderColor: borderColors,
                        borderWidth: 1,
                    },
                ],
            },
            options: {
                responsive: true,
                scales: {
                    r: {
                        beginAtZero: false,
                        min: 1,
                        reverse: true,
                    }
                }
            },
        });
    }
    else {
        // If the chart exists, update the datasets and labels

        // Check if the dataset for the university index already exists
        if (myBarChart.data.datasets[index - 1]) {
            // Update the existing dataset
            myBarChart.data.datasets[index - 1].data = newData;
            myBarChart.data.datasets[index - 1].label = university.nama_univ;
            myBarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
            myBarChart.data.datasets[index - 1].borderColor = borderColors;
        } else {
            // Add a new dataset if it doesn't exist
            myBarChart.data.datasets.push({
                label: university.nama_univ,
                data: newData,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            });
        }
        if (myRadarChart.data.datasets[index - 1]) {
            // Update the existing dataset
            myRadarChart.data.datasets[index - 1].data = ranking;
            myRadarChart.data.datasets[index - 1].label = university.nama_univ;
            myRadarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
            myRadarChart.data.datasets[index - 1].borderColor = borderColors;
        } else {
            // Add a new dataset if it doesn't exist
            myRadarChart.data.datasets.push({
                label: university.nama_univ,
                data: ranking,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            });
        }

        // Update the chart with new data
        myRadarChart.update();
        myBarChart.update();
    }
}

// Fetch Telkom University data by default
fetchUniversityData('Telkom University', 1);


document.getElementById("university2Input").addEventListener("keyup", function() {
    fetchUniversityData(this.value, 2);
});

document.getElementById("university3Input").addEventListener("keyup", function() {
    fetchUniversityData(this.value, 3);
});


// sort header

// function goToUniversity() {
//     const universityName = prompt("Enter the name of the university:");
//     if (universityName) {
//         const rows = document.querySelectorAll("table tr");
//         let found = false;
        
//         rows.forEach(row => {
//             const cells = row.getElementsByTagName("td");
//             if (cells.length > 0 && cells[2].innerText.toLowerCase() === universityName.toLowerCase()) {
//                 row.scrollIntoView({ behavior: "smooth", block: "center" });
//                 row.style.backgroundColor = "yellow";
//                 found = true;
//             } else {
//                 row.style.backgroundColor = "";
//             }
//         });

//         if (!found) {
//             alert("University not found.");
//         }
//     }
// }
