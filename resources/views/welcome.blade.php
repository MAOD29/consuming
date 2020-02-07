<!DOCTYPE html>
<html lang="{{ str_replace('_', '-', app()->getLocale()) }}">
    <head>
        <meta charset="utf-8">
        <meta name="viewport" content="width=device-width, initial-scale=1">

        <title>ConsumingGraphQL</title>

        <!-- Fonts -->
        <link href="https://fonts.googleapis.com/css?family=Nunito:200,600" rel="stylesheet">

       
    </head>
    <body>
       <button id="version">Api Version</button>
       <p id="apiVersionData"></p>
       <button id="time">Time Zones</button>
       <ul id="timeZone">
        
       </ul>
      

    </body>

    <script type="text/javascript">
        const   version = document.getElementById('version'),
                apiVersionData = document.getElementById('apiVersionData'),
                time = document.getElementById('time'),
                timeZone = document.getElementById('timeZone')

                version.addEventListener('click',() =>{
                    fetch('/api')
                    .then((response) =>{
                        return response.json()
                    })
                    .then((data) =>{
                        console.log(data)
                         apiVersionData.innerHTML = `apiVersion: ${data.apiVersion}`
                    })
                   
                })

                time.addEventListener('click',() =>{
                    fetch('/timezones')
                    .then( (response) =>{
                        return response.json()
                    })

                    .then( (data) => {
                        drawTimeZones(data)   
                    })
                })
                const drawTimeZones = (data) =>{
                    console.log(data)
                    timeZone.innerHTML = ""
                    const container = document.createElement('div')
                    data.getTimezones.forEach(typeZone => {
                        const zones = `<li>${typeZone}</li>`
                        container.insertAdjacentHTML('beforeend',zones)
                    })

                    timeZone.appendChild(container)
                }
    </script>
</html>
