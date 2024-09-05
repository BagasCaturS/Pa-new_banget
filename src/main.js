let myBarChart;
let myRadarChart;
const universityColors = {
    1: { backgroundColor: 'rgba(255, 99, 132, 0.3)', borderColor: 'rgba(255, 99, 132, 1)' },
    2: { backgroundColor: 'rgba(54, 162, 235, 0.3)', borderColor: 'rgba(54, 162, 235, 1)' },
    3: { backgroundColor: 'rgba(0, 255, 47, 0.3)', borderColor: 'rgba(27, 170, 53, 1)' }
};

// Function to sanitize data by removing special characters
function sanitizeData(data) {
    const sanitizedData = JSON.parse(JSON.stringify(data)); // Deep clone the data

    // Regular expression to match special characters you want to remove
    const specialCharRegex = /[+\-]/g;

    // Iterate through each property in the data and sanitize it
    for (let key in sanitizedData) {
        if (sanitizedData[key] && typeof sanitizedData[key] === 'string') {
            sanitizedData[key] = sanitizedData[key].replace(specialCharRegex, '');
        }
    }

    // Apply the function to get the first four digits of the world ranking
    if (sanitizedData.wrld_rank) {
        sanitizedData.wrld_rank = getFirstFourDigits(sanitizedData.wrld_rank);
    }

    return sanitizedData;
}

// Function to get the first four digits of a string unless it contains "reporter"
function getFirstFourDigits(value) {
    // Check if the value contains "reporter"
    if (value.toLowerCase().includes("reporter")) {
        return value; // Return the original value if it contains "reporter"
    }
// data telkom bisa keluar karena d slice tapi data yang masih 501-dsb gabisa
    return value.toString().slice(0, 4);
}

document.addEventListener("DOMContentLoaded", function() {
    if (universityData[0]) {
        const sanitizedData = sanitizeData(universityData[0]);
        updateUniversityDetails(sanitizedData, 1);
        updateChart(sanitizedData, 1, 'bar');
    }

    if (universityData[1]) {
        const sanitizedData = sanitizeData(universityData[1]);
        updateUniversityDetails(sanitizedData, 2);
        updateChart(sanitizedData, 2, 'bar');
    }

    if (universityData[2]) {
        const sanitizedData = sanitizeData(universityData[2]);
        updateUniversityDetails(sanitizedData, 3);
        updateChart(sanitizedData, 3, 'bar');
    }
});

// Function to update university details in the HTML
function updateUniversityDetails(university, index) {
    document.getElementById(`univ${index}`).innerHTML = university.nama_univ || 'N/A';
    document.getElementById(`lokasi${index}`).innerHTML = university.lokasi || 'N/A';
    document.getElementById(`wrld_rank${index}`).innerHTML = university.wrld_rank || 'N/A';
    document.getElementById(`teaching${index}`).innerHTML = university.teaching || 'N/A';
    document.getElementById(`research${index}`).innerHTML = university.research || 'N/A';
    document.getElementById(`citation${index}`).innerHTML = university.citation || 'N/A';
    document.getElementById(`outlook${index}`).innerHTML = university.int_outlook || 'N/A';
    document.getElementById(`tanggal${index}`).innerHTML = university.tanggal || 'N/A';
}

// Function to update the charts with university data
function updateChart(university, index, chartType) {
    const labels = ["Teaching", "Research", "International Outlook", "Citations", "Income"];
    const newData = [
        university.teaching,
        university.research,
        university.int_outlook,
        university.citation,
        university.income,
    ];

    const labelsRanking = ["Rank Income", " Rank Citation", "Rank Research", "Rank International Outlook", " Rank Teaching", "World Rank"];
    const ranking = [
        university.rank_inc,
        university.rank_ctn,
        university.rank_rsc,
        university.rank_int_outlook,
        university.rank_teaching,
        university.wrld_rank,
    ];

    const backgroundColors = universityColors[index].backgroundColor;
    const borderColors = universityColors[index].borderColor;

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
    } else {
        if (myBarChart.data.datasets[index - 1]) {
            myBarChart.data.datasets[index - 1].data = newData;
            myBarChart.data.datasets[index - 1].label = university.nama_univ;
            myBarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
            myBarChart.data.datasets[index - 1].borderColor = borderColors;
        } else {
            myBarChart.data.datasets.push({
                label: university.nama_univ,
                data: newData,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            });
        }
        myBarChart.update();
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
    } else {
        if (myRadarChart.data.datasets[index - 1]) {
            myRadarChart.data.datasets[index - 1].data = ranking;
            myRadarChart.data.datasets[index - 1].label = university.nama_univ;
            myRadarChart.data.datasets[index - 1].backgroundColor = backgroundColors;
            myRadarChart.data.datasets[index - 1].borderColor = borderColors;
        } else {
            myRadarChart.data.datasets.push({
                label: university.nama_univ,
                data: ranking,
                backgroundColor: backgroundColors,
                borderColor: borderColors,
                borderWidth: 1
            });
        }
        myRadarChart.update();
    }
}
