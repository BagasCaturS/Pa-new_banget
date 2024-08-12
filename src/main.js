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



function fetchUniversityData(searchTerm) {
  if (!searchTerm.trim()) {
      return; // Don't proceed if the search term is empty
  }

  // Create a new XMLHttpRequest
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./fetch_uni_name.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Define what happens on successful data submission
  xhr.onload = function () {
      if (xhr.status == 200) {
          try {
              var data = JSON.parse(xhr.responseText);
              if (data) {
                  document.getElementById('univ2').innerHTML = data.nama_univ;
                  document.getElementById('lokasi2').innerHTML = data.lokasi;
                  document.getElementById('wrld_rank2').innerHTML = data.wrld_rank;
                  document.getElementById('teaching2').innerHTML = data.teaching;
                  document.getElementById('point2').innerHTML = data.teaching_points_needed;
                  document.getElementById('research2').innerHTML = data.research;
                  document.getElementById('citation2').innerHTML = data.citation;
                  document.getElementById('outlook2').innerHTML = data.int_outlook;
              }
          } catch (e) {
              console.error("Error parsing JSON:", e);
          }
      }
  };

  // Send the request with the search term
  xhr.send("search_term=" + encodeURIComponent(searchTerm));
}

function fetchUniversityData2(searchTerm) {
  if (!searchTerm.trim()) {
      return; // Don't proceed if the search term is empty
  }

  // Create a new XMLHttpRequest
  var xhr = new XMLHttpRequest();
  xhr.open("POST", "./fetch_uni_name.php", true);
  xhr.setRequestHeader("Content-type", "application/x-www-form-urlencoded");

  // Define what happens on successful data submission
  xhr.onload = function () {
      if (xhr.status == 200) {
          try {
              var data = JSON.parse(xhr.responseText);
              if (data) {
                  document.getElementById('univ3').innerHTML = data.nama_univ;
                  document.getElementById('lokasi3').innerHTML = data.lokasi;
                  document.getElementById('wrld_rank3').innerHTML = data.wrld_rank;
                  document.getElementById('teaching3').innerHTML = data.teaching;
                  document.getElementById('point3').innerHTML = data.teaching_points_needed;
                  document.getElementById('research3').innerHTML = data.research;
                  document.getElementById('citation3').innerHTML = data.citation;
                  document.getElementById('outlook3').innerHTML = data.int_outlook;
              }
          } catch (e) {
              console.error("Error parsing JSON:", e);
          }
      }
  };

  // Send the request with the search term
  xhr.send("search_term=" + encodeURIComponent(searchTerm));
}


/////////////////////////////////////////
// CHART FIXED
function searchUniversities() {
  var searchTerm = document.getElementById("searchInput").value.toLowerCase();
  var xhr = new XMLHttpRequest();
  xhr.onreadystatechange = function() {
    if (this.readyState == 4 && this.status == 200) {
      var data = JSON.parse(this.responseText);
      var resultHTML = "";
      for (var i = 0; i < data.id_ova.length; i++) {
        if (data.nama_univ[i].toLowerCase().includes(searchTerm)) {
          resultHTML += "<div>";
          resultHTML += "<h3>" + data.nama_univ[i] + "</h3>";
          resultHTML += "<p>Teaching: " + data.teaching[i] + "</p>";
          resultHTML += "<p>Research: " + data.research[i] + "</p>";
          resultHTML += "<p>International Outlook: " + data.int_outlook[i] + "</p>";
          resultHTML += "<p>Citation: " + data.citation[i] + "</p>";
          resultHTML += "<p>Income: " + data.income[i] + "</p>";
          resultHTML += "</div>";
        }
      }
      document.getElementById("searchResults").innerHTML = resultHTML;
    }
  };
  xhr.open("GET", "search.php?q=" + searchTerm, true);
  xhr.send();
}
// Create a bar chart for Teaching parameter
// Fetch the data from the server
fetch('./1koneksidb.php')
  .then(response => response.json())
  .then(chartData => {
    // Initialize the Chart.js chart
    const ctxTeaching = document.getElementById('chartTeaching').getContext('2d');
    new Chart(ctxTeaching, {
      type: 'bar',
      data: {
        // NAMA UNIV PERLU DIGANTI DENGAN NAMA UNVI SESUAI PILIHAN USER
        // unvierstiy 1 diganti dengan telkom University
        labels: ['University 1', 'University 2', 'University 3'],
        datasets: [
          {
            label: 'Teaching',
            data: chartData.teaching,
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          },
          {
            label: 'Research',
            data: chartData.research,
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
          },
          {
            label: 'International Outlook',
            data: chartData.int_outlook,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Citations',
            data: chartData.citation,
            backgroundColor: 'rgba(153, 102, 255, 0.6)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
          },
          {
            label: 'Income',
            data: chartData.income,
            backgroundColor: 'rgba(255, 206, 86, 0.6)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          }
        ]
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
  })
  .catch(error => console.error(error));
  // ----line chart----
fetch('./1koneksidb.php')
  .then(response => response.json())
  .then(chartData => {
    // Initialize the Chart.js chart
    const ctxLine = document.getElementById('lineChart').getContext('2d');
    new Chart(ctxLine, {
      type: 'line',
      data: {
        // LABELS DIGANTI DEGNAN PARAMERTER YANG ADA DI DATABASE
        labels: ['University 1', 'University 2', 'University 3'],
        datasets: [
          {
            // DATA DIGANTI DENGAN NAMA UNIVERSITAS SESUAI PILIHAN USER
            label: 'Teaching',
            data: chartData.teaching,
            backgroundColor: 'rgba(75, 192, 192, 0.6)',
            borderColor: 'rgba(75, 192, 192, 1)',
            borderWidth: 1
          },
          {
            label: 'Research',
            data: chartData.research,
            backgroundColor: 'rgba(255, 159, 64, 0.6)',
            borderColor: 'rgba(255, 159, 64, 1)',
            borderWidth: 1
          },
          {
            label: 'International Outlook',
            data: chartData.int_outlook,
            backgroundColor: 'rgba(54, 162, 235, 0.6)',
            borderColor: 'rgba(54, 162, 235, 1)',
            borderWidth: 1
          },
          {
            label: 'Citations',
            data: chartData.citation,
            backgroundColor: 'rgba(153, 102, 255, 0.6)',
            borderColor: 'rgba(153, 102, 255, 1)',
            borderWidth: 1
          },
          {
            label: 'Income',
            data: chartData.income,
            backgroundColor: 'rgba(255, 206, 86, 0.6)',
            borderColor: 'rgba(255, 206, 86, 1)',
            borderWidth: 1
          }
        ]
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
  })
  .catch(error => console.error(error));
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