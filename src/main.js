let myBarChart;
let myLineChart;

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
                updateChart(university, universityIndex, 'line');
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
    // document.getElementById(`point${index}`).innerHTML = university.teaching_points_needed || 'N/A';
    document.getElementById(`research${index}`).innerHTML = university.research || 'N/A';
    document.getElementById(`citation${index}`).innerHTML = university.citation || 'N/A';
    document.getElementById(`outlook${index}`).innerHTML = university.int_outlook || 'N/A';
}

function updateChart(university, index, chartType) {
    const labels = ["Teaching", "Research", "International Outlook", "Citations", "Income"];
    const newData = [
        university.teaching,
        university.research,
        university.int_outlook,
        university.citation,
        university.income
    ];
    
    const counT = university.teaching + university.research;
    console.log(counT);

    let chart, chartElement, backgroundColors, borderColors;

    if (chartType === 'bar') {
        chart = myBarChart;
        chartElement = 'barChart';
        backgroundColors = ['rgba(75, 192, 192, 0.6)', 'rgba(255, 99, 132, 0.6)', 'rgba(255, 206, 86, 0.6)', 'rgba(54, 162, 235, 0.6)', 'rgba(153, 102, 255, 0.6)'];

        borderColors = ['rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)', 'rgba(255, 206, 86, 1)', 'rgba(54, 162, 235, 1)', 'rgba(153, 102, 255, 1)'];

    } else if (chartType === 'line') {
        chart = myLineChart;
        chartElement = 'lineChart';
        backgroundColors = ['rgba(255, 159, 64, 0)', 'rgba(54, 162, 235, 0)', 'rgba(104, 132, 245, 0)', 'rgba(75, 192, 192, 0)', 'rgba(255, 99, 132, 0)'];

        borderColors = ['rgba(255, 159, 64, 1)', 'rgba(54, 162, 235, 1)', 'rgba(104, 132, 245, 1)', 'rgba(75, 192, 192, 1)', 'rgba(255, 99, 132, 1)'];
        
    }

    // If the chart is not yet initialized, create it
    if (!chart) {
        const ctx = document.getElementById(chartElement).getContext('2d');
        chart = new Chart(ctx, {
            type: chartType,
            data: {
                labels: labels,
                datasets: [{
                    label: university.nama_univ,
                    data: newData,
                    backgroundColor: backgroundColors,
                    borderColor: borderColors,
                    borderWidth: 1,
                    fill: chartType === 'line'
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

        if (chartType === 'bar') {
            myBarChart = chart;
        } else if (chartType === 'line') {
            myLineChart = chart;
        }
    } else {
        // If the chart exists, update the datasets and labels

        // Check if the dataset for the university index already exists
        if (chart.data.datasets[index - 1]) {
            // Update the existing dataset
            chart.data.datasets[index - 1].data = newData;
            chart.data.datasets[index - 1].label = university.nama_univ;
            chart.data.datasets[index - 1].backgroundColor = backgroundColors;
            chart.data.datasets[index - 1].borderColor = borderColors;
        } else {
            // Add a new dataset if it doesn't exist
            chart.data.datasets.push({
                label: university.nama_univ,
                data: newData,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1,
                fill: chartType === 'line'
            });
        }

        // Update the chart with new data
        chart.update();
    }
}

// Example usage: assuming the input for universities 1, 2, and 3
document.getElementById("university1Input").addEventListener("keyup", function() {
    fetchUniversityData(this.value, 1);
});

document.getElementById("university2Input").addEventListener("keyup", function() {
    fetchUniversityData(this.value, 2);
});

document.getElementById("university3Input").addEventListener("keyup", function() {
    fetchUniversityData(this.value, 3);
});


// sort header

function goToUniversity() {
    const universityName = prompt("Enter the name of the university:");
    if (universityName) {
        const rows = document.querySelectorAll("table tr");
        let found = false;
        
        rows.forEach(row => {
            const cells = row.getElementsByTagName("td");
            if (cells.length > 0 && cells[2].innerText.toLowerCase() === universityName.toLowerCase()) {
                row.scrollIntoView({ behavior: "smooth", block: "center" });
                row.style.backgroundColor = "yellow";
                found = true;
            } else {
                row.style.backgroundColor = "";
            }
        });

        if (!found) {
            alert("University not found.");
        }
    }
}
