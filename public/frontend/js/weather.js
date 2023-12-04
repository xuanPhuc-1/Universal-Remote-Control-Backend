// public/js/weather.js
const apiKey = 'a63c667d1b4dfc87ac845b3dc4e3d2da';
const apiUrl = `https://api.openweathermap.org/data/2.5/weather?q=Hanoi&appid=${apiKey}&units=metric`;

fetch(apiUrl)
  .then(response => response.json())
  .then(data => {
    const temperature = data.main.temp;
    const humidity = data.main.humidity;

    // Gọi hàm để vẽ biểu đồ
    drawChart(temperature, humidity);
  })
  .catch(error => console.error('Error fetching data:', error));
