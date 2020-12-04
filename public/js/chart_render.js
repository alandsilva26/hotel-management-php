function renderBooking(rawData) {
  var ctx = document.getElementById("booking-chart");
  console.log(rawData);
  // Remove this later
  var booked = 0;
  var unbooked = 0;
  rawData.forEach((room) => {
    if (room["room_booked"] == "1") {
      //   console.log("room_booked");
      booked++;
    }
    unbooked++;
  });
  data = {
    datasets: [
      {
        data: [booked, unbooked],
        backgroundColor: [
          "rgba(153, 102, 255, 0.2)",
          "rgba(255, 159, 64, 0.2)",
          "rgba(255, 99, 132, 0.2)",
          "rgba(54, 162, 235, 0.2)",
          "rgba(255, 206, 86, 0.2)",
          "rgba(75, 192, 192, 0.2)",
        ],
        borderColor: [
          "rgba(153, 102, 255, 1)",
          "rgba(255, 159, 64, 1)",
          "rgba(255, 99, 132, 1)",
          "rgba(54, 162, 235, 1)",
          "rgba(255, 206, 86, 1)",
          "rgba(75, 192, 192, 1)",
        ],
      },
    ],

    // These labels appear in the legend and in the tooltips when hovering different arcs
    labels: ["Booked Rooms", "Unbooked Rooms"],
  };
  var myDoughnutChart = new Chart(ctx, {
    type: "doughnut",
    data: data,
    // options: options
  });
}

String.prototype.capitalize = function () {
  return this.charAt(0).toUpperCase() + this.slice(1);
};

function roomTypes(rawData) {
  var ctx = document.getElementById("room-types");
  ctx.style.backgroundColor = "rgb(255,255,255)";
  console.log(rawData);
  // Classify by types
  var dataList = {};
  rawData.forEach((room) => {
    var type = room["room_type"].capitalize();
    // console.log(type);
    if (dataList.hasOwnProperty(type)) {
      dataList[type]++;
      // console.log(dataList[type]);
    } else {
      dataList[type] = 1;
    }
  });

  data = [];
  labels = [];

  // dataList.sort();

  for (const [key, value] of Object.entries(dataList)) {
    labels.push(key);
    data.push(value);
  }

  console.log(labels);

  // data = {
  //     datasets: [{
  //         data: data,
  //         backgroundColor: ["#fd8c04","rgb(236, 88, 88)"],
  //     }],

  //     // These labels appear in the legend and in the tooltips when hovering different arcs
  //     // labels: labels
  // };

  var typeChart = new Chart(ctx, {
    type: "bar",
    data: {
      labels: labels,
      datasets: [
        {
          label: "Type of Rooms",
          data: data,
          backgroundColor: [
            "rgba(255, 99, 132, 0.2)",
            "rgba(54, 162, 235, 0.2)",
            "rgba(255, 206, 86, 0.2)",
            "rgba(75, 192, 192, 0.2)",
            "rgba(153, 102, 255, 0.2)",
            "rgba(255, 159, 64, 0.2)",
          ],
          borderColor: [
            "rgba(255, 99, 132, 1)",
            "rgba(54, 162, 235, 1)",
            "rgba(255, 206, 86, 1)",
            "rgba(75, 192, 192, 1)",
            "rgba(153, 102, 255, 1)",
            "rgba(255, 159, 64, 1)",
          ],
          borderWidth: 1,
        },
      ],
    },
    options: {
      scales: {
        yAxes: [
          {
            ticks: {
              beginAtZero: true,
            },
          },
        ],
      },
    },
  });
}
