/*
Template Name: Material Pro Admin
Author: Themedesigner
Email: niravjoshi87@gmail.com
File: js
*/
$(function() {
  "use strict";
  /*var data = {
    labels: time_str,
    series: [total_str]
  };*/
  // ==============================================================
  // Sales overview
  // ==============================================================
  $.ajax({
    url: "function.php",
    type: "post",
    data: { action: "course_webinar" },
    dataType: "json",
    success: function(data) {
      var labels = data.labels,
        series = data.series,
        category = data.category,
        course = data.course,
        webinar = data.webinar;

      console.log(labels);
      console.log(series);

      var data = {
        labels: labels,
        series: series
      };

      var chart2 = new Chartist.Bar(
        ".course-webinar",
        data,
        {
          // Default mobile configuration
          stackBars: true,
          axisX: {
            labelInterpolationFnc: function(value) {
              return value
                .split(/\s+/)
                .map(function(word) {
                  return word[0];
                })
                .join("");
            }
          },
          axisY: {
            offset: 20
          },
          plugins: [Chartist.plugins.tooltip()]
        },
        [
          // Options override for media > 400px
          [
            "screen and (min-width: 400px)",
            {
              reverseData: true,
              horizontalBars: true,
              axisX: {
                labelInterpolationFnc: Chartist.noop
              },
              axisY: {
                offset: 60
              }
            }
          ],
          // Options override for media > 800px
          [
            "screen and (min-width: 800px)",
            {
              stackBars: false,
              seriesBarDistance: 10
            }
          ],
          // Options override for media > 1000px
          [
            "screen and (min-width: 1000px)",
            {
              reverseData: false,
              horizontalBars: false,
              seriesBarDistance: 15
            }
          ]
        ]
      );
    },
    error: function(data) {
      console.log("error" + data);
    }
  });

  // ==============================================================
  // Sales Sumaries
  // ==============================================================
  $.ajax({
    url: "function.php",
    type: "post",
    data: { action: "sales" },
    dataType: "json",
    success: function(data) {
      var course = data.course,
        webinar = data.webinar;

      console.log(course);
      console.log(webinar);

      var chart = c3.generate({
        bindto: "#sales",
        data: {
          columns: [
            ["Course", course],
            ["Webinar", webinar]
          ],

          type: "donut",
          onclick: function(d, i) {
            console.log("onclick", d, i);
          },
          onmouseover: function(d, i) {
            console.log("onmouseover", d, i);
          },
          onmouseout: function(d, i) {
            console.log("onmouseout", d, i);
          }
        },
        donut: {
          label: {
            show: false
          },
          title: "สรุปอัตราส่วนประจำวัน",
          width: 20
        },

        legend: {
          hide: true
          //or hide: 'data1'
          //or hide: ['data1', 'data2']
        },
        color: {
          pattern: ["#1e88e5", "#ffb22b", "#eceff1", "#745af2"]
        }
      });
    },
    error: function(data) {
      console.log("error" + data);
    }
  });
}); //End function()

chart_summary();
function chart_summary() {
  $.ajax({
    url: "function.php",
    method: "POST",
    data: {
      form: "chart_summary",
    },
    success: function (data) {
      $("#div_chart_summary").html(data);
    }
  });
}
