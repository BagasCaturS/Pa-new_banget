// import universitas from "./universitas.js";
// for (var i = 0; i < universitas.length; i++) {
//   document.getElementById("select1").innerHTML += `
//     <option value="${i}">${universitas[i].nama_univ}</option>
//     `;
//   document.getElementById("select2").innerHTML += `
//     <option value="${i}">${universitas[i].nama_univ}</option>
//     `;
//   document.getElementById("select3").innerHTML += `
//     <option value="${i}">${universitas[i].nama_univ}</option>
//     `;
// }
// ==============================================================================
// ORIGINAL

// Uncommetn dibawah original

// function item1(a) {
//   var select1 = document.getElementById("select1").value;
//   if (a == select1) {
//     document.getElementById("univ1").innerHTML = universitas[a].nama_univ
//     document.getElementById("lokasi1").innerHTML = universitas[a].lokasi
//     document.getElementById("wrld_rank1").innerHTML = universitas[a].wrld_rank
//     document.getElementById("teaching1").innerHTML = universitas[a].teaching
//     document.getElementById("research1").innerHTML = universitas[a].research
//     document.getElementById("citation1").innerHTML = universitas[a].citation
//     document.getElementById("outlook1").innerHTML = universitas[a].int_outlook
//     //hapus di bawah bila gagal
//     // document.getElementById("point1").innerHTML = universitas[a].pointsNeeded
//     var parameter = "teaching";
//     var currentPoints = teaching1;
//     var result = calculatePointsToNextRank(parameter, currentPoints);
//     console.log(result);


//   }

// }

// function item2(a) {
//   var select2 = document.getElementById("select2").value;
//   if (a == select2) {
//     document.getElementById("univ2").innerHTML = universitas[a].nama_univ
//     document.getElementById("lokasi2").innerHTML = universitas[a].lokasi
//     document.getElementById("wrld_rank2").innerHTML = universitas[a].wrld_rank
//     document.getElementById("teaching2").innerHTML = universitas[a].teaching
//     document.getElementById("research2").innerHTML = universitas[a].research
//     document.getElementById("citation2").innerHTML = universitas[a].citation
//     document.getElementById("outlook2").innerHTML = universitas[a].int_outlook

//   } else {
  //     document.getElementById("select3").selectedIndex = 0;
  //     document.getElementById("img3").src = universitas[0].image
  //     document.getElementById("price3").innerHTML = ""
  //     document.getElementById("desc3").innerHTML = ''
  //     document.getElementById("brand3").innerHTML = ""
  
  //   }
  // }
  
  // function item3(a) {
//   var select3 = document.getElementById("select3").value;
//   if (a == select3) {
  //     document.getElementById("univ3").innerHTML = universitas[a].nama_univ
  //     document.getElementById("lokasi3").innerHTML = universitas[a].lokasi
  //     document.getElementById("wrld_rank3").innerHTML = universitas[a].wrld_rank
  //     document.getElementById("teaching3").innerHTML = universitas[a].teaching
  //     document.getElementById("research3").innerHTML = universitas[a].research
  //     document.getElementById("citation3").innerHTML = universitas[a].citation
  //     document.getElementById("outlook3").innerHTML = universitas[a].int_outlook
  //   } else {
    //     document.getElementById("select3").selectedIndex = 0;
    //     document.getElementById("img3").src = universitas[0].image
    //     document.getElementById("price3").innerHTML = ""
    //     document.getElementById("desc3").innerHTML = ''
    //     document.getElementById("brand3").innerHTML = ""
    
    //   }
    // }
    // // ini juga
    // function calculatePointsToNextRank(parameter, currentPoints) {
//   var nextRankPoints = parseInt(universitas[1][parameter]);
//   var pointsNeeded = nextRankPoints - currentPoints;

//   if (pointsNeeded <= 0) {
//     return "Congratulations! You have already reached the next rank in this parameter.";
//   } else {
  //     return "You need " + pointsNeeded + " more points to reach the next rank in this parameter.";
//   }
// }

// // Array to store parameter values
// var teachingValues = [];
// var researchValues = [];
// var citationValues = [];
// var outlookValues = [];

// // Loop through the universitas array and extract parameter values
// for (var i = 1; i < universitas.length; i++) {
  //   teachingValues.push(universitas[i].teaching);
  //   researchValues.push(universitas[i].research);
  //   citationValues.push(universitas[i].citation);
  //   outlookValues.push(universitas[i].int_outlook);
  // }
  // // /////////////////////////////////////
  // var ctx = document.getElementById('combinedChart').getContext('2d');
  // new Chart(ctx, {
//   type: 'bar',
//   data: {
  //     // labels: teachingValues.map((_, i) => `${nama_univ}`),
//     labels: teachingValues.map((_, i) => `University ${i + 1}`),
//     // pada bagian ini apa bisa kita make misalnya univ1, univ2, dan univ3 hasil dari seleect oleh user?
//     // jadi hasil yang keluar bukan hasil dari looping 
//     datasets: [
  //       {
//         label: 'Teaching',
//         data: teachingValues,
//         backgroundColor: 'rgba(75, 192, 192, 0.6)',
//         borderColor: 'rgba(75, 192, 192, 1)',
//         borderWidth: 1
//       },
//       {
//         label: 'Outlook',
//         data: outlookValues,
//         backgroundColor: 'rgba(255, 99, 132, 0.6)',
//         borderColor: 'rgba(255, 99, 132, 1)',
//         borderWidth: 1
//       },
//       {
//         label: 'Research',
//         data: researchValues,
//         backgroundColor: 'rgba(54, 162, 235, 0.6)',
//         borderColor: 'rgba(54, 162, 235, 1)',
//         borderWidth: 1
//       },
//       {
  //         label: 'Citations',
  //         data: citationValues,
  //         backgroundColor: 'rgba(54, 162, 12, 0.6)',
  //         borderColor: 'rgba(54, 162, 12, 1)',
  //         borderWidth: 1
  //       },
  //       // Add more datasets for other parameters
  //     ]
  //   },
  //   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });


// window.onload = function () {
  //   var chart = new CanvasJS.Chart("chartContainer",
  //     {
    //       title: {
//         text: "A Combination of Column & Line Chart"

//       },
//       data: [{
  //         type: "column",
//         dataPoints: [
  //           { x: teachingValues, y: 171 },
  //           { x: 20, y: 155 },
  //           { x: 30, y: 150 },
  //           { x: 40, y: 165 },
  //           { x: 50, y: 195 },
  //           { x: 60, y: 168 },
  //           { x: 70, y: 128 },
  //           { x: 80, y: 134 },
  //           { x: 90, y: 114 }
  //         ]
  //       },
  //       {
    //         type: "line",
    //         dataPoints: [
      //           { x: 10, y: 71 },
      //           { x: 20, y: 55 },
      //           { x: 30, y: 50 },
      //           { x: 40, y: 65 },
      //           { x: 50, y: 95 },
//           { x: 60, y: 68 },
//           { x: 70, y: 28 },
//           { x: 80, y: 34 },
//           { x: 90, y: 14 }
//         ]
//       }

//       ]
//     });

//   chart.render();
// }

// Uncomment diatas original



// function fetchUniversityData(searchTerm) {
//   if (!searchTerm.trim()) {
//       return; // Don't proceed if the search term is empty
//   }

//   // Create a new XMLHttpRequest
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "./fetch_uni_name.php", true);
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//   // Define what happens on successful data submission
//   xhr.onload = function () {
//       if (xhr.status == 200) {
//           try {
//               var data = JSON.parse(xhr.responseText);
//               if (data) {
//                   document.getElementById('univ2').innerHTML = data.nama_univ;
//                   document.getElementById('lokasi2').innerHTML = data.lokasi;
//                   document.getElementById('wrld_rank2').innerHTML = data.wrld_rank;
//                   document.getElementById('teaching2').innerHTML = data.teaching;
//                   document.getElementById('point2').innerHTML = data.teaching_points_needed;
//                   document.getElementById('research2').innerHTML = data.research;
//                   document.getElementById('citation2').innerHTML = data.citation;
//                   document.getElementById('outlook2').innerHTML = data.int_outlook;
//               }
//           } catch (e) {
//               console.error("Error parsing JSON:", e);
//           }
//       }
//   };

//   // Send the request with the search term
//   xhr.send("search_term=" + encodeURIComponent(searchTerm));
// }

// function fetchUniversityData2(searchTerm) {
//   if (!searchTerm.trim()) {
//       return; // Don't proceed if the search term is empty
//   }

//   // Create a new XMLHttpRequest
//   var xhr = new XMLHttpRequest();
//   xhr.open("POST", "./fetch_uni_name.php", true);
//   xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

//   // Define what happens on successful data submission
//   xhr.onload = function () {
//       if (xhr.status == 200) {
//           try {
//               var data = JSON.parse(xhr.responseText);
//               if (data) {
//                   document.getElementById('univ3').innerHTML = data.nama_univ;
//                   document.getElementById('lokasi3').innerHTML = data.lokasi;
//                   document.getElementById('wrld_rank3').innerHTML = data.wrld_rank;
//                   document.getElementById('teaching3').innerHTML = data.teaching;
//                   document.getElementById('point3').innerHTML = data.teaching_points_needed;
//                   document.getElementById('research3').innerHTML = data.research;
//                   document.getElementById('citation3').innerHTML = data.citation;
//                   document.getElementById('outlook3').innerHTML = data.int_outlook;
//               }
//           } catch (e) {
//               console.error("Error parsing JSON:", e);
//           }
//       }
//   };

//   // Send the request with the search term
//   xhr.send("search_term=" + encodeURIComponent(searchTerm));
// }


// /////////////////////////////////////////
// // CHART FIXED
// function searchUniversities() {
//   var searchTerm = document.getElementById("searchInput").value.toLowerCase();
//   var xhr = new XMLHttpRequest();
//   xhr.onreadystatechange = function() {
//     if (this.readyState == 4 && this.status == 200) {
//       var data = JSON.parse(this.responseText);
//       var resultHTML = "";
//       for (var i = 0; i < data.id_ova.length; i++) {
//         if (data.nama_univ[i].toLowerCase().includes(searchTerm)) {
//           resultHTML += "<div>";
//           resultHTML += "<h3>" + data.nama_univ[i] + "</h3>";
//           resultHTML += "<p>Teaching: " + data.teaching[i] + "</p>";
//           resultHTML += "<p>Research: " + data.research[i] + "</p>";
//           resultHTML += "<p>International Outlook: " + data.int_outlook[i] + "</p>";
//           resultHTML += "<p>Citation: " + data.citation[i] + "</p>";
//           resultHTML += "<p>Income: " + data.income[i] + "</p>";
//           resultHTML += "</div>";
//         }
//       }
//       document.getElementById("searchResults").innerHTML = resultHTML;
//     }
//   };
//   xhr.open("GET", "search.php?q=" + searchTerm, true);
//   xhr.send();
// }
// // Create a bar chart for Teaching parameter
// // Fetch the data from the server
// function searchAndUpdateChart(searchTerm) {
//   if (searchTerm === '') return;

//   // Fetch university data based on the search term
//   fetch(`./fetch_uni_name.php?q=${searchTerm}`)
//       .then(response => response.json())
//       .then(data => {
//           if (data.length > 0) {
//               // Update university details in the HTML
//               document.getElementById('univ2').innerHTML = data[0].nama_univ || 'N/A';
//               document.getElementById('lokasi2').innerHTML = data[0].lokasi || 'N/A';
//               document.getElementById('wrld_rank2').innerHTML = data[0].wrld_rank || 'N/A';
//               document.getElementById('teaching2').innerHTML = data[0].teaching || 'N/A';
//               document.getElementById('point2').innerHTML = data[0].teaching_points_needed || 'N/A';
//               document.getElementById('research2').innerHTML = data[0].research || 'N/A';
//               document.getElementById('citation2').innerHTML = data[0].citation || 'N/A';
//               document.getElementById('outlook2').innerHTML = data[0].int_outlook || 'N/A';

//               // Update Chart.js labels and data dynamically
//               const ctxTeaching = document.getElementById('chartTeaching').getContext('2d');
//               const chartData = {
//                   labels: [data[0].nama_univ],  // Use the university name from the data
//                   datasets: [
//                       {
//                           label: 'Teaching',
//                           data: [data[0].teaching],
//                           backgroundColor: 'rgba(75, 192, 192, 0.6)',
//                           borderColor: 'rgba(75, 192, 192, 1)',
//                           borderWidth: 1
//                       },
//                       {
//                           label: 'Research',
//                           data: [data[0].research],
//                           backgroundColor: 'rgba(255, 159, 64, 0.6)',
//                           borderColor: 'rgba(255, 159, 64, 1)',
//                           borderWidth: 1
//                       },
//                       {
//                           label: 'International Outlook',
//                           data: [data[0].int_outlook],
//                           backgroundColor: 'rgba(54, 162, 235, 0.6)',
//                           borderColor: 'rgba(54, 162, 235, 1)',
//                           borderWidth: 1
//                       },
//                       {
//                           label: 'Citations',
//                           data: [data[0].citation],
//                           backgroundColor: 'rgba(153, 102, 255, 0.6)',
//                           borderColor: 'rgba(153, 102, 255, 1)',
//                           borderWidth: 1
//                       },
//                       {
//                           label: 'Income',
//                           data: [data[0].income],
//                           backgroundColor: 'rgba(255, 206, 86, 0.6)',
//                           borderColor: 'rgba(255, 206, 86, 1)',
//                           borderWidth: 1
//                       }
//                   ]
//               };
//               // Destroy the old chart instance if it exists and create a new one
//               if (window.teachingChart) {
//                   window.teachingChart.destroy();
//               }
//               window.teachingChart = new Chart(ctxTeaching, {
//                   type: 'bar',
//                   data: chartData,
//                   options: {
//                       responsive: true,
//                       scales: {
//                           y: {
//                               beginAtZero: true
//                           }
//                       }
//                   }
//               });
//           } else {
//               console.log("No data found");
//           }
//       })
//       .catch(error => console.error('Error fetching data:', error));
// }


  // ----line chart----
  // Global chart variables
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
    document.getElementById(`point${index}`).innerHTML = university.teaching_points_needed || 'N/A';
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

    let chart, chartElement;

    if (chartType === 'bar') {
        chart = myBarChart;
        chartElement = 'chartTeaching';
    } else if (chartType === 'line') {
        chart = myLineChart;
        chartElement = 'lineChart';
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
                    backgroundColor: chartType === 'bar' ? 'rgba(75, 192, 192, 0.6)' : 'rgba(24, 162, 235, 0.6)',
                    borderColor: chartType === 'bar' ? 'rgba(75, 192, 192, 1)' : 'rgba(54, 162, 235, 1)',
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
    } 
    else {
        // If the chart exists, update the datasets and labels

        // Check if the dataset for the university index already exists
        if (chart.data.datasets[index - 1]) {
            // Update the existing dataset
            chart.data.datasets[index - 1].data = newData;
            chart.data.datasets[index - 1].label = university.nama_univ;
        } else {
            // Add a new dataset if it doesn't exist
            chart.data.datasets.push({
                label: university.nama_univ,
                data: newData,
                backgroundColor: chartType === 'bar' ? `rgba(${75 + index * 30}, 192, 192, 0.6)` : `rgba(${54 + index * 30}, 162, 235, 0.6)`,
                borderColor: chartType === 'bar' ? `rgba(${75 + index * 30}, 192, 192, 1)` : `rgba(${54 + index * 30}, 162, 235, 1)`,
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




  // global chart========================================
  // Add line chart
  
  // var ctxTeaching = document.getElementById('chartTeaching').getContext('2d');
// new Chart(ctxTeaching, {
//   type: 'bar',
//   data: {
//     labels: ['University 1', 'University 2', 'University 3'],
//     datasets: [{
//       label: 'Teaching',
//       data: [
//         document.getElementById("teaching1").innerHTML,
//         document.getElementById("teaching2").innerHTML,
//         document.getElementById("teaching3").innerHTML
//       ],
//       backgroundColor: 'rgba(75, 192, 192, 0.6)',
//       borderColor: 'rgba(75, 192, 192, 1)',
//       borderWidth: 1
//     }]
//   },
//   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });

// ==============================================
// function item1(value) {
//   document.getElementById('teaching1').innerHTML = value; // Update the HTML with selected value
//   updateChart(); // Update the chart 
// }

// function item2(value) {
//   document.getElementById('teaching2').innerHTML = value;
//   updateChart();
// }

// function item3(value) {
//   document.getElementById('teaching3').innerHTML = value;
//   updateChart();
// }

// function updateChart() {  // Function to fetch the updated data
//   const data = [
//     document.getElementById("teaching1").innerHTML,
//     document.getElementById("teaching2").innerHTML,
//     document.getElementById("teaching3").innerHTML
//   ];
//   chartTeaching.data.datasets[0].data = data;
//   chartTeaching.update();
// }


// window.onload = function() { // Initialize data in window onload
//             const ctxTeaching = document.getElementById('chartTeaching').getContext('2d');
//             window.chartTeaching = new Chart(ctxTeaching, {
//                 type: 'bar',
//                 data: {
//                     labels: ['University 1', 'University 2', 'University 3'],
//                     datasets: [{
//                         label: 'Teaching',
//                         data: [0, 0, 0], 
//                         backgroundColor: 'rgba(75, 192, 192, 0.6)',
//                         borderColor: 'rgba(75, 192, 192, 1)',
//                         borderWidth: 1
//                     }]
//                 },
//                 options: {
//                     responsive: true,
//                     scales: {
//                         y: {
//                             beginAtZero: true
//               }
//           }
//        }
//    });
// }
// ==============================================

// Create a bar chart for Research parameter
// var ctxResearch = document.getElementById('chartResearch').getContext('2d');
// new Chart(ctxResearch, {
//   type: 'bar',
//   data: {
//     labels: researchValues.map((_, i) => `University ${i + 1}`),
//     datasets: [{
//       label: 'Research',
//       data: researchValues,
//       backgroundColor: 'rgba(255, 99, 132, 0.6)',
//       borderColor: 'rgba(255, 99, 132, 1)',
//       borderWidth: 1
//     }]
//   },
//   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });

// // Create a bar chart for Citation parameter
// var ctxCitation = document.getElementById('chartCitation').getContext('2d');
// new Chart(ctxCitation, {
//   type: 'bar',
//   data: {
//     labels: citationValues.map((_, i) => `University ${i + 1}`),
//     datasets: [{
//       label: 'Citation',
//       data: citationValues,
//       backgroundColor: 'rgba(54, 162, 235, 0.6)',
//       borderColor: 'rgba(54, 162, 235, 1)',
//       borderWidth: 1
//     }]
//   },
//   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });

// // Create a bar chart for Outlook parameter
// var ctxOutlook = document.getElementById('chartOutlook').getContext('2d');
// new Chart(ctxOutlook, {
//   type: 'bar',
//   data: {
//     labels: outlookValues.map((_, i) => `University ${i + 1}`),
//     datasets: [{
//       label: 'Outlook',
//       data: outlookValues,
//       backgroundColor: 'rgba(153, 102, 255, 0.6)',
//       borderColor: 'rgba(153, 102, 255, 1)',
//       borderWidth: 1
//     }]
//   },
//   options: {
//     responsive: true,
//     scales: {
//       y: {
//         beginAtZero: true
//       }
//     }
//   }
// });

// ----------------------------------------------------------------
// bikin sendiri//

// var ctx = document.getElementById('overallChart').getContext('2d');

// // terakhir belum fix ini gmna caranya?
// fetch('charts-data.php').then(Response => Response.json()).then(chartData => {
//   var chart = new chart(ctx, {
//     type: 'bar',
//     data: {
//       labels: chartData.map(item => item.label),
//       datasets: [{
//         label: 'Overall',
//         data: chartData.map(item => item.value),
//         backgroundColor: 'rgba(75, 192, 192, 0.2)',
//         borderColor: 'rgba(75, 192, 192, 1)',
//         borderWidth: 1
//       }]
//     },
//     options: {
//       // Specify additional chart options as needed
//     }
//   });
// })
//   .catch(error => {
//     console.error('Error:', error);
//   });